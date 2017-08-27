<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

     public function index(){
       $data = array(
           'genres' => $this->crud->read_records('genre', array('deleted' => FALSE)),
           'indextop' => $this->crud->read_limit('lyrics', array('deleted' => FALSE), 'lyric_view', 3),
           'indexnew' => $this->crud->read_limit('lyrics', array('deleted' => FALSE), 'lyric_id', 6),
           'indexcom' => $this->crud->read_limit('users', array('deleted' => FALSE), 'user_id', 15)
       );
       $this->load->view('welcome_view', $data);
     }

    public function indexpage() {
        $total_data = count($this->crud->read_records('lyrics', array('deleted' => FALSE)));
        $content_per_page = 10;


        $data = array(
            'genres' => $this->crud->read_records('genre', array('deleted' => FALSE)),
            'total_data' => ceil($total_data / $content_per_page)
        );
        $this->load->view('home_view', $data);
    }

    public function loadmore() {
        $group_no = $this->input->post('group_no');
        $content_per_page = 10;
        $start = ceil($group_no * $content_per_page);
        $all_content = $this->crud->get_all_filter($start, $content_per_page, 'lyric_view');
        $num = $start + 1;
        if (isset($all_content) && is_array($all_content) && count($all_content)) :
            foreach ($all_content as $lrow):
                if (strlen($num) < 2) {
                    $count_pos = "0$num";
                } else {
                    $count_pos = $num;
                }
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
                            <span class="num-position">' . $count_pos . '</span>
                            <div class="thumbnail_f9ee1 thumbnail_9832a" data-test="post-thumbnail">
                                <div class="container_74c20" style="">
                                    <div class="container_c89a5 lazyLoadContainer_b1038">
                                        <img src="' . base_url("covers/".$lrow->lyric_cover) . '" width="80" height="80" alt="">
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
                $num++;
            endforeach;
        endif;
    }

    public function filter($type) {
        if ($type == 'latest') {
            $total_data = count($this->crud->read_records('lyrics', array('deleted' => FALSE)));
            $content_per_page = 10;


            $data = array(
                'genres' => $this->crud->read_records('genre', array('deleted' => FALSE)),
                'total_data' => ceil($total_data / $content_per_page),
                'pagination_lyrics' => $this->pagination->create_links(),
                'filtertype' => $type,
                'filter_title' => "Latest lyrics",
                'filter_subtitle' => "Find the lyrics of the most recent songs on Stanzascoop",
                'top_active' => "",
                'latest_active' => "active"
            );
            $this->load->view('filter_view', $data);
        } elseif ($type == 'trending') {
            $this->indexpage();
        } else {
            redirect(base_url());
        }
    }

    public function loadfilter($filtertype) {
        if ($filtertype == "latest") {
            $orderby = 'lyric_id';
        } elseif ($filtertype == "trending") {
            $orderby = 'lyric_view';
        }
        $group_no = $this->input->post('group_no');
        $content_per_page = 10;
        $start = ceil($group_no * $content_per_page);
        $num = $start + 1;
        $all_content = $this->crud->get_all_filter($start, $content_per_page, $orderby);
        if (isset($all_content) && is_array($all_content) && count($all_content)) :
            foreach ($all_content as $lrow):
                if (strlen($num) < 2) {
                    $count_pos = "0$num";
                } else {
                    $count_pos = $num;
                }
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
                            <span class="num-position">' . $count_pos . '</span>
                            <div class="thumbnail_f9ee1 thumbnail_9832a" data-test="post-thumbnail">
                                <div class="container_74c20" style="">
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
                $num++;
            endforeach;
        endif;
    }

    function genre($genre) {
        $total_data = count($this->crud->read_records('lyrics', array('deleted' => FALSE, 'lyric_genre' => $genre)));
        $content_per_page = 10;

        $genre_details = $this->crud->read_one('genre', array('genre_code' => $genre));

        $data = array(
            'genres' => $this->crud->read_records('genre', array('deleted' => FALSE)),
            'total_data' => ceil($total_data / $content_per_page),
            'genre_name' => $genre_details['genre_name'],
            'genre_code' => $genre
        );
        $this->load->view('genre_view', $data);
    }

    public function loadgenre($genre) {
        $group_no = $this->input->post('group_no');
        $content_per_page = 10;
        $start = ceil($group_no * $content_per_page);
        $num = $start + 1;
        $all_content = $this->crud->get_all_genre($start, $content_per_page, 'lyric_view', $genre);
        if (isset($all_content) && is_array($all_content) && count($all_content)) :
            foreach ($all_content as $lrow):
              if (strlen($num) < 2) {
                  $count_pos = "0$num";
              } else {
                  $count_pos = $num;
              }
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
                            <span class="num-position">' . $count_pos . '</span>
                            <div class="thumbnail_f9ee1 thumbnail_9832a" data-test="post-thumbnail">
                                <div class="container_74c20" style="">
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
                $num++;
            endforeach;
        endif;
    }

    public function de() {
        $total_data = $this->crud->get_all_count();
        $content_per_page = 5;
        $this->data['total_data'] = ceil($total_data->tol_records / $content_per_page);
        $this->load->view('test_view', $this->data, FALSE);
    }

    public function load_more() {
        $group_no = $this->input->post('group_no');
        $content_per_page = 5;
        $start = ceil($group_no * $content_per_page);
        $all_content = $this->crud->get_all_filter($start, $content_per_page);
        if (isset($all_content) && is_array($all_content) && count($all_content)) :
            foreach ($all_content as $key => $content) :
                echo '<li>' . $content->lyric_title . '</li>';
                echo '<p>' . $content->lyric_content . '</p>';
            endforeach;
        endif;
    }

    public function signin() {
        $this->load->view('user/signin_view');
    }

    public function signup() {
        $this->load->view('user/signup_view');
    }

    public function write_lyric() {
        if ($this->sess->check_sess()) {
            $this->load->view('write_view');
        } else {
            redirect('login');
        }
    }

    function new_artist() {
        $this->form_validation->set_rules('aname', 'Artist name', 'trim|required|is_unique[artists.full_name]');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'status' => 'false',
                'error' => validation_errors()
            );
            echo json_encode($data);
        } else {
            $data = array(
                'full_name' => $this->input->post('aname'),
                'user_name' => url_title($this->input->post('aname'), 'dash', TRUE)
            );

            $this->crud->write('artists', $data);

            $jsondata = array(
                'status' => 'success'
            );
            $this->session->set_flashdata('success', 'Successfuly added <b>' . $this->input->post('aname') . '</b> as an artist on Stanzascoop');
            echo json_encode($jsondata);
        }
    }

    function new_genre() {
        $this->form_validation->set_rules('gname', 'Genre name', 'trim|required|is_unique[genre.genre_name]');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'status' => 'false',
                'error' => validation_errors()
            );
            echo json_encode($data);
        } else {
            $data = array(
                'genre_name' => $this->input->post('gname'),
                'genre_code' => url_title($this->input->post('gname'), 'dash', TRUE)
            );

            $this->crud->write('genre', $data);

            $jsondata = array(
                'status' => 'success'
            );
            $this->session->set_flashdata('success', 'Successfuly added <b>' . $this->input->post('gname') . '</b> as a genre on Stanzascoop');
            echo json_encode($jsondata);
        }
    }

    function upload_lyrics() {


        $this->form_validation->set_rules('songTitle', 'Song title', 'trim|required');
        $this->form_validation->set_rules('songArtist', 'Song artist', 'trim|required');
        $this->form_validation->set_rules('songArtists', 'Featured artists', 'trim');
        $this->form_validation->set_rules('songGenre', 'Song genre', 'trim|required');
        $this->form_validation->set_rules('songLyrics', 'Song lyrics', 'trim|required');

        $config['upload_path'] = './covers/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 6100;
        $config['max_width'] = 10240;
        $config['max_height'] = 17680;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile') | $this->form_validation->run() == false) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            $this->write_lyric();
        } else {
            $this->crud->write('lyrics', array(
                'lyric_title' => $this->input->post('songTitle'),
                'lyric_artist' => $this->input->post('songArtist'),
                'lyric_ft' => $this->input->post('songArtists'),
                'lyric_genre' => $this->input->post('songGenre'),
                'lyric_cover' => $this->upload->data('file_name'),
                'lyric_content' => $this->input->post('songLyrics'),
                'added_by' => $this->sess->check_account(),
                'lyric_url' => url_title($this->input->post('songTitle'), 'dash', TRUE) . '-' . url_title($this->input->post('songArtist'), 'dash', TRUE) . '-' . rand(000000, 999999)
            ));

            $current_points = $this->crud->read_one('points', array('user_id' => $this->sess->check_account()))['total_points'];
            $add_points = array(
                'total_points' => $current_points + 2
            );
            $this->db->where('user_id', $this->sess->check_account());
            $this->db->update('points', $add_points);

            $this->session->set_flashdata('success', 'Successfuly published <b>' . $this->input->post('songTitle') . '</b> lyrics on Stanzascoop');
            redirect(base_url());
        }
    }

    function view_lyrics($lyric_url) {

        $current_view = $this->crud->read_one('lyrics', array('lyric_url' => $lyric_url))['lyric_view'];
        $lyric_data = $this->crud->read_one('lyrics', array('lyric_url' => $lyric_url));

        $add_view = array(
            'lyric_view' => $current_view + 1
        );
        $this->db->where('lyric_id', $lyric_data['lyric_id']);
        $this->db->update('lyrics', $add_view);

        $this->db->where('lyric_genre', $lyric_data['lyric_genre']);
        $this->db->where('lyric_id !=', $lyric_data['lyric_id']);
        $this->db->order_by('lyric_id');
        $this->db->limit(5);
        $more_similar = $this->db->get('lyrics')->result();

        $data = array(
            'similar' => $more_similar,
            'lyric' => $lyric_data);
        $this->load->view('viewlyric_view', $data);
    }

    function req_lyric() {
        $this->form_validation->set_rules('reqlyrics', 'Request', 'trim|required|is_unique[requests.request_info]');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'status' => 'false',
                'error' => validation_errors()
            );
            echo json_encode($data);
        } else {
            $data = array(
                'request_info' => $this->input->post('reqlyrics')
            );

            $this->crud->write('requests', $data);

            $jsondata = array(
                'status' => 'success',
                'success' => 'Your request has been submitted and will be attended to ' . parse_smileys(';)', base_url('smileys/'))
            );
            echo json_encode($jsondata);
        }
    }

    function search() {
        $q = $this->input->get('q');

        $total_data = count($this->crud->search_count($q));
        $content_per_page = 10;

        $data = array(
            'genres' => $this->crud->read_records('genre', array('deleted' => FALSE)),
            'total_data' => ceil($total_data / $content_per_page),
            'search_tag' => $q
        );
        $this->load->view('search_view', $data);
    }

    public function loadsearch($qq) {
        $q = str_replace('+', ' ', urldecode($qq));

        $group_no = $this->input->post('group_no');
        $content_per_page = 10;
        $start = ceil($group_no * $content_per_page);
        $all_content = $this->crud->get_all_search($start, $content_per_page, 'lyric_view', $q);
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
                                <div class="container_74c20" style="">
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

    function apps_view() {
        $this->load->view('apps_view');
    }

    function about_view() {
        $this->load->view('about_view');
    }

    function correct_lyrics($lyric_url) {

        $lyric_data = $this->crud->read_one('lyrics', array('lyric_url' => $lyric_url));


        $this->db->where('lyric_genre', $lyric_data['lyric_genre']);
        $this->db->where('lyric_id !=', $lyric_data['lyric_id']);
        $this->db->order_by('lyric_id');
        $this->db->limit(8);
        $more_similar = $this->db->get('lyrics')->result();

        $data = array(
            'similar' => $more_similar,
            'lyric' => $lyric_data);
        $this->load->view('editlyric_view', $data);
    }

    function update_lyrics() {
        $this->form_validation->set_rules('el_code', 'Lyrics code', 'trim|required');
        $this->form_validation->set_rules('el_content', 'Content', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->correct_lyrics($this->input->post('el_code'));
        } else {
            $data = array(
                'lyric_content' => $this->input->post('el_content')
            );

            $this->db->where('lyric_url', $this->input->post('el_code'));
            $this->db->update('lyrics', $data);


            $this->session->set_flashdata('success', 'Successfuly corrected lyrics');
            redirect('lyrics/' . $this->input->post('el_code'));
        }
    }

}
