<?php include("_head.php");?>
<div class="container">

    <br>
    <div class="row">
    <div class="col">
        <a href="login" class="btn btn-info btn-sm btn-icon-text mr-3">
            Se connecter                     
        </a>
        
    </div>
    <div class="col">
    </div> 
</div><br>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title badge bg-danger">Matchs à venir</h5>
            <?php foreach($rencontres_av as $rencontre_av){;?>
                <div class="card">
                    <br>
                    <div class="row text-center">
                        <div class="col text-white">
                            <div class="badge bg-secondary">
                                <?php echo $rencontre_av->getId_equipe_a(); ?>
                            </div>
                        </div>
                        <div class="col">
                            <label><?php echo $rencontre_av->getDate_rencontre(); ?></label> <br>
                            <label class="badge bg-danger">Prochain match</label> <br>
                            <label><?php echo $rencontre_av->getLieu(); ?></label>
                        </div>
                        <div class="col text-white">
                            <div class="badge bg-secondary">
                                <?php echo $rencontre_av->getId_equipe_b(); ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <label class="badge bg-info text-white mx-3"><?php echo $rencontre_av->getType(); ?></label>
                </div>
            <?php };?>
        </div>
    </div>
    <br>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title badge bg-success">Matchs joués</h5>
            <div class="card">
                <br>
                <div class="row text-center">
                    <div class="col text-white">
                        <div class="badge bg-secondary">
                            nom de l'equipe 1
                        </div>
                    </div>
                    <div class="col">
                        <label>4</label> - <label>0</label> <br>
                        <label class="badge bg-danger">Fin du match</label> <br>
                        <label>Paris</label>
                    </div>
                    <div class="col text-white">
                        <div class="badge bg-secondary">
                            nom de l'equipe 2
                        </div>
                    </div>
                </div>
                <hr>
                <label class="badge bg-info text-white mx-3">FOOTBALL</label>
            </div>
        </div>
    </div>
    <br>
</div>
<?php include("_footer.php"); ?>