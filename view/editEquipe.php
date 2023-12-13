    
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
        <form method="POST" action="update-equipe" class="forms-sample">
            <div class="form-group">
              <input type="hidden" name="id_equipe" value="<?php echo $equipe->getId_equipe(); ?>" class="form-control" id="exampleInputUsername1">
            </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Login</label>
            <input type="text" name="nom_equipe" value="<?php  echo  $equipe->getNom_equipe(); ?>" class="form-control" id="exampleInputUsername1" placeholder="Login">
          </div>
          <input type="submit" name="modifier" class="btn btn-info mr-2" value="Modifier">
        </form>
      </div>
    </div>
  </div>
</div>