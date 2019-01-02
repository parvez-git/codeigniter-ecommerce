<?php

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model','product');

        $this->load->library('cart');
    }

    public function index()
    {
        $productdata = $this->product->getproducts();

        if ($productdata->num_rows() > 0) {
            $data['products'] = $productdata->result();
        } else {
            $data['products'] = [];
        }

        $this->load->view('frontend/index', $data);
    }

    public function product($slug)
    {
        $productdata = $this->product->single_product($slug);
        $data['product'] = $productdata->row();

        $this->load->view('frontend/single', $data);
    }
}
