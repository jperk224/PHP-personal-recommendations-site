<?php
/*
 * read xml data for PHP podcasts
 * write a new xml file for a podcast
 */
$title = 'Podcast Recomendations';
require 'inc/header.php';

/*echo '<pre>';
echo htmlspecialchars(
    file_get_contents('data/xml/educate_yourself.xml')
);
echo '</pre>';*/

// there are multiple xml files, one for each podcast, so we need to grab each file individually
// create an array for the files to loop through
$files = [];
$dir = 'data/xml';
$dirHandler = opendir($dir);
if ($dirHandler) {
    while (($entry = readdir($dirHandler)) != false) {
        if (substr($entry, 0, 1) != '.') {      // only include non-hidden files
            $files[] = $dir . '/' . $entry;
        }
    }
    closedir($dirHandler);
}

// loop through the array of xml files and parse each one individually
if (!empty($files)) {
    foreach ($files as $file) {
        // parse the xml file into a PHP object
        $xml = simplexml_load_file($file);
        // render the $xml details in the UI
        echo '<div class="panel panel-default">';

        echo '<div class="panel-heading">';
        echo '<h3 class="panel-title"><a href="' . $xml->channel->link . '" target="_blank">' 
            . $xml->channel->title . '</a></h3>';
        echo '</div>';

        echo '<div class="panel-body">';
        echo '<p>' . $xml->channel->description . '</p>';
        // pull a random episode from the feed to render
        $randomEpisode = rand(0, count($xml->channel->item)-1);
        echo '<p><strong>Sample:' . $xml->channel->item[$randomEpisode]->title . '</strong> - ';
        echo $xml->channel->item[$randomEpisode]->description . '</p>';
        echo '<audio controls>';
        echo '<source src="' . $xml->channel->item[$randomEpisode]->enclosure->attributes()->url . '" type="audio/mpeg">';
        echo 'Your browser does not support the audio element.';
        echo '</audio>';
        echo '<p><a href="' . $xml->channel->link . '" target="_blank">Lean more and subscribe</a></p>';
        echo '</div>';

        echo '</div>';
    }
}

require 'inc/footer.php';
