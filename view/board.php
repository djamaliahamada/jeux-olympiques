<div class="row">
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
          <div>
            <p class="mb-2 text-md-center text-lg-left">Total des Equipes</p>
            <h1 class="mb-0"><?php echo $nbr_equipe;?></h1>
          </div>
          <i class="typcn typcn-briefcase icon-xl text-secondary"></i>
        </div>
        <canvas id="expense-chart" height="80"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
          <div>
            <p class="mb-2 text-md-center text-lg-left">Total des Personnels</p>
            <h1 class="mb-0"><?php echo $nbr_personnel;?></h1>
          </div>
          <i class="typcn typcn-chart-pie icon-xl text-secondary"></i>
        </div>
        <canvas id="budget-chart" height="80"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
            <div>
              <p class="mb-2 text-md-center text-lg-left">Total des Matchs</p>
              <h1 class="mb-0"><?php echo $nbr_rencontre;?></h1>
            </div>
            <i class="typcn typcn-clipboard icon-xl text-secondary"></i>
          </div>
          <canvas id="balance-chart" height="80"></canvas>
        </div>
      </div>
    </div>
  </div>
          
  <label class="btn btn-info btn-sm btn-icon-text mr-3">
    Les données des administrateurs                         
  </label> 
  <br><br>

  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="table-responsive pt-3">
          <table class="table table-striped project-orders-table">
            <thead>
              <tr>
                <th class="ml-5">ID</th>
                <th>Login</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($admins as $admin){;?>
                <tr>
                  <td><?php echo $admin->getId(); ?></td>
                  <td><?php echo $admin->getLogin(); ?> </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <a href="<?php echo HOST;?>edit-admin?id=<?php echo $admin->getId(); ?>" class="btn btn-success btn-sm btn-icon-text mr-3">
                        Edit
                        <i class="typcn typcn-edit btn-icon-append"></i>                          
                      </a>
                      <a href="<?php echo HOST;?>delete-admin?id=<?php echo $admin->getId(); ?>" class="btn btn-danger btn-sm btn-icon-text">
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
        <h4 class="card-title">Admin</h4>
        <p class="card-description">
          Formulaire d'ajout d'un admin
        </p>
        <form method="POST" action="add-admin" class="forms-sample">
          <div class="form-group">
            <label for="exampleInputUsername1">Login</label>
            <input type="text" name="login"  class="form-control" id="exampleInputUsername1" placeholder="Login">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">Confirm Password</label>
            <input type="password" name="confirm_pass" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
          </div>
          <input type="submit" name="ajouter" class="btn btn-info mr-2" value="Ajouter">
        </form>
      </div>
    </div>
  </div>
</div>