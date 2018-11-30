
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
var storedNeedle = sessionStorage.getItem('needle');
var storedLimit = sessionStorage.getItem('limit');
if(storedPage == 0 || storedPage == null)
    storedPage = 1;
var storedArr = JSON.parse(sessionStorage.getItem('arr'));
//console.log(trigger.data);
console.log(baseUrl);
console.log("method: ", storedMethod);
//console.log("page: ", storedPage);
console.log(storedArr);
//console.log("triggeed: ", trigger.data);
//console.log("scroll: ", scrollPos);
//console.log("needle: ", storedNeedle);
//console.log("limit: ", storedLimit);
//const observer = lozad(); // lazy loads elements with default selector as ".lozad"
//observer.observe();


$(document).ready(function() {


   // observer.observe();


    if(storedMethod == null)
        static_load(1);
    else if(storedMethod === "static_load" && storedArr)
    {

        console.log('Bitch');
        var  len = Object.keys(storedArr).length;
        render(storedArr, len);
        window.scrollTo(0, scrollPos);

    }
    else if (storedMethod === "live_load" && storedArr)
    {
        var  len = Object.keys(storedArr).length;
        render(storedArr, len);
        window.scrollTo(0, scrollPos);

    }
        //live_load(needle.data, storedPage);
  //  render(i);
});

var win = $(window);

win.scroll(function() {
    sessionStorage.setItem('scroll', win.scrollTop());
    if ($(document).height() - win.height() == win.scrollTop())
    {
        console.log("page: ", storedPage);
        console.log("limit: ", storedLimit);
        console.log("limit.data: ", limit.data);
        if ((limit.data == 0 || (limit.data > 0 && storedPage < limit.data)) && storedPage < 1000) {
            storedPage += 1;
            //  console.log("page in: ", storedPage);
            console.log("trigger.data:", trigger.data);
            if ((storedMethod == "static_load" && trigger.data != "live_load") || trigger.data == "static_load") {
                // console.log("in static_load");
                sessionStorage.setItem('page', storedPage);
                static_load(storedPage);
            }
            else if (storedMethod == "live_load" || trigger.data == "live_load") {
                console.log("in live_load");
                console.log("page in live_load: ", storedPage);
                console.log("storedNeedle :", storedNeedle);
                console.log("needle.data: ", needle.data);
                sessionStorage.setItem('page', storedPage);
                if (needle.data == '' && storedNeedle != null)
                    live_load(storedNeedle, storedPage);
                else if (storedNeedle == null && needle.data != '')
                    live_load(needle.data, storedPage);
            }
        }
        // render(i);
    }
});


$('#reset_button').click(function()

{
    sessionStorage.clear();
    sessionStorage.removeItem('method');
    storedMethod = null;
    storedPage = 1;
    scrollPos = null;
    storedNeedle = null;
    storedLimit = null;
    limit.data = 0;
    console.log("method: ", storedMethod);
    console.log("page: ", storedPage);
//console.log(storedArr);
//console.log(trigger.data);
    console.log("scroll: ", scrollPos);
    console.log("needle: ", storedNeedle);
    console.log("limit: ", storedLimit);
    console.log("limit.data in reset: ", limit.data);
    document.getElementById("response").innerHTML = "";
    static_load(1);
});

function static_load(i)
{
    $.ajax({
        type: 'POST',
        url: baseUrl + '/',
        data:
            {
                'method': 'search',
                'page': i
            },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            var list = JSON.parse(response);
           // console.log(list);
            var  len = Object.keys(list.results).length;
            if(len % 20 != 0)
            {
                sessionStorage.setItem('limit', i);
                limit.data = i;
                console.log("in load:", limit.data);
            }
            render(list.results, len);
            trigger.data = "static_load";
            sessionStorage.setItem('method', 'static_load');
            sessionArr = sessionStorage.getItem('arr');
            if(sessionArr)
            {
                var arr1 = JSON.parse(sessionArr);
              //  console.log(arr1);
                var arr2 = arr1.concat(list.results);
               // console.log(arr2);
                try {
                    sessionStorage.setItem('arr', JSON.stringify(arr2));
                }catch (e)
                {
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

    console.log(list);
    //   document.getElementById("response").innerHTML = response;
  //  var observer = lozad();
    for (var i = 0; i < len; i++) {
        //console.log(list.results[i]);
        var eachblock = document.createElement('div');
        eachblock.setAttribute("class", "gallery-item"); //eachblock
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
            img.setAttribute("src", baseUrl + '/src/public/img/blur2.png');
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
        document.getElementById("response").append(eachblock);

    }
    //observer.observe();
    lozad('.lozad', {
        load: function(el) {
            el.src = el.dataset.src;
            el.classList.add('faded');

        }
    }).observe();
   // observer.observe();

}

function live_load(needle, page)
{

    $.ajax({
        type:'post',
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
           // console.log("list in live load: ", list);
            len = Object.keys(list.results).length;
           // console.log("len in live_load", len);
           // console.log(len % 20);
            if(len % 20 > 0)
            {
                console.log('Bitch...bitch');
                sessionStorage.setItem('limit', page);
                limit.data = page;
            }
            render(list.results, len);
            trigger.data = "live_load";
            if(storedMethod === "static_load")
            {
                sessionStorage.removeItem('arr');
            }
            sessionStorage.setItem('method', 'live_load');
            sessionArr = sessionStorage.getItem('arr');
            if(sessionArr)
            {
                var arr1 = JSON.parse(sessionArr);
                var arr2 = arr1.concat(list.results);
                try {
                    sessionStorage.setItem('arr', JSON.stringify(arr2));
                }catch (e)
                {
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

$('#live_search_input').bind("input", function()
{
    if(this.value.length >= 1)
    {
        needle.data = this.value;
       clearTimeout(timer);
       timer = setTimeout(function ()
       {
           sessionStorage.setItem('needle', needle.data);
           document.getElementById("response").innerHTML = "";
           sessionStorage.clear();
           sessionStorage.removeItem('arr');
           storedArr = null;
           storedMethod = null;
           storedPage = 1;
           scrollPos = null;
           storedNeedle = null;
           storedLimit = null;
           limit.data = 0;
            live_load(needle.data, 1);
       }, 500);
   }
});













