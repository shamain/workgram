
//add month datepicker
$("#att_month_dpicker").datepicker( {
    format: "MM yyyy",
    viewMode: "months", 
    autoclose: true,
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


//print attendance report
$(document).on('click', '#attendance_print_btn', function() {
    var emp_code = $('#emp_atn_employee').val();
    var date_filter = $('#att_filter_m_picker').val();
    var win = window.open(site_url + '/employee_attendance/employee_attendance_controller/print_attendance_pdf_report?emp_code=' + emp_code+'&date='+date_filter, '_blank');
    win.focus();
});