<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Apps - Stanza Scoop</title>

        <link rel="canonical" href="<?= base_url('apps'); ?>">
        
        <meta name="description" content="Search, read and access all Stanzascoop lyrics offline through our android app. The app is ready on Google Playstore.">

        <meta name="twitter:card" content="summary">

        <meta name="twitter:site" content="@stanzascoop">

        <meta name="twitter:title" content="About">

        <meta name="twitter:description" content="Search, read and access all Stanzascoop lyrics offline through our android app. The app is ready on Google Playstore.">

        <meta name="twitter:image" content="<?= base_url('ss/images/android-api.png'); ?>">

        <meta name="twitter:creator" content="@stanzascoop">

        <meta property="og:site_name" content="Stanza Scoop">

        <meta property="og:title" content="About">

        <meta property="og:type" content="article">

        <meta property="og:image" content="<?= base_url('ss/images/android-api.png'); ?>">

        <meta property="og:description" content="Search, read and access all Stanzascoop lyrics offline through our android app. The app is ready on Google Playstore.">

        <meta property="og:locale" content="en_US">

        <meta property="og:url" content="<?= base_url('apps'); ?>">


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
    <body style="background: #fff">

        <?php $this->load->view('header_view'); ?>


        <div class="apps-banner">
            <div class="container">
                <h1 class="small-title-extra">In your hands</h1>
                <h2>Android App</h2>

                <div class="app-bg">
                    <a href="">
                        <img class="img-responsive" src="<?= base_url('ss/imgs/android_badge.png'); ?>" alt="Google Play"/>
                    </a>
                </div>

                <div class="app-info">
                    <h2>With Our App</h2>
                    <p>
                        Through Stanzascoop android app, you will be able
                        <br>
                        to search for your favorite lyrics and read them when offline
                    </p>
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?= base_url('ss/js/jquery.js'); ?>"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?= base_url('ss/js/bootstrap.min.js'); ?>"></script>
        <script src="<?= base_url('ss/js/custom.js'); ?>"></script>
    </body>
</html>