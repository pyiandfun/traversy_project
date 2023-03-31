<?php 
    class Post_Model extends CI_Model  {
        public function __construct() {
            $this->load->database();
        }

        public function index() {

        }

        public function get_posts($slug = FALSE,$limit = FALSE, $offset = 1) {
            if($offset){
                $this->db->limit($limit,$offset);
            }
            
            if($slug === FALSE) {
                $this->db->select('*');
                $this->db->join('categories','categories.id = posts.id');
                $this->db->order_by('posts.id','DESC');
                $query = $this->db->get('posts');
                return $query->result_array();
            }
            $query= $this->db->get_where('posts',array('slug' => $slug));
            return $query->row_array();
        }

        public function create_post() {
            $user_creditinal = $this->session->userdata('user_id');
            var_dump($user_creditinal);die;
            $slug = url_title($this->input->post('title'));
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id'),
                'user_id' => $this->session->userdata('user_id'),
                'img' => $this->input->post('img')
            );
            return $this->db->insert('posts',$data);
        }

        public function delete_post($id) {
            $this->db->where('id',$id);
            $this->db->delete('posts');
            return true;
        }

        public function edit($slug) {
            $data = array(
                'title' => $this->input->post('title'),
                'category' => $this->input->post('category'),
                'slug' => $slug,
                'category_id' => $this->input->post('category_id'),
                'body' => $this->input->post('body'),
                'img' => $this->input->post('img'),
                'category_id' => $this->input->post('category_id')
            );

            $id = $this->input->post('id');
            $this->db->where('id',$id);
            return $this->db->update('posts',$data);
        }

        public function update() {
            $slug = url_title($this->input->post('title'));
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'img' => $this->input->post('img'),
                'category_id' => $this->input->post('category_id')
            );
            $id = $this->input->post('id');
            $this->db->where('id',$id);
            return $this->db->update('posts',$data);
        }

        public function get_categories() {
            $query = $this->db->get('categories');
            $this->db->order_by('category_name');
            return $query ->result_array();
        }

        public function get_post_by_category($category_id) {
            $this->db->join('categories','categories.id = posts.category_id');
            $query = $this->db->get_where('posts',array('category_id' => $category_id));
            $this->db->order_by('posts.id','DESC');
            return $query->result_array();
        }
    }
?>