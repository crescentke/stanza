<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Sess extends CI_Model {

    function check_sess() {
        if ($this->session->userdata('accountsess')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function check_account() {
        $session_data = $this->session->userdata('accountsess');
        $userId = $session_data['client_id'];

        return $userId;
    }

}
