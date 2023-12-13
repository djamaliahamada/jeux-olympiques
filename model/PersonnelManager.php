<?php

class PersonnelManager{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO("mysql:host=localhost;dbname=projet_jeux_olympiques","root","") or die("echec de connexion");
    }

    public function show_personnel($search = null) {
        $bdd = $this->bdd;

        // Utilisez des requêtes préparées avec des paramètres pour éviter les injections SQL
        $requete = "SELECT p.id_personnel, p.prenom, p.nom, p.sexe, p.role, 
                    e.nom_equipe AS equipe 
                    FROM personnel p
                    INNER JOIN equipe e ON p.id_equipe = e.id_equipe";

        // Ajoutez la condition de recherche si un terme de recherche est fourni
        if ($search) {
            $requete .= " WHERE e.nom_equipe LIKE :search OR p.role LIKE :search";
        }

        $requete .= " ORDER BY p.id_personnel DESC";

        $reponse = $bdd->prepare($requete);

        // Si un terme de recherche est fourni, liez-le à la requête
        if ($search) {
            $searchParam = "%$search%";
            $reponse->bindParam(':search', $searchParam, PDO::PARAM_STR);
        }

        $reponse->execute();

        // Avoir les résultats sous forme d'objet
        while ($data = $reponse->fetch(PDO::FETCH_ASSOC)) {
            $resultat = new Personnel();
            $resultat->setId_personnel($data['id_personnel']);
            $resultat->setPrenom($data['prenom']);
            $resultat->setNom($data['nom']);
            $resultat->setSexe($data['sexe']);
            $resultat->setRole($data['role']);
            $resultat->setId_equipe($data['equipe']);

            $personnels[] = $resultat;  // Un tableau d'objet
        }

        return $personnels;
    }

    public function nbr_personnel(){
        $bdd = $this->bdd;
        $requet = " select count(*) as nbr_personnel from personnel ";
        $reponse = $bdd->prepare($requet);
        $reponse->execute();
        $nbr_personnel = $reponse->fetchColumn();

        return $nbr_personnel;
    }

    public function ajouterPersonnel(){
        $bdd = $this->bdd;
        if(isset($_POST['id_equipe']) && isset($_POST['prenom']) && isset($_POST['nom'])
            && isset($_POST['sexe']) && isset($_POST['role'])){
            $id_equipe=$_POST['id_equipe'];
            $prenom=$_POST['prenom'];
            $nom=$_POST['nom'];
            $sexe=$_POST['sexe'];
            $role=$_POST['role'];

        }else{
            $id_equipe="";
            $prenom="";
            $nom="";
            $sexe="";
            $role="";
        }
             
        if(isset($_POST['ajouter'])){

                $requet="insert into personnel values(null, :prenom, :nom, :sexe, :role, :id_equipe)";
                $resultat= $bdd->prepare($requet);
                $reponse=$resultat->execute([
                    "prenom" =>$prenom,
                    "nom"    =>$nom,
                    "sexe"    =>$sexe,
                    "role"    =>$role,
                    "id_equipe"    =>$id_equipe,
                ]);
                    if($reponse){
                    echo "Ajout avec succes";
                    header("location: personnel");

                }else{
                    echo "L'ajout a echoué";
                }
        }
 
    }

    public function supprimerPersonnel($id){
        $bdd = $this->bdd;
        $requet = " delete from personnel where id_personnel = :id";
        $reponse = $bdd->prepare($requet);
        $reponse->bindParam(':id', $id, PDO::PARAM_INT);
        $reponse->execute();
        header("location: personnel");
    }

    public function find($id){
        $bdd = $this->bdd;

        // Utilisez des requêtes préparées avec des paramètres pour éviter les injections SQL
        $requete = "SELECT p.id_personnel, p.id_equipe, p.prenom, p.nom, p.sexe, p.role, e.nom_equipe AS equipe 
                    FROM personnel p
                    INNER JOIN equipe e ON p.id_equipe = e.id_equipe 
                    WHERE id_personnel = :id";
        $reponse = $bdd->prepare($requete);
            
        // Liez le paramètre :id à la valeur de $id
        $reponse->bindParam(':id', $id, PDO::PARAM_INT);
            
        // Exécutez la requête
        $reponse->execute();
            
        // Utilisez fetch pour récupérer une seule ligne de résultats
        $data = $reponse->fetch(PDO::FETCH_ASSOC);

        // Vérifiez si des données ont été trouvées avant de créer l'objet Personnel
        if (!$data) {
            return null; // Ou renvoyez une erreur ou une valeur par défaut selon vos besoins
        }

        $personnel = new Personnel();
            
        // Utilisez les méthodes setter pour définir les propriétés de l'objet Personnel
        $personnel->setId_personnel($data['id_personnel']);
        $personnel->setPrenom($data['prenom']);
        $personnel->setNom($data['nom']);
        $personnel->setSexe($data['sexe']);
        $personnel->setRole($data['role']);
        $personnel->setId_equipe($data['equipe']);
        $personnel->setId_equipe($data['id_equipe']);
            
        return $personnel;
    }

    public function modifierPersonnel($id){
    $bdd = $this->bdd;
        
    if(isset($_POST['id_equipe']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['sexe']) && isset($_POST['role'])){
        $id_equipe = $_POST['id_equipe'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $sexe = $_POST['sexe'];
        $role = $_POST['role'];

        $sql = "UPDATE personnel SET id_equipe=?, prenom=?, nom=?, sexe=?, role=? WHERE id_personnel=?";
        $req = $this->bdd->prepare($sql);
        $d = array($id_equipe, $prenom, $nom, $sexe, $role, $id);      
        $req->execute($d);
        
        // Vous pouvez vérifier si la requête a réussi en utilisant rowCount
        if ($req->rowCount() > 0) {
            header("location: personnel");
        } else {
            echo "La modification a échoué";
        }
    } else {
        echo "La modification a échoué. Veuillez vérifier les champs.";
    }
}


}