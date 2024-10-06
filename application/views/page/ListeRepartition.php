<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
              <div class="card-body">
              <h4 class="card-title">REPARTITION</h4>
              <p class="card-description">
              Liste <code>repartition</code>
              </p>
              <div class="table-responsive">
              <table class="table table-striped">
                     <thead>
                     <tr>
                            <th>Id charge</th>
                            <th>Id centre</th>
                            <th>Taux</th>
                     </tr>
                     </thead>
                     <tbody>
                            <?php foreach($repartitions as $rep) { ?>
                                   <tr>
                                          <td>
                                                 <?php echo $this->ChargeModel->GetById($rep['id_charge'])['date_charge']; ?> - 
                                                 <?php echo $this->ChargeModel->GetById($rep['id_charge'])['montant']; ?> 
                                          </td>
                                          <td>
                                                 <?php echo $this->CentreModel->GetById($rep['id_centre'])['nom_centre']; ?>
                                          </td>
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