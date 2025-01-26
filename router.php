<?php

use App\Controller\AuthorController;

$routeur = new AltoRouter();

$routeur->map('GET', '/', function(){
    (new App\Controller\ExplanationController)->explain();
});

$routeur->map('GET', '/explain', function(){
    (new App\Controller\ExplanationController)->explain();
});

$routeur->map('GET', '/auteurs', function(){
    (new App\Controller\AuthorController)->getAuthors();
});


$routeur->map('GET', '/auteurs/[i:id]', function($id){
    (new App\Controller\AuthorController)->getAuthorById($id);
});

$routeur->map('GET', '/citations', function(){
    (new App\Controller\QuoteController)->getQuotes();
});

$routeur->map('GET', '/citations/[i:id]', function($id){
    (new App\Controller\QuoteController)->getQuoteById($id);
});




$match = $routeur->match();
// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
    $errorController = new \App\Controller\ErrorController();
    $errorController->notFound();
}


