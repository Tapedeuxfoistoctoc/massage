<?php
class Maconnection
{   /*
   private $nomBaseDeDonnees = "";
   private $motDePasse = "";
   private $nomUtilisateur = "root";
   private $hote = "localhost";
   */

    private $nomBaseDeDonnees;
    private $motDePasse;
    private $nomUtilisateur;
    private $hote;
    private $connectionPDO;

    public function __construct($nomBaseDeDonnees, $motDePasse, $nomUtilisateur, $hote)
    {
        $this->nomBaseDeDonnees = $nomBaseDeDonnees;
        $this->motDePasse = $motDePasse;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->hote = $hote;


        try {
            $dsn = "mysql:host=$this->hote;dbname=$this->nomBaseDeDonnees;charset=utf8mb4";
            $this->connectionPDO = new PDO($dsn, $this->nomUtilisateur, $this->motDePasse);
            $this->connectionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "True 2Ki est Connecté";
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function select($table, $column)
    {
        try {
            $requete = "SELECT $column from $table";
            $resultat = $this->connectionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function insertionProduit_Secure($nom, $prix, $description)
    {
        try {
            $requete = "INSERT INTO Produit (Nom, Prix, Description) VALUES (:nom, :prix, :description)";
            $requete_preparee = $this->connectionPDO->prepare($requete);

            $requete_preparee->bindParam(':nom', $nom, PDO::PARAM_STR, 25);
            $requete_preparee->bindParam(':prix', $prix, PDO::PARAM_INT);
            $requete_preparee->bindParam(':description', $description, PDO::PARAM_STR, 25);

            $requete_preparee->execute();
            return "insertion reussie";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    

    

    public function miseAJourProduit_Secure($nom, $prix, $description, $id)
    {
        try {
            $requete = "UPDATE Produit SET Nom = ?, Prix = ?, Description = ? WHERE ID_Produit = ?";
            $requete_preparee = $this->connectionPDO->prepare($requete);
            
            $requete_preparee->bindValue(1, $nom, PDO::PARAM_STR);
            $requete_preparee->bindValue(2, $prix, PDO::PARAM_INT);
            $requete_preparee->bindValue(3, $description, PDO::PARAM_STR);
            $requete_preparee->bindValue(4, $id, PDO::PARAM_INT);
            
            $requete_preparee->execute();
            return "mise à jour réussie";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteProduit_Secure($id){
        try {
            $requete = "DELETE FROM Produit WHERE ID_Produit = :id";
            $requete_preparee = $this->connectionPDO->prepare($requete);
        
        $requete_preparee->bindParam(':id',$id,PDO::PARAM_INT);
        $requete_preparee->execute();
        return"insersion reussie";
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }
}
$test = new Maconnection("bulledodu", "", "root", "localhost");
$tableResultat = $test->select("Produit", "*");
/*$test->deleteProduit_Secure(15);*/
/*echo var_dump($tableResultat);*/
