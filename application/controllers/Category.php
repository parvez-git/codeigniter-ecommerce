<?php

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('Category_model', 'category');
        $categorydata = $this->category->getcategory();

        if ($categorydata->num_rows() > 0) {
            $data['categories'] = $categorydata->result();
        } else {
            $data['categories'] = [];
        }

        $this->load->view('backend/category/index', $data);
    }

    public function create_category()
    {
        $this->load->view('backend/category/create');
    }

    public function store_category()
    {
        $this->form_validation->set_rules('name', 'category name', 'trim|required|is_unique[category.name]|min_length[3]');

        if($this->form_validation->run()){

            $catname = $this->input->post('name');
            $catslug = url_title($catname, 'dash', TRUE);

            $data = array(
                'name'          => $catname,
                'slug'          => $catslug,
                'created_at'    => date('Y-m-d')
            );

            $this->load->model('Category_model','category');
            $this->category->insertcategory($data);

            redirect(base_url('dashboard/category'));

        } else {
            $this->load->view('backend/category/create');
        }
    }
}
