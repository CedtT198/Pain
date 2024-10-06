<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
              <div class="card-body">
              <h4 class="card-title">CHARGE</h4>
              <p class="card-description">
              Liste <code>charge</code>
              </p>
              <div class="table-responsive">
              <table class="table table-striped">
                     <thead>
                     <tr>
                            <!-- <th>Rubrique</th> -->
                            <th>Date de la charge</th>
                            <th>Nature</th>
                            <th>Type</th>
                            <th>Unite</th>
                            <th>Montant</th>
                     </tr>
                     </thead>
                     <tbody>
                            <?php foreach ($charges as $charge) { ?>
                                   <tr>
                                          <!-- <td>
                                                 <?php echo $this->RubriqueModel->GetById($charge['id_rubrique'])['nom_rubrique']; ?>
                                          </td> -->
                                          <td><?php echo $charge['date_charge']; ?></td>
                                          <td>
                                                 <?php echo $this->NatureModel->getbyId($charge['id_nature'])['nom_nature']; ?>
                                          </td>
                                          <td>
                                                 <?php echo $this->TypeChargeModel->getbyId($charge['id_type'])['nom_type_charge']; ?>
                                          </td>
                                          <td><?php echo $charge['unite']; ?></td>
                                          <td><?php echo $charge['montant']; ?></td>
                                   </tr>
                            <?php } ?>
                     </tbody>
              </table>
              </div>
              </div>
       </div>
       </div>
</div>