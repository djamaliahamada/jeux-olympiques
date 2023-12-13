
 
<form method="Get">
  <div class="row">
    <div class="col">
        <label class="btn btn-info btn-sm btn-icon-text mr-3">
            Les équipes                       
        </label>
    </div>
    <!-- <div class="col">
      <input type="search" name="equipe" class="form-control" placeholder="Entrer le nom de l'equipe">
    </div> -->
  </div>
</form> <br>
<div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="table-responsive pt-3">
          <table class="table table-striped project-orders-table">
            <thead>
              <tr>
                <th class="ml-5">ID</th>
                <th>Nom</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach($equipes as $equipe){;?>
                <tr>
                  <td><?php echo $equipe->getId_equipe(); ?></td>
                  <td><?php echo $equipe->getNom_equipe(); ?></td>
                  <td>
                    <div class="d-flex align-items-center">
                      <a href="<?php echo HOST;?>edit-equipe?id=<?php echo $equipe->getId_equipe(); ?>" class="btn btn-success btn-sm btn-icon-text mr-3">
                        Edit
                        <i class="typcn typcn-edit btn-icon-append"></i>                          
                      </a>
                      <a href="<?php echo HOST;?>delete-equipe?id=<?php echo $equipe->getId_equipe(); ?>" class="btn btn-danger btn-sm btn-icon-text">
                        Delete
                        <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                      </a>
                    </div>
                  </td>
                </tr>
                <?php };?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Equipe</h4>
        <p class="card-description">
          Formulaire d'ajout d'un équipe
        </p>
        <form method="POST" action="add-equipe" class="forms-sample">
          <div class="form-group">
            <label for="exampleInputUsername1">Nom</label>
            <input type="text" name="nom_equipe"  class="form-control" id="exampleInputUsername1" placeholder="Nom de l'equipe">
          </div>
          <input type="submit" name="ajouter" class="btn btn-info mr-2" value="Ajouter">
        </form>
      </div>
    </div>
  </div>
</div>