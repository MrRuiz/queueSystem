<?php

class Service_model extends CI_Model {

    protected static $table = "Service";

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_all()
    {
        $query = $this->db->get(self::$table);
        return $query->result();
    }

}