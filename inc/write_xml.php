<?php

// load the file to modify into an XML object
$file = '../data/xml/' . filter_input(INPUT_POST, 'file', FILTER_SANITIZE_STRING);
$xml = simplexml_load_file($file);

if ($xml) {
    // add an additional item, add chile to the xml channel
    $item = $xml->channel->addChild('item');
    $item->addChild('title', filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $item->addChild('link', filter_input(INPUT_POST, 'link', FILTER_SANITIZE_URL));
    // create a new date object from the form input for proper formatting
    $date = new DateTime(filter_input(INPUT_POST, 'pubDate', FILTER_SANITIZE_STRING));
    $item->addChild('pubDate', $date->format('D, d M Y H:i:s +0000'));
    $item->addChild('description', filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));

    //FIXME: This does not add the itunes namespace info
    $itunes = "http://www.itunes.com/dtds/podcast-1.0.dtd";
    $item->addChild('subtitle', filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING), $itunes);
    $item->addChild('summary', filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING), $itunes);
    $item->addChild('explicit', filter_input(INPUT_POST, 'explicit', FILTER_SANITIZE_STRING), $itunes);
    $item->addChild('duration', filter_input(INPUT_POST, 'duration', FILTER_SANITIZE_STRING), $itunes);

    /*echo '<pre>';
    echo htmlspecialchars(str_replace('><', ">\n<", $xml->asXML()));
    echo '</pre>';*/
    $xml->asXML($file);
    header('location: /podcasts.php');
}
