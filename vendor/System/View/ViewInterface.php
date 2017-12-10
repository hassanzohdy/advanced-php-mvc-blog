<?php

namespace System\View;

interface ViewInterface
{
     /**
     * Get the view output
     *
     * @return string
     */
    public function getOutput();

     /**
     * Convert the View object to string in printing
     * i.e echo $object
     *
     * @return string
     */
    public function __toString();
}