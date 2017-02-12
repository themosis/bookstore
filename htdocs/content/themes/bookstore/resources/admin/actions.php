<?php

/**
 * Define WordPress actions for your theme.
 *
 * Based on the WordPress action hooks.
 * https://developer.wordpress.org/reference/hooks/
 *
 */

/**
 * Handle Browser Sync.
 *
 * The framework loads by default the local environment
 * where the constant BS (Browser Sync) is defined to true for development purpose.
 *
 * Note: make sure to update the script statement below based on the terminal/console message
 * when launching the "gulp watch" task.
 */
Action::add('wp_footer', function()
{
    if (defined('BS') && BS):
        ?>
        <script id="__bs_script__">//<![CDATA[
            document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.18.7'><\/script>".replace("HOST", location.hostname));
            //]]></script>
        <?php
    endif;
});