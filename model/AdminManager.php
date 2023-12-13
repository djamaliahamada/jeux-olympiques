<?php
    class AdminManager{

        private $bdd;

        public function __construct()
        {
            $this->bdd = new PDO("mysql:host=localhost;dbname=projet_jeux_olympiques","root","") or die("echec de connexion");
        }
        public function connexion(){
            $bdd = $this->bdd;
            if( isset($_POST['se_connecter']) && !empty($_POST['se_connecter']) ) {

                $query = "SELECT * FROM admin WHERE login = ?";

                $reponse = $bdd->prepare($query);
                $reponse->execute([$_POST['login']]);

                //vérifie si login est correct
                if( $reponse->rowCount() != 0 ){
                    $user = $reponse->fetch();
                    
                    //test si le password est bon
                if( $_POST['password']==$user['mdp']){
                    //créer la session
                    $_SESSION['admin'] = $user;
                    //echo '<pre>'; print_r($_SESSION['admin']['login']); exit;
                    header("location: board");
                    exit;
                    }else{
                        echo "erreur de mot de passe";
                    }
                }else{
                    echo "login not found";
                }
            }
        }

        public function ajouterAdmin(){
            $bdd = $this->bdd;
            if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['confirm_pass'])){
                $login=$_POST['login'];
                $password=$_POST['password'];
                $confirm_pass=$_POST['confirm_pass'];

            }else{
                $login="";
                $password="";
                $confirm_pass="";
            }
             
            if(isset($_POST['ajouter'])){
                if($password==$confirm_pass){
                    $requet="insert into admin values(null, :login, :mdp)";
                    $resultat= $bdd->prepare($requet);
                    $reponse=$resultat->execute([
                        "login" =>$login,
                        "mdp"    =>$password,
                    ]);
                     if($reponse){
                        echo "Ajout avec succes";
                        header("location: board");

                    }else{
                        echo "L'ajout a echoué";
                    }
                }else{
                    echo " Les mots de passes ne sont pas identiques";
                }

               
                
            }
           
        }

        public function supprimerAdmin($id){
            $bdd = $this->bdd;
            $requet = " delete from admin where id = :id";
            $reponse = $bdd->prepare($requet);
            $reponse->bindParam(':id', $id, PDO::PARAM_INT);
            $reponse->execute();
            header("location: board");
        }

        public function modifierAdmin($id){
            $bdd = $this->bdd;
            
            if(isset($_POST['login']) && isset($_POST['password'])){
                $login = $_POST['login'];
                $password = $_POST['password'];

                $sql = "UPDATE admin SET login=?, mdp=? WHERE id=?";
                $req = $this->bdd->prepare($sql);
                $d = array($login, $password, $id);      
                $req->execute($d);
                
                // Vous pouvez vérifier si la requête a réussi en utilisant rowCount
                if ($req->rowCount() > 0) {
                    header("location: board");
                } else {
                    echo "La modification a échoué";
                }
            } else {
                echo "La modification a échoué";
            }
        }


        public function findAll(){
            $bdd = $this->bdd;
            $requet = "SELECT * FROM admin ORDER BY id DESC";
            $reponse = $bdd->prepare($requet);
            $reponse->execute();

            // avoir les resultats sous forme d'objet (tableau associatif)
            while($data = $reponse->fetch(PDO::FETCH_ASSOC)){
                $resultat = new Admin();
                $resultat->setId($data['id']);
                $resultat->setLogin($data['login']);

                $admins[] = $resultat;  // un tableau d'objet
            }
            return $admins;
        }

        public function find($id){
            $bdd = $this->bdd;

            // Utilisez des requêtes préparées avec des paramètres pour éviter les injections SQL
            $requete = "SELECT * FROM admin WHERE id = :id";
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

            $admin = new Admin();
            
            // Utilisez les méthodes setter pour définir les propriétés de l'objet Admin
            $admin->setId($data['id']);
            $admin->setLogin($data['login']);
            $admin->setMdp($data['mdp']);
            
            return $admin;
    }

    }


