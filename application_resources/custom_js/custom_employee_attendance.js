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

    var emp_code = $('#emp_atn_employee').val();
    var date_filter = $('#att_filter_m_picker').val();

    $.post(site_url + '/employee_attendance/employee_attendance_controller/get_dates_for_employee_attendance_filter', {emp_code: emp_code,date:date_filter}, function(msg) {
        if (msg != '') {
            $("#search_result_table").html('');
            $("#search_result_table").html(msg);
        }
    });

});
