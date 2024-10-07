<!-- <div class="row">
<div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
              <div class="card-body">
              <h4 class="card-title">Tableau rubrique</h4>
              <p class="card-description">
              Liste <code>rubrique & répartition charges</code>
              </p>
              <div class="table-responsive">
              <table class="table table-striped">
                     <thead>
                     <tr>
                            <th></th>
                            <th></th>
                            <?php foreach($centres as $centre) { ?>
                                   <th><?php echo $centre['nom_centre']; ?></th>
                            <?php } ?>
                     </tr>
                     <tr></tr>
                     </thead>
                     <tbody>
                            <tr>
                                   <th>Rubrique</th>
                                   <th>Unité d'oeuvre</th>
                                   <?php foreach($centres as $centre) { ?>
                                          <th>
                                                 <?php echo "%"; ?> - 
                                                 <?php echo "Fixe"; ?> - 
                                                 <?php echo "Variable"; ?>
                                          </th>
                                   <?php }  ?>
                            </tr>

                            <?php foreach($rubriques as $rubrique) { ?>
                                   <tr>
                                   <td><?php echo $rubrique['nom_rubrique']; ?></td>
                                   <td><?php echo $this->UniteOeuvreModel->GetById($rubrique['id_unite_oeuvre'])['nom_unite_oeuvre']; ?></td>
                                   <?php foreach($centres as $centre) { ?>
                                          <?php $rep = $this->RepartitionModel->getByIdCentre($centre['id_centre']); ?>
                                          <td>
                                                 <?php
                                                        //  if (isset($rep['taux']))
                                                        //        echo $rep['taux'] . "% - ";
                                                        // else                                                        
                                                        //        echo "0% - ";
                                                        
                                                        if (isset($rep['id_charge'])) {
                                                               // $charge = $this->ChargeModel->getById($rep['id_charge']);
                                                               $charge = $this->ChargeModel->getByChargeRubrique($rep['id_charge'], $rubrique['id_rubrique']);
                                                               if (isset($charge)) {
                                                                      $nature = $this->NatureModel->GetById($charge['id_nature'])['nom_nature'];
                                                                      $montant = $charge['montant'] * $rep['taux'] / 100;
                                                                      
                                                                      echo $rep['taux'] . "% - ";
                                                                      if ($nature == "Variable") {
                                                                             echo "0 - ";
                                                                             echo $montant;
                                                                      }
                                                                      else {
                                                                             echo $montant . " - ";
                                                                             echo "0";
                                                                      }
                                                               }
                                                               // else {
                                                               //        echo "0% - ";
                                                               //        echo "0 - ";                                        
                                                               //        echo "0";
                                                               // }
                                                        }
                                                        else {
                                                               echo "0% - ";
                                                               echo "0 - ";                                        
                                                               echo "0";
                                                        }
                                                 ?>
                                          </td>
                                   <?php }  ?>
                                   </tr>
                            <?php } ?>
                     </tbody>
              </table>
              </div>
              </div>
       </div>
       </div>
</div> -->

<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
              <div class="card-body">
              <h4 class="card-title">RUBRIQUE</h4>
              <p class="card-description">
              Liste <code>rubrique</code>
              </p>
              <div class="table-responsive">
              <table class="table table-striped">
                     <thead>
                     <tr>
                            <th>Nom rubrique</th>
                            <th>Unité d'oeuvre</th>
                     </tr>
                     </thead>
                     <tbody>
                            <?php foreach($rubriques as $r) { ?>
                                   <tr>
                                          <td><?php echo $r['nom_rubrique']; ?> </td>
                                          <td>
                                                 <?php echo $this->UniteOeuvreModel->GetById($r['id_unite_oeuvre'])['nom_unite_oeuvre']; ?>
                                          </td>
                                   </tr>
                            <?php } ?>
                     </tbody>
              </table>
              </div>
              </div>
       </div>
       </div>
</div>

<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
              <div class="card-body">
              <h4 class="card-title">REPARTITION</h4>
              <p class="card-description">
              Liste <code>répartition détaillée</code>
              </p>
              <div class="table-responsive">
              <table class="table table-striped">
                     <thead>
                     <tr>
                            <th>Date</th>
                            <th>Rubrique</th>
                            <th>Total</th>
                            <th>Montant</th>
                            <th>Nature</th>
                            <th>Centre</th>
                            <th>Taux (en %)</th>
                     </tr>
                     </thead>
                     <tbody>
                            <?php foreach($repartitions as $rep) { ?>
                                   <tr>
                                          <td><?php echo $this->ChargeModel->GetById($rep['id_charge'])['date_charge']; ?> </td>
                                          <td>
                                                 <?php echo $this->RubriqueModel->GetById($this->ChargeModel->GetById($rep['id_charge'])['id_rubrique'])['nom_rubrique']; ?>
                                          </td>
                                          <td><?php echo $this->ChargeModel->GetById($rep['id_charge'])['montant']; ?></td>
                                          <td>
                                                 <?php echo $this->ChargeModel->GetById($rep['id_charge'])['montant'] * $rep['taux'] / 100; ?>
                                          </td>
                                          <td><?php echo $this->NatureModel->getById($this->ChargeModel->GetById($rep['id_charge'])['id_nature'])['nom_nature']; ?> </td>
                                          <td><?php echo $this->CentreModel->GetById($rep['id_centre'])['nom_centre']; ?></td>
                                          <td><?php echo $rep['taux']; ?></td>
                                   </tr>
                            <?php } ?>
                     </tbody>
              </table>
              </div>
              </div>
       </div>
       </div>
</div>

<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
              <div class="card-body">
              <h4 class="card-title">TOTAL</h4>
              <p class="card-description">
              Liste <code>total des charges</code>
              </p>
              <div class="table-responsive">
              <table class="table table-striped">
                     <thead>
                     <tr>
                            <th>Centre</th>
                            <th>Fixe</th>
                            <th>Variable</th>
                            <th>Total</th>
                     </tr>
                     </thead>
                     <tbody>
                            <?php foreach($centres as $c) { ?>
                                   <tr>
                                          <td><?php echo $c['nom_centre']; ?></td>
                                          <td><?php echo $this->ChargeModel->getTotalChargeFixeC($c['id_centre']); ?></td>
                                          <td><?php echo $this->ChargeModel->getTotalChargeVariableC($c['id_centre']); ?></td>
                                          <th><?php echo $this->ChargeModel->getTotalChargesByCentre($c['id_centre']); ?></th>
                                   </tr>
                            <?php } ?>
                            <tr>
                                   <th>Total</th>
                                   <th><?php echo $this->ChargeModel->getTotalChargeFixe(); ?></th>
                                   <th><?php echo $this->ChargeModel->getTotalChargeVariable(); ?></th>
                                   <th><?php echo $this->ChargeModel->getTotalCharges(); ?></th>
                            </tr>
                     </tbody>
              </table>
              </div>
              </div>
       </div>
       </div>
</div>