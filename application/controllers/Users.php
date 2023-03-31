<?php 
class Users extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model');
        
    }
    public function register() {
        $data['title'] = "Sign in";

        $this->form_validation->set_rules('name','Name','required'); 
        $this->form_validation->set_rules('username','Username','required|callback_check_username_exists'); 
        $this->form_validation->set_rules('email','Email','required|callback_check_email_exists'); 
        $this->form_validation->set_rules('password','Password','required'); 
        $this->form_validation->set_rules('confirm_password','Confirm_password','matches[password]'); 

        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/register',$data);
            $this->load->view('templates/footer');
        } else {
            //Encript password
            $enc_password = md5($this->input->post('password'));   
            $this->User_Model->register($enc_password);

            $this->session->set_flashdata('user_registered','You are now register and log in');
            redirect('login'); 
        } 
    }

    public function login() {
        $data['title'] = "Logged in";

        $this->form_validation->set_rules('username','Username','required'); 
        $this->form_validation->set_rules('password','Password','required'); 

        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/login',$data);
            $this->load->view('templates/footer');
        } else {
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));
                $user_id = $this->User_Model->login($username,$password);

            if($user_id) {
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );
                $this->session->set_userdata($user_data);
                redirect('posts');
            }

            $this->session->set_flashdata('logged_failed','You are login filed.');
            redirect('users/login'); 
        } 
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('user_loggedout','You are successfully logout.');
        redirect('users/login');
    }

    public function check_username_exists($username) {
        $this->form_validation->set_message('check_username_exists','This username is exist.Please choose a other one.');
        if($this->User_Model->check_username_exists($username)) {
            return true;
        } else {
            return false;
        }
    }

    public function check_email_exists($email) {
        $this->form_validation->set_message('check_email_exists','This email is already exist.Please choose a other one.');
        if($this->User_Model->check_email_exists($email)) {
            return true;
        } else {
            return false;
        }
    }
}
?>