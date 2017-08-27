<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Crud extends CI_Model {

    function write($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function user_login($email, $password) {
        $this->db->where('user_email', $email);
        $this->db->where('user_password', do_hash($password));
        $this->db->where('deleted', 0);
        $this->db->limit(1);
        $get_result = $this->db->get('users');
        return $get_result->result();
    }

    function read_one($table, $paramArray) {
        $query = $this->db->get_where($table, $paramArray);
        return $query->row_array();
    }

    function read_records($table, $paramArray) {
        $this->db->where($paramArray);
        return $this->db->get($table)->result();
    }

    function read_recent_records($table, $paramArray, $column) {
        $this->db->where($paramArray);
        $this->db->order_by($column, 'desc');
        return $this->db->get($table)->result();
    }

    function read_limit($table, $paramArray, $column, $offset) {
        $this->db->where($paramArray);
        $this->db->order_by($column, 'desc');
        $this->db->limit($offset);
        return $this->db->get($table)->result();
    }

    function get_all_filter($start, $content_per_page, $orderby) {
        $sql = "SELECT * FROM  ss_lyrics ORDER BY $orderby DESC LIMIT $start,$content_per_page";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    function get_all_genre($start, $content_per_page, $orderby, $genre) {
        $sql = "SELECT * FROM  ss_lyrics WHERE lyric_genre='$genre' ORDER BY $orderby DESC LIMIT $start,$content_per_page";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    function get_all_user($start, $content_per_page, $orderby, $user) {
        $sql = "SELECT * FROM  ss_lyrics WHERE added_by='$user' ORDER BY $orderby DESC LIMIT $start,$content_per_page";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    function search_count($q) {
        $this->db->like('lyric_title', $q);
        $this->db->or_like('lyric_artist', $q);
        return $this->db->get('lyrics')->result();
    }

    function get_all_search($start, $content_per_page, $orderby, $q) {
        $sql = "SELECT * FROM  ss_lyrics WHERE `lyric_title` LIKE '%$q%' ESCAPE '!' OR `lyric_artist` LIKE '%$q%' ESCAPE '!'  ORDER BY $orderby DESC LIMIT $start,$content_per_page";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    function all_artists($filter) {
        $sql = "SELECT * FROM  ss_artists WHERE full_name LIKE '".$filter."%'";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    function get_all_artist($start, $content_per_page, $filter) {
        $sql = "SELECT * FROM  ss_artists WHERE full_name LIKE '".$filter."%' LIMIT $start,$content_per_page";
        $result = $this->db->query($sql)->result();
        return $result;
    }

}
