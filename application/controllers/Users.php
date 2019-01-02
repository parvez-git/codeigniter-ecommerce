<?php

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model','users');
        // $this->load->library('encrypt');
    }

    public function index()
    {
        $data['customers'] = $this->users->userdata();

        $this->load->view('backend/customers/index', $data);
    }

    public function create()
    {
        $this->load->view('backend/customers/create');
    }

    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/index');

        } else {
            $name     = $this->input->post('name', TRUE);
            $email    = $this->input->post('email', TRUE);
            $password = $this->input->post('password');

            $result   = $this->users->userregister($name, $email, $password);

            if ($result) {
                
                $session_data = [
                    'email'     => $email,
                    'is_login'  => true
                ];
    
                $this->session->set_userdata($session_data);
    
                redirect(base_url('/dashboard'));

            } else {
                show_404();
            }
        }
    }

    public function login()
    {
        $email    = $this->input->post('email');
        $password = $this->input->post('password');

        $result   = $this->users->userlogin($email, $password);

        if ($result) {

            $session_data = [
                'email'     => $email,
                'is_login'  => true
            ];

            $this->session->set_userdata($session_data);

            redirect(base_url('/dashboard'));

        } else {
            // show_404();
            $this->session->set_flashdata('message', 'Incorrect Email or/and Password!');
            redirect('/');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

}
