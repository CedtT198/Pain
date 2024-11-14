<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div class="row">
                                   <div class="col-md-5"></div>
                                   <div class="col-md-7"><h2 class="font-weight-bold">   <small class="h2 text-muted">LES TESTS A VENIR</small> </h2></div>
                            </div>
                     </div>
              </div>
       </div>
</div>
<div class="row">
       <div class="col-md-2"></div>
       <div class="col-md-8">
              <div class="col-lg-12 grid-margin stretch-card">
                     <div class="card">
                            <div class="card-body">
                                   <!-- <h4 class="card-title">Liste</h4> -->
                                   <div class="table-responsive">
                                          <table class="table table-striped">
                                                 <thead>
                                                        <tr>
                                                               <th>Date de test</th>
                                                               <th>Nom</th>
                                                               <th>Prenom</th>
                                                        </tr>
                                                        </thead>
                                                 <tbody>
                                                        <?php foreach ($tests as $test) { ?>
                                                               <tr>
                                                                      <td class="py-1"><?php echo $test['date_test']; ?></td>
                                                                      <td><?php echo $test['nom']; ?></td>
                                                                      <td><?php echo $test['prenom']; ?></td>
                                                               </tr>
                                                        <?php } ?>
                                                 </tbody>
                                          </table>
                                   </div>
                            </div>
                     </div>
              </div>
       </div>
</div>