<?php 

class Product_model extends CI_Model
{
    public function getproducts() {

        $this->db->select('
            product.id as id,
            product.name,
            product.slug,
            product.image,
            product.price, 
            category.name as category_name
        ');
        $this->db->from('product');
        $this->db->join('category', 'category.id = product.category_id');
        return $this->db->get();
    }

    public function insertproduct($data)
    {
        $this->db->insert('product', $data);
    }

    public function editproduct($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('product');
    }

    public function updateproduct($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('product', $data);
    }

    public function delete_product_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('product');
    }

    public function single_product($slug)
    {
        $this->db->select('
        product.id as id,
        product.name,
        product.slug,
        product.image,
        product.price, 
        product.description, 
        product.category_id, 
        category.slug as category_slug,
        category.name as category_name
        ');
        $this->db->from('product');
        $this->db->join('category', 'category.id = product.category_id');
        $this->db->where('product.slug', $slug);
        return $this->db->get();
    }
}
