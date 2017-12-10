<?php
/**
* Route Class
*
* Prerequisites
* Good Knowledge OF Regular Expressions
* preg_match
*
* Class Properties
* private \System\Application $app : Application Object
* private array $routes : All Routes Container
*
* /blog/users/add
* /blog/users/submit
* /blog/blablablabla
* /blog/404
*
* controller@method
* controller@index
*
* void Route::add($url, $action, $requestMethod = GET) Add new Route
* string Route::generatePattern($url) Generate regex pattern for the given url
* string Route::getAction($action) Get action which contains controller followed by method
* void Route::notFound($url) Set not found url that will be redirect if no matching route
* array Route::getProperRoute Get the controller, method and its passed arguments
* bool Route::isMatching($pattern) Determine if the given pattern matching the current request url
* array Route::getArgumentsFor($pattern) Get the arguments from the url based on the given regex pattern
*
*