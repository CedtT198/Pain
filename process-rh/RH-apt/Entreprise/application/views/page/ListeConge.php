<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <div class="row">
          <!-- <div class="col-md-1"></div> -->
          <div class="offset-6 col-md-6"><h2 class="font-weight-bold"><small class="h2 text-muted"><cite title="Source Title">CONGES</cite></small></h2></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="offset-1 col-md-5 grid-margin stretch-card">
      <div class="card">
          <div class="card-body">
              <div class="row">
                  <div class="offset-5 mb-4"><h4 class="card-title">A propos</h4></div>
              </div>
              <div class="row">
                  <div class="offset-1 col-md-5">  
                      <p class="font-weight-bold">Id Matricule :</p>
                  </div>
                  <div class="col-md-6">
                      <address class="text-primary">
                          <p class="mb-2">XXXXX</p>
                      </address>
                  </div>
              </div>
              <div class="row">
                  <div class="offset-1 col-md-5">  
                      <p class="font-weight-bold">Nom :</p>
                  </div>
                  <div class="col-md-6">
                      <address class="text-primary">
                          <p class="font-weight-bold"><?php echo $personnel['personnel_nom']; ?></p>
                      </address>
                  </div>
              </div>
              <div class="row">
                  <div class="offset-1 col-md-5">  
                      <p class="font-weight-bold">Prenom :</p>
                  </div>
                  <div class="col-md-6">
                      <address class="text-primary">
                          <p class="font-weight-bold"><?php echo $personnel['prenom']; ?></p>
                      </address>
                  </div>
              </div>
              <div class="row">
                  <div class="offset-1 col-md-5">  
                      <p class="font-weight-bold">Poste :</p>
                  </div>
                  <div class="col-md-6">
                      <address class="text-primary">
                          <p class="mb-2"><?php echo $personnel['poste_nom']; ?></p>
                      </address>
                  </div>
              </div>
              <div class="row">
                  <div class="offset-1 col-md-5">  
                      <p class="font-weight-bold">Departement :</p>
                  </div>
                  <div class="col-md-6">
                      <address class="text-primary">
                          <p class="mb-2"><?php echo $personnel['nom_centre']; ?></p>
                      </address>
                  </div><br><br><br><br><br><br><br>
              </div>
          </div>
      </div>
  </div>

  <div class="col-md-5 grid-margin stretch-card" id="nouveau-btn" style="display:block">
      <button type="button" class="btn btn-primary mr-2" onclick="afficherFormulaire()">Nouveau</button>
  </div>

  <div class="col-md-5 grid-margin stretch-card" id="formulaire" style="display:none">
      <div class="card">
          <div class="card-body">
              <h4 class="offset-5 card-title">Ajouter congé</h4>
              <form class="forms-sample" action="<?php echo site_url('CongeController/insert'); ?>" method="post">
                  <div class="form-group row">
                      <label for="dateDebut" class="col-sm-3 col-form-label">Date début</label>
                      <div class="col-sm-9">
                          <input type="date" class="form-control" id="dateDebut" name="dateDebut">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="dateFin" class="col-sm-3 col-form-label">Date fin</label>
                      <div class="col-sm-9">
                          <input type="date" class="form-control" id="dateFin" name="dateFin">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="type_conge" class="col-sm-3 col-form-label">Type de congé</label>
                      <div class="col-sm-9">
                          <select class="form-control form-control-sm" name="type_conge" id="type_conge">
                            <?php foreach($type_conges as $tp) { ?>
                              <option value="<?php echo $tp['id_type_conge']; ?>"><?php echo $tp['nom_type_conge']; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                  </div>
                  <div class="row">
                      <div class="offset-4">
                          <button type="submit" class="btn btn-primary mr-2">Valider</button>
                          <button type="button" class="btn btn-light" onclick="cacherFormulaire()">Annuler</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
  <script>
      function afficherFormulaire() {
          document.getElementById("nouveau-btn").style.display = "none";
          document.getElementById("formulaire").style.display = "block";
      }

      function cacherFormulaire() {
          document.getElementById("nouveau-btn").style.display = "block";
          document.getElementById("formulaire").style.display = "none";
      }
  </script>

<div class="row">
  <div class="offset-1 col-md-10 stretch-card grid-margin">
      <div class="card">
      <div class="card-body">
          <div class="table-responsive">
          <table class="table table-borderless">
              <h3>Congés déjà pris</h3>
              <thead>
                <tr>
                    <th class="pl-0  pb-2 border-bottom">Date début</th>
                    <th class="pl-0  pb-2 border-bottom">Date fin</th>
                    <th class="border-bottom pb-2">Motif</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php foreach($conges as $conge) { ?>
                    <td>
                      <p class="mb-0"><span class="font-weight-bold mr-2"><?php echo $conge['date_debut']; ?></span></p>
                    </td>
                    <td>
                      <p class="mb-0"><span class="font-weight-bold mr-2"><?php echo $conge['date_fin'] ?></span></p>
                    </td>
                    <td class="text-muted">
                      <?php
                        $type = $this->TypeCongeModel->getById($conge['id_type_conge']);
                        echo $type;
                      ?>
                    </td>
                  <?php } ?>
                </tr>
              </tbody>
          </table>
          </div>
      </div>
      </div>
  </div>
</div>