<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Skill_matrix_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {
            $this->load->model('skill/skill_model');
            $this->load->model('skill/skill_service');

            $this->load->model('skill_category/skill_category_model');
            $this->load->model('skill_category/skill_category_service');

            $this->load->model('employee_skill/employee_skill_model');
            $this->load->model('employee_skill/employee_skill_service');

            $this->load->model('employee/employee_model');
            $this->load->model('employee/employee_service');
        }
    }

    function manage_skill_matrix() {

        $skill_category_service = new Skill_category_service();
        $skill_service = new Skill_service();
        $employee_skill_service = new Employee_skill_service();

        $data['heading'] = "Skill Matrix";
        
        $skill_cats = $skill_category_service->get_all_skill_categories();
        $data['skill_categories'] = $skill_cats;
        $data['skills'] = $skill_service->get_all_skills();

        $current_assigned_skills = $employee_skill_service->get_skills_for_employee($this->session->userdata('EMPLOYEE_CODE'));

        $data['assigned_skills'] = $current_assigned_skills;
        $data['employee_code'] = $this->session->userdata('EMPLOYEE_CODE');
        
        $all_multi_array = array();

        for ($i = 0; $i < count($skill_cats); $i++) {


            $cat_string = $skill_cats[$i]->skill_cat_name;

            $all_multi_array[$cat_string] = array(
                'cats' => $cat_string,
                'colour' => floatval($skill_cats[$i]->colour)
            );
        }


        $data['all_multi_array'] = $all_multi_array;


        $partials = array('content' => 'skill_matrix/skill_matrix_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    function add_new_skill_matrix() {

        $employee_skill_service = new Employee_skill_service();
        $employee_skill_model = new Employee_skill_model();

        $employee_skill_model->set_employee_skill_id($this->input->post('employee_skill_id', TRUE));
        $employee_skill_model->set_skill_code($this->input->post('skill_code', TRUE));
        $employee_skill_model->set_employee_code($this->session->userdata('EMPLOYEE_CODE'));
        $employee_skill_model->set_expert_level($this->input->post('expert_level', TRUE));
        $employee_skill_model->set_reference($this->input->post('reference', TRUE));
        $employee_skill_model->set_del_ind('1');
        $employee_skill_model->set_added_date(date("Y-m-d H:i:s"));


        echo $employee_skill_service->add_new_employee_skill($employee_skill_model);
    }

    function edit_employee_skill_matrix() {

        $employee_skill_model = new Employee_skill_model();
        $employee_skill_service = new Employee_skill_service();

        $employee_skill_model->set_skill_code($this->input->post('skill_code', TRUE));
//        $employee_skill_model->set_employee_code($this->input->post('employee_code', TRUE));
//        $employee_skill_model->set_employee_skill_id($this->input->post('employee_skill_id', TRUE));
//        $employee_skill_model->set_del_ind($this->input->post('del_ind', TRUE));
//        $employee_skill_model->set_added_date($this->input->post('added_by', TRUE));
//        $employee_skill_model->set_added_date($this->input->post('added_date', TRUE));


        echo $employee_skill_service->update_employee_skill($employee_skill_model);
    }

    function delete_employee_skill() {


        $employee_skill_service = new Employee_skill_service();

        echo $employee_skill_service->delete_employee_skill(trim($this->input->post('id', TRUE)));
    }

//    function edit_skill_view($skill_code) {
//
//
//        $skill_service = new Skill_service();
//        $skill_category_service = new Skill_category_service();
//
//        $data['heading'] = "Edit Skill";
//        $data['skill'] = $skill_service->get_skill_by_code($skill_code);
//        $data['skill_categories'] = $skill_category_service->get_all_skill_categories();
//
//        $partials = array('content' => 'skill/edit_skill_view');
//        $this->template->load('template/main_template', $partials, $data);
//    }
    //get skills for skill category
    function get_skill_for_skill_category_filter() {

        $skill_model = new Skill_model();
        $skill_service = new Skill_service();

        $skill_cat_code = $this->input->post('skill_cat_code');
        $skill_model->set_skill_cat_code($skill_cat_code);

        $skills = $skill_service->get_skills_by_skill_cat_code($skill_model);
        ?>
        <option value="">-- Select Skills --</option>
        <?php foreach ($skills as $skill) { ?>
            <option value="<?php echo $skill->skill_code ?>"><?php echo $skill->skill_name; ?></option>
            <?php
        }
        ?>
        <?php
    }

    public function get_skills_for_employee() {

        $employee_skill_service = new Employee_skill_service();
        $result = $employee_skill_service->get_skills_for_employee($this->input->post('employee_code'));

        echo json_encode($result);
    }

}
