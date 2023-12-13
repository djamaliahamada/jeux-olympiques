<?php
class RencontreManager
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO("mysql:host=localhost;dbname=projet_jeux_olympiques","root","") or die("echec de connexion");
    }

    public function findAll_av($search = null)
    {
    $bdd = $this->bdd;

    // Vous pouvez ajuster la requête pour inclure la clause WHERE avec la recherche
    $requete = "SELECT r.id_rencontre, r.lieu, r.type, e1.nom_equipe AS equipe_a, 
               e2.nom_equipe AS equipe_b, r.date_rencontre FROM rencontre r
                INNER JOIN equipe e1 ON r.id_equipe_a = e1.id_equipe
                INNER JOIN equipe e2 ON r.id_equipe_b = e2.id_equipe";

    // Ajoutez la clause WHERE si la recherche est spécifiée
    if ($search) {
        $requete .= " WHERE e1.nom_equipe LIKE :search OR e2.nom_equipe LIKE :search";
    }

    $requete .= " ORDER BY r.id_rencontre DESC";

    $reponse = $bdd->prepare($requete);

    // Liez le paramètre de recherche si spécifié
    if ($search) {
        $searchParam = "%$search%";
        $reponse->bindParam(':search', $searchParam, PDO::PARAM_STR);
    }

    $reponse->execute();

    $rencontres_av = array();

    while ($data = $reponse->fetch(PDO::FETCH_ASSOC)) {
        $resultat = new Rencontre();
        $resultat->setId_rencontre($data['id_rencontre']);
        $resultat->setLieu($data['lieu']);
        $resultat->setType($data['type']);
        $resultat->setId_equipe_a($data['equipe_a']);
        $resultat->setId_equipe_b($data['equipe_b']);
        $resultat->setDate_rencontre($data['date_rencontre']);

        $rencontres_av[] = $resultat;
    }

    return $rencontres_av;
    }

    public function nombre_rencontre(){
         $bdd = $this->bdd;
        $requet = " select count(*) as nbr_rencontre from rencontre ";
        $reponse = $bdd->prepare($requet);
        $reponse->execute();
        $nbr_rencontre = $reponse->fetchColumn();

        return $nbr_rencontre;
    }
    public function ajouterRencontre(){
        $bdd = $this->bdd;
        if(isset($_POST['id_equipe_a']) && isset($_POST['id_equipe_b']) && isset($_POST['lieu'])
            && isset($_POST['type']) && isset($_POST['date'])){
            $id_equipe_a=$_POST['id_equipe_a'];
            $id_equipe_b=$_POST['id_equipe_b'];
            $lieu=$_POST['lieu'];
            $type=$_POST['type'];
            $date=$_POST['date'];

        }else{
            $id_equipe_a="";
            $id_equipe_b="";
            $lieu="";
            $type="";
            $date="";
        }
             
        if(isset($_POST['ajouter'])){

                $requet="insert into rencontre values(null, :lieu, :type, :id_equipe_a, :id_equipe_b, :date)";
                $resultat= $bdd->prepare($requet);
                $reponse=$resultat->execute([
                    "lieu" =>$lieu,
                    "type"    =>$type,
                    "id_equipe_a"    =>$id_equipe_a,
                    "id_equipe_b"    =>$id_equipe_b,
                    "date"    =>$date,
                ]);
                    if($reponse){
                    echo "Ajout avec succes";
                    header("location: rencontre");

                }else{
                    echo "L'ajout a echoué";
                }
        }
    }

    public function supprimerRencontre($id){
        $bdd = $this->bdd;
        $requet = " delete from rencontre where id_rencontre = :id";
        $reponse = $bdd->prepare($requet);
        $reponse->bindParam(':id', $id, PDO::PARAM_INT);
        $reponse->execute();
        header("location: rencontre");
    }

    public function find($id){
    $bdd = $this->bdd;
    $requete = "SELECT r.id_rencontre, r.lieu, r.type, e1.nom_equipe AS equipe_a, 
           e2.nom_equipe AS equipe_b, r.date_rencontre FROM rencontre r
            INNER JOIN equipe e1 ON r.id_equipe_a = e1.id_equipe
            INNER JOIN equipe e2 ON r.id_equipe_b = e2.id_equipe 
            WHERE id_rencontre = :id";
    
    // Utilisez une requête préparée sans utiliser $id directement dans la requête
    $reponse = $bdd->prepare($requete);
    
    // Liez le paramètre :id à la valeur de $id
    $reponse->bindParam(':id', $id, PDO::PARAM_INT);
    
    // Exécutez la requête
    $reponse->execute();
    
    // Utilisez fetch pour récupérer une seule ligne de résultats
    $data = $reponse->fetch(PDO::FETCH_ASSOC);

    // Vérifiez si des données ont été trouvées avant de créer l'objet Rencontre
    if (!$data) {
        return null; // Ou renvoyez une erreur ou une valeur par défaut selon vos besoins
    }

    $rencontre = new Rencontre();
    
    // Utilisez les méthodes setter pour définir les propriétés de l'objet Rencontre
    $rencontre->setId_rencontre($data['id_rencontre']);
    $rencontre->setLieu($data['lieu']);
    $rencontre->setType($data['type']);
    $rencontre->setId_equipe_a($data['equipe_a']);
    $rencontre->setId_equipe_b($data['equipe_b']);
    $rencontre->setDate_rencontre($data['date_rencontre']);

    return $rencontre;
}

}
