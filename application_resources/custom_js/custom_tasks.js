var base_url = js_base_url;
var site_url = js_site_url;


$('.grid .clickable').on('click', function() {
    var el = jQuery(this).parents(".grid").children(".grid-body");
    el.slideToggle(200);
});	