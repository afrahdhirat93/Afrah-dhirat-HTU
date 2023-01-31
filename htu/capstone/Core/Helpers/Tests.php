<?php

namespace Core\Helpers;

use Exception;
// are used to declare methods that can be used in multiple classes
trait Tests
{
    // if its exsit or not 
    protected static function check_if_exists($expr, $msg)
    {
        //to change the normal flow of the code execution if a specified error
        // (exceptional) condition occurs
        try {
            
            if (!$expr) {
                throw new \Exception($msg);
            }
        } catch (\Exception $error) {
            echo $error->getMessage();
            die;
        }
    }
}