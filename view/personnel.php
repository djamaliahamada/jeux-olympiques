
<div class="row">
    <div class="col">
        <a href="ajouter-personnel" class="btn btn-info btn-sm btn-icon-text mr-3">
            Ajouter personnel                      
        </a>
        
    </div>
    <div class="col">
      <form action="">
        <input type="search" name="search" class="form-control" placeholder="Rechercher par Pays ou role">
      </form>
    </div> 
</div> <br>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="table-responsive pt-3">
          <table class="table table-striped project-orders-table">
            <thead>
              <tr>
                <th class="ml-5">ID</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Sexe</th>
                <th>Role</th>
                <th>Equipe</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach($personnels as $personnel){;?>
                <tr>
                  <td><?php echo $personnel->getId_personnel(); ?></td>
                  <td><?php echo $personnel->getPrenom(); ?></td>
                  <td><?php echo $personnel->getNom(); ?></td>
                  <td><?php echo $personnel->getSexe(); ?></td>
                  <td><?php echo $personnel->getRole(); ?></td>
                  <td><?php echo $personnel->getId_equipe(); ?></td>
                  <td>
                    <div class="d-flex align-items-center">
                      <a href="<?php echo HOST;?>edit-personnel?id=<?php echo $personnel->getId_personnel(); ?>" class="btn btn-success btn-sm btn-icon-text mr-3">
                        Edit
                        <i class="typcn typcn-edit btn-icon-append"></i>                          
                      </a>
                      <a href="<?php echo HOST;?>delete-personnel?id=<?php echo $personnel->getId_personnel(); ?>" class="btn btn-danger btn-sm btn-icon-text">
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
  
</div>