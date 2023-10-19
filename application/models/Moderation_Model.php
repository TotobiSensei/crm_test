<?php

class Moderation_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function isAdmin($user_id)
    {
        $this->db->select("r.*");
        $this->db->from("users AS u");
        $this->db->join("roles AS r", "u.role_id = r.id", "left");
        $this->db->where("u.id", $user_id);

        $query = $this->db->get();

        $data = $query->row_array();

        if ($data["name"] == "admin")
        {
            return true;
        }

        return false;
    }

    public function isWorker($user_id)
    {
        $this->db->select("r.*");
        $this->db->from("users AS u");
        $this->db->join("roles AS r", "u.role_id = r.id", "left");
        $this->db->where("u.id", $user_id);

        $query = $this->db->get();
        
        $data = $query->row_array();

        switch ($data["name"]) {
            case 'programmer':
                return true;
                break;
            
            default:
                return false;
                break;
        }
    }
}