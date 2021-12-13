<?php
    include '../crud/CRUD.php';
    $crud = new CRUD();
    
    //print_r($_POST);exit;

    if(isset($_POST)){
        //RECUPERATION DES DONNEES GET

            $Step = $_POST['nextStep'] - 1; 
            $poste = $_POST['poste'];
            $parti = $_POST['parti'];

            if(!isset($_POST['filiere'])){
                $msg = "Veuillez sélectionner la filière svp!";
                echo "<script>alert('$msg')</script>";
                header("refresh:0;url=../candidatures_step$Step.php?parti=$parti");
                exit;
            }

            if(!isset($_POST['niveau'])){
                $msg = "Veuillez sélectionner le niveau d\'étude svp!";
                echo "<script>alert('$msg')</script>";
                header("refresh:0;url=../candidatures_step$Step.php?parti=$parti");
                exit;
            }
          
            $nom = strtoupper($_POST['nom']);
            $prenom = $_POST['prenom'];
            $filiere = $_POST['filiere'];
            $niveau = $_POST['niveau'];
             

            //CREATION DU MEMBRE
            $exec = $crud->registerMember($nom,$prenom,$filiere,$niveau,$poste,$parti);

            if($exec){
                $msg = "Félicitations!\\nLe candidat du parti $parti, $prenom $nom, a été ajouté avec succès au poste de $poste.\\nVeuillez passez à l\'étape suivante :)";
             }else{
                 $msg = "Désolé, nous n\'avons pas pu ajouter $prenom $nom comme candidat du parti $parti.\\nVeuillez reprendre la manoeuvre svp.";
             }
             echo "<script>alert('$msg')</script>";
             header("refresh:0;url=../candidatures_step$Step.php?return=$exec&parti=$parti");

    }

?>