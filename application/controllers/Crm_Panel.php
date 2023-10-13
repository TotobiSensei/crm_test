<?php

class Crm_Panel extends CI_Controller
{
    private $user_id;

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Read_Task_Model", "rt");
        $this->user_id = 1;
    }

    public function show_task_list()
    {
        $data["task_list"] = $this->rt->get_user_task_list($this->user_id);

        $this->load->view("template/header");
        $this->load->view("crm_panel", $data);
        $this->load->view("template/footer");
    }

    public function show_sub_task_list($task_id)
    {
        if ($task_id !== null)
        {
            $data["task_list"] = $this->rt->get_user_task_list($this->user_id);
            $data["sub_task_list"] = $this->rt->get_user_sub_task_list($this->user_id, $task_id);
    
            $this->load->view("template/header");
            $this->load->view("crm_panel", $data);
            $this->load->view("template/footer");
        }
        else
        {
            redirect(base_url());
        }
    }
}