<?php

namespace App\Controller;

class DefaultController {


    public function homeIndex() 
    {
        require ROOT."/App/View/homeIndex.php";
    }

}