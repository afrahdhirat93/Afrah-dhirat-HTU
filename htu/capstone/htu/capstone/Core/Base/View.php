<?php

namespace Core\Base;

/**
 * Include the php html template
 */
class View
{
    // when i create object from the class automatically call the construct function 
    public function __construct(string $view, array $data = array())
    {
        //hold argument view and data 
        $view = \str_replace('.', '/', $view);
    // replace . to the / 
        $data = (object) $data;

        $header = 'header';
        $footer = 'footer';
// check if the user session is true 
//determint the varaiable is declare and diffrent than null 
        if (isset($_SESSION['user']['is_admin_view'])) {
            if ($_SESSION['user']['is_admin_view']) {
                $header = 'header-admin';
                $footer = 'footer-admin';
            }
        }


        include_once \dirname(__DIR__, 2) . "/resources/views/partials/$header.php"; // includes the header for all the views

        include_once \dirname(__DIR__, 2) . "/resources/views/$view.php";

        include_once \dirname(__DIR__, 2) . "/resources/views/partials/$footer.php";    }
}