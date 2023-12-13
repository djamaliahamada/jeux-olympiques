<br>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Match</h4>
        <p class="card-description">
          Planification d'un match
        </p>
        <form method="POST" action="ajouter-rencontre">
            <div class="row">
                <div class="col">
                     <label>Equipe A</label>
                    <select class="custom-select mr-sm-2" name="id_equipe_a">
                        <?php foreach ($equipes_a as $equipe_a): ?>
                            <option value="<?php echo $equipe_a->getId_equipe(); ?>"><?php echo $equipe_a->getNom_equipe(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <label>Equipe B</label>
                    <select class="custom-select mr-sm-2" name="id_equipe_b">
                        <?php foreach ($equipes_b as $equipe_b): ?>
                            <option value="<?php echo $equipe_b->getId_equipe(); ?>"><?php echo $equipe_b->getNom_equipe(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Lieu</label>
                    <input type="text" name="lieu" class="form-control" placeholder="Lieu">
                </div>
                <div class="col">
                    <label>Type</label>
                    <input type="text" name="type" class="form-control" placeholder="Type">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="col"></div>
            </div>
            <br>
            <input type="submit" name="ajouter" class="btn btn-info mr-2" value="Ajouter">
        </form>
      </div>
    </div>
  </div>
</div>