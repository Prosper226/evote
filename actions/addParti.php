<?php
    include '../crud/CRUD.php';
    $crud = new CRUD();
    
    if(isset($_POST)){
        //RECUPERATION DES DONNEES POST
            $nom_abrege = strtoupper($_POST['nom_abrege']);
            $nom_complet = $_POST['nom_complet'];
            $proprietaire = $_POST['proprietaire']; 
    
            //CREATION DU PARTI
            $exec = $crud->registerParti($nom_abrege, $nom_complet,$proprietaire);

            if($exec){
               $msg = "Félicitations!\\nLe parti $nom_abrege a été créé avec succès.\\nVeuillez passez à l\'étape suivante :)";
            }else{
                $msg = "Désolé, nous n\'avons pas pu créer le parti $nom_abrege.\\nVeuillez reprendre la manoeuvre svp.";
            }
            echo "<script>alert('$msg')</script>";
            header("refresh:0;url=../candidatures_step1.php?return=$exec&parti=$nom_abrege");

    }

?>