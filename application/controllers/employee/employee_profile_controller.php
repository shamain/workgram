<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_profile_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {

            $this->load->model('employee/employee_model');
            $this->load->model('employee/employee_service');

            $this->load->model('task/task_model');
            $this->load->model('task/task_service');
            
            $this->load->model('project/project_model');
            $this->load->model('project/project_service');
            
            $this->load->model('employee_skill/employee_skill_model');
            $this->load->model('employee_skill/employee_skill_service');
//            
//            $this->load->model('skill_category/skill_category_model');
//            $this->load->model('skill_category/skill_category_service');
        }
    }

    /*
     * This function is to view the employee profile
     */
    function view_profile() {

        $employee_service = new Employee_service();
        $task_service = new Task_service();
        $project_service=new Project_service();
        $employee_skill_service=new Employee_skill_service();
//        $skill_category_service=new Skill_category_service();
        
        $data['employee_tasks'] = $task_service->get_employee_task_detail_by_project($this->session->userdata('EMPLOYEE_CODE'));
        $data['heading'] = "My Profile";
        $data['employee_detail'] = $employee_service->get_employee_by_id($this->session->userdata('EMPLOYEE_CODE'));
        $data['employees'] = $employee_service->get_employees_by_company_id($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        $projects = $project_service->get_projects_for_employee($this->session->userdata('EMPLOYEE_CODE'));
        $data['employee_projects'] =$projects;
        $data['employee_skills'] = $employee_skill_service->get_skills_for_employee($this->session->userdata('EMPLOYEE_CODE'));
        $data['employee_skill_categories'] = $employee_skill_service->get_skill_categories_for_employee($this->session->userdata('EMPLOYEE_CODE'));
        $data['project_done'] = '';

         
                        $project_done;
                        $i = 0;
                        foreach ($projects as $project) {
                            
                            $complete_count = $task_service->get_complete_task_count_for_project($project->project_id);
                            $not_complete_count = $task_service->get_not_complete_task_count_for_project($project->project_id);

                            //calculate progress
                            $total = $complete_count + $not_complete_count;

                            $progress = 0;
                            if ($total != 0) {
                                $progress = ( $complete_count * 100) / $total;
                                
                                if($progress==100){
                                    
                                    $project_done++;
                                }
                            }
                        } 
        $partials = array('content' => 'employee/employee_profile_view');
        $this->template->load('template/main_template', $partials, $data);
    }
    

    /*
     * This function is to dispaly the edit profile view
     */
    function edit_employee_profile($employee_code) {
//        $perm = Access_controllerservice :: checkAccess('EDIT_EMPLOYEE_PROFILE');
//        if ($perm) {

        $employee_service = new employee_service();


        $data['heading'] = "Edit Employee Details";
        $data['employee_detail'] = $employee_service->get_employee_by_id($employee_code);


        $partials = array('content' => 'employee/edit_employee_profile');
        $this->template->load('template/main_template', $partials, $data);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }
    
    
    /*
     * This function is to edit employee's details in the profile using the 
     * function update_employee_profile in employee_service
     */

    function edit_employee() {

//        $perm = Access_controllerservice :: checkAccess('EDIT_EMPLOYEE_PROFILE');
//        if ($perm) {

        $employee_model = new employee_model();
        $employee_service = new employee_service();
        $employee_model->set_employee_fname($this->input->post('employee_fname', TRUE));
        $employee_model->set_employee_lname($this->input->post('employee_lname', TRUE));
        $employee_model->set_employee_email($this->input->post('employee_email', TRUE));
        $employee_model->set_employee_bday($this->input->post('employee_bday', TRUE));
        $employee_model->set_employee_contact($this->input->post('employee_contact', TRUE));
        ;

        $employee_model->set_employee_code($this->input->post('employee_code', TRUE));


        echo $employee_service->update_employee_profile($employee_model);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }
    
    /*
     * This function is to upload a cover image to the profile
     */

    function upload_employee_cover_pic() {

        $uploaddir = './uploads/employee_cover_pics/';
        $unique_tag = 'cover_pic';

        $filename = $unique_tag . time() . '-' . basename($_FILES['uploadfile']['name']); //this is the file name
        $file = $uploaddir . $filename; // this is the full path of the uploaded file

        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
            echo $filename;
        } else {
            echo "error";
        }
    }

    
    /*
     * This function is to upload profile pic to employee
     */
    function upload_employee_avatar() {

        $uploaddir = './uploads/employee_avatar/';
        $unique_tag = 'employee_avatar';

        $filename = $unique_tag . time() . '-' . basename($_FILES['uploadfile2']['name']); //this is the file name
        $file = $uploaddir . $filename; // this is the full path of the uploaded file

        if (move_uploaded_file($_FILES['uploadfile2']['tmp_name'], $file)) {
            echo $filename;
        } else {
            echo "error";
        }
    }

    
    /*
     * This function is to update employee profile pic
     */
    function update_employee_avatar() {
        $employee_service = new Employee_service();
        $employee_model = new Employee_model();

        $employee_model->set_employee_avatar($this->input->post('employee_avatar', TRUE));
        $employee_model->set_employee_code($this->input->post('employee_code', TRUE));

        $result = $employee_service->update_employee_avatar($employee_model);
        
        //update session profile pic into new pic
        $this->session->set_userdata('EMPLOYEE_PROPIC', $this->input->post('employee_avatar', TRUE));
        
        echo $result;
    }

    
    /*
     * This function is to update the employee cover image
     */
    function update_employee_cover_image() {
        $employee_service = new Employee_service();
        $employee_model = new Employee_model();

        $employee_model->set_employee_cover_image($this->input->post('employee_cover_image', TRUE));
        $employee_model->set_employee_code($this->input->post('employee_code', TRUE));

        $result = $employee_service->update_employee_cover_image($employee_model);
        
        //update session profile pic into new pic
        $this->session->set_userdata('EMPLOYEE_COVERPIC', $this->input->post('employee_cover_image', TRUE));
        
        echo $result;
    }
    
    
}

?>
