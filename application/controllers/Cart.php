<?php 

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('cart');
    }

    public function add_to_cart()
    {
        $data = array(
            'id'      => $this->input->post('id', true),
            'qty'     => $this->input->post('qty', true),
            'price'   => $this->input->post('price', true),
            'name'    => $this->input->post('name', true),
            'options' => array('image' => $this->input->post('image', true))
        );
        
        $this->cart->insert($data);
        redirect(base_url('/cart'));

    }

    public function update_cart()
    {
        $data = array(
            'rowid' => $this->input->post('rowid', true),
            'qty'   => $this->input->post('qty', true)
        );
        
        $this->cart->update($data);
        redirect(base_url('/cart'));
    }

    public function remove_cart()
    {
        $rowid = $this->input->post('rowid', true);
        
        $this->cart->remove($rowid);
        redirect(base_url('/cart'));
    }

    public function destroy_cart()
    {
        $this->cart->destroy();
        redirect(base_url('/cart'));
    }


    public function view_cart()
    {
        $this->load->view('frontend/cart');

        // echo '<pre>';
        // print_r($this->cart->contents());
        // echo '</pre>';
        // exit();
    }

    public function checkout()
    {
        $this->load->view('frontend/checkout');
    }
}
