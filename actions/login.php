<?php
    session_start();
    include '../crud/CRUD.php';
    $crud = new CRUD();

    //print_r($_POST); exit;
    if(isset($_POST)){
        //RECUPERATION DES DONNEES POST
            $matricule = $_POST['matricule'];
            $password = $_POST['password'];
            $link = $_POST['link']; 
            $exec = $crud->userLogin($matricule,$password);
            $msg = "Désolé, impossible de se connecter!\\nMatricule et/ou mot de passe incorrectes. ";
            if(isset($exec)){
                if($exec){
                    $link .= '_step1';
                    $_SESSION['matricule'] = $matricule;
                    header("refresh:0;url=../$link.php");
                }else{
                    echo "<script>alert('$msg')</script>";
                    session_destroy();
                    header("refresh:0;url=../$link.php");
                }
            }else{
                echo "<script>alert('$msg')</script>";
                session_destroy();
                header("refresh:0;url=../$link.php");
            }
    }

?>
