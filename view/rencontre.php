
<div class="row">
    <div class="col">
        <a href="planifier-rencontre" class="btn btn-info btn-sm btn-icon-text mr-3">
            Planifier un match                      
        </a>
        
    </div>
    <div class="col">
      <form action="">
        <input type="search" name="search" class="form-control" placeholder="Rechercher un equipe">
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
                <th>Equipe A</th>
                <th>Contre</th>
                <th>Equipe B</th>
                <th>Lieu</th>
                <th>Type</th>
                <th>Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach($rencontres as $rencontre){;?>
                <tr>
                  <td><?php echo $rencontre->getId_rencontre(); ?></td>
                  <td><?php echo $rencontre->getId_equipe_a(); ?></td>
                  <td><b>Vs</b></td>
                  <td><?php echo $rencontre->getId_equipe_b(); ?></td>
                  <td><?php echo $rencontre->getLieu(); ?></td>
                  <td><?php echo $rencontre->getType(); ?></td>
                  <td><?php echo $rencontre->getDate_rencontre(); ?></td>
                  <td>
                    <div class="d-flex align-items-center">
                      <a href="#" class="btn btn-success btn-sm btn-icon-text mr-3">
                        Edit
                        <i class="typcn typcn-edit btn-icon-append"></i>                          
                      </a>
                      <a href="<?php echo HOST;?>delete-rencontre?id=<?php echo $rencontre->getId_rencontre(); ?>" class="btn btn-danger btn-sm btn-icon-text">
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