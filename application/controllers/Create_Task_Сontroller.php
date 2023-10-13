<?php

class Create_Task_Сontroller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library("form_validation");

        $this->load->model("Create_Task_Model", "ct");
    }

    public function index()
    {
        $this->load->view("template/header");
        $this->load->view("create_task");
        $this->load->view("template/footer");
    }

    public function create()
    {
        $user_id = 1;

        $this->form_validation->set_rules("task_name", "назва проекту", "required");
        $this->form_validation->set_rules("task_description", "опис проекту", "required");

        if (!empty($this->input->post("sub_task_name")[0]) || !empty($this->input->post("sub_task_description")[0]))
        {
            $this->form_validation->set_rules("sub_task_name[]", "назва задачі", "required");
            $this->form_validation->set_rules("sub_task_description[]", "опис задачі", "required");
        }

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view("template/header");
            $this->load->view("create_task");
            $this->load->view("template/footer");
        }
        else
        {
            $data = [];

            $data["task"] = [
                "name" => $this->input->post("task_name"),
                "description" => $this->input->post("task_description"),
                "user_id" => $user_id,
            ];

            if (!empty($this->input->post("sub_task_name")[0]))
            {
                $data["sub_task"] = 
                [
                    "name" => $this->input->post("sub_task_name[]"),
                    "description" => $this->input->post("sub_task_description[]"),
                ];
            }

            $this->ct->create_task($data);

            redirect(base_url());
        }

        
    }
}