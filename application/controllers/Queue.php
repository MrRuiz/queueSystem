<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Queue extends CI_Controller {

	public function __construct()
    {
        // Call the CI_Controller constructor
        parent::__construct();

        //load models
        $this->load->model('service_model');
        $this->load->model('user_model');
        $this->load->model('user_type_model');
    }

	public function index()
	{
		$data["services"]    = $this->service_model->get_all();
		$data["users"]       = $this->user_model->get_all();
		$data["typeOfUsers"] = $this->user_type_model->get_all_type_of_users();
		
		$this->load->view('queue-system', $data);
	}

	public function add_user()
	{
		$post = $this->input->post(Null, True);

		if( $post ) {

			$this->load->library('form_validation');

			$postDataSent = array();

			$this->form_validation->set_rules('services', 'Service', 'required');
			$this->form_validation->set_rules('users', 'User', 'required');

			$postDataSent['id_service']   = $post['services'];
			$postDataSent['id_user_type'] = $post['users'];

			// Anonymous
			if( $post['users'] != 3 ) {

				$this->form_validation->set_rules('title', 'Title', 'required');
				$this->form_validation->set_rules('first-name', 'First Name', 'required');
				$this->form_validation->set_rules('last-name', 'Last Name', 'required');

				$postDataSent['title']      = $post['title'];
				$postDataSent['first_name'] = $post['first-name'];
				$postDataSent['last_name']  = $post['last-name'];

				// Organisation
				if( $post['users'] == 2 ) {
					$this->form_validation->set_rules('organisation', 'Organisation', 'required');

					$postDataSent['organisation'] = $post['organisation'];
				}

			}
			
			if( $this->form_validation->run() !== FALSE ) {
				$this->user_model->add( $postDataSent );
			}
		}

		$this->index();
	}
}
