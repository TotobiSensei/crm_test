<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Moderation
{
    private $CI;
    private $moderation;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model('Moderation_Model');
        $this->moderation = $this->CI->Moderation_Model;
    }

    public function isAdmin($user_id)
    {
        $result = $this->moderation->isAdmin($user_id);

        return $result;
    }

    public function isWorker($user_id)
    {
        $result = $this->moderation->isWorker($user_id);

        return $result;
    }
}