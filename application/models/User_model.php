<?php

class User_model extends CI_Model {

	protected static $table = "User";

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from(self::$table);
        $this->db->join('service', 'service.id = user.id_service');
        $this->db->join('user_type', 'user_type.id = user.id_user_type');

        $query = $this->db->get()->result();
        return $query;
    }

    public function add($post)
    {
		$this->db->insert(self::$table, $post);
    }

}