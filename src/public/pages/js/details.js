var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

$(document).ready(function() {

    get_movie_data(movie_id);

});


function get_movie_data(movie_id)
{
    $.ajax({
        type: 'POST',
        url: baseUrl + '/',
        data:
            {
                'method': 'ignition',
                'id': movie_id
            },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            var imdb = response;

            get_movie_data_by_id(imdb);
            get_movie_link_by_id(imdb);
            //document.getElementById('details_response').innerHTML = response;
            // var  len = Object.keys(list.results).length;


        }
    });
}

function get_movie_data_by_id(movie_id)
{
    $.ajax({
        type: 'POST',
        url: baseUrl + '/',
        data:
            {
                'method': 'details',
                'id': movie_id
            },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            var list = JSON.parse(response);
           //  console.log(list);
            // document.getElementById('details_response').innerHTML = response;
           // var  len = Object.keys(list.results).length;


        }
    });
}
function get_movie_link_by_id(movie_id)
{
    $.ajax({
        type: 'POST',
        url: baseUrl + '/',
        data:
            {
                'method': 'link',
                'id': movie_id
            },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            var list = JSON.parse(response);
            var  len = Object.keys(list).length;
            var container = document.getElementById('details_response');
            console.log(list);
            for(var i = 0; i < len; i++)
            {

                var  innerlen = Object.keys(list[i]).length;
                for(var j = 0; j < innerlen - 1; j++) {
                    var play_label = document.createElement('div');
                    play_label.innerHTML = list[i][j].resolution;
                    var play_form = document.createElement('div');
                    var play_button = document.createElement('button');
                    play_button.setAttribute('name', "play");
                    play_button.setAttribute('type', "submit");
                    play_button.innerHTML = "Play";
                    play_button.setAttribute("onclick", "playButton(event)");
                    play_button.setAttribute('data-link', list[i][j].data.url);
                    play_button.setAttribute('data-title', list[i][j].data.title);
                    play_button.setAttribute('data-imdb', list[i][j].data.imdb);
                    play_form.append(play_button);
                   // play_form.append(play_input_hidden);
                    container.append(play_label);
                    container.append(play_form);
                }

            }
            //document.getElementById('details_response').innerHTML = response;

        }
    });
}

function playButton(event)
{
  //  e.preventDefault();
    target = event.target;
    //target.preventDefault();
    var link = target.getAttribute('data-link');
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
                    'imdb': imdb
                },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                var links = JSON.parse(response);
                console.log("returned from server with subs : ", links);
                console.log("exactly link returned from server. This may come with huge delay(depends of how many results api return) : ", links.movie.magnet);
               // console.log(links.subs["\u0000*\u0000response"].data[0].SubDownloadLink);
                 console.log("one of subs link returned from server, just for example : ", links.subs.response.data[0].SubDownloadLink); //indexes count may be up to 500


            }
        });

}