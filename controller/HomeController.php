<?php
session_start();
class HomeController{

    // login

    public function showLogin(){
        include(VIEW."login.php");
    }

    public function connexion(){
        $manager = new AdminManager();
        $login = $manager->connexion();
    }

    public function deconnexion(){
        session_destroy();
        header("Location: home");
        exit();
    }
    // partie admin

    public function showboard(){
        //include(VIEW."board.php");
        $manager = new AdminManager();
        $admins = $manager->findAll();

        $manager = new PersonnelManager();
        $nbr_personnel = $manager->nbr_personnel();

        $manager = new EquipeManager();
        $nbr_equipe = $manager->nombre_equipe();

        $manager = new RencontreManager();
        $nbr_rencontre = $manager->nombre_rencontre();

        //echo '<pre>'; print_r($admins); exit;
        $myView = new View('board');
        $myView->render(array('admins'=>$admins,'nbr_equipe'=>$nbr_equipe, 'nbr_personnel'=>$nbr_personnel, 'nbr_rencontre'=>$nbr_rencontre));
        
    }

    public function addAdmin(){
        $manager = new AdminManager();
        $manager->ajouterAdmin();
    }

    public function deleteAdmin(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $manager = new AdminManager();
            $manager->supprimerAdmin($id);
        }
        
    }

    public function editAdmin(){
        if(isset($_GET['id'])){
            
            $id = $_GET['id'];
            $manager = new AdminManager();
            $admin = $manager->find($id);
        }else{
            $admin = new Admin();
        }

        $myView = new View('editAdmin');
        $myView->render(array('admin'=>$admin));
    }

    public function updateAdmin(){
        if(isset($_POST['id'])){
            $id=$_POST['id'];
            $manager = new AdminManager();
            $manager->modifierAdmin($id);
        }
    }

    // home 
    public function showHome(){
        //include(VIEW."home.php");
        $manager = new RencontreManager();
        $rencontres_av = $manager->findAll_av();
        
        $manager = new RencontreManager();
        $rencontres_av = $manager->findAll_av();
        //echo '<pre>'; print_r($rencontres_av); exit;
        include(VIEW."home.php");
    }
    
    // equipe
    public function showEquipe(){
        $manager = new EquipeManager();
        $equipes = $manager->show_equipe();
        
        $myView = new View('equipe');
        $myView->render(array('equipes'=>$equipes));
    }

    public function addEquipe(){
        $manager = new EquipeManager();
        $manager->ajouterEquipe();
    
    }

    public function deleteEquipe(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $manager = new EquipeManager();
            $manager->supprimerEquipe($id);
        }
        
    }

    public function editEquipe(){
        if(isset($_GET['id'])){
            
            $id = $_GET['id'];
            $manager = new EquipeManager();
            $equipe = $manager->find($id);
        }else{
            $equipe = new Equipe();
        }

        $myView = new View('editEquipe');
        $myView->render(array('equipe'=>$equipe));
    }

    public function updateEquipe(){
        if(isset($_POST['id_equipe'])){
            $id=$_POST['id_equipe'];
            $manager = new EquipeManager();
            $manager->modifierEquipe($id);
        }
    }

    // personnel

    public function showPersonnel() {
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : null;

        $manager = new PersonnelManager();
        $personnels = $manager->show_personnel($searchTerm);

        $myView = new View('personnel');
        $myView->render(array('personnels' => $personnels));
    }


    public function formAddPersonnel(){
        $manager = new EquipeManager();
        $equipes = $manager->show_equipe();
        
        $myView = new View('ajouterPersonnel');
        $myView->render(array('equipes'=>$equipes));
    }
    public function AddPersonnel(){
        $manager = new PersonnelManager();
        $manager->ajouterPersonnel();
    }
    public function deletePersonnel(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $manager = new PersonnelManager();
            $manager->supprimerPersonnel($id);
        }
    }
    public function editPersonnel(){
        $manager = new EquipeManager();
        $equipes = $manager->show_equipe();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $manager = new PersonnelManager();
            $personnel = $manager->find($id);
        } else {
            $personnel = new Personnel();
        }

        $myView = new View('editPersonnel');
        $myView->render(array('personnel' => $personnel, 'equipes' => $equipes));
    }

    public function updatePersonnel(){
        if(isset($_POST['id_personnel'])){
            $id=$_POST['id_personnel'];
            $manager = new PersonnelManager();
            $manager->modifierPersonnel($id);
        }
    }

    // rencontre

    public function showRencontre(){
        $search = isset($_GET['search']) ? $_GET['search'] : null;
        $manager = new RencontreManager();
        $rencontres = $manager->findAll_av($search);

        $myView = new View('rencontre');
        $myView->render(array('rencontres'=>$rencontres));
    }

    public function planifierRencontre(){
        $manager = new EquipeManager();
        $equipes_a = $manager->show_equipe();
        $equipes_b = $manager->show_equipe(); // Utilisez la même instance de manager pour les deux requêtes
        
        $myView = new View('planifierMatch');
        $myView->render(array('equipes_a' => $equipes_a, 'equipes_b' => $equipes_b));
    }

    public function addRencontre(){
        $manager = new RencontreManager();
        $manager->ajouterRencontre();
    }

    public function deleteRencontre(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $manager = new RencontreManager();
            $manager->supprimerRencontre($id);
        }
    }

    public function editRencontre(){
        $manager = new EquipeManager();
        $equipes = $manager->show_equipe();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $manager = new RencontreManager();
            $rencontre = $manager->find($id);
        } else {
            $rencontre = new Rencontre();
        }
        
        $myView = new View('editRencontre');
        $myView->render(array('rencontre' => $rencontre, 'equipes' => $equipes));
    }
}
    