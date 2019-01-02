<?php

class User_model extends CI_Model
{
    private $tablename = 'users';

    public function userdata()
    {
        $query = $this->db->get($this->tablename);
        return $query->result();
    }

    public function userregister($name, $email, $password)
    {
        $this->db->set('name', $name);
        $this->db->set('email', $email);
        $this->db->set('password', $password);

        return $this->db->insert($this->tablename);
    }

    public function userlogin($email, $password)
    {
        $query = $this->db->get_where($this->tablename, ['email' => $email, 'password' => $password]);

        if ($query->num_rows() > 0) {

            return true;
        }
        return false;
    }
}
