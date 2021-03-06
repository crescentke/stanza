<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stanza Scoop - <?= $search_tag; ?></title>

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
    <body>

        <?php $this->load->view('header_view'); ?>


        <div class="container">


            <?php $this->load->view('flashdata_view'); ?>

            <div class="row">


                <div class="col-md-3 hidden-sm hidden-xs">
                    <div class="list-group">
                        <a onclick="viewTrending()" href="<?= base_url('explore/trending'); ?>" class="list-group-item active">
                            <i class="i i-"></i> Top lyrics
                        </a>
                        <a href="<?= base_url('explore/latest'); ?>" class="list-group-item">
                            <i class="i i-"></i> New lyrics
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
                                } else {
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

                <div class="col-md-6">
                    <div class="result-panel">
                        <h1 class="trending-title">
                            <div>Top lyrics on <?= $search_tag; ?> </div>
                        </h1>
                        <h2 class="trending-subtitle">
                            <div>Find the lyrics of the most viewed songs on Stanzascoop</div>
                        </h2>

                        <div class="lyrics">
                            <ul class="lyricsList" id="lyrresults">

                            </ul>

                            <div class="hidden alert alert-warning" id="searcherror">No lyrics on your current search</div>
                            <div id="errorbreak" class="hidden"></div>

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

                <div class="col-md-3">
                    <div class="form-error">
                        <div id="errorMessage">
                        </div>
                    </div>
                    <div class="request-panel">
                        <div class="cta_025cb">
                            <h3 class="headline_4c878 headline_7b490 default_029ca base_e2db5">
                                <span style="font-style:normal;font-weight:normal;">👋</span>
                                Welcome to Stanzascoop
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
                $('#searcherror').addClass('hidden');
                $('#errorbreak').addClass('hidden');
                var total_record = 0;
                var total_groups = <?php echo $total_data; ?>;
                if (total_groups < 2) {
                    $('.loadmore').addClass('hidden');
                }
                if (total_groups === 0) {
                    $('#searcherror').removeClass('hidden');
                    $('#errorbreak').removeClass('hidden');
                }
                $('#lyrresults').load("<?php echo base_url() ?>welcome/loadsearch/<?php echo urlencode($_GET['q']); ?>",
                                {'group_no': total_record}, function () {
                            total_record++;

                        });
                        $('#loadmore').on('click', function () {
                            if (total_record <= total_groups)
                            {
                                loading = true;
                                $('#load').addClass('hidden');
                                $('#loading').removeClass('hidden');
                                $.post('<?php echo site_url() ?>welcome/loadsearch/<?php echo urlencode($_GET['q']); ?>', {'group_no': total_record},
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