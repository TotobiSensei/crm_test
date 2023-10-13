<?php

class Read_Task_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_user_task_list($user_id)
    {
        $this->db->where("user_id", $user_id);

        $query = $this->db->get("task");

        $data = $query->result_array();

        return $data;
    }

    public function get_user_sub_task_list($user_id, $task_id)
    {
        $this->db->select("t.id, t.user_id, st.*");
        $this->db->from("task AS t");
        $this->db->join("sub_task AS st", "t.id = st.task_id", "left");
        $this->db->where("t.user_id", $user_id);
        $this->db->where("t.id", $task_id);

        $query = $this->db->get();

        $data = $query->result_array();

        return $data;
    }
}