<?php

class Create_Task_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function create_task($data)
    {
        
        $task = $data["task"];

        $task["date"] = time();

        $task["status_id"] = 0;

        $this->db->insert("task", $task);

        $task_id = $this->db->insert_id();

        if (isset($data["sub_task"]))
        {
            $sub_task = $data["sub_task"];

            // return var_dump($sub_task);

            $count = count($sub_task["name"]);

            for ($i=0; $i<$count; $i++)
            {
                $sub_task_to_insert = [
                    "name" => $sub_task["name"][$i],
                    "description" => $sub_task["description"][$i],
                    "price" => 0,
                    "date" => time(),
                    "status_id" => 0,
                    "task_id" => $task_id
                ];

                $this->db->insert("sub_task", $sub_task_to_insert);
            }
        }
    }
}