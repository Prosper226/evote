<?php
    include '../crud/CRUD.php';
    $crud = new CRUD();
    //print_r($_GET); exit;
    $msg = "Impossible de contacter le serveur!";
    if(isset($_GET) && !empty($_GET)){
        //RECUPERATION DES DONNEES GET
            $parti = strtoupper($_GET['parti']);
            $electeur = $_GET['electeur'];

            $is_Electeur = $crud->existElecteur($electeur);
            $is_Parti = $crud->existParti($parti);

            if($is_Electeur && $is_Parti){
                $already_vote = $crud->alreadyVote($electeur);
                if(!$already_vote){
                    $exec = $crud->addVote($electeur, $parti); 
                    if($exec){
                        $msg = "Félicitations!\\nVotre voix pour $parti a bien été pris en compte.\\nMerci de rester connecté à la plateforme pour suivre l\'évolution des votes.\\nLes résultats provisoires sont accessibles sur la rubrique \"Resultats\" de la plateforme.";
                    }else{
                        $msg = "Désolé, Votre vote n\'a pas pu être considéré.\\nVeuillez reprendre svp!";
                    }
                }else{
                    $msg = "Désolé, vous avez déja validé votre vote!";
                }
            }else{
                $msg = "Désolé, vous n\'êtes pas illigible aux votes!\\nVeuillez contacter l\'administration pour des explications.";
            }
    }
    echo "<script>alert('$msg')</script>";
    header("refresh:0;url=../votes.php");

?>