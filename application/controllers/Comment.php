<?php
Class Comment extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Post_Model");
        $this->load->model("Comment_Model");
    }

    public function create($post_id) {
        $slug = $this->input->post('slug');
        $data['post'] = $this->Post_Model->get_posts($slug);

        $this->form_validation->set_rules('name','Name','Required');
        $this->form_validation->set_rules('email','Email','Required');
        $this->form_validation->set_rules('email','Email','valid_email');
        $this->form_validation->set_rules('body','Body','Required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('posts/view',$data);
            $this->load->view('templates/footer');
        } else {
            $this->Comment_Model->create_comment($post_id);
            redirect('posts/'.$slug);
        }
    }

    public function get_comments($post_id) {

    }

}
?>