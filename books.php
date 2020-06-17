<?php
/*
 * read json data for book recommendations
 */
$title = 'Book Recomendations';
require 'inc/header.php';

/*echo '<pre>';
include 'data/json/top_programming_books.json';
echo '</pre>';*/

// grab the contents of the json file
// file_get_contents reads it into a string we can parse into a PHP object using json_decode
$books = json_decode(file_get_contents('data/json/top_programming_books.json'));
// the collection of books form the file is converted into an array
// loop through it to add each book to the UI
foreach ($books->collection->books as $book) {

    echo '<div class="panel panel-default">';

    echo '<div class="panel-heading">';
    echo '<h3 class="panel-title">' . $book->title . '</h3>';
    echo 'by ' . $book->author_name;
    echo '</div>';

    echo '<div class="panel-body media">';

    echo '<div class="media-left media-top">';
    echo '<img class="media-object" src="' . $book->book_image_url . '" />';
    echo '</div>';

    echo '<div class="media-body">';
    // display a descripton that is 500 char or less
    if (strlen($book->book_description) < 500) {
        echo $book->book_description;
    } else {
        $spacePosition = strpos($book->book_description, ' ', 500);
        echo substr($book->book_description, 0, $spacePosition) . '...';
    }
    echo '<br />';
    echo '<a href="' . $book->link . '" target="_blank">Learn more...</a>';
    echo '</div>';

    echo '</div>';

    echo '</div>';
}

require 'inc/footer.php';