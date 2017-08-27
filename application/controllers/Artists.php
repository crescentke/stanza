<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Artists extends CI_Controller {

    public function filter($type) {
        $total_data = count($this->crud->all_artists($type));
        $content_per_page = 10;


        $data = array(
            'genres' => $this->crud->read_records('genre', array('deleted' => FALSE)),
            'total_data' => ceil($total_data / $content_per_page),
            'pagination_lyrics' => $this->pagination->create_links(),
            'filtertype' => $type,
            'filter_title' => "Filter artists",
            'filter_subtitle' => "Artists under index <b>$type</b>",
        );
        $this->load->view('artists_view', $data);
    }

    public function loadfilter($filtertype) {

        $group_no = $this->input->post('group_no');
        $content_per_page = 10;
        $start = ceil($group_no * $content_per_page);
        $num = $start + 1;
        $all_content = $this->crud->get_all_artist($start, $content_per_page, $filtertype);
        if (isset($all_content) && is_array($all_content) && count($all_content)) :
            foreach ($all_content as $lrow):
                $artist_lyrics = $this->crud->read_records('lyrics', array('lyric_artist' => $lrow->user_name));
                $artist_cover = base_url('avis/'.$lrow->artist_photo);

                if (strlen($num) < 2) {
                    $count_pos = "0$num";
                } else {
                    $count_pos = $num;
                }
                echo '
                <li>
                    <div class="item_54fdd" data-test="post-item-103510">
                        <a class="link_523b9" href="' . base_url('artist/' . $lrow->user_name) . '">
                            <span class="num-position">' . $count_pos . '</span>
                            <div class="thumbnail_f9ee1 thumbnail_9832a" data-test="post-thumbnail">
                                <div class="container_74c20" style="">
                                    <div class="container_c89a5 lazyLoadContainer_b1038">
                                        <img src="' . $artist_cover . '" width="80" height="80" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="content_31491">
                                <div class="title_9ddaf featured_ea308 default_029ca base_e2db5">' . $lrow->full_name . '</div>
                                <div class="tagline_619b7 text_47b37 subtle_8ea23 base_e2db5">
                                    ' . number_format(count($this->crud->read_records('lyrics', array('lyric_artist' => $lrow->user_name)))) . ' lyrics
                                </div>
                            </div>
                        </a>
                    </div>
                </li>';
                $num++;
            endforeach;
        endif;
    }

}
