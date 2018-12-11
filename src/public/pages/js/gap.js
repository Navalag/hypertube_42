year_gap();
rate_gap();
year_gap_tv();
rate_gap_tv();


function year_gap() {

    $( "#slider-range_year" ).slider({
        range: true,
        min: 1888,
        max: 2018,
        values: [ 1888, 2018],
        slide: function( event, ui ) {
            $( "#year_gap" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        }
    });
    $( "#year_gap" ).val($( "#slider-range_year" ).slider( "values", 0 ) +
        " - " + $( "#slider-range_year" ).slider( "values", 1 ) );
}

function rate_gap() {
    $( "#slider-range_rate" ).slider({
        range: true,
        min: 0,
        max: 10,
        values: [ 0, 10],
        slide: function( ewvent, ui ) {
            $( "#rate_gap" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        }
    });
    $( "#rate_gap" ).val($( "#slider-range_rate" ).slider( "values", 0 ) +
        " - " + $( "#slider-range_rate" ).slider( "values", 1 ) );
}

function year_gap_tv() {

    $( "#slider-range_year_tv" ).slider({
        range: true,
        min: 1928,
        max: 2018,
        values: [ 1928, 2018],
        slide: function( event, ui ) {
            $( "#year_gap_tv" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        }
    });
    $( "#year_gap_tv" ).val($( "#slider-range_year_tv" ).slider( "values", 0 ) +
        " - " + $( "#slider-range_year_tv" ).slider( "values", 1 ) );
}

function rate_gap_tv() {
    $( "#slider-range_rate_tv" ).slider({
        range: true,
        min: 0,
        max: 10,
        values: [ 0, 10],
        slide: function( ewvent, ui ) {
            $( "#rate_gap_tv" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        }
    });
    $( "#rate_gap_tv" ).val($( "#slider-range_rate_tv" ).slider( "values", 0 ) +
        " - " + $( "#slider-range_rate_tv" ).slider( "values", 1 ) );
}

