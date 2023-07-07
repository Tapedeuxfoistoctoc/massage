<?php

include "connection.php";


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ma premiére interface</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">



</head>

<body>

    <h1>Instance Produit</h1>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Formulaire produit</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Insertion</h6>




            <form method="POST" action="insertionProduit.php">
                <div class="mb-3">
                    <label for="nom_produit" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom_produit" placeholder="chips, ketchup" name="nom" required>
                </div>
                <div class="mb-3">
                    <label for="prix_produit" class="form-label">prix</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="10; 24" name="prix" required>
                </div>
                <div class="mb-3">
                    <label for="description_produit" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="description_produit" placeholder="un peut salé" name="description" required>
                </div>

                <button type="submit" class="btn btn-outline-success">Success</button>
            </form>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

        </div>
    </div>

    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tableResultat as $unedonnees) {
                echo '<form method="POST" action="modificationProduit.php">';
                echo '<tr>';
                echo '<td> <input type="text" class="form-control" value=" ' . $unedonnees['Nom'] . '" name="nom"></td>';
                echo '<td> <input type="text" class="form-control" value=" ' . $unedonnees['Prix'] . '" name="prix"></td>';
                echo '<td> <input type="text" class="form-control" value=" ' . $unedonnees['Description'] . '" name="description"></td>';
                echo '<td> 
                <input type="hidden" class="form-control" value=" ' . $unedonnees['ID_Produit'] . '" name="id">
              
                
                <button type="button" class=""btn btn-outline-secondary"" data-bs-toggle="modal" data-bs-target="#Ajouter">
                Ajouter
            </button>
                        <button type="submit" class="btn btn-outline-success">Modifier</button>
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#Supprimer' . $unedonnees['ID_Produit'] . '">
                Supprimer
                    </button>';
                echo '</tr>';
                echo '</form>';
            }

            ?>

            <form method="POST" action="insertionProduit.php">



                <div class="modal fade" id="Ajouter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">


                                <div class="mb-3">
                                    <label for="nom_produit" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom_produit" placeholder="chips, ketchup" name="nom" required>
                                </div>
                                <div class="mb-3">
                                    <label for="prix_produit" class="form-label">prix</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="10; 24" name="prix" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description_produit" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="description_produit" placeholder="un peut salé" name="description" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Champ à remplir</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </tbody>


    </table>



    <?php

    foreach ($tableResultat as $unedonnees) {
        echo '<form method="POST" action="Supprimer.php">';
        echo '<div class="modal fade" id="Supprimer' . $unedonnees['ID_Produit'] . '" tabindex="-1" aria-labelledby="exampleModalLabel' . $unedonnees['ID_Produit'] . '" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel' . $unedonnees['ID_Produit'] . '">Ici pour supprimer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
      <input type="hidden" class="form-control" value=" ' . $unedonnees['ID_Produit'] . '" name="id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="sumbit" class="btn btn-primary">Changement sauvegarder</button>
        
      </div>
    </div>
  </div>
</div>';
        echo '</form>';
    }
    ?>


    <!-- <h1>Test nouvelle instance client</h1>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>

            </tr>

        </thead>
        <tbody>
            <tr>
                <td><input type="text" class="form-control" id="nom_patient" placeholder="Mord" name="nom" require></td>
                <td><input type="text_adresse" class="form-control" id="adresse_patient" placeholder="moileneu" name="adresse" require></td>
                <td><input type="text_email" class="form-control" id="email_patient" placeholder="Côt2bof@gmail.com" name=email></td>
                <td>
                    <button type="submit" class="btn btn-outline-success">Ajouter</button>
                    <button type="button" class="btn btn-outline-info">Modifer</button>
                    <button type="button" class="btn btn-outline-danger">Supprimer</button>
                </td>
            </tr>
        -->

    <?php
    /*
            $uneNouvelleInstance = new Maconnection("bulledodu", "", "root", "localhost");
            $unAutreTableau;
            $unAutreTableau =   $uneNouvelleInstance->select("client", "*");

            foreach ($newTableau as $newItem) {

                echo '<tr>';
                echo '<form method="POST" action="modificationpatient.php">
                    <input type="hidden" name="id" value="' . $newItem['idpatient'] . '"required>
                      


                 <td><input type="text" class="form-control" id="nom_patient" placeholder="frero, max" name="Nom" value="' . $newItem['Nom'] . '"required></td>
                 
                 <td><input type="text_adresse" class="form-control" id="adresse_patient" placeholder="rue ravioli" name="Adresse"  value="' . $newItem['Adresse'] . '"required></td>
                 
                 <td><input type="text_email" class="form-control" id="email_patient" placeholder="Tadoe@gmail.com" name="AdresseEmail" value="' . $newItem['AddresseEmail'] . '"required></td>
                 
                 <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</button>
                        <button type="button" class="btn btn-outline-info">Modifier</button>
                        <button type="button" class="btn btn-outline-danger">Supprimer</button>
                </td>
                <tr>';
            }

*/



    /*  $uneNouvelleInstance = new Maconnection("bulledodu", "", "root", "localhost");
            $unAutreTableau;
            $unAutreTableau =   $uneNouvelleInstance->select("client", "*");
            foreach ($unAutreTableau as $unItem) {
                
                echo '<tr>
                <td>' . $unItem['Nom'] . '</td>
                
                <td>' . $unItem['Adresse'] . '</td>
                
                <td>' . $unItem['AdresseEmail'] . '</td>

               
               
                
            </tr>';
            
            }
*/

    ?>



    </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>