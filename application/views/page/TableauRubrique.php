<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
              <div class="card-body">
              <h4 class="card-title">TABLEAU RUBRIQUE</h4>
              <p class="card-description">
              Liste <code>charge</code>
              </p>
              <div class="table-responsive">
              <table class="table table-striped">
                     <thead>
                     <tr>
                            <th>Rubrique</th>
                            <th>Unite d'Oeuvre</th>
                            <?php foreach($centres as $centre) { ?>
                                   <th><?php echo $centre['nom_centre']; ?></th>
                            <?php } ?>
                     </tr>
                     <tr></tr>
                     </thead>
                     <tbody>
                            <tr>
                                   <td></td>
                                   <td></td>
                                   <?php foreach($centres as $centre) { ?>
                                          <td><?php echo "%"; ?></td>
                                          <td><?php echo "Fixe"; ?></td>
                                          <td><?php echo "Variable"; ?></td>
                                   <?php } ?>
                            </tr>
                            <!-- <?php ?>
                                   <tr>
                                          <td>Achat</td>
                                          <td>Kg</td>
                                          <td></td>
                                   </tr>
                            <?php ?> -->
                     </tbody>
              </table>
              </div>
              </div>
       </div>
       </div>
</div>