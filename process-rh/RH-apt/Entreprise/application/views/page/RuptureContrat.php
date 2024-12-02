  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <div class="row">
            <!-- <div class="col-md-1"></div> -->
            <div class="offset-6 col-md-6"><h2 class="font-weight-bold"><small class="h2 text-muted"><cite title="Source Title">Rupture de contrat</cite></small></h2></div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="row">
    <div class="offset-3 col-md-5 grid-margin stretch-card">
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
                          <p class="font-weight-bold"><?php
                          // var_dump($personnel);
                          echo $personnel['personnel_nom']; ?></p>
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
                      <p class="font-weight-bold">Date de naissance :</p>
                  </div>
                  <div class="col-md-6">
                      <address class="text-primary">
                          <p class="font-weight-bold"><?php echo $personnel['date_naissance']; ?></p>
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
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Licenciement</h4>
            <p class="card-description">
              Conditions d'un<code>renvoie</code>
            </p>
            <p>
            Procédure stricte : <br>
              - Convocation à un entretien préalable. <br>
              - Notification écrite précisant le motif. <br>
              - Respect du préavis (sauf en cas de faute grave ou lourde).  <br>
            </p>
            <div class="row">
              <div class="offset-5"></div>
              <div>
                <form class="forms-sample" method="post" action ="<?php echo site_url('RuptureContratController/licencie'); ?>">
                  <input type="hidden" name="id_personnel" value="<?php echo $personnel['id_personnel']; ?>">
                  <div class="form-group">
                    Motif
                    <select name="id_motif_rupture" id="id_motif_rupture" class="form-control">
                    <?php 
                    var_dump($motif_rupture_contrat);
                    foreach($motif_rupture_contrat as $mtc) { ?>
                      <option value="<?php echo $mtc['id_motif_rupture_contrat']; ?>"><?php echo $mtc['nom_motif_rupture_contrat']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div>
                    <button type="submit" class="btn btn-danger btn-fw">Licencier</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Démission</h4>
                <p class="card-description">
                    Condition d'un<code>démission</code>
                </p>
                <p>
                  - Respect d’un préavis (durée définie dans le contrat ou la loi). <br><br>
                  Droits : <br>
                  - Paiement des jours travaillés et des congés non pris. <br>
                  - Non éligible aux indemnités de chômage, sauf exceptions (motif légitime
                  comme déménagement pour suivre un conjoint). 
                </p>
                <div class="row">
                  <div class="offset-5"></div>
                  <div>
                    <form class="forms-sample" method="post" action ="<?php echo site_url('RuptureContratController/demission'); ?>">
                        <div class="form-group">
                          Motif
                          <select name="id_motif_rupture" id="id_motif_rupture" class="form-control">
                          <?php foreach($motif_rupture_contrat as $mtc) { ?>
                            <option value="<?php echo $mtc['id_motif_rupture_contrat']; ?>"><?php echo $mtc['nom_motif_rupture_contrat']; ?></option>
                          <?php } ?>
                          </select>
                        </div>
                        <div>
                          <button type="submit" class="btn btn-warning btn-fw">Démissionner</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Commun accord</h4>
                <p class="card-description">
                    <code>Condition(s)</code>
                </p>
                <p>
                  Procédure encadrée : <br>
                  - Signature d’une convention de rupture. <br>
                  - Homologation par une autorité compétente (ex. : inspection du travail). <br><br>
                   Avantages : <br>
                  - Indemnités spécifiques. <br>
                  - Éligibilité aux allocations chômage. <br>
                </p>
                <div class="row">
                  <div class="offset-4"></div>
                  <div>
                    <form class="forms-sample" method="post" action ="<?php echo site_url('RuptureContratController/commun_accord'); ?>">
                        <div class="form-group">
                          Motif
                          <select name="id_motif_rupture" id="id_motif_rupture" class="form-control">
                          <?php foreach($motif_rupture_contrat as $mtc) { ?>
                            <option value="<?php echo $mtc['id_motif_rupture_contrat']; ?>"><?php echo $mtc['nom_motif_rupture_contrat']; ?></option>
                          <?php } ?>
                          </select>
                        </div>
                        <div >
                          <button type="submit" class="btn btn-dark btn-fw">Confirmer commun accord</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>