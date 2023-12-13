<?php

class EquipeManager{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO("mysql:host=localhost;dbname=projet_jeux_olympiques","root","") or die("echec de connexion");
    }

    public function nombre_equipe(){
        $bdd = $this->bdd;
        $requet = " select count(*) as nbr_equipe from equipe ";
        $reponse = $bdd->prepare($requet);
        $reponse->execute();
        $nbr_equipe = $reponse->fetchColumn();

        return $nbr_equipe;
    }

    public function show_equipe(){
        $bdd = $this->bdd;
        $requet = "SELECT * FROM equipe  ORDER BY id_equipe DESC";
        $reponse = $bdd->prepare($requet);
        $reponse->execute();

        // avoir les resultats sous forme d'objet
        while($data=$reponse->fetch(PDO::FETCH_ASSOC)){
            $resultat = new Equipe();
            $resultat->setId_equipe($data['id_equipe']);
            $resultat->setNom_equipe($data['nom_equipe']);

            $equipes[] = $resultat;  // un tableau d'objet
        }
        return $equipes;
    }

    public function ajouterEquipe(){
        $bdd = $this->bdd;
        if(isset($_POST['nom_equipe'])){
            $nom_equipe=strtoupper($_POST['nom_equipe']);

        }else{
            $nom_equipe="";
        }
             
        if(isset($_POST['ajouter'])){
            $requet="insert into equipe values(null, :nom_equipe)";
            $resultat= $bdd->prepare($requet);
            $reponse=$resultat->execute([
                "nom_equipe" =>$nom_equipe
            ]);
        }
        if($reponse){
            echo "Ajout avec succes";
            header("location: equipe");

        }else{
             echo "L'ajout a echoué";
        }

    }

    public function supprimerEquipe($id){
        $bdd = $this->bdd;
        $requet = " delete from equipe where id_equipe = :id";
        $reponse = $bdd->prepare($requet);
        $reponse->bindParam(':id', $id, PDO::PARAM_INT);
        $reponse->execute();
        header("location: equipe");
    }

    public function find($id){
        $bdd = $this->bdd;

        // Utilisez des requêtes préparées avec des paramètres pour éviter les injections SQL
        $requete = "SELECT * FROM equipe WHERE id_equipe = :id";
        $reponse = $bdd->prepare($requete);
            
        // Liez le paramètre :id à la valeur de $id
        $reponse->bindParam(':id', $id, PDO::PARAM_INT);
            
        // Exécutez la requête
        $reponse->execute();
            
        // Utilisez fetch pour récupérer une seule ligne de résultats
        $data = $reponse->fetch(PDO::FETCH_ASSOC);

        // Vérifiez si des données ont été trouvées avant de créer l'objet Admin
        if (!$data) {
            return null; // Ou renvoyez une erreur ou une valeur par défaut selon vos besoins
        }

        $equipe = new Equipe();
            
        // Utilisez les méthodes setter pour définir les propriétés de l'objet Admin
        $equipe->setId_equipe($data['id_equipe']);
        $equipe->setNom_equipe($data['nom_equipe']);
            
        return $equipe;
    }

    public function modifierEquipe($id){
        $bdd = $this->bdd;
            
            if(isset($_POST['nom_equipe'])){
                $nom_equipe = $_POST['nom_equipe'];

                $sql = "UPDATE equipe SET nom_equipe=? WHERE id_equipe=?";
                $req = $this->bdd->prepare($sql);
                $d = array($nom_equipe, $id);      
                $req->execute($d);
                
                // Vous pouvez vérifier si la requête a réussi en utilisant rowCount
                if ($req->rowCount() > 0) {
                    header("location: equipe");
                } else {
                    echo "La modification a échoué";
                }
            } else {
                echo "La modification a échoué verifier le champ ";
            }
    }
}