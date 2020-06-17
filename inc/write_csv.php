<?php

// Write new entries to the people.csv file

// an array to hold the newly created contact to be added
// grabs form data from the add person form in the UI
$newPerson = [
    filter_input(INPUT_POST, 'first', FILTER_SANITIZE_STRING),
    filter_input(INPUT_POST, 'last', FILTER_SANITIZE_STRING),
    filter_input(INPUT_POST, 'website', FILTER_SANITIZE_URL),
    filter_input(INPUT_POST, 'twitter', FILTER_SANITIZE_STRING),
    filter_input(INPUT_POST, 'img', FILTER_SANITIZE_URL),
];

// open the csv file to write to it
$fileHandler = fopen('../data/csv/people.csv', 'a+');    // open the file in 'append/read' mode
if ($fileHandler) {
    fseek($fileHandler, -1, SEEK_END);                  // go back 1 byte from the end of the file
    // if the file doesn't end in a newline, add a newline char
    if (fgets($fileHandler) != PHP_EOL) {
        fputs($fileHandler, PHP_EOL);
    }
    fputcsv($fileHandler, $newPerson);                  // write a new record to the end of the file
    fclose($fileHandler);
}

// redirect to the people page
header('location: /people.php');
