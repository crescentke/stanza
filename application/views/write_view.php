<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stanzascoop - Contribute lyrics</title>

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


        <div class="container">

            <?php $this->load->view('flashdata_view'); ?>

            <div class="row">

                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#newArtist" class="list-group-item" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#artistModal">
                            <i class="i i-users3"></i> New artist
                        </a>
                        <a href="#newGenre" class="list-group-item" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#genreModal">
                            <i class="i i-music"></i> New genre
                        </a>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="artistModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Add a new artist</h4>
                            </div>
                            <form method="post" action="" id="artistForm">
                                <div class="modal-body">
                                    <p class="help-block">A unique artist name will be generated automatically. If it's unavailable you will choose a different artist name</p>
                                    <div class="form-error">
                                        <div id="errorMessage">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Artist name</label>
                                        <input type="text" class="home-account-pane-top-form-input" name="aname" id="aname" required="" placeholder="Artist name" value="<?= set_value('aname'); ?>"/>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default hidden" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn orangeSolidColor_1132c"><i class="i i-add-to-list"></i> Add Artist</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="genreModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Add a new genre</h4>
                            </div>
                            <form method="post" action="<?= base_url("u/user/genre"); ?>" id="genreForm">
                                <div class="modal-body">
                                    <p class="help-block">A unique genre code will be generated automatically. If it's unavailable you will choose a different genre name</p>

                                    <div class="form-error">
                                        <div id="errorMessage2">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Genre name</label>
                                        <input type="text" class="home-account-pane-top-form-input" name="gname" id="gname" required="" placeholder="Genre name" value="<?= set_value('gname'); ?>"/>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default hidden" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn orangeSolidColor_1132c"><i class="i i-add-to-list"></i> Add Genre</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <?php echo form_open_multipart('upload/lyrics'); ?>

                <div class="col-md-6" id="lyric-cover">
                    <div class="result-panel">
                        <h1 class="trending-title">
                            <div>Add new lyrics</div>
                        </h1>
                        <h2 class="trending-subtitle">
                            <div>Contribute to song lyrics on Stanzascoop</div>
                        </h2>

                        <div class="form-group">
                            <label for="songTitle" class="control-label hidden">Song Title</label>
                            <div class="">
                                <input type="text" class="home-account-pane-top-form-input" id="songTitle" name="songTitle" placeholder="Song title" value="<?= set_value('songTitle'); ?>" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="songArtist">Main Artist</label>
                                <select class="home-account-pane-top-form-input" autocapitalize="off" autocorrect="off" name="songArtist" id="songArtist">                                        
                                    <option selected value="">Please choose</option>
                                    <?php
                                    $all_artists = $this->crud->read_records('artists', array('deleted' => FALSE));
                                    foreach ($all_artists as $all_artists_row):
                                        printf('<option value="%s">%s</option>', $all_artists_row->user_name, $all_artists_row->full_name);
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="songGenre">Genre</label>
                                <select class="home-account-pane-top-form-input" autocapitalize="off" autocorrect="off" name="songGenre" id="songGenre">                                        
                                    <option selected value="">Please choose</option>
                                    <?php
                                    $all_genres = $this->crud->read_records('genre', array('deleted' => FALSE));
                                    foreach ($all_genres as $all_genres_row):
                                        printf('<option value="%s">%s</option>', $all_genres_row->genre_code, $all_genres_row->genre_name);
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="songArtists" class="control-label hidden">Other Song Artists</label>
                            <div class="">
                                <input type="text" class="home-account-pane-top-form-input" id="songArtists" name="songArtists" placeholder="Featuring artists" value="<?= set_value('songArtists'); ?>">
                            </div>
                            <p class="help-block">Featured artists is optional</p>
                        </div>

                        <div class="form-group">
                            <label for="songLyrics" class="hidden control-label">Lyrics</label>
                            <div class="">
                                <textarea class="home-account-pane-top-form-input" id="songLyrics" name="songLyrics" value="<?= set_value('songLyrics'); ?>" placeholder="Write your lyrics here" required="" style="height: 240px"><?= set_value('songLyrics'); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="songCover" class="control-label">Upload a song cover photo</label>
                            <div class="">
                                <label for="user-avi">
                                    <img id="blah" alt="" class="avi-rounded-two" src="<?= base_url("covers/4.png"); ?>" height="60" width="60">
                                </label>

                                <input class="hidden" id="user-avi" type="file" name="userfile" size="20" onchange="readURL(this);" />

                                <p class="help-block">The maximum file size allowed is 6MB.</p>
                                <br/>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="request-panel">
                        <div class="cta_025cb">
                            <span class="trending-subtitle">
                                Your lyrics will be available after publishing
                            </span>
                            <br/>

                            <div class="form-group">                            
                                <button class="btn btn-publish">Publish lyrics</button>
                            </div>
                        </div>
                    </div>
                </div>


                </form>


            </div>

        </div>



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
                var base_url = "<?php echo base_url(); ?>";
                //New artist
                $("#artistForm").submit(function (event) {
                    event.preventDefault();
                    var aname = $("#aname").val();
                    jQuery.ajax({
                        type: "POST",
                        url: base_url + "u/user/artist",
                        dataType: 'json',
                        data: {aname: aname},
                        success: function (res) {
                            if (res.status === "success")
                            {
                                window.location = base_url + "contribute";
                            } else {
                                $("#errorMessage").empty().addClass('alert alert-danger').append(res.error);
                            }
                        }
                    });
                });

                //New genre
                $("#genreForm").submit(function (event) {
                    event.preventDefault();
                    var gname = $("#gname").val();
                    jQuery.ajax({
                        type: "POST",
                        url: base_url + "u/user/genre",
                        dataType: 'json',
                        data: {gname: gname},
                        success: function (res) {
                            if (res.status === "success")
                            {
                                window.location = base_url + "contribute";
                            } else {
                                $("#errorMessage2").empty().addClass('alert alert-danger').append(res.error);
                            }
                        }
                    });
                });
            });
        </script>

    </body>
</html>