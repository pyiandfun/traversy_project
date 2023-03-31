<?php
class Posts extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_Model');
        $this->load->model('Comment_Model');
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
    }

    public function index($offset=0) {
        $config['base_url'] = base_url('posts/index/');
        $config['total_rows'] = $this->db->count_all('posts');
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' => 'pagination-link');

        $this->pagination->initialize($config);
        $data['title'] = "Lastest posts";
        $data['posts'] = $this->Post_Model->get_posts(FALSE,$config['per_page'],$offset);
        $this->load->view('templates/header');
        $this->load->view('posts/index',$data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL) {
        $data['post'] = $this->Post_Model->get_posts($slug);
        $post_id = $data['post']['id'];
        $data['comments'] = $this->Comment_Model->get_comments($post_id);
        if(empty($data['post'])) {
            show_404();
        }

        $data['title'] = $data['post']['title'];
        $this->load->view('templates/header');
        $this->load->view('posts/view',$data);
        $this->load->view('templates/footer');
    }

    public function create() {

        $data['create'] = "Create Post";
        $data['categories'] = $this->Post_Model->get_categories();
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('body','Body','required');

        if( $this->form_validation->run() === FALSE ) {
            $this->load->view('templates/header');
            $this->load->view('posts/create',$data);
            $this->load->view('templates/footer'); 
        } else {
            $this->Post_Model->create_post();
            $this->session->set_flashdata('post_created','You are post have been created.');
            redirect('posts');
        }
    }

    public function delete($id) {
        $this->Post_Model->delete_post($id);
        $this->session->set_flashdata('post_deleted','posts deleted');
        redirect('posts');
    }

    public function edit($slug) {

        $data['post'] = $this->Post_Model->get_posts($slug);
        $data['categories'] = $this->Post_Model->get_categories();
        if(empty($data['post'])) {
            show_404();
        }

        $data['title'] = "Edit post";
        $this->load->view('templates/header');
        $this->load->view('posts/edit',$data);
        $this->load->view('templates/footer');
    }

    public function update() {
        $this->Post_Model->update();
        $this->session->set_flashdata('post_updated','You are post have been updated.');
        redirect('posts');
    }
}
?>