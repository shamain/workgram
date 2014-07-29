var base_url = js_base_url;
var site_url = js_site_url;


$('.grid .clickable').on('click', function() {
    var el = jQuery(this).parents(".grid").children(".grid-body");
    el.slideToggle(200);
});


//HTML5 editor
$('#task_description').wysihtml5();

//add task form start date datepicker
$('#task_deadline_dpicker').datepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    todayHighlight: true
});