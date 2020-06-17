<?php
/*
 * read csv of contacts
 */
$title = 'People Recommendations';
require 'inc/header.php';

echo '<pre>';
include 'data/csv/people.csv';
echo '</pre>';

echo '<div class="row">';
        echo '<div class="col-xs-6 col-md-3">';
        echo '<div class="thumbnail">';
        echo '<img src="https://pbs.twimg.com/profile_images/783345725547708416/jV-j2pxp_400x400.jpg" />';
        echo '<div class="caption">';
        echo '<h4 class="media-heading">Alena Holligan</h4>';
        echo '<a href="http://sketchings.com" target="_blank">sketchings.com</a>';
        echo '<br />';
        echo 'Twitter: <a href="https://twitter.com/sketchings" target="_blank">@sketchings</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
echo '</div>';
require 'inc/footer.php';