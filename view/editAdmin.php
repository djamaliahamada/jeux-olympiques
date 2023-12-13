    
  <label class="btn btn-info ">
    Modification des données des administrateurs                         
  </label> 
  <br><br>

  <div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Admin</h4>
        <p class="card-description">
          Formulaire de modification d'un admin
        </p>
        <form method="POST" action="update-admin" class="forms-sample">
            <div class="form-group">
              <input type="hidden" name="id" value="<?php echo $admin->getId(); ?>" class="form-control" id="exampleInputUsername1">
            </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Login</label>
            <input type="text" name="login" value="<?php  echo  $admin->getLogin(); ?>" class="form-control" id="exampleInputUsername1" placeholder="Login">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <input type="submit" name="modifier" class="btn btn-info mr-2" value="Modifier">
        </form>
      </div>
    </div>
  </div>
</div>