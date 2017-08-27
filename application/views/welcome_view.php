<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stanzascoop | Song Lyrics &amp; Meaning</title>

        <link rel="canonical" href="<?= current_url(); ?>">

        <meta name="description" content="Stanza Scoop is a collection of music lyrics across all music genres. Earn SS bagdes and points when you contribute. Sing along to every word.">

        <meta name="twitter:card" content="summary">

        <meta name="twitter:site" content="@stanzascoop">

        <meta name="twitter:title" content="Stanza Scoop music lyrics">

        <meta name="twitter:description" content="Stanza Scoop is a collection of music lyrics across all music genres. Don't miss to know a phare, sing along to every word.">

        <meta name="twitter:image" content="<?= base_url('ss/images/android-api.png'); ?>">

        <meta name="twitter:creator" content="@stanzascoop">

        <meta property="og:site_name" content="Stanza Scoop">

        <meta property="og:title" content="Stanza Scoop music lyrics">

        <meta property="og:type" content="article">

        <meta property="og:image" content="<?= base_url('ss/images/android-api.png'); ?>">

        <meta property="og:description" content="Stanza Scoop is a collection of music lyrics across all music genres. Don't miss to know a phare, sing along to every word.">

        <meta property="og:locale" content="en_US">

        <meta property="og:url" content="<?= current_url(); ?>">



        <!-- Bootstrap/CSS/Fonts -->
        <link rel="stylesheet" href="<?= base_url('ss/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('ss/css/icons.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('ss/css/ss.min.css'); ?>">

    </head>
    <body id="stanzascoop">

        <?php $this->load->view('header_view'); ?>


        <div class="container">

          <section id="tophits">
            <div class="section__nav">
              <h2 class="section-headline">Top Music Lyrics</h2>
              <a data-test-we-see-all="" rel="nofollow" data-we-link-to-exclude="" href="<?= base_url('explore/trending');?>" class="section__nav__link">See All</a>
            </div>

            <div class="row">
              <?php
              foreach ($indextop as $key):
              $this->crud->read_one('artists', array('user_name' => $key->lyric_artist))['full_name'];
              if ($key->lyric_ft != NULL) {
                  $artists = $this->crud->read_one('artists', array('user_name' => $key->lyric_artist))['full_name'] . ' ft ' . $key->lyric_ft;
              } else {
                  $artists = $this->crud->read_one('artists', array('user_name' => $key->lyric_artist))['full_name'];
              }
                ?>

                <div class="col-md-4">
                  <a href="<?= base_url('lyrics/'. $key->lyric_url) ?>">
                    <div class="card card-inverse">
                      <div class="card-img" style="background: url(./covers/<?= $key->lyric_cover ?>);"></div>
                      <div class="card-block">
                        <h3><?= $key->lyric_title ?></h3>
                        <h4><?= $artists ?></h4>
                      </div>
                    </div>
                  </a>
                </div>

                <?php
              endforeach;
              ?>
            </div>

          </section>


          <section id="topgenre" class="section--bordered">
            <div class="section__nav">
              <h2 class="section-headline">Music Genres</h2>
              <span class="section__nav__link"><?= count($genres) ?> genres found</span>
            </div>

            <div class="row">
              <?php
              foreach ($genres as $key):
              $all_lyrics = $this->crud->read_records('lyrics', array('lyric_genre' => $key->genre_code));
                ?>

                <div class="col-md-4">
                  <a href="<?= base_url('genre/'. $key->genre_code) ?>">
                    <div class="media">
                      <div class="media-left">
                          <img class="media-object" src="<?= base_url('ss/images/genre/'.$key->genre_cover) ?>" alt="<?= $key->genre_name ?>">
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading"><?= $key->genre_name ?></h4>
                        <h5><?= count($all_lyrics) ?> lyrics</h5>
                      </div>
                    </div>
                  </a>
                </div>

                <?php
              endforeach;
              ?>
            </div>

          </section>


          <section id="newhits"  class="section--bordered">
              <div class="section__nav">
                <h2 class="section-headline">New Lyrics</h2>
                <a data-test-we-see-all="" rel="nofollow" data-we-link-to-exclude="" href="<?= base_url('explore/latest');?>" class="section__nav__link">See All</a>
              </div>

              <div class="row">
                <?php
                foreach ($indexnew as $key):
                $this->crud->read_one('artists', array('user_name' => $key->lyric_artist))['full_name'];
                if ($key->lyric_ft != NULL) {
                    $artists = $this->crud->read_one('artists', array('user_name' => $key->lyric_artist))['full_name'] . ' ft ' . $key->lyric_ft;
                } else {
                    $artists = $this->crud->read_one('artists', array('user_name' => $key->lyric_artist))['full_name'];
                }
                  ?>

                  <div class="col-md-2">
                    <a href="<?= base_url('lyrics/'. $key->lyric_url) ?>">
                      <div class="card card-inverse">
                        <div class="card-img" style="background: url(./covers/<?= $key->lyric_cover ?>);"></div>
                        <div class="card-block">
                          <h3><?= $key->lyric_title ?></h3>
                          <h4><?= $artists ?></h4>
                        </div>
                      </div>
                    </a>
                  </div>

                  <?php
                endforeach;
                ?>
              </div>

            </section>
        </div>

        <div class="bg-community">
          <div class="container">
            <section id="topgenre">
            <div class="section__nav">
              <h2 class="section-headline">Our Community</h2>
              <a data-test-we-see-all="" rel="nofollow" data-we-link-to-exclude="" href="<?= base_url('signup');?>" class="section__nav__link">Join Now</a>
            </div>

            <div class="row">
              <?php
              foreach ($indexcom as $key):
              $all_points = $this->crud->read_records('points', array('user_id' => $key->user_id));
              $points = $this->crud->read_one('points', array('user_id' => $key->user_id));
              if(count($all_points) > 0){
                ?>

                <div class="col-md-4">
                  <a href="<?= base_url('@'. $key->user_name) ?>">
                    <div class="media">
                      <div class="media-left">
                          <img class="media-object" src="<?= base_url('avis/'.$key->user_photo) ?>" alt="<?= $key->user_name ?>">
                      </div>
                      <div class="media-body no-border">
                        <h4 class="media-heading"><?= $key->user_name ?></h4>
                        <h5><?= $points['total_points'] ?> SS points</h5>
                      </div>
                    </div>
                  </a>
                </div>

                <?php
              }
              endforeach;
              ?>
            </div>
          </div>

          </div>
        </div>

        <?php $this->load->view('footer_view'); ?>

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
        <script src="<?= base_url('ss/js/custom.js'); ?>"></script>
    </body>
</html>
