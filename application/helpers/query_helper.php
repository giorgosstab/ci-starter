<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Check if the function does not exists
if ( ! function_exists('query'))
{
    // Slugify a string
    function query($model, $table, $id_prefix, $id)
    {
        // Get an instance of $this
        $ci =& get_instance(); 

        $ci->load->database();
        $ci->load->model($model);

        if ($id != NULL) {
            $ci->db->select('*')->from($table)->where($id_prefix.'id', $id);
            $query = $ci->db->get();
            return $query->row();
        } else {
            return '';
        }
    }
}