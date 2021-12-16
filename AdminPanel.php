<?php
    // exit('Forbiden access');
    include 'crud/CRUD.php';
	$crud = new CRUD();
    // $bool = $crud->generatePasswordForElector(1);
    // print_r($bool);s

    $electeurs = $crud->generateElectorList();
    
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            #customers {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #EF8D12;
                color: white;
            }
        </style>
    </head>
    <body>
        <center><h1>Liste officielle des electeurs</h1></center>
        <table id="customers">
            <?php
                $i = 0;
                foreach ($electeurs as $electeur){
            ?>
                <tr>
                    <th>Ordre</th>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Password</th>
                </tr>
                <tr>
                    <td><?=++$i?></td>
                    <td><?=$electeur['matricule']?></td>
                    <td><?=$electeur['nom']?></td>
                    <td><?=$electeur['prenom']?></td>
                    <td><?=$electeur['password']?></td>
                </tr>
                
            <?php
                }
            ?>
        </table>
    </body>
</html>



