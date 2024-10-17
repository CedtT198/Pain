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
                                   <td><?php echo $this->UniteOeuvreModel->getById($rubrique['id_unite_oeuvre'])['nom_unite_oeuvre']; ?></td>
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
                                                                      $nature = $this->NatureModel->getById($charge['id_nature'])['nom_nature'];
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
<!-- 
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
                                                 <?php echo $this->UniteOeuvreModel->getById($r['id_unite_oeuvre'])['nom_unite_oeuvre']; ?>
                                          </td>
                                   </tr>
                            <?php } ?>
                     </tbody>
              </table>
              </div>
              </div>
       </div>
       </div>
</div> -->
<!-- 
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
                                          <td><?php echo $this->ChargeModel->getById($rep['id_charge'])['date_charge']; ?> </td>
                                          <td>
                                                 <?php echo $this->RubriqueModel->getById($this->ChargeModel->getById($rep['id_charge'])['id_rubrique'])['nom_rubrique']; ?>
                                          </td>
                                          <td><?php echo $this->ChargeModel->getById($rep['id_charge'])['montant']; ?></td>
                                          <td>
                                                 <?php echo $this->ChargeModel->getById($rep['id_charge'])['montant'] * $rep['taux'] / 100; ?>
                                          </td>
                                          <td><?php echo $this->NatureModel->getById($this->ChargeModel->getById($rep['id_charge'])['id_nature'])['nom_nature']; ?> </td>
                                          <td><?php echo $this->CentreModel->getById($rep['id_centre'])['nom_centre']; ?></td>
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
</div> -->


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
                                          <tr>
                                                 <th rowspan="2">Rubrique</th>
                                                 <th rowspan="2">Total</th>
                                                 <th rowspan="2">Unité d'oeuvre</th>
                                                 <th colspan="3">Courses</th>
                                                 <th colspan="3">Usine</th>
                                                 <th colspan="3">Administration</th>
                                                 <th colspan="3">Livraison</th>
                                                 <th colspan="2">Total nature</th>
                                          </tr>
                                          <tr>
                                                 <?php for($i=0; $i < Count($centres); $i++) { ?>
                                                        <th>%</th>
                                                        <th>Fixe</th>
                                                        <th>Variable</th>
                                                 <?php } ?>
                                                 <th>Fixe</th>
                                                 <th>Variable</th>
                                          </tr>
                                          <?php foreach($allCharge as $charge) { ?>
                                          <tr>
                                                 <td><?php echo $charge["rubrique"]; ?></td>
                                                 <td><?php echo $charge["montant"]; ?></td>
                                                 <td><?php echo $charge['abreviation_unite_oeuvre']; ?></td>

                                                 <td><?php echo $charge['courses']; ?></td>
                                                 <?php if ($charge['id_nature'] == 1) { ?>
                                                        <td>0</td>
                                                        <td><?php echo $charge['montant'] * $charge['courses'] / 100; ?></td>
                                                 <?php } else { ?>
                                                        <td><?php echo $charge['montant'] * $charge['courses'] / 100; ?></td>
                                                        <td>0</td>
                                                 <?php } ?>

                                                 <td><?php echo $charge['usine']; ?></td>
                                                 <?php if ($charge['id_nature'] == 1) { ?>
                                                        <td>0</td>
                                                        <td><?php echo $charge['montant'] * $charge['usine'] / 100; ?></td>
                                                 <?php } else { ?>
                                                        <td><?php echo $charge['montant'] * $charge['usine'] / 100; ?></td>
                                                        <td>0</td>
                                                 <?php } ?>
                                                 
                                                 <td><?php echo $charge['administration']; ?></td>
                                                 <?php if ($charge['id_nature'] == 1) { ?>
                                                        <td>0</td>
                                                        <td><?php echo $charge['montant'] * $charge['administration'] / 100; ?></td>
                                                 <?php } else { ?>
                                                        <td><?php echo $charge['montant'] * $charge['administration'] / 100; ?></td>
                                                        <td>0</td>
                                                 <?php } ?>
                                                 
                                                 <td><?php echo $charge['livraison']; ?></td>
                                                 <?php if ($charge['id_nature'] == 1) { ?>
                                                        <td>0</td>
                                                        <td><?php echo $charge['montant'] * $charge['livraison'] / 100; ?></td>
                                                 <?php } else { ?>
                                                        <td><?php echo $charge['montant'] * $charge['livraison'] / 100; ?></td>
                                                        <td>0</td>
                                                 <?php } ?>
                                          </tr>
                                          <?php } ?>
                                          <tr>
                                                 <td colspan="4"></td>
                                                 <td><?php echo $totalJoin[1]['t_courses']; ?></td>
                                                 <td colspan="2"><?php echo $totalJoin[0]['t_courses']; ?></td>
                                                 <td><?php echo $totalJoin[1]['t_usine']; ?></td>
                                                 <td colspan="2"><?php echo $totalJoin[0]['t_usine']; ?></td>
                                                 <td><?php echo $totalJoin[1]['t_administration']; ?></td>
                                                 <td colspan="2"><?php echo $totalJoin[0]['t_administration']; ?></td>
                                                 <td><?php echo $totalJoin[1]['t_livraison']; ?></td>
                                                 <td><?php echo $totalJoin[0]['t_livraison']; ?></td>
                                                 <td><?php echo $totalNature[1]['total']; ?></td>
                                                 <td><?php echo $totalNature[0]['total']; ?></td>
                                          </tr>
                                          <tr>
                                                 <th>TOTAL</th>
                                                 <td><?php echo $totalMontant[0]['t_montant']; ?></td>
                                                 <td colspan="3"></td>
                                                 <td colspan="3"><?php echo $totalRepartition[0]['s_courses']; ?></td>
                                                 <td colspan="3"><?php echo $totalRepartition[0]['s_usine']; ?></td>
                                                 <td colspan="3"><?php echo $totalRepartition[0]['s_administration']; ?></td>
                                                 <td><?php echo $totalRepartition[0]['s_livraison']; ?></td>
                                          </tr>
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
                            Repartition <code>admin / livraison</code>
                            </p>
                            <div class="table-responsive">
                                   <table class="table table-striped">
                                          <tr>
                                                 <th>Rerpartition</th>
                                                 <th>Cout direct</th>
                                                 <th>Clés (en %)</th>
                                                 <th>Admin/liv</th>
                                                 <th>Cout total</th>
                                          </tr>
                                          <?php
                                                 $cd_courses = $totalRepartition[0]['s_courses'];
                                                 $cd_usine = $totalRepartition[0]['s_usine'];

                                                 $totalCoutDir = $cd_usine+$cd_courses;
                                                 $totalAdmin = $totalRepartition[0]['s_administration'];
                                                 // $totalAdmin = $totalRepartition[0]['s_administration']+$totalRepartition[0]['s_livraison'];
                                                 
                                                 $cle_courses = $cd_courses * 100 / $totalCoutDir;
                                                 $cle_usine = $cd_usine * 100 / $totalCoutDir;

                                                 $part_admin_courses = $totalAdmin * $cle_courses / 100;
                                                 $part_admin_usine = $totalAdmin * $cle_usine / 100;

                                                 $ct_courses = $cd_courses+$part_admin_courses;
                                                 $ct_usine = $cd_usine+$part_admin_usine;

                                                 $ct = $ct_courses + $ct_usine;
                                                 ?>
                                          <tr>
                                                 <td>Total Courses</td>
                                                 <td><?php echo $cd_courses; ?></td>
                                                 <td><?php echo $cle_courses; ?></td>
                                                 <td><?php echo $part_admin_courses; ?></td>
                                                 <td><?php echo $ct_courses; ?></td>
                                          </tr>
                                          <tr>
                                                 <td>Total Usine</td>
                                                 <td><?php echo $cd_usine; ?></td>
                                                 <td><?php echo $cle_usine; ?></td>
                                                 <td><?php echo $part_admin_usine; ?></td>
                                                 <td><?php echo $ct_usine; ?></td>
                                          </tr>
                                          <tr>
                                                 <th>Total general</th>
                                                 <th colspan="2"><?php echo $totalCoutDir; ?></th>
                                                 <th><?php echo $totalAdmin; ?></th>
                                                 <th><?php echo $ct; ?></th>
                                          </tr>
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
                            <h4 class="card-title">Coût d'une pièce de pain</h4>
                            <p class="card-description">
                            </p>
                            <div class="table-responsive">
                                   <table class="table table-striped">
                                          <tr>
                                                 <th>Unité d'oeuvre</th>
                                                 <td><?php echo $allUniteOeuvre[4]['abreviation'];?></td>
                                          </tr>
                                          <tr>
                                                 <th>Nombre</th>
                                                 <td><?php echo $stock['stock_restant'];?></td>
                                          </tr>
                                          <tr>
                                                 <th>Cout courses</th>
                                                 <td><?php echo $ct_courses; ?></td>
                                          </tr>
                                          <tr>
                                                 <th>Cout usine</th>
                                                 <td><?php echo $ct_usine; ?></td>
                                          </tr>
                                          <tr>
                                                 <th>Cout final</th>
                                                 <td><?php echo $ct; ?></td>
                                          </tr>
                                          <tr>
                                                 <th>Cout d'une <?php echo $allUniteOeuvre[4]['nom_unite_oeuvre'];?> de pain</th>
                                                 <th>
                                                        <?php
                                                               if ($stock['stock_restant'] != 0) {
                                                                      echo $ct / $stock['stock_restant'];
                                                               }                                         
                                                               else {
                                                                      echo "0";
                                                               }
                                                        ?>
                                                 </th>
                                          </tr>
                                   </table>
                            </div>
                     </div>
              </div>
       </div>
</div>