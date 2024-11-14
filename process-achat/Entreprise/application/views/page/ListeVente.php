<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
              <div class="card-body">
              <h4 class="card-title">Ventes</h4>
              <h3>Stock restant : <?php echo $rest_stock['stock_restant'];?></h3>
              <p class="card-description">
                     Liste de(s) vente(s) <br>
              </p>
              <div class="table-responsive">
              <table class="table table-striped">
                     <thead>
                     <tr>
                            <th>Date</th>
                            <th>Quantité</th>
                     </tr>
                     </thead>
                     <tbody>
                            <?php foreach ($ventes as $vente) { ?>
                                   <tr>
                                          <td><?php echo $vente['date_output']; ?></td>
                                          <td style="color:red;">- <?php echo $vente['quantite']; ?></td>
                                   </tr>
                            <?php } ?>
                     </tbody>
              </table>
              </div>
              </div>
       </div>
       </div>
</div>