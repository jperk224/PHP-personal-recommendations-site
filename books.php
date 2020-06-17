<?php
/*
 * read json data for book recommendations
 */
$title = 'Book Recomendations';
require 'inc/header.php';

echo '<pre>';
include 'data/json/top_programming_books.json';
echo '</pre>';

echo '<div class="panel panel-default">';
    
    echo '<div class="panel-heading">';
    echo '<h3 class="panel-title">BOOK TITLE</h3>';
    echo 'by AUTHOR NAME';
    echo '</div>';
    
    echo '<div class="panel-body media">';
    
        echo '<div class="media-left media-top">';
        echo '<img class="media-object" src="https://s.gr-assets.com/assets/nophoto/book/50x75-a91bf249278a81aabab721ef782c4a74.png" />';
        echo '</div>';
        
        echo '<div class="media-body">';
        echo 'BOOK DESCRIPTION';
        echo '<br />';
        echo '<a href="LINK" target="_blank">Learn more...</a>';
        echo '</div>';
    
    echo '</div>';

echo '</div>';

require 'inc/footer.php';