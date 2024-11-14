<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
              <div class="card-body">
              <h4 class="card-title">Productions</h4>
              <h3>Stock restant : <?php echo $rest_stock['stock_restant'];?></h3>
              <p class="card-description">
                     Liste de production <br>
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
                            <?php foreach ($achats as $achat) { ?>
                                   <tr>
                                          <td><?php echo $achat['date_input']; ?></td>
                                          <td style="color:green;">+ <?php echo $achat['quantite']; ?></td>
                                   </tr>
                            <?php } ?>
                     </tbody>
              </table>
              </div>
              </div>
       </div>
       </div>
</div>