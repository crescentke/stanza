<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stanza Scoop - <?= $filter_title; ?></title>

        <link rel="canonical" href="<?= current_url(); ?>">

        <meta name="description" content="Get the <?= $filter_title ?> on Stanzascoop and sing a long to your favorite lyrics. Don't miss a word or update.">

        <meta name="twitter:card" content="summary">

        <meta name="twitter:site" content="@stanzascoop">

        <meta name="twitter:title" content="Top <?= $filter_title ?> on Stanzascoop">

        <meta name="twitter:description" content="Get the <?= $filter_title ?> on Stanzascoop and sing a long to your favorite lyrics. Don't miss a word or update.">

        <meta name="twitter:image" content="<?= base_url('ss/images/android-api.png'); ?>">

        <meta name="twitter:creator" content="@stanzascoop">

        <meta property="og:site_name" content="Stanza Scoop">

        <meta property="og:title" content="Top <?= $filter_title ?> on Stanzascoop">

        <meta property="og:type" content="article">

        <meta property="og:image" content="<?= base_url('ss/images/android-api.png'); ?>">

        <meta property="og:description" content="Get the <?= $filter_title ?> on Stanzascoop and sing a long to your favorite lyrics. Don't miss a word or update.">

        <meta property="og:locale" content="en_US">

        <meta property="og:url" content="<?= current_url(); ?>">

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
    <body id="stanzascoop">

        <?php $this->load->view('header_view'); ?>



        <div class="container" id="man-content">


            <?php $this->load->view('flashdata_view'); ?>

            <div class="row">


                <div class="col-md-4">
                    <div id="stanza-sidebar" data-spy="affix" data-offset-top="185" data-offset-bottom="192">
                    <div class="list-group">
                        <a href="<?= base_url('explore/trending'); ?>" class="list-group-item">
                            <i class="glyphicon glyphicon-fire"></i> Top lyrics
                        </a>
                        <a href="<?= base_url('explore/latest'); ?>" class="list-group-item">
                            <i class="glyphicon glyphicon-refresh"></i> New lyrics
                        </a>
                    </div>

                    <div id="genres-box" class="box box-style-plain">
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
                </div>
                </div>

                <div class="col-md-8">
                    <div class="result-panel">
                        <h1 class="trending-title">
                            <div><?= $filter_title; ?></div>
                        </h1>
                        <h2 class="trending-subtitle">
                            <div><?= $filter_subtitle; ?></div>
                        </h2>

                        <div class="lyrics">
                            <ul class="lyricsList" id="lyrresults">

                            </ul>
                        </div>
                    </div>

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

        <?php $this->load->view('footer_view') ?>



<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-102677711-1', 'auto');
  ga('send', 'pageview');

</script>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?= base_url('ss/js/jquery.js'); ?>"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?= base_url('ss/js/bootstrap.min.js'); ?>"></script>
        <script src="<?= base_url('ss/js/custom.js'); ?>"></script>
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

        <script type="text/javascript">
            $(document).ready(function () {
                var total_record = 0;
                var total_groups = <?php echo $total_data; ?>;
                if (total_groups < 2) {
                    $('.loadmore').addClass('hidden');
                }
                $('#lyrresults').load("<?php echo base_url() ?>artists/loadfilter/<?php echo $filtertype ?>",
                                {'group_no': total_record}, function () {
                            total_record++;

                        });
                        $('#loadmore').on('click', function () {
                            if (total_record <= total_groups)
                            {
                                loading = true;
                                $('#load').addClass('hidden');
                                $('#loading').removeClass('hidden');
                                $.post('<?php echo site_url() ?>artists/loadfilter/<?php echo $filtertype ?>', {'group_no': total_record},
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
