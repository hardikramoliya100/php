<?php
    include("model.php");
class controller extends model{
    function __construct()
    {
        echo $_SERVER['REQUEST_URI'];
        
        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                        include("view.php");
                    break;
                }
        }
    }
}


?>