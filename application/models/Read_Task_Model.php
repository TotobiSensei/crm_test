<?php

class Read_Task_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_task_list($user_id)
    {
        if ($this->moderation->isAdmin($user_id))
        {
            $query = $this->db->get("task");

            $data = $query->result_array();

            return $data;
        }

        $this->db->where("user_id", $user_id);

        $query = $this->db->get("task");

        $data = $query->result_array();

        return $data;
    }

    public function get_sub_task_list($user_id, $task_id)
    {
        if ($this->moderation->isAdmin($user_id))
        {
            $this->db->select("t.id, st.*");
            $this->db->from("task AS t");
            $this->db->join("sub_task AS st", "t.id = st.task_id", "left");
            $this->db->where("t.id", $task_id);

            $query = $this->db->get();

            $data = $query->result_array();

            return $data;
        }


        $this->db->select("t.id, t.user_id, st.*");
        $this->db->from("task AS t");
        $this->db->join("sub_task AS st", "t.id = st.task_id", "left");
        $this->db->where("t.user_id", $user_id);
        $this->db->where("t.id", $task_id);

        $query = $this->db->get();

        $data = $query->result_array();

        return $data;
    }

    public function get_worker_task($user_id)
    {
        $this->db->select("t.name, t.id, t.status_id, t.date, t.description, COUNT(st.id) AS st_count");
        $this->db->from("sub_task st");
        $this->db->join("task t", "t.id = st.task_id");
        $this->db->join("sub_task_access sta", "st.id = sta.sub_task_id");
        $this->db->join("task_access ta", "t.id = ta.task_id");
        $this->db->where("sta.user_id", $user_id);
        $this->db->where("ta.user_id", $user_id);
        $this->db->group_by("t.name, t.id, t.status_id, t.date, t.description, ");

        $query = $this->db->get();

        $data = $query->result_array();

        return $data;
    }

    public function get_worker_sub_task($user_id, $task_id)
    {
        $this->db->select("st.*");
        $this->db->from("sub_task AS st");
        $this->db->join("sub_task_access AS sta", "st.id = sta.sub_task_id");
        $this->db->where("sta.user_id", $user_id);
        $this->db->where("st.task_id", $task_id);

        $query = $this->db->get();

        $data = $query->result_array();

        return $data;
    }
}