<?php

    function sessionExist(){
        if(isset($_SESSION) and !empty($_SESSION)){
            return 1;
        }else{
           return 0;
        }
    }

?>