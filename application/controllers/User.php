<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends CI_Controller {

    private function set_client($client_id) {
        $sess_array = array('client_id' => $client_id);
        $this->session->set_userdata('accountsess', $sess_array);
    }

    public function signin() {
        $this->load->view('user/signin_view');
    }

    public function signup() {
        $this->load->view('user/signup_view');
    }

    function sign_up() {

        $this->form_validation->set_rules('exampleInputName', 'Username', 'trim|required|max_length[15]|alpha_dash|is_unique[users.user_name]');
        $this->form_validation->set_rules('exampleInputEmail', 'Email', 'trim|required|valid_email|is_unique[users.user_email]');
        $this->form_validation->set_rules('exampleInputPassword', 'Password', 'trim|required|min_length[8]');
        if ($this->form_validation->run() == false) {
            $this->signup();
        } else {
            $client_id = $this->crud->write('users', array(
                'user_name' => $this->input->post('exampleInputName'),
                'user_email' => $this->input->post('exampleInputEmail'),
                'user_password' => do_hash($this->input->post('exampleInputPassword'))
            ));

            $this->set_client($client_id);
            
            $points_data = array(
                'user_id'=> $client_id,
                'total_points' => 0
            );
            
            $this->crud->write('points', $points_data);

            $this->session->set_flashdata('success', 'Welcome to Stanzascoop ' . $this->input->post('exampleInputName'));
            redirect(base_url());
        }
    }

    public function sign_in() {
        $this->form_validation->set_rules('exampleInputEmail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('exampleInputPassword', 'Password', 'trim|required|callback_check_database');


        if ($this->form_validation->run() == FALSE) {
            $this->signin();
        } else {
            redirect(base_url());
        }
    }

    function check_database($password) {
        $exampleInputEmail = $this->input->post('exampleInputEmail');

        $result = $this->crud->read_records('users', array('user_email' => $exampleInputEmail, 'user_password' => do_hash($password), 'deleted' => FALSE));
        if ($result) {
            foreach ($result as $row) {
                $this->set_client($row->user_id);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', "The details you entered did not match our records or your account is inactive. Cross-check and try again.");
            return false;
        }
    }

    function logout() {

        $this->session->unsetuserdata['accountsess'];
        $this->session->sess_destroy();

        redirect(base_url());
    }

    function user_profile($username) {
        $total_data = count($this->crud->read_records('lyrics', array('deleted' => FALSE)));
        $content_per_page = 10;

        $user_data = $this->crud->read_one('users', array('user_name' => $username, 'deleted' => FALSE));

        $data = array(
            'genres' => $this->crud->read_records('genre', array('deleted' => FALSE)),
            'total_data' => ceil($total_data / $content_per_page),
            'thisuserdata' => $user_data
        );

        $this->load->view('user_profile', $data);
    }
    
    
    public function loadmore($user_id) {
        $group_no = $this->input->post('group_no');
        $content_per_page = 10;
        $start = ceil($group_no * $content_per_page);
        $all_content = $this->crud->get_all_user($start, $content_per_page, 'lyric_view', $user_id);
        if (isset($all_content) && is_array($all_content) && count($all_content)) :
            foreach ($all_content as $lrow):
                $this->crud->read_one('artists', array('user_name' => $lrow->lyric_artist))['full_name'];
                if ($lrow->lyric_ft != NULL) {
                    //echo ', ' . $lrow->lyric_ft;
                    $artists = $this->crud->read_one('artists', array('user_name' => $lrow->lyric_artist))['full_name'] . ' ft ' . $lrow->lyric_ft;
                } else {
                    $artists = $this->crud->read_one('artists', array('user_name' => $lrow->lyric_artist))['full_name'];
                }
                echo '
                <li>
                    <div class="item_54fdd" data-test="post-item-103510">
                        <a class="link_523b9" href="' . base_url('lyrics/' . $lrow->lyric_url) . '">
                            <div class="thumbnail_f9ee1 thumbnail_9832a" data-test="post-thumbnail">
                                <div class="container_74c20" style="height: 80px; width: 80px;">
                                    <div class="container_c89a5 lazyLoadContainer_b1038">
                                        <img src="' . base_url('covers/' . $lrow->lyric_cover) . '" width="80" height="80" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="content_31491">
                                <div class="title_9ddaf featured_ea308 default_029ca base_e2db5">' . $lrow->lyric_title . '</div>
                                <div class="tagline_619b7 text_47b37 subtle_8ea23 base_e2db5">
                                    ' . $artists . '
                                </div>
                            </div>
                        </a>
                        <div class="meta_f09e7">
                            <div class="info_0f1c7 hidden-sm hidden-xs">
                                <div>
                                    <span class="button_53e93 secondaryText_97b90">
                                        <a title="' . $lrow->lyric_genre . '" href="' . base_url('genre/' . $lrow->lyric_genre) . '">
                                            ' . $this->crud->read_one('genre', array('genre_code' => $lrow->lyric_genre))['genre_name'] . '
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="actions_c6d87">
                                <button class="button_30e5c smallSize_5216f secondaryText_97b90 simpleVariant_8a863 button_e47d2">
                                    <div class="buttonContainer_b6eb3">
                                        <div class="postVoteArrow_e4dee"></div>
                                        ' . $lrow->lyric_view . '
                                    </div>
                                </button>

                                <button class="button_30e5c smallSize_5216f secondaryText_97b90 simpleVariant_8a863 button_e47d2 dropdown-toggle" data-toggle="dropdown">
                                    <div class="buttonContainer_b6eb3">
                                        <i class="i i-share3"></i>
                                        Share
                                    </div>
                                </button>
                                <ul class="dropdown-menu lyrics-share">
                                    <li><a target="_blank" href="https://www.facebook.com/share.php?u=' . base_url('lyrics/' . $lrow->lyric_url) . '" class="color-facebook"><i class="i i-facebook"></i> Share</a></li>
                                    <li><a target="_blank" href="https://twitter.com/intent/tweet?text=' . $lrow->lyric_title . ' lyrics by ' . $artists . '&url=' . base_url('lyrics/' . $lrow->lyric_url) . '&via=Stanzascoop&original_referer=' . base_url('lyrics/' . $lrow->lyric_url) . '" class="color-twitter"><i class="i i-twitter"></i> Tweet</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>';
            endforeach;
        endif;
    }

    function profile_update() {


        $this->form_validation->set_rules('user_full', 'Name', 'trim|required');
        $this->form_validation->set_rules('user_bio', 'Bio', 'trim|required');

        $config['upload_path'] = './avis/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 6100;
        $config['max_width'] = 10240;
        $config['max_height'] = 17680;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $user_data = $this->crud->read_one('users', array('user_id' => $this->sess->check_account(), 'deleted' => FALSE));

        if (!$this->upload->do_upload('userfile') | $this->form_validation->run() == false) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            $this->user_profile($user_data['user_name']);
        } else {
            $data = array(
                'full_name' => $this->input->post('user_full'),
                'user_bio' => $this->input->post('user_bio'),
                'user_photo' => base_url('avis/'.$this->upload->data('file_name'))
            );
            $this->db->where('user_id', $this->sess->check_account());
            $this->db->update('users', $data);

            $this->session->set_flashdata('success', 'Successfuly updated profile');
            redirect('@' . $user_data['user_name']);
        }
    }

}
