<?php

use System\Application;

if (! function_exists('pre')) {
     /**
     * Visualize the given variable in browser
     *
     * @param mixed $var
     * @return void
     */
    function pre($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}

if (! function_exists('pred')) {
     /**
     * Visualize the given variable in browser and exit the application
     *
     * @param mixed $var
     * @return void
     */
    function pred($var)
    {
        pre($var);
        die;
    }
}

if (! function_exists('array_get')) {
     /**
     * Get the value from the given array for the given key if found
     * otherwise get the default value
     *
     * @param array $array
     * @param string|int $key
     * @param mixed $default
     */
    function array_get($array, $key, $default = null)
    {
        return isset($array[$key]) ? $array[$key] : $default;
    }
}

if (! function_exists('_e')) {
     /**
     * Escape the given value
     *
     * @param string $value
     * @return string
     */
    function _e($value)
    {
        return htmlspecialchars($value);
    }
}

if (! function_exists('assets')) {
     /**
     * Generate full path for the given path in public directory
     *
     * @param string $path
     * @return string
     */
    function assets($path)
    {
        $app = Application::getInstance();

        return $app->url->link('public/' . $path);
    }
}

if (! function_exists('url')) {
     /**
     * Generate full path for the given path
     *
     * @param string $path
     * @return string
     */
    function url($path)
    {
        $app = Application::getInstance();

        return $app->url->link($path);
    }
}

if (! function_exists('read_more')) {
    /**
    * Cut the given string and get the given number of words from it
    *
    * @param string $string
    * @param int $number_of_words
    * @return string
    */
    function read_more($string, $number_of_words)
    {
        // remove any empty values in the exploded array
        $words_of_string = array_filter(explode(' ' , $string));

        // if the total words of the given string is less than or equal to
        // the given number of words parameter
        // then we will just return the whole string
        // assume $sting has 10 words
        // and the $number_of_words = 20
        // number of words is bigger than the number of given string words
        // in this case we will just return the string
        if (count($words_of_string) <= $number_of_words) {
            return $string;
        }

        return implode(' ', array_slice($words_of_string, 0, $number_of_words));
    }
}

if (! function_exists('seo')) {
     /**
     * Remove any unwanted characters from the given string
     * and replace it with -
     *
     * @param string $string
     * @return string
     */
    function seo($string)
    {
        // remove any white spaces from the beginning and
        //the end of the given string
        $string = trim($string);

        // replace any non English or numeric characters and dashes with white space
        $string = preg_replace('#[^\w]#', ' ' , $string);

        // replace any multi white spaces with just one white space
        $string = preg_replace('#[\s]+#', ' ', $string);

        // replace white spaces with dash
        $string = str_replace(' ', '-', $string);

        // make all letters in small case letters
        // and trim any dashes
        return trim(strtolower($string), '-');
    }
}