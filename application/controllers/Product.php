<?php

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model', 'product');
    }

    public function index()
    {
        $productdata = $this->product->getproducts();
        
        if ($productdata->num_rows() > 0) {
            $data['products'] = $productdata->result();
        } else {
            $data['products'] = [];
        }

        $this->load->view('backend/products/index', $data);
    }


    public function create()
    {
        $this->load->model('Category_model', 'category');
        $categorydata = $this->category->getcategory();

        $data['categories'] = $categorydata->result();

        $this->load->view('backend/products/create', $data);
    }


    public function store()
    {
        $this->form_validation->set_rules('name', 'product name', 'trim|required|is_unique[product.name]|min_length[3]');
        $this->form_validation->set_rules('price', 'product price', 'trim|required|decimal');
        $this->form_validation->set_rules('category_id', 'product category id', 'trim|required|integer');
        $this->form_validation->set_rules('description', 'product description', 'trim|required|min_length[100]');

        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 1024;

        $this->load->library('upload', $config);

        if ($this->form_validation->run() && $this->upload->do_upload('image')) {

            $name = $this->input->post('name', true);
            $slug = url_title($name, 'dash', true);

            $imgdata = $this->upload->data();
            $image = $imgdata["file_name"];

            $data = array(
                'name'          => $name,
                'slug'          => $slug,
                'price'         => $this->input->post('price', true),
                'category_id'   => $this->input->post('category_id', true),
                'description'   => $this->input->post('description', true),
                'image'         => $image,
                'created_at'    => date('Y-m-d'),
            );

            $this->product->insertproduct($data);

            redirect(base_url('dashboard/products'));

        } else {
            $upload_error    = $this->upload->display_errors();
            $img_field_error = 'The product image field is required.';

            $msg_error['product_upload_error'] = $upload_error ? $upload_error : $img_field_error;
            $this->session->set_flashdata($msg_error);

            $this->create();
        }
    }


    public function edit($id)
    {
        $this->load->model('Category_model', 'category');
        $categorydata = $this->category->getcategory();
        $data['categories'] = $categorydata->result();

        $productdata = $this->product->editproduct($id);
        $data['product'] = $productdata->row();

        $this->load->view('backend/products/edit', $data);
    }


    public function update()
    {
        $this->form_validation->set_rules('name', 'product name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('price', 'product price', 'trim|required|decimal');
        $this->form_validation->set_rules('category_id', 'product category id', 'trim|required|integer');
        $this->form_validation->set_rules('description', 'product description', 'trim|required|min_length[100]');
        $this->form_validation->set_rules('product_id', 'product id', 'trim|required|integer');

        $id = $this->input->post('product_id', true);
        


        if ($this->form_validation->run()) {

            $name = $this->input->post('name', true);
            $slug = url_title($name, 'dash', true);

            $productprevimgdata = $this->product->editproduct($id);
            $previmgdata = $productprevimgdata->result();
            $previousimage = $previmgdata[0]->image;

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1024;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $imgdata = $this->upload->data();
                $image   = $imgdata["file_name"];

                unlink('uploads/' . $previousimage);

            } else {
                $image = $previousimage;
            }


            $data = array(
                'name'          => $name,
                'slug'          => $slug,
                'price'         => $this->input->post('price', true),
                'category_id'   => $this->input->post('category_id', true),
                'description'   => $this->input->post('description', true),
                'image'         => $image,
                'created_at'    => date('Y-m-d'),
            );

            $this->product->updateproduct($id, $data);

            redirect(base_url('dashboard/products'));

        } else {
            $msg_error['product_upload_error'] = $this->upload->display_errors();
            $this->session->set_flashdata($msg_error);
            $this->edit($id);
        }
    }


    public function delete($id)
    {
        $productprevimgdata = $this->product->editproduct($id);
        $previmgdata = $productprevimgdata->result();
        $previousimage = $previmgdata[0]->image;

        unlink('uploads/' . $previousimage);

        $this->product->delete_product_id($id);

        redirect(base_url('dashboard/products'));
    }
}
