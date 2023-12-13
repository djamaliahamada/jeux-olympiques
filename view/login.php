<?php include("_head.php");?>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h4>Bienvenue dans la page login</h4>
              <h6 class="font-weight-light">Connectez-vous pour continuer</h6>
              <form method="POST" action="connexion" class="pt-3">
                <div class="form-group">
                  <input type="text" name="login" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Login">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <input class="btn btn-info" name="se_connecter" btn-block btn-info btn-lg font-weight-medium auth-form-btn" type="submit" value=" Se connecter">
                </div>
                <div class="mb-2">
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>