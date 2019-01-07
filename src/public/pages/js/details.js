var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
//var lang = "en-US";
//var lang = "uk-UA";


console.log(movie_id);
console.log(lang);
var movies_genres = document.querySelectorAll('.movie_genre');
var tv_genres = document.querySelectorAll('.tv_genre');
var movies_len = movies_genres.length;
var tv_len = tv_genres.length;

$(document).ready(function() {

	//get_movie_data(movie_id);
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
            console.log(response);
            if(idarr) {
                //idarr[0] - tmdb_id, adarr[1] - imdb_id, idarr[2] - type(movies or tvshows) idarr[3] - title
                // get_movie_data_by_id(idarr[0], idarr[1], idarr[2], lang);
                get_movie_link_by_id(idarr[1], idarr[2], idarr[3], lang);
            }
            //get_movie_cast(idarr[0], idarr[2]);
        }
    });
}

/*function get_movie_cast(movie_id, type)
{
	var cast_container = document.getElementById('cast-info');
	$.ajax({
		type: 'POST',
		url: baseUrl + '/',
		data:
			{
				'method': 'getcast',
				'id': movie_id,
				'type': type
			},
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success: function (response) {
			cast_container.setAttribute("class", "cast_container");
			var list = JSON.parse(response);
	    console.log('cast info: ', list);
			var  len = Object.keys(list.cast).length;

			for (var i = 0; i < 12 && i < len; i++)
			{
				var cast_card = document.createElement('div');
				cast_card.setAttribute("class", "cast_card");
				var img = document.createElement('img');
				img.setAttribute("class", "cast_img");
				var inner_container = document.createElement('div');
				inner_container.setAttribute("class", "cast_inner_container");
				var name = document.createElement('p');
				var role = document.createElement('p');
				if (list.cast[i].profile_path != null) {
					img.setAttribute("src", 'https://image.tmdb.org/t/p/w200/' + list.cast[i].profile_path);
				}
				else
					img.setAttribute("src", baseUrl + '/img/blur2.png');
				name.setAttribute("class", "castname");
				role.setAttribute("class", "rolename");
				name.innerHTML = list.cast[i].name;
				role.innerHTML = list.cast[i].character;
				cast_card.append(img);
				inner_container.append(name);
				inner_container.append(role);
				cast_card.append(inner_container);
				cast_container.append(cast_card);
			}
		}
	});
}

function get_short_movie_cast()
{
	document.querySelector('.show_crew').style.display = "block";
	document.querySelector('.show_cast').style.display = "none";
	var cast_container = document.getElementById('cast-info');
	cast_container.innerHTML = "";
	var arr = movie_id.split('_');
	console.log(arr);
	get_movie_cast(arr[1], arr[0]);
}

function get_full_movie_cast()
{
	var arr = movie_id.split('_');
	console.log(arr);
	$.ajax({
		type: 'POST',
		url: baseUrl + '/',
		data:
			{
				'method': 'getcast',
				'id': arr[1],
				'type': arr[0]
			},
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success: function (response) {
			document.querySelector('.show_crew').style.display = "none";
			document.querySelector('.show_cast').style.display = "block";
			var cast_container = document.getElementById('cast-info');
			cast_container.setAttribute("class", "cast_container_mini");
			var  cast_column = document.createElement('div');
			cast_column.setAttribute("class", "cast_column");
			var  crew_column = document.createElement('div');
			crew_column.setAttribute("class", "crew_column");
			var cast_title = document.createElement('h4');
			var crew_title = document.createElement('h4');
			cast_title.innerHTML = "Cast";
			crew_title.innerHTML = "Crew";
			cast_column.appendChild(cast_title);
			crew_column.appendChild(crew_title);
			cast_container.innerHTML = "";
			var list = JSON.parse(response);
			console.log(list);
			var Castlen = Object.keys(list.cast).length;
			var Crewlen = Object.keys(list.crew).length

			for (var i = 0; i < Castlen; i++)
			{

				var cast_card = document.createElement('div');
				cast_card.setAttribute("class", "mini_cast_card");
				var img = document.createElement('img');
				img.setAttribute("class", "mini_cast_img");
				var inner_container = document.createElement('div');
				inner_container.setAttribute("class", "mini_cast_inner_container");
				var name = document.createElement('p');
				var role = document.createElement('p');
				if (list.cast[i].profile_path != null) {
					img.setAttribute("src", 'https://image.tmdb.org/t/p/w200/' + list.cast[i].profile_path);
				}
				else
					img.setAttribute("src", baseUrl + '/img/blur2.png');
				name.setAttribute("class", "castname");
				role.setAttribute("class", "rolename");
				name.innerHTML = list.cast[i].name;
				role.innerHTML = list.cast[i].character;
				cast_card.append(img);
				inner_container.append(name);
				inner_container.append(role);
				cast_card.append(inner_container);
				cast_column.append(cast_card);
			}
			cast_container.append(cast_column);

			for( var i = 0; i < Crewlen; i++)
			{
				var crew_card = document.createElement('div');
				crew_card.setAttribute("class", "mini_cast_card");
				var img = document.createElement('img');
				img.setAttribute("class", "mini_cast_img");
				var inner_container = document.createElement('div');
				inner_container.setAttribute("class", "mini_cast_inner_container");
				var name = document.createElement('p');
				var role = document.createElement('p');
				if (list.crew[i].profile_path != null) {
					img.setAttribute("src", 'https://image.tmdb.org/t/p/w200/' + list.crew[i].profile_path);
				}
				else
					img.setAttribute("src", baseUrl + '/img/blur2.png');
				name.setAttribute("class", "castname");
				role.setAttribute("class", "rolename");
				name.innerHTML = list.crew[i].name;
				role.innerHTML = list.crew[i].job;
				crew_card.append(img);
				inner_container.append(name);
				inner_container.append(role);
				crew_card.append(inner_container);
				crew_column.append(crew_card);
			}
			cast_container.append(crew_column);
		}
	});
}

function get_movie_data_by_id(movie_id, imdb_id, type, language)
{
	var backdrop = document.getElementById('backdrop_im');
	var title = document.getElementById('details_movie-title');
	var overview = document.getElementById('movie-overview');
	var tagline = document.getElementById('details_movie-tagline');
	var year = document.getElementById('year_response');
	var runtime = document.getElementById('runtime_response');
	var grade = document.getElementById('grade_response');
	var revenue = document.getElementById('revenue_response');
	var budget = document.getElementById('budget_response');
	var lang = document.getElementById('lang_response');
	$.ajax({
		type: 'POST',
		url: baseUrl + '/',
		data:
			{
				'method': 'details',
				'id': movie_id,
				'type': type,
				'lang': language
			},
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success: function (response) {
			var list = JSON.parse(response);
			 console.log(list);
			 backdrop.style.cssText = "background-image: url(https://image.tmdb.org/t/p/original/" + list.backdrop_path + ");";
		   // var  len = Object.keys(list.results).length;
			title.innerHTML = list.title;
			tagline.innerHTML = list.tagline;
			overview.innerHTML = list.overview;
			year.innerHTML = list.release_date;
			runtime.innerHTML = list.runtime + ' min';
			grade.innerHTML = list.vote_average;
			budget.innerHTML =  '$' + list.budget;
			revenue.innerHTML = '$' + list.revenue;
			lang.innerHTML = list.original_language;

		}
	});
}*/

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
            // document.getElementById('links_response').innerHTML = response;
            if (response != "noID") {
                var list = JSON.parse(response);
                var container = document.getElementById('links_response');
                if (list != null && list.length == 0) {
                    document.querySelector('.no_result_links').style.display = "block";
                }
                else if (list != null) {
                    if (type == "movies") {
                        if (list.YTS) {
                            var lenYTS = Object.keys(list.YTS).length;
                            //console.log(lenYTS);
                            //console.log(lenPop);
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
                                    // play_form.append(play_input_hidden);

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
                                // play_form.append(play_input_hidden);
                                container.append(POP);
                            }
                        }
                    }
                    else if (type == "tvshows") {
                        list.sort(function (obj1, obj2) {
                            return obj1.season - obj2.season;
                        });
                        var lenShows = Object.keys(list).length;
                        var Shows = document.createElement('div');
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
                            // each_episode_container.append(episode);
                            each_episode_container.append(torrents);
                            each_episode_container.append(line);
                            container.append(each_episode_container);

                            console.log('bitch');


                            /*var play_form = document.createElement('div');
                            var play_button = document.createElement('button');
                            play_button.setAttribute('name', "play");
                            play_button.setAttribute('type', "submit");
                            play_button.innerHTML = "Play";
                            play_button.setAttribute("onclick", "playButton(event)");
                            play_button.setAttribute('data-link', list.popcorn[i].magnet);
                            play_button.setAttribute('data-title', title);
                            play_button.setAttribute('data-imdb', imdb_id);
                            play_form.append(play_button);
                            Shows.append(play_label);
                            Shows.append(play_form);
                            // play_form.append(play_input_hidden);
                            container.append(Shows);*/

                        }
                    }
                    //document.getElementById('details_response').innerHTML = response;

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
  //  e.preventDefault();

    target = event.target;
    //target.preventDefault();
    var link = target.getAttribute('data-link');
    var type = target.getAttribute('data-type');
    var season = target.getAttribute('data-season');
    var episode = target.getAttribute('data-episode');
    console.log("magnet available onclick :", link);
    var title = target.getAttribute('data-title');
    var imdb = target.getAttribute('data-imdb');
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
                    'lang': lang
                },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log(response);
                if(response){
                    var links = JSON.parse(response);
                    console.log(links);
                    console.log("returned from server with subs : ", links);
                    console.log("exactly link returned from server. This may come with huge delay(depends of how many results api return) : ", links.movie.magnet);
                    // console.log(links.subs["\u0000*\u0000response"].data[0].SubDownloadLink);
                    console.log("one of subs link returned from server, just for example : ", links.subs.response.data[0].SubDownloadLink); //indexes count may be up to 500


                }
                else
                    alert("bitch!");
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
        console.log(res);
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
                    // data.redirect contains the string URL to redirect to
                    localStorage.setItem("redirected_type", type);
                    localStorage.setItem("redirected_genre", res);
                    window.location.href = response.redirect;

                //     top.location.href = getUrl.protocol + "//" + getUrl.host;
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

    //$(window).unbind('scroll');
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