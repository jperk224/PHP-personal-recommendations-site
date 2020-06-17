<?php
/*
 * read xml data for PHP podcasts
 * write a new xml file for a podcast
 */
$title = 'Podcast Recomendations';
require 'inc/header.php';

echo '<pre>';
echo htmlspecialchars(
    file_get_contents('data/xml/educate_yourself.xml')
);
echo '</pre>';

echo '<div class="panel panel-default">';

    echo '<div class="panel-heading">';
    echo '<h3 class="panel-title"><a href="#" target="_blank">TITLE</a></h3>';
    echo '</div>';

    echo '<div class="panel-body">';
    echo '<p>Description</p>';
    echo '<p><strong>Sample: EPISODE TITLE</strong> - ';
    echo 'EPISODE DESCRIPTION</p>';
    echo '<audio controls>';
    echo '<source src="#" type="audio/mpeg">';
    echo 'Your browser does not support the audio element.';
    echo '</audio>';
    echo '<p><a href="#" target="_blank">Lean more and subscribe</a></p>';
    echo '</div>';

echo '</div>';

require 'inc/footer.php';