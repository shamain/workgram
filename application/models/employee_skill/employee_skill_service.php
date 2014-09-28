<?php

class Employee_skill_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('employee_skill/employee_skill_model');
    }

    public function get_all_employee_skills() {
        $this->db->select('*');
        $this->db->from('employee_skill');
        $this->db->where('del_ind', '1');
        $query = $this->db->get();
        return $query->result();
    }

    function get_employee_skill_by_employee_skill_code($employee_skill_code) {

        $query = $this->db->get_where('employee_skill', array('employee_skill_id' => $employee_skill_code));
        return $query->row();
    }

    function get_skills_for_employee($emp_code) {

        $this->db->select('employee_skill.*,skill.skill_name');
        $this->db->from('employee_skill');
        $this->db->join('skill', 'employee_skill.skill_code = skill.skill_code');
        $this->db->where('employee_skill.del_ind', '1');
        $this->db->where('skill.del_ind', '1');
        $this->db->where('employee_skill.employee_code', $emp_code);
        $this->db->order_by("employee_skill.employee_skill_id", "desc");
        $query = $this->db->get();

        return $query->result();
    }

    function get_skill_categories_for_employee($emp_code) {

        $this->db->select('employee_skill.*,skill.skill_cat_code,skill_category.colour');
        $this->db->from('employee_skill');
        $this->db->join('skill', 'employee_skill.skill_code = skill.skill_code');
        $this->db->join('skill_category', 'skill_category.skill_cat_code = skill.skill_cat_code');
        $this->db->where('employee_skill.del_ind', '1');
        $this->db->where('skill.del_ind', '1');
        $this->db->where('skill_category.del_ind', '1');
        $this->db->where('employee_skill.employee_code', $emp_code);
        $this->db->group_by("skill.skill_cat_code");
        $query = $this->db->get();

        return $query->result();
    }

    function get_skills_for_employee_by_skill_cat_code($emp_code, $skill_cat_code) {

        $this->db->select('employee_skill.*,skill.skill_name,skill.skill_cat_code');
        $this->db->from('employee_skill');
        $this->db->join('skill', 'employee_skill.skill_code = skill.skill_code');
        $this->db->where('employee_skill.del_ind', '1');
        $this->db->where('skill.del_ind', '1');
        $this->db->where('employee_skill.employee_code', $emp_code);
        $this->db->where('skill.skill_cat_code', $skill_cat_code);
        $query = $this->db->get();

        return $query->result();
    }

    function get_employee_expert_levels($emp_code, $skill_cat_code) {

        $this->db->select('SUM(employee_skill.expert_level) as exp_level');
        $this->db->from('employee_skill');
        $this->db->join('skill', 'employee_skill.skill_code = skill.skill_code');
        $this->db->where('employee_skill.del_ind', '1');
        $this->db->where('skill.del_ind', '1');
        $this->db->where('employee_skill.employee_code', $emp_code);
        $this->db->where('skill.skill_cat_code', $skill_cat_code);
        $this->db->group_by('skill.skill_cat_code');
        $query = $this->db->get();

        return $query->row();
    }

    function delete_employee_skill($employee_skill_id) {
        $data = array('del_ind' => '0');
        $this->db->where('employee_skill_id', $employee_skill_id);
        return $this->db->update('employee_skill', $data);
    }

    function update_employee_skill($employee_skill_model) {

        $data = array(
            'skill_code' => $employee_skill_model->get_skill_code(),
            'expert_level' => $employee_skill_model->get_expert_level(),
            'reference' => $employee_skill_model->get_reference(),
        );


        $this->db->where('employee_skill_id', $employee_skill_model->get_employee_skill_id());

        return $this->db->update('employee_skill', $data);
    }

    function add_new_employee_skill($employee_skill_model) {

        return $this->db->insert('employee_skill', $employee_skill_model);
    }

    public function get_all_employee_for_skills_by_skill_ids($skill_ids) {

        $this->db->select('employee_skill.*,employee.employee_fname,employee.employee_lname');
        $this->db->from('employee_skill');
        $this->db->join('employee', 'employee.employee_code = employee_skill.employee_code');
        $this->db->where('employee_skill.skill_code IN(' . $skill_ids . ')');
        $this->db->where('employee_skill.del_ind', '1');

        $query = $this->db->get();

        return $query->result();
    }

}
