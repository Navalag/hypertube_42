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
//if(scrollPos === null)
//	scrollPos = 0;
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
var movies_genres = document.querySelectorAll('.movie_genre');
var tv_genres = document.querySelectorAll('.tv_genre');
var movies_len = movies_genres.length;
var tv_len = tv_genres.length;
var movie_form = document.getElementById('movie_form');
var tv_form = document.getElementById('tv_form');
var general_type = {data: null};
var redirected_type = localStorage.getItem("redirected_type");
var redirected_genre = [localStorage.getItem("redirected_genre")];
var live_redirect = localStorage.getItem("live_redirect");
var reset_redirect = localStorage.getItem("reset_redirect");

console.log(redirected_genre);
console.log(redirected_type);

//var lang = "uk-UA";
//var lang = "en-US";

console.log(lang);

//console.log(redirected_type);
//console.log(redirected_genre);



//const observer = lozad(); // lazy loads elements with default selector as ".lozad"
//observer.observe();

var response = document.getElementById('response');

function setformdata()
{
	if(storedSwitcher != null)
	{

		if(storedSwitcher === "movies")
		{
			movie_switch.setAttribute("class", "btn btn-success");
			shows_switch.removeAttribute("class", "btn-success");
			shows_switch.setAttribute("class", "btn btn-primary");
			sessionStorage.setItem("switcher", "movies");
			hide_show_genres_list("movies", movies_genres, tv_genres);
			hide_show_filters("movies");
		}
		else if(storedSwitcher === "tvshows")
		{
			shows_switch.setAttribute("class", "btn btn-success");
			movie_switch.removeAttribute("class", "btn-success");
			movie_switch.setAttribute("class", "btn btn-primary");
			sessionStorage.setItem("switcher", "tvshows");
			hide_show_genres_list("tvshows", movies_genres, tv_genres);
			hide_show_filters("tvshows");
		}
		var live_str = sessionStorage.getItem("live_str");
		(live_str != null && !live_redirect) ? document.getElementById('live_search_input').value = live_str : 0;
        (!live_str && live_redirect != null) ? document.getElementById('live_search_input').value = live_redirect : 0;

    }
	else if(switcher.data == null)
	{
		hide_show_genres_list("movies", movies_genres, tv_genres);
		hide_show_filters("movies");
	}
	set_filters_on_reload_page();
}

function set_filters_on_reload_page()
{

	var genres_list = document.getElementById('genre_response');
	if(storedGenres != "null" && storedGenres != null)
	{
		genres_list.innerHTML = storedGenres.replace(/,/g, '/');
	}
	else
		genres_list.innerHTML = "";
    (storedSort != null && !storedSwitcher && sessionStorage.getItem('lang') === lang) ? document.getElementById('sort_select').value = storedSort : 0;
	(storedSort != null && storedSwitcher === "movies" && sessionStorage.getItem('lang') === lang) ? document.getElementById('sort_select').value = storedSort : 0;
	(storedSort != null && storedSwitcher === "tvshows" && sessionStorage.getItem('lang') === lang) ? document.getElementById('sort_select_tv').value = storedSort : 0;
	if(storedYears != null && sessionStorage.getItem('lang') === lang)
	{
		var years = storedYears.split('-');
		(isNaN(years[0]) && storedSwitcher == "movies") ? years[0] = 1888 : 0;
        (isNaN(years[1]) && storedSwitcher == "movies") ? years[1] = 2019 : 0;
        (isNaN(years[0]) && storedSwitcher == "tvshows") ? years[0] = 1928 : 0;
        (isNaN(years[1]) && storedSwitcher == "tvshows") ? years[1] = 2019 : 0;
        (!storedSwitcher) ? year_gap(years[0], years[1]) : 0;
		(storedSwitcher === "movies") ? year_gap(years[0], years[1]) : 0;
		(storedSwitcher === "tvshows") ? year_gap_tv(years[0], years[1]) : 0;
	}
	if(storedRate != null && sessionStorage.getItem('lang') === lang)
	{
		var rate = storedRate.split('-');
        (isNaN(rate[0]) && storedSwitcher == "movies") ? rate[0] = 0 : 0;
        (isNaN(rate[1]) && storedSwitcher == "movies") ? rate[1] = 10 : 0;
        (isNaN(rate[0]) && storedSwitcher == "tvshows") ? rate[0] = 0 : 0;
        (isNaN(rate[1]) && storedSwitcher == "tvshows") ? rate[1] = 10 : 0;
        (!storedSwitcher) ? rate_gap(rate[0], rate[1]) : 0;
		(storedSwitcher === "movies") ? rate_gap(rate[0], rate[1]) : 0;
		(storedSwitcher === "tvshows") ? rate_gap_tv(rate[0], rate[1]) : 0;
	}
}



if (response)
{
	$(document).ready(function () {

		console.log('inreload');
		console.log(reset_redirect);
		var type = null;
		if(storedSwitcher != null)
			general_type.data = storedSwitcher;
		else if(switcher.data != null)
			general_type.data = switcher.data;
		else
			general_type.data = "movies";
		setformdata();
		/*$(document).ajaxStart(function () {
			$("#load_gif").show();
		}).ajaxStop(function () {
			$("#load_gif").hide();
		});*/
		console.log(storedMethod);
		console.log(storedArr);
		console.log(sessionStorage.getItem('lang'));
		console.log(live_redirect);
		if(live_redirect != null)
		{
			reset();
			console.log(live_redirect);
            $('#live_search_input').value = live_redirect;
            trigger.data = "live_load";
            needle.data = live_redirect;
            sessionStorage.setItem("live_str", needle);
			live_load(live_redirect, 1, lang);

		}
		else if(redirected_type != null && redirected_genre != null)
		{
			console.log("FUUUUCK");
			console.log(redirected_genre);
			reset();
			static_load(1, null, null, null, redirected_genre, redirected_type, lang);
            //localStorage.removeItem('redirected_type');
            //localStorage.removeItem('redirected_genre');
		}
		else if (storedMethod == null) {

			static_load(1, null, null, null, null, "movies", lang);
		}
		else if (storedMethod === "static_load" && storedArr && sessionStorage.getItem('lang') === lang) {


			var len = Object.keys(storedArr).length;
			render(storedArr, len);
            set_mark(storedArr);
			//  window.scrollTo(0, scrollPos);

		}
		else if (storedMethod === "live_load" && storedArr && sessionStorage.getItem('lang') === lang && !reset_redirect) {
			var len = Object.keys(storedArr).length;
			render(storedArr, len);
            set_mark(storedArr);
			 //  window.scrollTo(0, scrollPos);

		}
		else {
            console.log('in fuck');
			reset();
            static_load(1, null, null, null, null, general_type.data, lang);
        }
		//live_load(needle.data, storedPage);
		//  render(i);
	});



	var win = $(window);

	var scrolling = false;

    $( window ).scroll(ScrollHandler);

    function ScrollHandler()
	{
		if(win.scrollTop() < 2)
		{
			window.scrollTo(0, 3);
		}
		scrolling = true;

	};

	setInterval( function() {
		if ( scrolling ) {
			scrolling = false;


			// Do your thang!

			if ($(window).scrollTop() + $(window).height() == $(document).height()) {

				console.log('inscroll method ', storedMethod);
				console.log('inscroll trigger ', trigger.data);
			//	console.log("page: ", storedPage);
			//	console.log("limit: ", storedLimit);
			//	console.log("limit.data: ", limit.data);
				if ((limit.data == 0 || (limit.data > 0 && storedPage < limit.data)) && storedPage < 1000) {
					storedPage += 1;
					if ( trigger.data === "static_load" || storedMethod === "static_load") {
						////// console.log("in static_load");
						sessionStorage.setItem('page', storedPage);
						if (sortparam.data != null || yearsparam.data != null || rateparam.data != null || genresparam.data != null || switcher.data != null) {
							 console.log('fuck');
							static_load(storedPage, sortparam.data, yearsparam.data, rateparam.data, genresparam.data, general_type.data, lang);
						}
						else
						{
							 console.log('bitchoooooooooooo');
							var res = null;
							if(storedGenres)
								 res = storedGenres.split(',');
							static_load(storedPage, storedSort, storedYears, storedRate, res, general_type.data, lang);
						}
					}
					else if (storedMethod === "live_load" || trigger.data === "live_load") {
						console.log("in live_load");
						console.log(needle.data);
						console.log(storedNeedle);
						//// console.log("page in live_load: ", storedPage);
						//// console.log("storedNeedle :", storedNeedle);
						//// console.log("needle.data: ", needle.data);
						sessionStorage.setItem('page', storedPage);
						if (needle.data == '' && storedNeedle )
							live_load(storedNeedle, storedPage, lang);
						else if (!storedNeedle && needle.data != '')
							live_load(needle.data, storedPage, lang);
					}
				}
				// render(i);

			}

		}
	}, 1000 );



	function reset()
	{
		//sessionStorage.clear();
		sessionStorage.removeItem('method');
		sessionStorage.removeItem('page');
		sessionStorage.removeItem('scroll');
		sessionStorage.removeItem('needle');
		sessionStorage.removeItem('limit');
		sessionStorage.removeItem('sort');
		sessionStorage.removeItem('years');
		sessionStorage.removeItem('rate');
		sessionStorage.removeItem('genres');
		sessionStorage.removeItem('arr');
		sessionStorage.removeItem('live_str');
		localStorage.removeItem('redirected_type');
		localStorage.removeItem('redirected_genre');
		localStorage.removeItem('live_redirect');
		localStorage.removeItem('reset_redirect');
		storedMethod = null;
		storedPage = 1;
		//scrollPos = 5;
		storedNeedle = null;
		storedLimit = null;
		limit.data = 0;
		//   sessionStorage.Item("sort", sort);
		//  sessionStorage.setItem("years", years);
		//  sessionStorage.setItem("rate", rate);
		// sessionStorage.setItem("genres", genres);
		sortparam.data = null;
		yearsparam.data = null;
        rateparam.data = null;
        genresparam.data = null;
		storedSort = null;
		storedYears = null;
		storedRate = null;
		storedGenres = null;
		var genres_list = document.getElementById('genre_response');
		genres_list.innerHTML = "";
	}

	$('#reset_button').click(function () {

		//$(window).unbind('scroll');
		reset();
        document.getElementById('live_search_input').value = null;
		year_gap(1888, 2019);
		year_gap_tv(1928, 2019);
		rate_gap(0, 10);
		rate_gap_tv(0, 10);
		$(".chosen-select").val('').trigger("chosen:updated");
		document.getElementById('sort_select').value = "none";
		document.getElementById('sort_select_tv').value = "none";
       // window.scrollTo(0, 3);
		//var type = null;
		//// console.log("method: ", storedMethod);
		 //// console.log("page: ", storedPage);
//////console.log(storedArr);
//////console.log(trigger.data);
		 //// console.log("scroll: ", scrollPos);
		 //// console.log("needle: ", storedNeedle);
		 //// console.log("limit: ", storedLimit);
		 //// console.log("limit.data in reset: ", limit.data);
		document.getElementById("response").innerHTML = "";
		//hide_show_genres_list(type, movies_genres, tv_genres);
		(switcher.data != null) ?  static_load(1, null, null, null, null, switcher.data, lang) : 0;
		(switcher.data == null && storedSwitcher != null) ?  static_load(1, null, null, null, null, storedSwitcher, lang) : 0;
		(switcher.data == null && storedSwitcher == null) ?  static_load(1, null, null, null, null, "movies", lang) : 0;
		/*var timer = setTimeout(function tick()
			{
				$(window).bind('scroll', ScrollHandler);
				//alert('fuck');
				timer = setTimeout(tick, 2000);
            }, 2000);*/
		//clearInterval(timer);


	});

	function static_load(i, sort, years, rate, genres, type, lang) {
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
					'type': type,
					'lang' : lang
				},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function (response) {
                if (response != "penetration") {
                    var list = JSON.parse(response);
                    if (list) {

                        var len = Object.keys(list.results).length;
                        if (len % 20 != 0) {
                            sessionStorage.setItem('limit', i);
                            limit.data = i;
                        }
                        render(list.results, len);
                        set_mark(list.results);
                        trigger.data = "static_load";
                        sessionStorage.setItem('method', 'static_load');
                        sessionArr = sessionStorage.getItem('arr');
                        sessionStorage.setItem('lang', lang);
                        genresparam.data = genres;
                        if (sessionArr && (general_type.data === type)) {
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
                }
                else {
                    window.location.href = getUrl.protocol + "//" + getUrl.host + "/penetration";
                }
            }
		});
	}


	// function render(list, len) {
	// 	if(general_type.data == "movies") {
	// 		for (var i = 0; i < len; i++) {
	// 			var gal_item = 
	// 			'<div class="gallery-item " data-width="1" data-height="1">'+
	// 				'<img src="'+'https://image.tmdb.org/t/p/original/' + list[i].poster_path+'" alt="" class="image-responsive-height">'+
	// 				'<div class="overlayer bottom-left full-width">'+
	// 					'<div class="overlayer-wrapper item-info ">'+
	// 						'<div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">'+
	// 							'<div class="">'+
	// 								// '<p class="pull-left bold text-white fs-14 p-t-10">'+list[i].title+'</p>'+
	// 								'<h5 class="pull-left semi-bold text-white">'+list[i].title+'</h5>'+
	// 								'<div class="clearfix"></div>'+
	// 							'</div>'+
	// 							'<div class="m-t-10">'+
	// 								// '<div class="thumbnail-wrapper d32 circular m-t-5">'+
	// 									// '<img width="40" height="40" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">'+
	// 								// '</div>'+
	// 								'<div class="inline m-l-10">'+
	// 									'<p class="no-margin text-white fs-12">'+list[i].release_date+'</p>'+
	// 									'<p class="no-margin text-white fs-12">'+list[i].vote_average+'</p>'+
	// 									// '<p class="rating">'+
	// 									//   '<i class="fa fa-star rated"></i>'+
	// 									//   '<i class="fa fa-star rated"></i>'+
	// 									//   '<i class="fa fa-star rated"></i>'+
	// 									//   '<i class="fa fa-star rated"></i>'+
	// 									//   '<i class="fa fa-star"></i>'+
	// 									// '</p>'+
	// 								'</div>'+
	// 								// '<div class="pull-right m-t-10">'+
	// 								//   '<button class="btn btn-white btn-xs btn-mini bold fs-14" type="button">+</button>'+
	// 								// '</div>'+
	// 								'<div class="clearfix"></div>'+
	// 							'</div>'+
	// 						'</div>'+
	// 					'</div>'+
	// 				'</div>'+
	// 			'</div>';

	// 			$(".gallery").append(gal_item);
	// 		}
	// 	}
	// 	/* 
	// 		Wait for the images to be loaded before applying
	// 		Isotope plugin.
	// 	*/
	// 	var $gallery = $('.gallery');
	// 	$gallery.imagesLoaded(function() {
	// 		applyIsotope();
	// 		console.log('gallery check');
	// 	});

	// 	/*
	// 		Apply Isotope plugin 
	// 		isotope.metafizzy.co
	// 	*/
	// 	var applyIsotope = function() {
	// 		$gallery.isotope('destroy');
	// 		$gallery.isotope({
	// 			itemSelector: '.gallery-item',
	// 			masonry: {
	// 				columnWidth: 280,
	// 				gutter: 10,
	// 				isFitWidth: true
	// 			}
	// 		});
	// 	}
	// }

	function render(list, len) {

	   // console.log('inrender');
		//   document.getElementById("response").innerHTML = response;
		//  var observer = lozad();
	   /* var type = null;
		if(switcher.data != null)
		{
			type = switcher.data;
		}
		else if(storedSwitcher != null)
		{
				type = storedSwitcher;
		}
		else
			{
				type  = "movies";
			}*/
	    console.log(list);
	   if(general_type.data == "movies") {
		   for (var i = 0; i < len; i++) {
			   var gal_item = document.createElement('div');
			   var gal_item_img_container = document.createElement('div');
			   var img_link = document.createElement('a');
			   var img = document.createElement('img');
			  // var overlayer = document.createElement('div');
			  // var overlayer_wrap = document.createElement('div');
			  // var gradient = document.createElement('div');
			  // var void_div = document.createElement('div');
			   var item_year_box = document.createElement('div');
			   var item_rate_box = document.createElement('div');
			   item_year_box.setAttribute("class", "item_year_box");
			   item_rate_box.setAttribute("class", "item_rate_box");
			   var item_year_icon_box = document.createElement('div');
			   var item_rate_icon_box = document.createElement('div');
			   var item_title = document.createElement('p');
			   var item_rate = document.createElement('p');
			   var date = document.createElement('p');
			   date.setAttribute("class", "item_year");
			   var clearfix = document.createElement('div');
			   var block = document.createElement('div');
			   block.setAttribute("class", "hide_block");
			   gal_item_img_container.setAttribute("class", "img_link");

			   gal_item.setAttribute("class", "gallery-item_custom");
			   gal_item.setAttribute("data", list[i].original_title);
			 //  clearfix.setAttribute("class", "clearfix");
			   img_link.setAttribute("href", baseUrl + 'details/' + general_type.data + '_' + list[i].id);
			   img.setAttribute("class", "image-responsive-height lozad");
			   if (list[i].poster_path != null) {
				   img.setAttribute("src", baseUrl + '/assets/img/loading5.gif');
				   img.setAttribute("data-src", 'https://image.tmdb.org/t/p/original/' + list[i].poster_path);
			   }
			   else
				   img.setAttribute("data-src", baseUrl + '/assets/img/white-blur.jpg');
			  // overlayer.setAttribute("class", "overlayer bottom-left full-width");
			  // overlayer_wrap.setAttribute("class", "overlayer-wrapper item-info");
			  // gradient.setAttribute("class", "gradient-grey");
			   item_title.setAttribute("class", "item_title");
			   item_rate.setAttribute("class", "item_rate");
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
               var icon_rate = document.createElement('img');
               var icon_year = document.createElement('img');
               icon_rate.setAttribute("class", "icon_rate");
               icon_rate.setAttribute("src", baseUrl + '/assets/img/review.svg');
               item_rate_icon_box.append(icon_rate);
               icon_year.setAttribute("class", "icon_year");
               icon_year.setAttribute("src", baseUrl + '/assets/img/calendar.svg');
               item_year_icon_box.append(icon_year);
               var mark = document.createElement("div");
               mark.setAttribute("class", "hide_mark");
               (lang == "en-US") ?  mark.innerHTML = "already seen" : 0;
               (lang == "uk-UA") ?  mark.innerHTML = "переглянуто" : 0;

               gal_item.append(mark);
			   img_link.append(img);

			   gal_item.append(gal_item_img_container);
               item_rate_box.append(item_rate_icon_box);
			   item_rate_box.append(item_rate);
               item_year_box.append(item_year_icon_box);
			   item_year_box.append(date);
			   block.append(item_title);

			   block.append(item_rate_box);
               block.append(item_year_box);
			  // block.append(date);
			   gal_item.append(block);
			  // gal_item.append(item_rate);
			  // gal_item.append(date);
			   document.getElementById("response").append(gal_item);
		   }
	   }
	   else if(general_type.data == "tvshows")
	   {
		   for (var i = 0; i < len; i++) {
			   var gal_item = document.createElement('div');
			   var gal_item_img_container = document.createElement('div');
			   var img_link = document.createElement('a');
			   var img = document.createElement('img');
			   var overlayer = document.createElement('div');
			   var overlayer_wrap = document.createElement('div');
			   var gradient = document.createElement('div');
			   var void_div = document.createElement('div');

               var item_year_box = document.createElement('div');
               var item_rate_box = document.createElement('div');
               item_year_box.setAttribute("class", "item_year_box");
               item_rate_box.setAttribute("class", "item_rate_box");
               var item_year_icon_box = document.createElement('div');
               var item_rate_icon_box = document.createElement('div');



			   var item_title = document.createElement('p');
			   var item_rate = document.createElement('p');
			   var date = document.createElement('p');
			    date.setAttribute("class", "item_year");
			  // var clearfix = document.createElement('div');
			   var block = document.createElement('div');
			   block.setAttribute("class", "hide_block hide_block_tv");
               gal_item_img_container.setAttribute("class", "img_link_tv");


			   gal_item.setAttribute("class", "gallery-item_custom");
               gal_item.setAttribute("data", list[i].original_title);
			  // clearfix.setAttribute("class", "clearfix");
			   img_link.setAttribute("href", baseUrl + 'details/' + general_type.data + '_' + list[i].id);
			   img.setAttribute("class", "image-responsive-height lozad");
			   if (list[i].poster_path != null) {
				   img.setAttribute("src", baseUrl + '/assets/img/loading5.gif');
				   img.setAttribute("data-src", 'https://image.tmdb.org/t/p/original/' + list[i].poster_path);
			   }
			   else
				   img.setAttribute("data-src", baseUrl + '/assets/img/white-blur.jpg');
			   item_title.setAttribute("class", "item_title");
			   item_rate.setAttribute("class", "item_rate");
			   item_rate.innerHTML = list[i].vote_average;
			   item_title.innerHTML = list[i].name;
			   date.innerHTML = list[i].first_air_date;
			   gal_item_img_container.append(img_link);
               var icon_rate = document.createElement('img');
               var icon_year = document.createElement('img');
               icon_rate.setAttribute("class", "icon_rate");
               icon_rate.setAttribute("src", baseUrl + '/assets/img/review.svg');
               item_rate_icon_box.append(icon_rate);
               icon_year.setAttribute("class", "icon_year");
               icon_year.setAttribute("src", baseUrl + '/assets/img/calendar.svg');
               item_year_icon_box.append(icon_year);

               img_link.append(img);
               gal_item.append(gal_item_img_container);
               item_rate_box.append(item_rate_icon_box);
               item_rate_box.append(item_rate);
               item_year_box.append(item_year_icon_box);
               item_year_box.append(date);

               block.append(item_title);

               block.append(item_rate_box);
               block.append(item_year_box);
               // block.append(date);

               gal_item.append(block);
			   /*
			   gal_item.append(block);
			   gal_item.append(item_rate);
			   gal_item.append(date);*/
			   document.getElementById("response").append(gal_item);

		   }
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

function set_mark(list)
{
    $.ajax({
        type: 'post',
        url: baseUrl + '/',
        data:
            {
                'method': 'set_mark'
            },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {

            console.log('in set mark');
            console.log(list);
            console.log(response);
            if (list) {
                var len = Object.keys(list).length;
                var response_len = Object.keys(response).length;
                for (var i = 0; i < len; i++) {
                    for (var j = 0; j < response_len; j++) {
                        if (list[i].original_title === response[j]) {
                            var child_hide_mark = document.querySelector("[data='" + list[i].original_title + "']").children[0];
                            if (child_hide_mark)
                                child_hide_mark.style.visibility = "visible";
                            console.log("damn");
                        }
                    }
                }
            }
        }
    });
}

	function live_load(needle, page, lang) {

		$.ajax({
			type: 'post',
			url: baseUrl + '/',
			data:
				{
					'method': 'live_search',
					'page': page,
					'needle': needle,
					'type': general_type.data,
					'lang': lang
				},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function (response) {
                var list = JSON.parse(response);
                if (list) {
                    len = Object.keys(list.results).length;
                    if (len % 20 > 0) {
                        //// console.log('Bitch...bitch');
                        sessionStorage.setItem('limit', page);
                        limit.data = page;
                    }
                    render(list.results, len);
                    set_mark(list.results);

                    if (storedMethod === "static_load") {
                        sessionStorage.removeItem('arr');
                    }
                    sessionStorage.setItem('method', 'live_load');
                    sessionStorage.setItem('lang', lang);
                    sessionStorage.setItem("switcher", general_type.data);
                    sessionStorage.setItem("live_str", needle);
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
            }

		});
	}


	var timer;

	$('#live_search_input').bind("input", function () {
		if (this.value.length >= 1) {
			needle.data = this.value;
			clearTimeout(timer);
			timer = setTimeout(function () {
				sessionStorage.setItem('needle', needle.data);
                sessionStorage.setItem('method', 'live_load');
				document.getElementById("response").innerHTML = "";
                trigger.data = "live_load";
				//sessionStorage.clear();
				sessionStorage.removeItem('arr');
				storedArr = null;
				storedMethod = null;
				storedPage = 1;
				//scrollPos = null;
				storedNeedle = null;
				storedLimit = null;
				limit.data = 0;
				//reset();
				live_load(needle.data, 1, lang);
			}, 500);
		}
		if (this.value.length < 1) {
			clearTimeout(timer);
			timer = setTimeout(function () {
				document.getElementById("response").innerHTML = "";
				reset();
				static_load(1, null, null, null, null, general_type.data, lang);
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
	var genres_list = document.getElementById('genre_response');
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
	static_load(1, sort, years, rate, genres, general_type.data, lang);
	(genres != null) ? genres_list.innerHTML = genres.join().replace(/,/g,'/') : 0;
	(genres == null) ? genres_list.innerHTML = "" : 0;
    document.getElementById('live_search_input').value = null;

});

$('#search_submit_tv').click(function (e)
{
	e.preventDefault();
	var genres = $('#genre_select_tv').val();
	var sort = $('#sort_select_tv').val();
	var years = $('#year_gap_tv').val();
	var rate = $('#rate_gap_tv').val();
	var genres_list = document.getElementById('genre_response');
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
	static_load(1, sort, years, rate, genres, general_type.data, lang);
	(genres != null) ? genres_list.innerHTML = genres.join().replace(/,/g,'/') : 0;
	(genres == null) ? genres_list.innerHTML = "" : 0;
});



$('.genre_direct_link').click(function (e)
{
	e.preventDefault();
	var target = e.target;
	if(target.className == "title_aside")
	{
		var genres = target.getAttribute('data');
		var res = [genres];
		reset();
		sessionStorage.setItem("genres", res);
		genresparam.data = res;
		document.getElementById("response").innerHTML = "";
		window.scrollTo(0, 3);
		static_load(1, null, null, null, res, general_type.data, lang);
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
	general_type.data = type;
	sessionStorage.setItem("switcher", type);
    document.getElementById('live_search_input').value = null;
	reset();
	year_gap(1888, 2019);
	year_gap_tv(1928, 2019);
	rate_gap(0, 10);
	rate_gap_tv(0, 10);
	$(".chosen-select").val('').trigger("chosen:updated");
	document.getElementById('sort_select').value = "none";
	document.getElementById('sort_select_tv').value = "none";
	if(target.getAttribute('id') == "movie_switch")
	{
		movie_switch.setAttribute("class", "btn btn-success");
		shows_switch.removeAttribute("class", "btn-success");
		shows_switch.setAttribute("class", "btn btn-primary");
		document.getElementById("response").innerHTML = "";
		hide_show_genres_list(type, movies_genres, tv_genres);
		sessionStorage.removeItem('arr');
		hide_show_filters(type);
		static_load(1, null, null, null, null, type, lang);
	}
	else if(target.getAttribute('id') == "tvshows_switch")
	{
		shows_switch.setAttribute("class", "btn btn-success");
		movie_switch.removeAttribute("class", "btn-success");
		movie_switch.setAttribute("class", "btn btn-primary");
		sessionStorage.removeItem('arr');
		document.getElementById("response").innerHTML = "";
		hide_show_genres_list(type, movies_genres, tv_genres);
		hide_show_filters(type);
		static_load(1, null, null, null, null, type, lang);

	}
}

function hide_show_genres_list(type, movies_genres, tv_genres)
{
    console.log(movies_genres);
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

function hide_show_filters(type)
{
	if(type === "movies")
	{
		movie_form.style.display = "flex";
		tv_form.style.display = "none";
	}
	else if(type === "tvshows")
	{
		 tv_form.style.display = "flex";
		 movie_form.style.display = "none";
	}
}