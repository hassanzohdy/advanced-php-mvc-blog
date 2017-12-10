<?php

namespace System;

class Html
{
     /**
     * Application Object
     *
     * @var \System\Application
     */
    protected $app;

     /**
     * Html Title
     *
     * @var string
     */
    private $title;

     /**
     * Html description
     *
     * @var string
     */
    private $description;

     /**
     * Html keywords
     *
     * @var string
     */
    private $keywords;

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
     * Set Title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

     /**
     * Get Title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

     /**
     * Set Keywords
     *
     * @param string $keywords
     * @return void
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

     /**
     * Get Keywords
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

     /**
     * Set Description
     *
     * @param string $description
     * @return void
     */
    public function setDecription($description)
    {
        $this->description = $description;
    }

     /**
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}