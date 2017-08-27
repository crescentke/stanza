<html>
    <body>
        <div id="container">
            <h1>Codeigniter Pagination Infinite Scroll</h1>
            <div id="body">
                <ol> <div id="results"></div></ol>
            </div>   
            <button id="loadmore">Load more</button>
        </div>
    </body>';$this->crud->read_one('artists', array('user_name' => $lrow->lyric_artist))['full_name'];
                                    if ($lrow->lyric_ft != NULL) {
                                        echo ', ' . $lrow->lyric_ft;
                                        $artists = $this->crud->read_one('artists', array('user_name' => $lrow->lyric_artist))['full_name'] . ' ft ' . $lrow->lyric_ft;
                                    } else {
                                        $artists = $this->crud->read_one('artists', array('user_name' => $lrow->lyric_artist))['full_name'];
                                    }
                                    '
</html>

<script src="<?= base_url('ss/js/jquery.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var total_record = 0;
        var total_groups = <?php echo $total_data; ?>;
        $('#results').load("<?php echo base_url() ?>welcome/load_more",
                {'group_no': total_record}, function () {
            total_record++;
            
        });
            alert(total_groups);
        $('#loadmore').on('click', function () {
            alert(total_groups);
            if (total_record <= total_groups)
            {
                loading = true;
                $('.loader_image').show();
                $.post('<?php echo site_url() ?>welcome/load_more', {'group_no': total_record},
                function (data) {
                    if (data != "") {
                        $("#results").append(data);
                        $('.loader_image').hide();
                        total_record++;
                    }
                });
            }
        });

//        $(window).scroll(function () {
//            //if ($(window).scrollTop() + $(window).height() == $(document).height())
//            
//            
//        });
    });
</script>