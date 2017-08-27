<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $thisuserdata['user_name'] ?>'s profile on Stanzascoop</title>

        <!-- Bootstrap/CSS/Fonts -->
        <link rel="stylesheet" href="<?= base_url('ss/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('ss/css/icons.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('ss/css/ss.min.css'); ?>">

        <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url('ss/images/favicon/apple-icon-57x57.png'); ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url('ss/images/favicon/apple-icon-60x60.png'); ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('ss/images/favicon/apple-icon-72x72.png'); ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('ss/images/favicon/apple-icon-76x76.png'); ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('ss/images/favicon/apple-icon-114x114.png'); ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('ss/images/favicon/apple-icon-120x120.png'); ?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url('ss/images/favicon/apple-icon-144x144.png'); ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('ss/images/favicon/apple-icon-152x152.png'); ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('ss/images/favicon/apple-icon-180x180.png'); ?>">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?= base_url('ss/images/favicon/android-icon-192x192.png'); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('ss/images/favicon/favicon-32x32.png'); ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('ss/images/favicon/favicon-96x96.png'); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('ss/images/favicon/favicon-16x16.png'); ?>">
        <link rel="manifest" href="<?= base_url('ss/images/favicon/manifest.json'); ?>">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?= base_url('ss/images/favicon/ms-icon-144x144.png'); ?>">
        <meta name="theme-color" content="#ffffff">
    </head>
    <body style="background: #f7f7f7">


        <?php $this->load->view('header_view'); ?>

        <div class="black-wrapper" 
                        style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)),
                        url(<?= $thisuserdata['user_photo']; ?>);">

            <div class="container">
                <?php
                $points = $this->crud->read_one('points', array('user_id' => $thisuserdata['user_id']))['total_points'];
                ?>
                <header class="backgroundImage_33eb0 header_3ef8a">
                    <span class="user-image image_d50aa v-big hidden-sm hidden-xs">
                        <div class="container_74c20 user-image--image" style="height: 140px; width: 140px;">
                            <div class="container_c89a5 lazyLoadContainer_b1038">
                                <img src="<?= $thisuserdata['user_photo']; ?>" width="140" height="140">
                            </div>
                            <div style="width: 140px; height: 140px;"></div>
                        </div>
                        <div class="user-image--badge v-maker">
                            <?php
                            if ($points == 0) {
                                $badge = "V";
                            } elseif ($points > 0 & $points < 100) {
                                $badge = "L";
                            } elseif ($points > 100 & $points < 200) {
                                $badge = "B";
                            } elseif ($points > 200 & $points < 600) {
                                $badge = "S";
                            } elseif ($points > 600) {
                                $badge = "G";
                            } else {
                                $badge = "V";
                            }

                            echo $badge;
                            ?>

                        </div>
                    </span>
                    <div class="info_80cfb">
                        <div class="primary_16ac4">
                            <h1 class="headline_7b4900 inverse_dcac5 base_e2db5"><?= $thisuserdata['full_name']; ?></h1>
                        </div>
                        <h2 class="username_96d6a featured_ea308 inverse_dcac5 base_e2db5">
                            @<?= $thisuserdata['user_name']; ?>
                        </h2>
                        <p class="secondary_e2a59 text_47b37 inverse_dcac5 base_e2db5">
                            <?= $thisuserdata['user_bio']; ?>
                        </p>
                    </div>
                    <div class="social_0e825">
                        <a class="counter_76eeb text_47b37 inverse_dcac5 base_e2db5">
                            <?php
                            if (isset($points)) {
                                ?>
                                <strong><?= number_format($points) ?></strong>
                                Points
                            <?php }
                            ?>
                        </a>
                        <?php
                        if ($this->sess->check_account() == $thisuserdata['user_id']) {
                            ?>
                            <button class="button_30e5c mediumSize_c215f secondaryBoldText_ec36e secondaryText_97b90 simpleVariant_8a863" data-toggle="modal" data-target="#profileModal">
                                <div class="buttonContainer_b6eb3">Edit Profile</div>
                            </button>
                            <?php
                        }
                        ?>
                    </div>
                </header>


                <!-- Modal -->
                <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content text-center">
                            <form enctype="multipart/form-data" method="post" accept-charset="utf-8" action="<?= base_url('profile/update'); ?>" id="profileUpdate">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="songCover" class="control-label hidden">Profile photo</label>
                                        <div class="form-group">
                                            <label for="user-avi">
                                                <img id="blah" alt="" class="avi-rounded-two" src="<?= $thisuserdata['user_photo']; ?>" height="60" width="60">
                                            </label>

                                            <input class="hidden" id="user-avi" type="file" name="userfile" size="20" onchange="readURL(this);" />

                                            <br/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="">
                                            <input type="text" class="form-control" id="user_full" name="user_full" placeholder="Name" value="<?= $thisuserdata['full_name'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="">
                                            <textarea class="form-control" id="user_bio" name="user_bio" value="<?= $thisuserdata['user_bio'] ?>" placeholder="Bio" required="" style="height: 100px"><?= $thisuserdata['user_bio'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer profile">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container">        


            <?php $this->load->view('flashdata_view'); ?>

            <div class="row">


                <div class="col-md-2 hidden-sm hidden-xs">
                    <p class="user-badge">
                        <?php
                        if ($points == 0) {
                            $badge = "Viewer";
                        } elseif ($points > 0 & $points < 100) {
                            $badge = "Lyricist";
                        } elseif ($points > 100 & $points < 200) {
                            $badge = "Bronse";
                        } elseif ($points > 200 & $points < 600) {
                            $badge = "Silver";
                        } elseif ($points > 600) {
                            $badge = "Gold";
                        } else {
                            $badge = "Viewer";
                        }

                        echo $badge;
                        ?>'s badge
                    </p>
                    <a href="<?= base_url('@' . $thisuserdata['user_name']); ?>" class="current-stats">
                        <?= number_format(count($this->crud->read_records('lyrics', array('added_by' => $thisuserdata['user_id'])))); ?> Published
                    </a>

                </div>

                <div class="col-md-6">
                    <div class="result-panel" id="mylyrics">
                        <h1 class="fea-title">
                            <div>
                                <?= number_format(count($this->crud->read_records('lyrics', array('added_by' => $thisuserdata['user_id'])))); ?> 
                                Published
                            </div>
                        </h1>

                        <div class="lyrics">
                            <ul class="lyricsList" id="lyrresults">

                            </ul>

                            <?php
                            if (count($this->crud->read_records('lyrics', array('added_by' => $thisuserdata['user_id']))) <= 0) {
                                ?>
                                <div class="alert  alert-warning" style="margin: 10px 15px;">
                                    <?= $thisuserdata['user_name'] ?> has not added any lyrics
                                </div>
                                <br/>
                                <?php
                            }
                            ?>

                            <div class="loadmore">
                                <button id="loadmore">
                                    <span id="load">
                                        <span><svg width="12" height="7" viewBox="0 0 12 7" xmlns="http://www.w3.org/2000/svg"><path d="M5.998 6.244c-.255 0-.51-.098-.703-.292L1.048 1.705C.663 1.32.66.683 1.05.293 1.444-.1 2.073-.1 2.462.29L6 3.83 9.538.29c.384-.384 1.02-.388 1.412.003.393.393.39 1.023.002 1.412L6.705 5.952c-.192.192-.447.29-.702.29z" fill="#CCC8C7"></path></svg></span>

                                        Show more lyrics
                                    </span>
                                    <span id="loading" class="hidden">Scooping more lyrics...</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-error">
                        <div id="errorMessage">
                        </div>
                    </div>
                    <div class="request-panel">
                        <div class="cta_025cb">
                            <h3 class="headline_4c878 headline_7b490 default_029ca base_e2db5">
                                <span style="font-style:normal;font-weight:normal;">👋</span>
                                Request new lyrics
                            </h3>
                            <span class="tagline_4013e subtle_8ea23 base_e2db5">
                                Can't get your lyric? Submit a request now
                            </span>
                            <form class="form_c9530 subscribeForm_6c324 vertical_87f6a" id="reqform">
                                <div class="fieldWrap_b3b49">
                                    <input class="field_56e60 text_47b37 subtle_8ea23 base_e2db5" placeholder="Song name and artist" name="reqlyrics" id="reqlyrics" type="text">
                                </div>
                                <button class="button_30e5c orangeSolidColor_1132c mediumSize_c215f secondaryBoldText_ec36e secondaryText_97b90 orangeSolidColor_1132c solidVariant_0ef4d" type="submit">
                                    <div class="buttonContainer_b6eb3">Send Request</div>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div id="genres-box" class="box box-style-plain hidden-sm hidden-xs">
                        <div class="box-header">
                            <h3 class="box-title">Music genre list</h3>
                            <div class="actions"></div>
                        </div>
                        <div class="box-content">
                            <ul class="filters genres">
                                <?php
                                if (count($genres) > 0) {
                                    foreach ($genres as $row):
                                        ?>
                                        <li class="">
                                            <a href="<?= base_url('genre/' . $row->genre_code); ?>"><?= $row->genre_name ?></a>
                                        </li>
                                        <?php
                                    endforeach;
                                }else {
                                    ?>
                                    <li class="disabled">
                                        <a href="#" class="disabled">No genres available</a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>





            </div>


        </div>

        <nav class="navbar navbar-default navbar-fixed-bottom hidden-lg hidden-md">
            <div class="container">
                <div class="navbar-header">
                    <button onclick="open_app()" class="navbar-toggle collapsed">
                        <a href="" target="_blank"> <i class="i i-phone-portrait"></i> Android App</a>
                    </button>
                    <a class="navbar-brand" href="<?= base_url(); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">
                        <circle cx="24" cy="24" r="24" fill="rgba(255,255,255,0.2)"></circle>
                        <circle cx="24" cy="24" r="22" fill="#da552f" class="brand-color"></circle>
                        <circle cx="24" cy="24" r="10" fill="#ffffff"></circle>
                        <circle cx="13" cy="13" r="2" fill="#ffffff" class="brand-animate"></circle>
                        <path d="M 14 24 L 24 24 L 14 44 Z" fill="#FFFFFF"></path>
                        <circle cx="24" cy="24" r="3" fill="#da552f"></circle>
                        </svg>
                    </a>
                </div>
            </div>
        </nav>

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-102677711-1', 'auto');
            ga('send', 'pageview');

        </script>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?= base_url('ss/js/jquery.js'); ?>"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?= base_url('ss/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript">

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah')
                                .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                var total_record = 0;
                var total_groups = <?php echo $total_data; ?>;
                if (total_groups < 2) {
                    $('.loadmore').addClass('hidden');
                }
                $('#lyrresults').load("<?php echo base_url() ?>user/loadmore/<?= $thisuserdata['user_id'] ?>",
                                {'group_no': total_record}, function () {
                            total_record++;

                        });
                        $('#loadmore').on('click', function () {
                            if (total_record <= total_groups)
                            {
                                loading = true;
                                $('#load').addClass('hidden');
                                $('#loading').removeClass('hidden');
                                $.post('<?php echo site_url() ?>user/loadmore/<?= $thisuserdata['user_id'] ?>', {'group_no': total_record},
                                                function (data) {
                                                    if (data !== "") {
                                                        $("#lyrresults").append(data);

                                                        $('#loading').addClass('hidden');
                                                        $('#load').removeClass('hidden');

                                                        if (total_record === total_groups - 1) {
                                                            $('.loadmore').addClass('hidden');
                                                        }
                                                        total_record++;
                                                    }
                                                });
                                            }
                                        });
                                    });
        </script>

    </body>
</html>