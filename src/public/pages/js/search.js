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
var movies_genres = document.querySelectorAll('.movie_genre');
var tv_genres = document.querySelectorAll('.tv_genre');
var movies_len = movies_genres.length;
var tv_len = tv_genres.length;
var movie_form = document.getElementById('movie_form');
var tv_form = document.getElementById('tv_form');
var general_type = {data: null};
var lang = "uk-UA";
//var lang = "en-US";



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
			hide_show_genres_list("movies", movies_genres, tv_genres);
			hide_show_filters("movies");
		}
		else if(storedSwitcher === "tvshows")
		{
			shows_switch.setAttribute("class", "button is-active");
			movie_switch.removeAttribute("class", "is-active");
			movie_switch.setAttribute("class", "button");
			sessionStorage.setItem("switcher", "tvshows");
			hide_show_genres_list("tvshows", movies_genres, tv_genres);
			hide_show_filters("tvshows");
		}
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
		console.log('fuck');
		genres_list.innerHTML = storedGenres.replace(/,/g, '/');
	}
	else
	  genres_list.innerHTML = "";
	(storedSort != null && storedSwitcher === "movies") ? document.getElementById('sort_select').value = storedSort : 0;
	(storedSort != null && storedSwitcher === "tvshows") ? document.getElementById('sort_select_tv').value = storedSort : 0;
	if(storedYears != null)
	{
		var years = storedYears.split('-');
		(storedSwitcher === "movies") ? year_gap(years[0], years[1]) : 0;
		(storedSwitcher === "tvshows") ? year_gap_tv(years[0], years[1]) : 0;
	}
	if(storedRate != null)
	{
		var rate = storedRate.split('-');

		(storedSwitcher === "movies") ? rate_gap(rate[0], rate[1]) : 0;
		(storedSwitcher === "tvshows") ? rate_gap_tv(rate[0], rate[1]) : 0;
	}
	//(storedYears != null && storedSwitcher === "movies") ? document.getElementById('year_gap').value = storedYears : 0;

}



if (response)
{
	$(document).ready(function () {

		var type = null;
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
		if(storedSwitcher != null)
			general_type.data = storedSwitcher;
		else if(switcher.data != null)
			general_type.data = switcher.data;
		else
			general_type.data = "movies";
		setformdata();
		$(document).ajaxStart(function () {
			$("#load_gif").show();
		}).ajaxStop(function () {
			$("#load_gif").hide();
		});

		if (storedMethod == null) {
			static_load(1, null, null, null, null, "movies", lang);
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
							console.log('fuck');
							static_load(storedPage, sortparam.data, yearsparam.data, rateparam.data, genresparam.data, general_type.data, lang);
						}
						else
						{
							console.log('bitch');
							console.log(storedGenres);
							var res = null;
							if(storedGenres)
								 res = storedGenres.split(',');
							static_load(storedPage, storedSort, storedYears, storedRate, res, general_type.data, lang);
						}
					}
					else if (storedMethod == "live_load" || trigger.data == "live_load") {
						//// console.log("in live_load");
						//// console.log("page in live_load: ", storedPage);
						//// console.log("storedNeedle :", storedNeedle);
						//// console.log("needle.data: ", needle.data);
						sessionStorage.setItem('page', storedPage);
						if (needle.data == '' && storedNeedle != null)
							live_load(storedNeedle, storedPage, lang);
						else if (storedNeedle == null && needle.data != '')
							live_load(needle.data, storedPage, lang);
					}
				}
				// render(i);
			}
		}
	}, 750 );



	function reset()
	{

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
		sessionStorage.removeItem('method');
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
		storedSort = null;
		storedYears = null;
		storedRate = null;
		storedGenres = null;
		var genres_list = document.getElementById('genre_response');
		genres_list.innerHTML = "";





	}

	$('#reset_button').click(function () {

		reset();
		year_gap(1888, 2018);
		year_gap_tv(1928, 2018);
		rate_gap(0, 10);
		rate_gap_tv(0, 10);
		$(".chosen-select").val('').trigger("chosen:updated");
		document.getElementById('sort_select').value = "none";
		document.getElementById('sort_select_tv').value = "none";
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
		(switcher.data != null) ?  static_load(1, null, null, null, null, switcher.data) : 0;
		(switcher.data == null && storedSwitcher != null) ?  static_load(1, null, null, null, null, storedSwitcher, lang) : 0;
		(switcher.data == null && storedSwitcher == null) ?  static_load(1, null, null, null, null, "movies", lang) : 0;
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
				var list = JSON.parse(response);
				// console.log(response);
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
				console.log('switcher.data', switcher.data);
				console.log('storedSwitcher', storedSwitcher);
				console.log('gen', general_type.data);
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
		});
	}


	function render(list, len) {

	  //  console.log(list);
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
			   img_link.setAttribute("href", baseUrl + 'details/' + general_type.data + '_' + list[i].id);
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
			   var item_title = document.createElement('p');
			   var item_rate = document.createElement('p');
			   var date = document.createElement('p');
			   var clearfix = document.createElement('div');
			   var block = document.createElement('div');
			   block.setAttribute("class", "hide_block");
			   gal_item_img_container.setAttribute("class", "img_link");


			   gal_item.setAttribute("class", "gallery-item");
			   clearfix.setAttribute("class", "clearfix");
			   img_link.setAttribute("href", baseUrl + 'details/' + general_type.data + '_' + list[i].id);
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
			   item_title.innerHTML = list[i].name;
			   date.innerHTML = list[i].first_air_date;
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
	reset();
	year_gap(1888, 2018);
	year_gap_tv(1928, 2018);
	rate_gap(0, 10);
	rate_gap_tv(0, 10);
	/*var remove_choice = document.querySelectorAll('.search-choice');
	if (remove_choice)
	{
		for (var i = 0; i < remove_choice.length; i++)
			remove_choice[i].remove();
	}
	var active_choice = document.querySelectorAll('.result-selected');
	if (active_choice)
	{
		for (var i = 0; i < active_choice.length; i++)
		{
			console.log(i);
			active_choice[i].setAttribute("class", "active-result");
		}
	}*/
	$(".chosen-select").val('').trigger("chosen:updated");
	document.getElementById('sort_select').value = "none";
	document.getElementById('sort_select_tv').value = "none";
	if(target.getAttribute('id') == "movie_switch")
	{
		movie_switch.setAttribute("class", "button is-active");
		shows_switch.removeAttribute("class", "is-active");
		shows_switch.setAttribute("class", "button");
		document.getElementById("response").innerHTML = "";
		hide_show_genres_list(type, movies_genres, tv_genres);
		sessionStorage.removeItem('arr');
		hide_show_filters(type);
		static_load(1, null, null, null, null, type, lang);
	}
	else if(target.getAttribute('id') == "tvshows_switch")
	{
		shows_switch.setAttribute("class", "button is-active");
		movie_switch.removeAttribute("class", "is-active");
		movie_switch.setAttribute("class", "button");
		sessionStorage.removeItem('arr');
		document.getElementById("response").innerHTML = "";
		hide_show_genres_list(type, movies_genres, tv_genres);
		hide_show_filters(type);
		static_load(1, null, null, null, null, type, lang);

	}
}

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
		console.log('in there');
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