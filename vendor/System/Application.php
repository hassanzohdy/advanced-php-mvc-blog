<?php

namespace System;

use Closure;

class Application
{
     /**
     * Container
     *
     * @var array
     */
    private $container = [];

     /**
     * Application Object
     *
     * @var \System\Application
     */
    private static $instance;

     /**
     * Constructor
     *
     * @param \System\File $file
     */
    private function __construct(File $file)
    {
        $this->share('file', $file);

        $this->registerClasses();

        $this->loadHelpers();
    }

     /**
     * Get Application Instance
     *
     * @param \System\File $file
     * @return \System\Application
     */
    public static function getInstance($file = null)
    {
        if (is_null(static::$instance)) {
            static::$instance = new static($file);
        }

        return static::$instance;
    }

     /**
     * Run The Application
     *
     * @return void
     */
    public function run()
    {
        $this->session->start();

        $this->request->prepareUrl();

        $this->file->call('App/index.php');

        list($controller, $method, $arguments) = $this->route->getProperRoute();

        if ($this->route->hasCallsFirst()) {
            $this->route->callFirstCalls();
        }

        $output = (string) $this->load->action($controller, $method, $arguments);

        $this->response->setOutput($output);

        $this->response->send();
    }

     /**
     * Register classes in spl auto load register
     *
     * @return void
     */
    private function registerClasses()
    {
        spl_autoload_register([$this, 'load']);
    }

     /**
     * Load Class through autoloading
     *
     * @param string $class
     * @return void
     */
    public function load($class)
    {
        if (strpos($class, 'App') === 0) {
            $file = $class . '.php';
        } else {
            // get the class from vendor
            $file = 'vendor/' . $class . '.php';
        }

        if ($this->file->exists($file)) {
            $this->file->call($file);
        }                     
    }

     /**
     * Load Helpers File
     *
     * @return void
     */
    private function loadHelpers()
    {
        $this->file->call('vendor/helpers.php');
    }

     /**
     * Get Shared Value
     *
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        if (! $this->isSharing($key)) {
            if ($this->isCoreAlias($key)) {
                $this->share($key, $this->createNewCoreObject($key));
            } else {
                die('<b>' . $key . '</b> not found in application container');
            }
        }

        return $this->container[$key];
    }

     /**
     * Determine if the given key is shared through Application
     *
     * @param string $key
     * @return bool
     */
    public function isSharing($key)
    {
        return isset($this->container[$key]);
    }

    /**
    * Share the given key|value Through Application
    *
    * @param string $key
    * @param mixed $value
    * @return mixed
    */
   public function share($key, $value)
   {
       if ($value instanceof Closure) {
           $value = call_user_func($value, $this);
       }

       $this->container[$key] = $value;
   }

     /**
     * Determine if the given key is an alias to core class
     *
     * @param string $alias
     * @return bool
     */
    private function isCoreAlias($alias)
    {
        $coreClasses = $this->coreClasses();

        return isset($coreClasses[$alias]);
    }

     /**
     * Create new object for the core class based on the given alias
     *
     * @param string $alias
     * @return object
     */
    private function createNewCoreObject($alias)
    {
        $coreClasses = $this->coreClasses();

        $object = $coreClasses[$alias];

        return new $object($this);
    }

    /**
    * Get All Core Classes with its aliases
    *
    * @return array
    */
   private function coreClasses()
   {
       return [
            'request'       => 'System\\Http\\Request',
            'response'      => 'System\\Http\\Response',
            'session'       => 'System\\Session',
            'route'         => 'System\\Route',
            'cookie'        => 'System\\Cookie',
            'load'          => 'System\\Loader',
            'html'          => 'System\\Html',
            'db'            => 'System\\Database',
            'view'          => 'System\\View\\ViewFactory',
            'url'           => 'System\\Url',
            'validator'     => 'System\\Validation',
            'pagination'    => 'System\\Pagination',
       ];
   }

    /**
    * Get shared value dynamically
    *
    * @param string $key
    * @return mixed
    */
   public function __get($key)
   {
       return $this->get($key);
   }
}