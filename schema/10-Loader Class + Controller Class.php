<?php
|--
|- Loader Class AND Controller Class
|-
|- Prerequisites
|- Callbacks
|- call_user_func_array
|- Abstract Classes
|-
|- Loader Class
|- This class is responsible for loading Controllers "Classes" AND Models "Classes" located in App directory
|-
|- Properties
|-
|- private \System\Application $app : Application Object
|- private array $controllers = [] : Controllers Container
|- private array $models = [] : Models Container
|-
|- Methods
|- public mixed   Loader::action(string $controller, string $method, array $arguments) Load a class and call a method from it then pass the given arguments to it
|- public object  Loader::controller(string $controller) Load the given controller class and store it in controllers container
|- private bool   Loader::hasController(string $controller) Determine if the given cotroller exists in controllers container
|- private void   Loader::addController(string $controller) Create AND Store the given controller in controllers container
|- private object Loader::getController(string $controller) Get the given controller object
|- public object  Loader::model(string $model) Load the given model class
|- private bool   Loader::hasModel(string $model) Determine if the given cotroller exists in models container
|- private void   Loader::addModel(string $model) Create AND Store the given model in models container
|- private object Loader::getModel(string $model) Get the given model object
|-
|-
|- Controller Class : abstract
|- This class will be set as an abstract class as all controllers will extend it
|-
|- Properties
|-
|- private \System\Application $app : Application Object
|-
|- Methods
|-
|- public mixed Controller::__get($key) Load Shared Application items|Objects dynamically as class property
--|