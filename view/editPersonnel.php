    
  <label class="btn btn-info ">
    Modification d'un equipe                        
  </label> 
  <br><br>

  <div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Equipe</h4>
        <p class="card-description">
          Formulaire de modification d'un equipe
        </p>
        <form method="POST" action="update-personnel">
            <input type="hidden" value="<?php echo $personnel->getId_personnel(); ?>" name="id_personnel" class="form-control" >
            <div class="row">
                <div class="col">
                </div>
                <div class="col">
                  <label>Equipe</label>
                  <select class="custom-select mr-sm-2" name="id_equipe">
                      <?php foreach ($equipes as $equipe): ?>
                          <option value="<?php echo $equipe->getId_equipe(); ?>" <?php if ($equipe->getId_equipe() == $personnel->getId_equipe()) echo "selected"; ?>>
                              <?php echo $equipe->getNom_equipe(); ?>
                          </option>
                      <?php endforeach; ?>
                  </select>


                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Prenom</label>
                    <input type="text" name="prenom" value="<?php echo $personnel->getPrenom(); ?>" class="form-control" placeholder="Prenom">
                </div>
                <div class="col">
                    <label>Nom</label>
                    <input type="text" name="nom" value="<?php echo $personnel->getNom(); ?>" class="form-control" placeholder="Nom">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Sexe</label>
                    <select class="custom-select mr-sm-2" name="sexe">
                        <option value="<?php echo $personnel->getSexe(); ?>" <?php if($personnel->getSexe()=="homme") echo "selected"; ?>><?php echo $personnel->getSexe(); ?></option>
                        <option value="homme">homme</option>
                        <option value="femme">femme</option>
                    </select>
                </div>
                <div class="col">
                    <label>Role</label>
                    <select class="custom-select mr-sm-2" name="role">
                      <option value="<?php echo $personnel->getRole(); ?>" 
                      <?php if($personnel->getRole()=="joueur"){
                        echo "selected";
                      }elseif($personnel->getRole()=="entraineur"){
                        echo "selected";
                      }elseif($personnel->getRole()=="medecin"){
                        echo "selected";
                      }  ?>>
                      <?php echo $personnel->getRole(); ?></option>
                      <option value="joueur">Joueur</option>
                      <option value="entraineur">Entraineur</option>
                      <option value="medcin">Medcin</option>
                      <option value="arbitre">Arbitre</option>
                  </select>
                </div>
            </div>
            <br>
            <input type="submit" name="ajouter" class="btn btn-info mr-2" value="Modifier">
        </form>
      </div>
    </div>
  </div>
</div>