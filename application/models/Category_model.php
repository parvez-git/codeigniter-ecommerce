<?php 

class Category_model extends CI_Model
{
    public function getcategory() {

        return $this->db->get('category');
    }

    public function insertcategory($data)
    {
        $this->db->insert('category', $data);
    }
}