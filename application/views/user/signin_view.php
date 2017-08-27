<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Stanzascoop - Sign In</title>

        <!-- Bootstrap/CSS/Fonts -->
        <link rel="stylesheet" href="<?= base_url('ss/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('ss/css/icons.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('ss/css/ss.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('ss/css/account.css'); ?>">


    </head>
    <body class="acc">

        <?php $this->load->view('header_view'); ?>



        <span id="home-root" class="account-home">
            <section class="home-sub-sec">
                <main class="home-main" role="main">

                    <article class="home-article">
                        <div class="home-account-pane" id="paneLogin">
                            <div class="home-account-pane-top">                                
                                <div class="div-top">
                                    <h1 class="home-account-pane-top-logo">
                                        Log in
                                    </h1>

                                    <p class="small--bold">
                                        Not registered with us yet?

                                        <a rel="nofollow" href="<?= base_url('signup');?>" class="account-signup">Sign up</a>

                                    </p>
                                </div>

                                <?php $this->load->view('flashdata_view'); ?>

                                <div class="home-account-pane-top-form">
                                    <form class="home-account-pane-top-form-act" method="post" action="<?= base_url('user/signin'); ?>">
                                        <div class="home-account-pane-top-form-group">
                                            <label class="account-label">Email address:</label>
                                            <input class="home-account-pane-top-form-input" required="true" autocapitalize="off" autocorrect="off" maxlength="30" name="exampleInputEmail" placeholder="Email address" value="<?= set_value('exampleInputEmail'); ?>" type="text">
                                        </div>
                                        <div class="home-account-pane-top-form-group">
                                            <label class="account-label">Password:</label>
                                            <input class="home-account-pane-top-form-input" required="true" autocapitalize="off" autocorrect="off" name="exampleInputPassword" placeholder="Password" value="" type="password">
                                            <div class="home-account-pane-top-form-reset hidden">
                                                <a class="home-account-pane-top-form-reset-link" href="<?= base_url('password/reset'); ?>">Forgot?</a>
                                            </div>
                                        </div>
                                        <span class="home-account-pane-top-form-button">
                                            <button type="submit" class="home-account-pane-top-form-btn home-account-pane-top-form-btn-primary home-cousor home-padding">Sign in</button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                            <div class="doc-content isFacebook">

                                <div class="orbox">
                                    <div class="orword centered">
                                        or
                                    </div>
                                </div>
                                <div class="fbButton margin-top">
                                    <a id="button-facebook" class="button wide minor facebook-button cd-login-button inline-block mufb-login-button J_onClick" href="">
                                        <span class=" mufb-login-button J_onClick">Log in with Twitter</span>
                                    </a>
                                </div>
                                <a id="button-google" class="button googleTie wide" href="">
                                    <span class="google-button-title">
                                        Log in with Google
                                    </span>
                                </a>


                            </div>
                        </div>
                    </article>
                </main>


            </section>

        </span>


        <?php $this->load->view('footer_view'); ?>

    </body>


</html>