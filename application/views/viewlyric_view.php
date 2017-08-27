<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $lyric['lyric_title'] ?> - Stanza Scoop</title>
        <link rel="canonical" href="<?= current_url(); ?>">

        <meta name="description" content="<?= word_limiter($lyric['lyric_content'], 30) ?>">

        <meta name="twitter:card" content="summary">

        <meta name="twitter:site" content="@stanzascoop">

        <meta name="twitter:title" content="<?= $lyric['lyric_title'] ?> lyrics">

        <meta name="twitter:description" content="<?= word_limiter($lyric['lyric_content'], 30) ?>">

        <meta name="twitter:image" content="<?= $lyric['lyric_cover']; ?>">

        <meta name="twitter:creator" content="@stanzascoop">

        <meta property="og:site_name" content="Stanza Scoop">

        <meta property="og:title" content="<?= $lyric['lyric_title'] ?>">

        <meta property="og:type" content="article">

        <meta property="og:image" content="<?= $lyric['lyric_cover']; ?>">

        <meta property="og:description" content="<?= word_limiter($lyric['lyric_content'], 30) ?>">

        <meta property="og:locale" content="en_US">

        <meta property="og:url" content="<?= current_url(); ?>">
        <!-- Bootstrap/CSS/Fonts -->
        <link rel="stylesheet" href="<?= base_url('ss/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('ss/css/icons.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('ss/css/ss.min.css'); ?>">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

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
    <body class="viewlyrics">

        <?php $this->load->view('header_view'); ?>


        <div class="black-wrapper"
             style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)),
             url(<?= base_url('covers/'.$lyric['lyric_cover']); ?>);">

            <div class="container">
                <header class="backgroundImage_33eb0 header_3ef8a">
                    <span class="viewcount-color">
                      <i class="fa fa-level-up fa-2x" aria-hidden="true"></i>
                      <?= $lyric['lyric_view'] ?>
                    </span>
                    <span class="user-image image_d50aa v-big hidden-sm hidden-xs">
                        <div class="container_74c20 user-image--image" style="height: 220px; width: 220px;border-radius: 1px">
                            <div class="container_c89a5 lazyLoadContainer_b1038">
                                <img src="<?= base_url('covers/'.$lyric['lyric_cover']); ?>" width="140" height="140">
                            </div>
                            <div style="width: 140px; height: 140px;"></div>
                        </div>
                    </span>
                    <div class="info_80cfb">
                        <div class="primary_16ac4">
                            <h1 class="headline_7b4900 inverse_dcac5 base_e2db5"><?= $lyric['lyric_title'] ?> Lyrics</h1>
                        </div>
                        <h2 class="username_96d6a featured_ea308 inverse_dcac5 base_e2db5">
                            <?php
                            $this->crud->read_one('artists', array('user_name' => $lyric['lyric_artist']))['full_name'];
                            if ($lyric['lyric_ft'] != NULL) {
                                $artists = $this->crud->read_one('artists', array('user_name' => $lyric['lyric_artist']))['full_name'] . ' ft ' . $lyric['lyric_ft'];
                            } else {
                                $artists = $this->crud->read_one('artists', array('user_name' => $lyric['lyric_artist']))['full_name'];
                            }
                            ?>
                            <span class="art-span">by </span>
                            <a href="<?= base_url('artist/'.$lyric['lyric_artist']);?>"><?= $artists ?></a>
                        </h2>
                        <h2 class="username_96d6a featured_ea308 inverse_dcac5 base_e2db5">
                            <span class="art-span">Published by </span>
                            <a href="<?= base_url('@' . $this->crud->read_one('users', array('user_id' => $lyric['added_by']))['user_name']); ?>">
                                <?= $this->crud->read_one('users', array('user_id' => $lyric['added_by']))['full_name']; ?>
                            </a>
                        </h2>
                    </div>
                    <div class="social_0e825">
                      <div class="vi-frame">
                        <?= $lyric['video'] ?>
                      </div>
                        <ul id="shareLinks" style="display: block">
                            <li>
                                <a target="_blank" href="https://twitter.com/intent/tweet?text=<?= $lyric['lyric_title'] . ' lyrics by ' . $artists ?>&url=<?= base_url('lyrics/' . $lyric['lyric_url']); ?>&via=Stanzascoop&original_referer=<?= base_url('lyrics/' . $lyric['lyric_url']); ?>" class="color-twitter">
                                    <i class="i i-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://www.facebook.com/share.php?u=<?= base_url('lyrics/' . $lyric['lyric_url']); ?>" class="color-facebook">
                                    <i class="i i-facebook"></i>
                                </a>
                            </li>
                        </ul>
                        <a class="hidden button_30e5c mediumSize_c215f secondaryBoldText_ec36e secondaryText_97b90 simpleVariant_8a863" title="<?= base_url() ?>" href="<?= base_url('edit/' . $lyric['lyric_url']); ?>">
                            <i class="i i-pencil"></i>
                            Correct
                        </a>
                    </div>
                </header>
            </div>

        </div>


        <div class="container">
            <div class="co">
                <?php $this->load->view('flashdata_view'); ?>

                <div class="row">

                    <div class="col-md-8">
                        <div class="result-panel similar lyric-info">
                            <div class="item_54fdd" data-test="post-item-103510">
                                <div class="meta_f09e7">
                                    <div class="actions_c6d87">
                                        <button class="button_30e5c smallSize_5216f secondaryText_97b90 simpleVariant_8a863 button_e47d2">
                                            <div class="buttonContainer_b6eb3">
                                                <div class="postVoteArrow_e4dee"></div>
                                                <?= $lyric['lyric_view'] ?>
                                            </div>
                                        </button>

                                        <button class="button_30e5c smallSize_5216f secondaryText_97b90 simpleVariant_8a863 button_e47d2 dropdown-toggle" data-toggle="dropdown">
                                            <div class="buttonContainer_b6eb3">
                                                <i class="i i-share3"></i>
                                                Share
                                            </div>
                                        </button>
                                        <ul class="dropdown-menu lyrics-share">
                                            <li><a target="_blank" href="https://www.facebook.com/share.php?u=<?= base_url('lyrics/' . $lyric['lyric_url']); ?>" class="color-facebook"><i class="i i-facebook"></i> Share</a></li>
                                            <li><a target="_blank" href="https://twitter.com/intent/tweet?text=<?= $lyric['lyric_title'] . ' lyrics by ' . $artists ?>&url=<?= base_url('lyrics/' . $lyric['lyric_url']); ?>&via=Stanzascoop&original_referer=<?= base_url('lyrics/' . $lyric['lyric_url']); ?>" class="color-twitter"><i class="i i-twitter"></i> Tweet</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="lyrics_content">
                                <div class="lyr_content">
                                    <?= nl2br_except_pre($lyric['lyric_content']); ?>
                                </div>
                            </div>

                        </div>


                        <div class="request-panel hidden">
                            <div class="cta_025cb">
                                <h3 class="headline_4c878 headline_7b490 default_029ca base_e2db5">
                                    <span style="font-style:normal;font-weight:normal;"><?= parse_smileys(':tongue_wink', base_url('smileys/')); ?></span>
                                    Written by
                                </h3>
                                <div class="pull-right"><?= date("M d, Y", strtotime($lyric['register_date'])) ?></div>
                                <span class="tagline_4013e subtle_8ea23 base_e2db5">
                                    <img id="blah" alt="" class="avi-rounded-two" src="<?= base_url("avis/" . $this->crud->read_one('users', array('user_id' => $lyric['added_by']))['user_photo']); ?>" height="30" width="30">
                                    <a href="<?= base_url('@' . $this->crud->read_one('users', array('user_id' => $lyric['added_by']))['user_name']); ?>">
                                        <?= $this->crud->read_one('users', array('user_id' => $lyric['added_by']))['full_name']; ?>
                                        (@<?= $this->crud->read_one('users', array('user_id' => $lyric['added_by']))['user_name'] ?>)
                                    </a>
                                </span>
                                <br/><br/>
                                <p>Total lyrics contributed <label class="label label-success"><?= count($this->crud->read_records('lyrics', array('added_by' => $lyric['added_by']))) ?></label></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">

                        <div id="stanza-sidebar" data-spy="affix" data-offset-top="335" data-offset-bottom="260" class="affix-top">
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

                            <div class="result-panel similar mooore">
                                <div class="lyrics">
                                    <h2 class="headline_4c878 default_029ca">Similar lyrics</h2>
                                    <ul class="lyricsList">
                                        <?php
                                        if (count($similar) > 0) {
                                            $start = 0;
                                            $num = $start + 1;
                                            foreach ($similar as $lrow):
                                                if (strlen($num) < 2) {
                                                    $count_pos = "0$num";
                                                } else {
                                                    $count_pos = $num;
                                                }
                                                $this->crud->read_one('artists', array('user_name' => $lrow->lyric_artist))['full_name'];
                                                if ($lrow->lyric_ft != NULL) {
                                                    $artists = $this->crud->read_one('artists', array('user_name' => $lrow->lyric_artist))['full_name'] . ' ft ' . $lrow->lyric_ft;
                                                } else {
                                                    $artists = $this->crud->read_one('artists', array('user_name' => $lrow->lyric_artist))['full_name'];
                                                }
                                                ?>
                                                <li>
                                                    <div class="item_54fdd" data-test="post-item-103510">
                                                        <a class="link_523b9" href="<?= base_url('lyrics/' . $lrow->lyric_url) ?>">
                                                            <span class="num-position"><?= $count_pos ?></span>
                                                            <div class="thumbnail_f9ee1 thumbnail_9832a" data-test="post-thumbnail">
                                                                <div class="container_74c20" style="">
                                                                    <div class="container_c89a5 lazyLoadContainer_b1038">
                                                                        <img src="<?= $lrow->lyric_cover ?>" width="80" height="80" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="content_31491">
                                                                <div class="title_9ddaf featured_ea308 default_029ca base_e2db5"><?= $lrow->lyric_title ?></div>
                                                                <div class="tagline_619b7 text_47b37 subtle_8ea23 base_e2db5">
                                                                    <?= $artists ?>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </li>
                                                <?php
                                                $num++;
                                            endforeach;
                                        } else {
                                            ?>
                                            <div class="pad-h">
                                                <br/>
                                                No related lyrics!
                                                <br/><br/>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>





                </div>
            </div>
        </div>

        <?php $this->load->view('footer_view') ?>

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
            $(document).ready(function () {
                var base_url = "<?php echo base_url(); ?>";
                //New artist
                $("#reqform").submit(function (event) {
                    event.preventDefault();
                    var reqlyrics = $("#reqlyrics").val();
                    jQuery.ajax({
                        type: "POST",
                        url: base_url + "u/request",
                        dataType: 'json',
                        data: {reqlyrics: reqlyrics},
                        success: function (res) {
                            if (res.status === "success")
                            {
                                $('#reqlyrics').val();
                                $("#errorMessage").empty().addClass('alert alert-info').append(res.success);
                            } else {
                                $("#errorMessage").empty().addClass('alert alert-info').append(res.error);
                            }
                        }
                    });
                });
            });
        </script>
    </body>
</html>
