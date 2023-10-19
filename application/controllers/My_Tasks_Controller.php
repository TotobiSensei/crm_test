<?php

class My_Tasks_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Read_Task_Model", "rtm");
    }

    public function index()
    {
        $data["task_list"] = $this->rtm->get_worker_task(2);

        $this->load->view("template/header");
        $this->load->view("my_tasks", $data);
        $this->load->view("template/footer");
    }

    public function show_sub_task_list($task_id)
    {
        if ($task_id !== NULL)
        {
            $data["task_list"] = $this->rtm->get_worker_task(2);

            $data["sub_task_list"] = $this->rtm->get_worker_sub_task(2, $task_id);
    
            $this->load->view("template/header");
            $this->load->view("my_tasks", $data);
            $this->load->view("template/footer");
        }
        else
        {
            redirect(base_url("my-tasks"));
        }
    }
}