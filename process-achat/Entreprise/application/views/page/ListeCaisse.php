<div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
              <div class="card-body">
                     <h4 class="card-title">Liste entrée et sortie caisse</h4>
                     <!-- <p class="card-description">
                            Add class <code>.table-striped</code>
                     </p> -->
                     <div class="table-responsive">
                            <table class="table table-striped">
                                   <thead>
                                          <tr>
                                                 <th>id</th>
                                                 <th>Date</th>
                                                 <th>Mouvement</th>
                                          </tr>
                                   </thead>
                                    <tbody>
                                            <?php foreach ($caisses as $caisse) { ?>
                                                 <tr>
                                                        <td class="py-1"><?php echo $caisse['Id_caisse'] ;?></td>
                                                        <td><?php echo $caisse['date_caisse']  ;?></td>
                                                        <td>
                                                            <?php if ($caisse['montant'] <= 0) { ?>
                                                                <p style="color:red"><?php echo $caisse['montant'] ;?></p>
                                                            <?php } else { ?>
                                                                <p style="color:green">+<?php echo $caisse['montant'] ;?></p>
                                                            <?php } ?>
                                                        </td>
                                                 </tr>
                                          <?php } ?>
                                   </tbody>
                            </table>
                     </div>
              </div>
       </div>
</div>