var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var movies_genres = document.querySelectorAll('.movie_genre');
var tv_genres = document.querySelectorAll('.tv_genre');
var movies_len = movies_genres.length;
var tv_len = tv_genres.length;
const STREAM_PATH = getUrl.protocol + '//' + getUrl.host;
console.log(STREAM_PATH);
console.log(movie_id);

const player = new Plyr('#player');

$(document).ready(function() {
    hide_show_genres_list(type, movies_genres, tv_genres);
	get_movie_link_by_id();

});

function get_movie_data(movie_id)
{

    $.ajax({
        type: 'POST',
        url: baseUrl + '/',
        data:
            {
                'method': 'ignition',
                'raw_id': movie_id,
                'lang': lang,
                'type': type,
                'imdb_id': imdb_id
            },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            var idarr = response;
            if(idarr) {
                //idarr[0] - tmdb_id, adarr[1] - imdb_id, idarr[2] - type(movies or tvshows) idarr[3] - title
                get_movie_link_by_id(idarr[1], idarr[2], idarr[3], lang);
            }
        }
    });
}

function get_movie_link_by_id()
{
    $.ajax({
        type: 'POST',
        url: baseUrl + '/',
        data:
            {
                'method': 'link',
                'id': imdb_id,
                'type': type,
                'lang': lang,
                'title': title
            },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response != "noID") {
                var list = JSON.parse(response);
                var container = document.getElementById('links_response');
                if ((list != null && list.length == 0) || (type == "movies" && list.YTS != null && list.YTS.length == 0)) {
                    document.querySelector('.no_result_links').style.display = "block";
                }
                else if (list != null) {
                    if (type == "movies") {
                        if (list.YTS) {
                            var lenYTS = Object.keys(list.YTS).length;
                            if (lenYTS > 0) {
                                var YTSlabel = document.createElement('h4');
                                YTSlabel.innerHTML = "YTS";
                                container.append(YTSlabel);
                                for (var i = 0; i < lenYTS; i++) {
                                    var YTS = document.createElement('div');
                                    YTS.setAttribute("class", "button_box");
                                    var play_label = document.createElement('div');
                                    play_label.setAttribute("class", "play_label resolution");
                                    var language = document.createElement('div');
                                    language.setAttribute("class", "link_language");
                                    language.innerHTML = list.YTS[i].lang;
                                    play_label.innerHTML = list.YTS[i].quality;
                                    var play_form = document.createElement('div');
                                    play_form.setAttribute("class", "play_button_box");
                                    var play_button = document.createElement('button');
                                    play_button.setAttribute("class", "play_button btn btn-primary");
                                    play_button.setAttribute('name', "play");
                                    play_button.setAttribute('type', "submit");
                                    play_button.innerHTML = "Play";
                                    play_button.setAttribute("onclick", "playButton(event)");
                                    play_button.setAttribute('data-link', list.YTS[i].magnet);
                                    play_button.setAttribute('data-title', title);
                                    play_button.setAttribute('data-type', type);
                                    play_button.setAttribute('data-imdb', imdb_id);
                                    play_form.append(play_button);
                                    YTS.append(language);
                                    YTS.append(play_label);
                                    YTS.append(play_form);
                                    container.append(YTS);
                                }
                            }
                        }
                        var lenPop = 0;
                        if (list.popcorn)
                            lenPop = Object.keys(list.popcorn).length;
                        if (lenPop > 0) {
                            var POPlabel = document.createElement('h4');
                            POPlabel.innerHTML = "Popcorn";
                            container.append(POPlabel);
                            for (var i = 0; i < lenPop; i++) {
                                var POP = document.createElement('div');
                                POP.setAttribute("class", "button_box");
                                var play_label = document.createElement('div');
                                play_label.setAttribute("class", "play_label resolution");
                                play_label.innerHTML = list.popcorn[i].quality;
                                var language = document.createElement('div');
                                language.setAttribute("class", "link_language");
                                language.innerHTML = list.popcorn[i].lang;
                                var play_form = document.createElement('div');
                                play_form.setAttribute("class", "play_button_box");
                                var play_button = document.createElement('button');
                                play_button.setAttribute("class", "play_button btn btn-primary");
                                play_button.setAttribute('name', "play");
                                play_button.setAttribute('type', "submit");
                                play_button.innerHTML = "Play";
                                play_button.setAttribute("onclick", "playButton(event)");
                                play_button.setAttribute('data-type', type);
                                play_button.setAttribute('data-link', list.popcorn[i].magnet);
                                play_button.setAttribute('data-title', title);
                                play_button.setAttribute('data-imdb', imdb_id);
                                play_form.append(play_button);
                                POP.append(language);
                                POP.append(play_label);
                                POP.append(play_form);
                                container.append(POP);
                            }
                        }
                    }
                    else if (type == "tvshows") {
                        list.sort(function (obj1, obj2) {
                            return obj1.season - obj2.season;
                        });
                        var lenShows = Object.keys(list).length;
                        for (var i = 0; i < lenShows; i++) {
                            var each_episode_container = document.createElement('div');
                            each_episode_container.setAttribute("class", "each_episode_container");
                            var episode_season_label = document.createElement('div');
                            episode_season_label.setAttribute("class", "episode_season_label");
                            var episode = document.createElement('span');
                            var season = document.createElement('span');
                            var torrents = document.createElement('div');
                            season.innerHTML = 'Season ' + list[i].season;
                            episode.innerHTML = 'Episode ' + list[i].episode;
                            episode_season_label.append(season);
                            episode_season_label.append(episode);
                            for (key in list[i].torrents) {
                                var each_torrent = document.createElement('div');
                                each_torrent.setAttribute("class", "button_box");
                                var play_label = document.createElement('div');
                                play_label.setAttribute("class", "resolution");
                                play_label.innerHTML = key;
                                var each_title = document.createElement('div');
                                each_title.innerHTML = list[i].title;
                                each_title.setAttribute("class", "each_title");
                                var play_form = document.createElement('div');
                                play_form.setAttribute("class", "play_button_box");
                                var play_button = document.createElement('button');
                                play_button.setAttribute("class", "play_button btn btn-primary");
                                play_button.setAttribute('name', "play");
                                play_button.setAttribute('type', "submit");
                                play_button.innerHTML = "Play";
                                play_button.setAttribute("onclick", "playButton(event)");
                                play_button.setAttribute('data-type', type);
                                play_button.setAttribute('data-link', list[i].torrents[key].url);
                                play_button.setAttribute('data-title', title);
                                play_button.setAttribute('data-imdb', imdb_id);
                                play_button.setAttribute('data-season', list[i].season);
                                play_button.setAttribute('data-episode', list[i].episode);
                                play_form.append(play_button);
                                each_torrent.append(each_title);
                                each_torrent.append(play_label);
                                each_torrent.append(play_form);
                                torrents.append(each_torrent);
                            }
                            var line = document.createElement('hr');
                            each_episode_container.append(episode_season_label);
                            each_episode_container.append(torrents);
                            each_episode_container.append(line);
                            container.append(each_episode_container);
                        }
                    }
                }
                else
                    document.querySelector('.no_result_links').style.display = "block";
            }
            else
                document.querySelector('.no_result_links').style.display = "block";
        }

    });
}

function playButton(event)
{
    target = event.target;
    var link = target.getAttribute('data-link');
    var type = target.getAttribute('data-type');
    var season = target.getAttribute('data-season');
    var episode = target.getAttribute('data-episode');
    console.log("magnet available onclick :", link);
    var title = target.getAttribute('data-title');
    var imdb = target.getAttribute('data-imdb');
    var sub_label_en = null;
    var sub_srclang_en = null;
    var sub_src_en = null;
    var sub_label_uk = null;
    var sub_srclang_uk = null;
    var sub_src_uk = null;

    $.ajax({
            type: 'PUT',
            url: baseUrl + '/',
            data:
                {
                    'magnet': link,
                    'title': title,
                    'imdb': imdb,
                    'type': type,
                    'season': season,
                    'episode': episode,
                    'lang': lang,
                    'id': movie_id
                },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if(response){
                    var hash = link.split(':')[3].split('&')[0];
                    var path = STREAM_PATH + '/Venom.vtt';
                    console.log('Path - ' + path);
                    console.log(lang);
                    var links = JSON.parse(response);
                   // var subtitles_link = links.subs.response.data[0].SubDownloadLink;
                    console.log(links.subs_path);
                    console.log("returned from server with subs : ", links);
                    console.log("exactly link returned from server. This may come with huge delay(depends of how many results api return) : ", links.movie.magnet);
                    // console.log(links.subs["\u0000*\u0000response"].data[0].SubDownloadLink);
                    //console.log("one of subs link returned from server, just for example : ", subtitles_link); //indexes count may be up to 500
                }
                else {
                    window.location.href = getUrl.protocol + "//" + getUrl.host + "/penetration";
                }
                if(links.subs_en) {
                    sub_srclang_en = 'en';
                    sub_label_en = 'English';
                    sub_src_en = STREAM_PATH + '/subtitles/' + links.subs_en;
                }
                if(links.subs_uk) {
                    sub_srclang_uk = 'uk';
                    sub_label_uk = 'Ukrainian';
                    sub_src_uk = STREAM_PATH + '/subtitles/' + links.subs_uk;
                }

                player.source = {
                    type: 'video',
                    title: title,
                    poster: player_preview_img,
                    sources: [
                        {
                            src: 'http://localhost:8888/' + links.movie.magnet,
                            type: 'video/mp4',
                        }
                    ],
                    tracks: [{
                        kind: 'captions',
                        label: sub_label_en,
                        srclang: sub_srclang_en,
                        src: sub_src_en,
                        default: false,
                      },
                        {
                            kind: 'captions',
                            label: sub_label_uk,
                            srclang: sub_srclang_uk,
                            src: sub_src_uk,
                            default: false,
                        },
                    ],
                  };
            }

        });
}

$('.genre_direct_link').click(function (e)
{
    e.preventDefault();
    var target = e.target;
    if(target.className == "title_aside")
    {
        var genres = target.getAttribute('data');
        var res = [genres];
        $.ajax({
            type: 'POST',
            url: baseUrl + '/',
            data:
                {
                    'method' : "redirect"
                },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                    localStorage.setItem("redirected_type", type);
                    localStorage.setItem("redirected_genre", res);
                    window.location.href = response.redirect;
            }
        });


    }
});

function hide_show_genres_list(type, movies_genres, tv_genres)
{
    if(type === "movies")
    {
        for (var i = 0; i < movies_len; i++)
        {
            movies_genres[i].style.display = "block";
        }
        for (var i = 0; i < tv_len; i++)
        {
            tv_genres[i].style.display = "none";
        }
    }
    else if(type === "tvshows")
    {
        for (var i = 0; i < movies_len; i++) {
            movies_genres[i].style.display = "none";
        }
        for (var i = 0; i < tv_len; i++) {
            tv_genres[i].style.display = "block";
        }
    }
}

$('#reset_button').click(function () {
    $.ajax({
        type: 'POST',
        url: baseUrl + '/',
        data:
            {
                'method' : "redirect"
            },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            localStorage.setItem("reset_redirect", 1);
            window.location.href = response.redirect;
        }
    });

});

var timer;

$('#live_search_input').bind("input", function () {
    if (this.value.length >= 1) {
        var needle = this.value;
        clearTimeout(timer);
        timer = setTimeout(function () {
            $.ajax({
                type: 'POST',
                url: baseUrl + '/',
                data:
                    {
                        'method' : "redirect"
                    },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    localStorage.setItem("live_redirect", needle);
                    window.location.href = response.redirect;
                }
            });
        }, 500);
    }

});


  





