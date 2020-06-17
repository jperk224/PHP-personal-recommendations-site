<?php
/*
 * read csv of contacts
 */
$title = 'People Recommendations';
require 'inc/header.php';

/* echo '<pre>';   // pre tag renders the element contents exactly as written in the source code
include 'data/csv/people.csv';
echo '</pre>'; */

// open the csv file for reading
$csvFileHandler = fopen('data/csv/people.csv', 'r');
if ($csvFileHandler) {
    // read each line as a row of columns per csv format and return an array of columns
    $header = fgetcsv($csvFileHandler);  // ',' is the defaul delimeter
    // flip the array so the header values are the keys and extract each key
    // into its own variable named after the key
    // this is so the values of the keys represent the position in each record's array
    // then we can use the key to reference the data for rendering for ease of code readability
    // e.g. $contact[$first] = $contact[0] = first name of record
    extract(array_flip($header));
    // loop through the remaining lines in the csv file to display the contacts
    echo '<div class="row">';   // the loop is inside the 'row' div so there's always at least one row
    $count = 0;
    while (!feof($csvFileHandler)) {
        // grab each contact (i.e. line in file) and render attributes in the UI
        // we need a new row for every 4 contacts to ensure proper UI layout
        if (($count > 0) && ($count % 4 == 0)) {
            echo '</div>\n';
            echo '<div class="row">';
        }
        $count++;
        $contact = fgetcsv($csvFileHandler); 
        echo '<div class="col-xs-6 col-md-3">';
        echo '<div class="thumbnail">';
        echo '<img src="' . $contact[$img] . '" />';
        echo '<div class="caption">';
        echo '<h4 class="media-heading">' . $contact[$first] . ' ' . $contact[$last] . '</h4>';
        echo '<a href="http://' . $contact[$website] . '" target="_blank">' . $contact[$website] . '</a>';
        echo '<br />';
        echo 'Twitter: <a href="https://twitter.com/' . $contact[$twitter] . '" target="_blank">@' . $contact[$twitter] . '</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    fclose($csvFileHandler);
}

require 'inc/footer.php';
