<br>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Personnel</h4>
        <p class="card-description">
          Formulaire d'ajout d'un personnel
        </p>
        <form method="POST" action="add-personnel">
            <div class="row">
                <div class="col">
                </div>
                <div class="col">
                    <label>Equipe</label>
                    <select class="custom-select mr-sm-2" name="id_equipe">
                        <?php foreach ($equipes as $equipe): ?>
                            <option value="<?php echo $equipe->getId_equipe(); ?>"><?php echo $equipe->getNom_equipe(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Prenom</label>
                    <input type="text" name="prenom" class="form-control" placeholder="Prenom">
                </div>
                <div class="col">
                    <label>Nom</label>
                    <input type="text" name="nom" class="form-control" placeholder="Nom">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Sexe</label>
                    <select class="custom-select mr-sm-2" name="sexe">
                        <option value="homme">homme</option>
                        <option value="femme">femme</option>
                    </select>
                </div>
                <div class="col">
                    <label>Role</label>
                    <select class="custom-select mr-sm-2" name="role">
                    <option value="joueur">Joueur</option>
                    <option value="entraineur">Entraineur</option>
                    <option value="medcin">Medcin</option>
                    <option value="arbitre">Arbitre</option>
                </select>
                </div>
            </div>
            <br>
            <input type="submit" name="ajouter" class="btn btn-info mr-2" value="Ajouter">
        </form>
      </div>
    </div>
  </div>
</div>