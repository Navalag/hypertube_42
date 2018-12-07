var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var meta_token = document.querySelector('meta[name="csrf-token"]');
var token = meta_token && meta_token.getAttribute("content");
var trigger = {data: ''};
var needle = {data: ''};
var limit = {data: 0};
var page = {data: 1};
//sessionStorage.clear();
var storedMethod = sessionStorage.getItem('method');
var storedPage = +sessionStorage.getItem('page');
var scrollPos = sessionStorage.getItem('scroll');
if(scrollPos === null)
    scrollPos = 0;
var storedNeedle = sessionStorage.getItem('needle');
var storedLimit = sessionStorage.getItem('limit');
var sortparam = {data: null};
var yearsparam = {data: null};
var rateparam = {data: null};
var genresparam = {data: null};
var storedSort = sessionStorage.getItem('sort');
var storedYears = sessionStorage.getItem('years');
var storedRate = sessionStorage.getItem('rate');
var storedGenres = sessionStorage.getItem('genres');
if(storedPage == 0 || storedPage == null)
    storedPage = 1;
var storedArr = JSON.parse(sessionStorage.getItem('arr'));
var switcher = {data: null};
var storedSwitcher = sessionStorage.getItem('switcher');
var movie_switch = document.getElementById('movie_switch');
var shows_switch = document.getElementById('tvshows_switch');
console.log('switcher data', switcher.data);
console.log('stored switcher', storedSwitcher);
console.log('stored method', storedMethod);
console.log('stored arr', storedArr);

//////console.log(trigger.data);
//////console.log(baseUrl + '/registration/public/home');
//////console.log("method: ", storedMethod);
//////console.log("page: ", storedPage);
//////console.log(storedArr);
//////console.log("triggeed: ", trigger.data);
//////console.log("scroll: ", scrollPos);
//////console.log("needle: ", storedNeedle);
//////console.log("limit: ", storedLimit);
//const observer = lozad(); // lazy loads elements with default selector as ".lozad"
//observer.observe();

var response = document.getElementById('response');

function setformdata()
{
    if(storedSwitcher != null)
    {
        if(storedSwitcher === "movies")
        {
            movie_switch.setAttribute("class", "button is-active");
            shows_switch.removeAttribute("class", "is-active");
            shows_switch.setAttribute("class", "button");
            sessionStorage.setItem("switcher", "movies");
        }
        else if(storedSwitcher === "tvshows")
        {
            shows_switch.setAttribute("class", "button is-active");
            movie_switch.removeAttribute("class", "is-active");
            movie_switch.setAttribute("class", "button");
            sessionStorage.setItem("switcher", "tvshows");
        }

    }
}






if (response)
{


    $(document).ready(function () {



      //  console.log("sort on ready:", sortparam.data);
      //  console.log("years on ready:", yearsparam.data);
      //  console.log("rate: on ready", rateparam.data);
      //  console.log("genres on ready:", genresparam.data);
      //  console.log("stored sort on ready:", storedSort);
      //  console.log("stored years on ready:", storedYears);
      //  console.log("stored rate on ready:", storedRate);
      //  console.log("stored genres on ready:", storedGenres);
        // observer.observe();
       //// console.log(sessionStorage.getItem('scroll'));
        setformdata();
        $(document).ajaxStart(function () {
            $("#load_gif").show();
        }).ajaxStop(function () {
            $("#load_gif").hide();
        });

        if (storedMethod == null) {
            static_load(1, null, null, null, null, "movies");
        }
        else if (storedMethod === "static_load" && storedArr) {

           //// console.log('Bitch');
            var len = Object.keys(storedArr).length;
            render(storedArr, len);
          //  window.scrollTo(0, scrollPos);

        }
        else if (storedMethod === "live_load" && storedArr) {
            var len = Object.keys(storedArr).length;
            render(storedArr, len);
           //  window.scrollTo(0, scrollPos);

        }
        //live_load(needle.data, storedPage);
        //  render(i);
    });

    var win = $(window);

    var scrolling = false;

    $( window ).scroll( function() {
        if(win.scrollTop() < 2)
        {
            window.scrollTo(0, 3);
        }
        scrolling = true;
    });

    setInterval( function() {
        if ( scrolling ) {
            scrolling = false;
            // Do your thang!

            if ($(document).height() - win.height() == win.scrollTop()) {

                console.log('inscroll');
                //// console.log("page: ", storedPage);
                //// console.log("limit: ", storedLimit);
                //// console.log("limit.data: ", limit.data);
                if ((limit.data == 0 || (limit.data > 0 && storedPage < limit.data)) && storedPage < 1000) {
                    storedPage += 1;
                    // //// console.log("page in: ", storedPage);
                    //// console.log("trigger.data:", trigger.data);
                    if ((storedMethod == "static_load" && trigger.data != "live_load") || trigger.data == "static_load") {
                        ////// console.log("in static_load");
                        sessionStorage.setItem('page', storedPage);
                        //  console.log("sort:", sortparam.data);
                        //  console.log("years:", yearsparam.data);
                        //  console.log("rate:", rateparam.data);
                        //  console.log("genres:", genresparam.data);
                        //  console.log("stored sort:", storedSort);
                        //  console.log("stored years:", storedYears);
                        //  console.log("stored rate:", storedRate);
                        //  console.log("stored genres:", storedGenres);

                        if (sortparam.data != null || yearsparam.data != null || rateparam.data != null || genresparam.data != null || switcher.data != null) {
                            static_load(storedPage, sortparam.data, yearsparam.data, rateparam.data, genresparam.data, switcher.data);
                        }
                        else
                        {
                            static_load(storedPage, storedSort, storedYears, storedRate, storedGenres, storedSwitcher);
                        }
                    }
                    else if (storedMethod == "live_load" || trigger.data == "live_load") {
                        //// console.log("in live_load");
                        //// console.log("page in live_load: ", storedPage);
                        //// console.log("storedNeedle :", storedNeedle);
                        //// console.log("needle.data: ", needle.data);
                        sessionStorage.setItem('page', storedPage);
                        if (needle.data == '' && storedNeedle != null)
                            live_load(storedNeedle, storedPage);
                        else if (storedNeedle == null && needle.data != '')
                            live_load(needle.data, storedPage);
                    }
                }
                // render(i);
            }
        }
    }, 750 );



    function reset()
    {
        sessionStorage.clear();
        sessionStorage.removeItem('method');
        sessionStorage.removeItem('switcher');
        storedMethod = null;
        storedPage = 1;
        //scrollPos = 5;
        sessionStorage.setItem('scroll', 0);
        storedNeedle = null;
        storedLimit = null;
        limit.data = 0;
        //   sessionStorage.Item("sort", sort);
        //  sessionStorage.setItem("years", years);
        //  sessionStorage.setItem("rate", rate);
        // sessionStorage.setItem("genres", genres);
        storedSort = null;
        storedYears = null;
        storedRate = null;
        storedGenres = null;

    }

    $('#reset_button').click(function () {

        reset();
        //// console.log("method: ", storedMethod);
       //// console.log("page: ", storedPage);
//////console.log(storedArr);
//////console.log(trigger.data);
       //// console.log("scroll: ", scrollPos);
       //// console.log("needle: ", storedNeedle);
       //// console.log("limit: ", storedLimit);
       //// console.log("limit.data in reset: ", limit.data);
        document.getElementById("response").innerHTML = "";
        (switcher.data != null) ?  static_load(1, null, null, null, null, switcher.data) : 0;
        (switcher.data == null) ?  static_load(1, null, null, null, null, storedSwitcher) : 0;

    });

    function static_load(i, sort, years, rate, genres, type) {
        $.ajax({
            type: 'POST',
            url: baseUrl + '/',
            data:
                {
                    'method': 'search',
                    'page': i,
                    'sort': sort,
                    'years': years,
                    'rate': rate,
                    'genres': genres,
                    'type': type
                },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                var list = JSON.parse(response);
                //// console.log(response);
                //document.getElementById('response').innerHTML = "sdg";
               //document.getElementById('form-response').innerHTML = response;
                var len = Object.keys(list.results).length;
                if (len % 20 != 0) {
                    sessionStorage.setItem('limit', i);
                    limit.data = i;
                   //// console.log("in load:", limit.data);
                }
                render(list.results, len);
                trigger.data = "static_load";
                sessionStorage.setItem('method', 'static_load');
                sessionArr = sessionStorage.getItem('arr');
                console.log('type: ' ,type);
                if (sessionArr && (switcher.data === type || storedSwitcher === type)) {
                    var arr1 = JSON.parse(sessionArr);
                    // //// console.log(arr1);
                    var arr2 = arr1.concat(list.results);
                    ////// console.log(arr2);
                    try {
                        sessionStorage.setItem('arr', JSON.stringify(arr2));
                    } catch (e) {
                        //this piece of code probably will never be executed
                        if (e == QUOTA_EXCEEDED_ERR) {
                            sessionStorage.clear();
                            sessionStorage.setItem('arr', JSON.stringify(list.results));
                        }
                    }
                }
                else
                    sessionStorage.setItem('arr', JSON.stringify(list.results));

            }
        });
    }


    function render(list, len) {

      //  console.log(list);
        //   document.getElementById("response").innerHTML = response;
        //  var observer = lozad();
        for (var i = 0; i < len; i++) {
            //////console.log(list.results[i]);
            /*  var eachblock = document.createElement('div');
              eachblock.setAttribute("class", "eachblock");
              var link_block = document.createElement('div');
              var link = document.createElement('a');
              link.setAttribute("href", baseUrl + '/src/public/details/' + list[i].id);
              var img = document.createElement('img');
              img.setAttribute("class", "poster lozad");
             // img.setAttribute("class", "lozad");
              var description = document.createElement('div');
              var rate = document.createElement('div');
              var date = document.createElement('div');
              var title = document.createElement('div');

              var popularity = document.createElement('div');
              if (list[i].poster_path != null) {
                  img.setAttribute("src", baseUrl + '/src/public/assets/img/blur2.png');
                  img.setAttribute("data-src", 'https://image.tmdb.org/t/p/w500/' + list[i].poster_path);
              }
              else
                  img.setAttribute("data-src", baseUrl + '/src/public/img/blur2.png');
              description.innerHTML = list[i].overview;
              rate.innerHTML = list[i].vote_average;
              date.innerHTML = list[i].release_date;
              title.innerHTML = list[i].title;
              popularity.innerHTML = list[i].popularity;
              link.append(img);
              link_block.append(link)
              eachblock.append(link_block);
              //eachblock.append(description);
              eachblock.append(rate);
              eachblock.append(date);
              eachblock.append(title);
              eachblock.append(popularity);
              document.getElementById("response").append(eachblock);*/
            var gal_item = document.createElement('div');
            var gal_item_img_container = document.createElement('div');
            var img_link = document.createElement('a');
            var img = document.createElement('img');
            var overlayer = document.createElement('div');
            var overlayer_wrap = document.createElement('div');
            var gradient = document.createElement('div');
            var void_div = document.createElement('div');
            var item_title = document.createElement('p');
            var item_rate = document.createElement('p');
            var date = document.createElement('p');
            var clearfix = document.createElement('div');
            var block = document.createElement('div');
            block.setAttribute("class", "hide_block");
            gal_item_img_container.setAttribute("class", "img_link");


            gal_item.setAttribute("class", "gallery-item");
            clearfix.setAttribute("class", "clearfix");
            img_link.setAttribute("href", baseUrl + 'details/' + list[i].id);
            img.setAttribute("class", "image-responsive-height lozad");
            if (list[i].poster_path != null) {
                img.setAttribute("src", baseUrl + '/assets/img/blur2.png');
                img.setAttribute("data-src", 'https://image.tmdb.org/t/p/original/' + list[i].poster_path);
            }
            else
                img.setAttribute("data-src", baseUrl + '/public/img/blur2.png');
            overlayer.setAttribute("class", "overlayer bottom-left full-width");
            overlayer_wrap.setAttribute("class", "overlayer-wrapper item-info");
            gradient.setAttribute("class", "gradient-grey");
            item_title.setAttribute("class", "");
            item_rate.setAttribute("class", "");
            item_rate.innerHTML = list[i].vote_average;
            item_title.innerHTML = list[i].title;
            date.innerHTML = list[i].release_date;
            gal_item_img_container.append(img_link);

            // void_div.append(item_title);
            // void_div.append(item_rate);
            // void_div.append(clearfix);
            // gradient.append(void_div);
            // overlayer_wrap.append(gradient);
            //  overlayer.append(overlayer_wrap);
            img_link.append(img);
            gal_item.append(gal_item_img_container);
            block.append(item_title);
            gal_item.append(block);
            gal_item.append(item_rate);
            gal_item.append(date);
            document.getElementById("response").append(gal_item);

        }
        //observer.observe();
        lozad('.lozad', {
            load: function (el) {
                el.src = el.dataset.src;
                el.classList.add('faded');

            }
        }).observe();
        // observer.observe();

    }

    function live_load(needle, page) {

        $.ajax({
            type: 'post',
            url: baseUrl + '/',
            data:
                {
                    'method': 'live_search',
                    'page': page,
                    'needle': needle
                },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                var list = JSON.parse(response);
                ////// console.log("list in live load: ", list);
                len = Object.keys(list.results).length;
                ////// console.log("len in live_load", len);
                ////// console.log(len % 20);
                if (len % 20 > 0) {
                   //// console.log('Bitch...bitch');
                    sessionStorage.setItem('limit', page);
                    limit.data = page;
                }
                render(list.results, len);
                trigger.data = "live_load";
                if (storedMethod === "static_load") {
                    sessionStorage.removeItem('arr');
                }
                sessionStorage.setItem('method', 'live_load');
                sessionArr = sessionStorage.getItem('arr');
                if (sessionArr) {
                    var arr1 = JSON.parse(sessionArr);
                    var arr2 = arr1.concat(list.results);
                    try {
                        sessionStorage.setItem('arr', JSON.stringify(arr2));
                    } catch (e) {
                        //this piece of code probably will never be executed
                        if (e == QUOTA_EXCEEDED_ERR) {
                            sessionStorage.clear();
                            sessionStorage.setItem('arr', JSON.stringify(list.results));
                        }
                    }
                }
                else
                    sessionStorage.setItem('arr', JSON.stringify(list.results));

            }

        })
    }


    var timer;

    $('#live_search_input').bind("input", function () {
        if (this.value.length >= 1) {
            needle.data = this.value;
            clearTimeout(timer);
            timer = setTimeout(function () {
                sessionStorage.setItem('needle', needle.data);
                document.getElementById("response").innerHTML = "";
                sessionStorage.clear();
                sessionStorage.removeItem('arr');
                storedArr = null;
                storedMethod = null;
                storedPage = 1;
                //scrollPos = null;
                storedNeedle = null;
                storedLimit = null;
                limit.data = 0;
                live_load(needle.data, 1);
            }, 500);
        }
    });

}

$(".chosen-select").chosen();

$('#search_submit').click(function (e)
{
    e.preventDefault();
    var genres = $('#genre_select').val();
    var sort = $('#sort_select').val();
    var years = $('#year_gap').val();
    var rate = $('#rate_gap').val();
    reset();
    sessionStorage.setItem("sort", sort);
    sessionStorage.setItem("years", years);
    sessionStorage.setItem("rate", rate);
    sessionStorage.setItem("genres", genres);
    sortparam.data = sort;
    yearsparam.data = years;
    rateparam.data = rate;
    genresparam.data = genres;
    document.getElementById("response").innerHTML = "";
    static_load(1, sort, years, rate, genres);



   /* $.ajax({
        type: 'post',
        url: baseUrl + '/src/public/home',
        data:
            {
                'method': 'form',
                'genres': genres,
                'years': years,
                'sort': sort,
                'rate': rate,
            },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {

            document.getElementById('form-response').innerHTML = response;
        }

    });*/
   /* var xhr_filters = new XMLHttpRequest();
    xhr_filters.open('POST', baseUrl + '/src/public/home', true );
    var formdata = new FormData();
    formdata.append('method', 'form');
    xhr_filters.setRequestHeader("X-CSRF-TOKEN", token);

    xhr_filters.onreadyStateChange = function()
    {
        alert('fuck');
        if (xhr_filters.readyState == 4 && xhr_filters.status == 200)
        {
            alert('fuck');
            document.getElementById('form-response').innerHTML = response;
        }
    }
    xhr_filters.send(formdata);*/


});_



$('.genre_direct_link').click(function (e)
{
    e.preventDefault();
    var target = e.target;
    if(target.className == "title_aside")
    {
        var genres = target.getAttribute('data');
        var res = genres.split(" ");
      //  console.log(res);
        reset();
        sessionStorage.setItem("genres", res);
        genresparam.data = res;
        document.getElementById("response").innerHTML = "";
        static_load(1, null, null, null, res, storedSwitcher);
    }

});
/*$('.search-choice-close').click( function (e)
{
    console.log('fuck');
    var target = e.target;
    Node.remove(target);
});*/

function switch_type(event)
{

    var target = event.target;
    var type = target.getAttribute('data');
    switcher.data = type;
    sessionStorage.setItem("switcher", type);
    console.log('switcher on change: ', switcher.data);
    console.log('storedSwitcher on change: ', sessionStorage.getItem('switcher'));
    if(target.getAttribute('id') == "movie_switch")
    {
        movie_switch.setAttribute("class", "button is-active");
        shows_switch.removeAttribute("class", "is-active");
        shows_switch.setAttribute("class", "button");
        document.getElementById("response").innerHTML = "";
        sessionStorage.removeItem('arr');
        static_load(1, null, null, null, null, type);
    }
    else if(target.getAttribute('id') == "tvshows_switch")
    {
        shows_switch.setAttribute("class", "button is-active");
        movie_switch.removeAttribute("class", "is-active");
        movie_switch.setAttribute("class", "button");
        sessionStorage.removeItem('arr');
        document.getElementById("response").innerHTML = "";
        static_load(1, null, null, null, null, type);

    }
}