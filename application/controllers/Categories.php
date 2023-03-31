<?php
class Categories extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_Model');
        $this->load->model('Post_Model');
    }

    public function index() {
        $data['title'] = "Categories";
        $data['categories'] = $this->Category_Model->get_categories();
        $this->load->view('templates/header');
        $this->load->view('categories/index',$data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $data['title'] = "Create Categories";
        $this->form_validation->set_rules('category_name','Category Name','required');
        if($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('categories/create');
            $this->load->view('templates/footer');
        } else {
            $this->Category_Model->create_category();
            $this->session->set_flashdata('category_created','You are post have been created.');
            redirect('categories');
        }
    }

    public function posts($id) {
        $data['title'] = $this->Category_Model->get_category($id);
        $data['posts'] = $this->Post_Model->get_post_by_category($id);
        $this->load->view('templates/header');
        $this->load->view('posts/index',$data);
        $this->load->view('templates/footer');
    }

    public function delete($id) {
        $this->Category_Model->delete_category($id);
        $this->session->set_flashdata('category_deleted','Category deleted');
        redirect('categories');
    }
}
?>