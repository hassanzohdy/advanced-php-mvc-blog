<?php

namespace System;

class Url
{
     /**
     * Application Object
     *
     * @var \System\Application
     */
    protected $app;

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
     * Generate full link for the given path
     *
     * @param string $path
     * @return string
     */
    public function link($path)
    {
        return $this->app->request->baseUrl() . trim($path, '/');
    }

     /**
     * Redirect to the given path
     *
     * @param string $path
     * @return void
     */
    public function redirectTo($path)
    {
        header('location:' . $this->link($path));

        exit;
    }  
}