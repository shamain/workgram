//add year datepicker
$("#att_year_dpicker").datepicker( {
    format: "mm-yyyy",
    viewMode: "year", 
    minViewMode: "year"
});

//add month datepicker
$("#att_month_dpicker").datepicker( {
    format: "mm-yyyy",
    viewMode: "months", 
    minViewMode: "months"
});

$(document).on('click', '#search_employee_attendance_btn', function() {

    var emp_code = $('#search_employee_attendance_btn').val();
    var date_filter = $('#search_employee_attendance_btn').val();

    $.post(site_url + '/employee_attendance/employee_attendance_controller/get_skill_employees_for_skill_category_filter', {emp_code: emp_code}, function(msg) {
        if (msg != '') {
            $("#emp_code").html('');
            $("#date_filter").html(msg);
        }
    });

});
