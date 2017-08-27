
<nav class="navbar navbar-default navbar-static-top" id="my-nav">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url(); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32" class="hidden">
                    <circle cx="24" cy="24" r="24" fill="rgba(255,255,255,0.2)"></circle>
                    <circle cx="24" cy="24" r="22" fill="#0f1721" class="brand-color"></circle>
                    <circle cx="24" cy="24" r="10" fill="#ffffff"></circle>
                    <circle cx="13" cy="13" r="2" fill="#ffffff" class="brand-animate"></circle>
                    <path d="M 14 24 L 24 24 L 14 44 Z" fill="#FFFFFF"></path>
                    <circle cx="24" cy="24" r="3" fill="#0f1721"></circle>
                </svg>
                <span class="brand-text">Stanza Scoop</span>
                <span class="brand-tagline hidden">Meaning behind every song</span>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="main-nav-collapse">
            <form class="navbar-form navbar-left search-form" method="get" action="<?= base_url('search'); ?>">
                <div class="input-group">
                    <span class="input-group-btn">
                        <button class="btn btn-search" type="submit">
                            <i class="i i-search2"></i>
                        </button>
                    </span>
                    <?php
                    if (isset($_GET['q'])) {
                        $q = $_GET['q'];
                    } else {
                        $q = NULL;
                    }
                    ?>
                    <input type="text" class="form-control-search" required="" name="q" id="q" value="<?= $q ?>" placeholder="Search lyrics & more">
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="more-nav-links" href="<?= base_url('blog'); ?>">Blog</a>
                </li>
                <li>
                    <a class="more-nav-links" href="<?= base_url('contribute'); ?>">Publish</sup></a>
                </li>
                <li class="dropdown">
                    <a  href="#" class="dropdown-toggle more-nav-links" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="i i-ellipsis"></i>
                    </a>
                    <ul class="dropdown-menu nav-toggle">
                        <li><a href="https://twitter.com/stanzascoop" target="_blank"> <i class="i i-twitter"></i> Twitter</a></li>
                        <li><a href="https://facebook.com/stanzascoop" target="_blank"> <i class="i i-facebook"></i> Facebook</a></li>
                    </ul>
                </li>
                <li class="divider hidden-sm hidden-xs">
                    <span class="divider_e93e3">|</span>
                </li>
                <?php
                if ($this->sess->check_sess()) {
                    $client_id = NULL;
                    $sess = FALSE;
                    if ($this->session->userdata('accountsess')) {
                        $client_data = $this->crud->read_one('users', array('user_id' => $this->session->userdata('accountsess')['client_id']));
                        $sess = TRUE;
                    }
                    ?>
                    <li class="dropdown" id="profile">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img alt="" class="avi-rounded-two" src="<?= $client_data['user_photo']; ?>" width="25" height="25">
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?= base_url('@' . $client_data['user_name']); ?>"><?= $client_data['user_name']; ?></a>
                            </li>
                            <li>
                                <a href="<?= base_url('@' . $client_data['user_name']); ?>#mylyrics">My Lyrics</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url('signout'); ?>" class="navbar-btn nav-login">Log out</a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li>
                        <a href="<?= base_url('login'); ?>" class="more-nav-links">Sign in</a>
                    </li>
                    <li>
                        <a href="<?= base_url('signup'); ?>" class="more-nav-links">Sign up</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
