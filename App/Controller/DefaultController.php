<?php

namespace App\Controller;

class DefaultController {

    public function homeIndex() 
    {   
        echo "succès";


        require ROOT."/App/View/homeIndex.php";
    }

}