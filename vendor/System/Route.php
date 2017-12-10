<?php

namespace System;

class Route
{
     /**
     * Application Object
     *
     * @var \System\Application
     */
    private $app;

     /**
     * Routes Container
     *
     * @var array
     */
    private $routes = [];

     /**
     * Current Route
     *
     * @var array
     */
    private $current = [];

     /**
     * Not Found Url
     *
     * @var string
     */
    private $notFound;

     /**
     * Calls Container
     *
     * @var array
     */
    private $calls = [];

     /**
     * Constructor
     *
     * @param \System\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
    * Get All routes
    *
    * @return array
    */
    public function routes()
    {
        return $this->routes;
    }

     /**
     * Add New Route
     *
     * @param string $url
     * @param string $action
     * @param string $requestMethod
     * @return void
     */
    public function add($url, $action, $requestMethod = 'GET')
    {
        $route = [
            'url'       => $url,
            'pattern'   => $this->generatePattern($url),
            'action'    => $this->getAction($action),
            'method'    => strtoupper($requestMethod),
        ];

        $this->routes[] = $route;
    }

     /**
     * Set Not Found Url
     *
     * @param string $url
     * @return void
     */
    public function notFound($url)
    {
        $this->notFound = $url;
    }

     /**
     * Call the given callback before calling the main controller
     *
     * @var callable $callable
     * @return $this
     */
    public function callFirst(callable $callable)
    {
        $this->calls['first'][] = $callable;

        return $this;
    }

     /**
     * Determine if there are any callbacks that will be called before
     * calling the main controller
     *
     * @return bool
     */
    public function hasCallsFirst()
    {
        return ! empty($this->calls['first']);
    }

     /**
     * Call All callbacks that will be called before
     * calling the main controller
     *
     * @return bool
     */
    public function callFirstCalls()
    {
        foreach ($this->calls['first'] AS $callback) {
            call_user_func($callback, $this->app);
        }
    }

    /**
    * Get Proper Route
    *
    * @return array
    */
   public function getProperRoute()
   {
       foreach ($this->routes as $route) {
           if ($this->isMatching($route['pattern']) AND $this->isMatchingRequestMethod($route['method'])) {
               $arguments = $this->getArgumentsFrom($route['pattern']);

               // controller@method
               list($controller, $method) = explode('@', $route['action']);

               $this->current = $route;

               return [$controller, $method, $arguments];
           }
       }

       return $this->app->url->redirectTo($this->notFound);
   }

    /**
    * Get Current Route Url
    *
    * @return string
    */
   public function getCurrentRouteUrl()
   {
       return $this->current['url'];
   }

    /**
    * Determine if the given pattern matches the current request url
    *
    * @param string $pattern
    * @return bool
    */
   private function isMatching($pattern)
   {
       return preg_match($pattern, $this->app->request->url());
   }

   /**
   * Determine if the current request method equals
   * the given route method
   *
   * @param string $routeMethod
   * @return bool
   */
   private function isMatchingRequestMethod($routeMethod)
   {
       return $routeMethod == $this->app->request->method();
   }

    /**
    * Get Arguments from the current request url
    * based on the given pattern
    *
    * @param string $pattern
    * @return array
    */
   private function getArgumentsFrom($pattern)
   {
       preg_match($pattern, $this->app->request->url(), $matches);

       array_shift($matches);

       return $matches;
   }

     /**
     * Generate a regex pattern for the given url
     *
     * @param string $url
     * @return string
     */
    private function generatePattern($url)
    {
        $pattern = '#^';

        // :text ([a-zA-Z0-9-]+)
        // :id (\d+)
        // my name is hasan
        // my
        // you
        // str_replace('my', 'you', 'my name is hasan');

        // [a,b]
        // [c,d]
        // a b e
        // c d e
        // ([a-zA-Z0-9-]+)

        $pattern .= str_replace([':text', ':id'], ['([a-zA-Z0-9-]+)', '(\d+)'] , $url);

        $pattern .= '$#';

        return $pattern;
    }

     /**
     * Get The Proper Action
     *
     * @param string $action
     * @return string
     */
    private function getAction($action)
    {
        $action = str_replace('/' , '\\', $action);

        return strpos($action, '@') !== false ? $action : $action . '@index';
    }
}