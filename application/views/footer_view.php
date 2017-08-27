<footer id="mainFooter">
    <div id="mainFooter-bounds" class="">
        <ul class="inlineblockList chunk bordered hidden-sm hidden-xs">
            <li>
            <a>Artists Index: </a>
            </li>
            <?php
            foreach (range('A', 'Z') as $artists_row) {
                ?>
                <li class="chunk"><a href="<?= base_url("filter/artist/$artists_row"); ?>" target=""><?= $artists_row; ?></a></li>
                <?php
            }
            ?>
            <li class="pull-right">
              <span class="author">Made with love by <a href="">CrescentKE</a></span>
            </li>

        </ul>

        <ul class="inlineblockList text--small">
            <li class="text--secondary">
                Copyright © 2017 StanzaScoop. All rights reserved.
            </li>
            <li class="chunk pull-right  hidden-sm hidden-xs"><a href="<?= base_url("#terms"); ?>">Privacy and Terms</a></li>
        </ul>
    </div>
</footer>
