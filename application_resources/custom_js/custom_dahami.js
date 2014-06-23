



function save_user_privileges(privilege_code, employee_code) {
    $("#msg" + priviligeCode).html('');

    $checkbox = document.getElementById('privilege' + privilege_code);

    $.post(site_url + '/employee_privilege/employee_privilege_controller/add_employee_privileges', {privilege_code: privilege_code, employee_code: employee_code}, function(msg)
    {
        if (msg == 1) {
            $("#msg" + privilege_code).html('<img src="' + base_url + '/application_resources/images/icons/color/accept.png"  />');

        } else {
            $("#msg" + privilege_code).html('<img src="' + base_url + '/application_resources/images/icons/color/error.png"  />');
            
        }
    });

}