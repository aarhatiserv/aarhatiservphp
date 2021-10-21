<?php defined('BASEPATH') or exit('No direct script access allowed');

class Api_controller extends Home_Core_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->comment_limit = 5;
    }

    public function index(){
        get_method();
        // $data['title'] = $this->settings->home_title;
        // $data['description'] = $this->settings->site_description;
        // $data['keywords'] = $this->settings->keywords;
        // $data['home_title'] = $this->settings->home_title;
        

        //slider posts
        // $this->slider_posts = get_cached_data('slider_posts');
        // if (empty($this->slider_posts)) {
        //     $this->slider_posts = $this->post_model->get_slider_posts();
        //     set_cache_data('slider_posts', $this->slider_posts);
        // }

        // $count_key = 'posts_count';
        // $posts_key = 'posts';
        // //posts count
        // $total_rows = get_cached_data($count_key);
        // if (empty($total_rows)) {
        //     $total_rows = $this->post_model->get_post_count();
        //     set_cache_data($count_key, $total_rows);
        // }
        // //set paginated
        // $pagination = $this->paginate(lang_base_url(), $total_rows);
        // $data['posts'] = get_cached_data($posts_key . '_page' . $pagination['current_page']);
        // if (empty($data['posts'])) {
        //     $data['posts'] = $this->post_model->get_paginated_posts($pagination['per_page'], $pagination['offset']);
        //     set_cache_data($posts_key . '_page' . $pagination['current_page'], $data['posts']);
        // }
        $data['posts'] = $this->post_model->get_api_posts();
        
        // print_r($data);
        // echo json_encode($data);
        $this->load->library('bcrypt');
        $data = array(
            'password' => $this->bcrypt->hash_password("Greddy@123")
        );
        print_r($data);
        // $this->load->view('partials/_header', $data);
        // $this->load->view('index', $data);
        // $this->load->view('partials/_footer');
    }
}

