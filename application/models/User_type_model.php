<?php

class User_type_model extends CI_Model {

	protected static $table = "User_type";

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_all_type_of_users()
    {
        $query = $this->db->get(self::$table);
        return $query->result();
    }
}