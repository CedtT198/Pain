<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div class="row">
                                <div class="col-md-12"><h2 class="font-weight-bold">   <small class="h2 text-muted">Notifications</small> </h2></div>
                                <div class="col-md-12"><h4 class="font-weight-bold">   <small class="h4 text-muted">Non lue(s) : <?php echo Count($this->NotificationModel->getAllNomLu($this->session->userdata('id_can'))); ?></small> </h4></div>
                            </div>
                     </div>
              </div>
       </div>
</div>
<div class="row">
       <!-- <div class="col-md-0"></div> -->
       <div class="col-md-12">
              <div class="col-lg-12 grid-margin stretch-card">
                     <div class="card">
                            <div class="card-body"> 
                                   <!-- <h4 class="card-title">Liste</h4> -->
                                   <div class="table-responsive">
                                          <table class="table table-striped">
                                              <?php 
                                          //     echo var_dump($notifications);
                                              foreach ($notifications as $notification) { ?>
                                                 <thead>
                                                    <tr>
                                                            <th>Date : <?php echo $notification['date_notification']; ?></th>
                                                            <!-- <th></th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php if ($notification['id_annonce'] != null) { ?>
                                                               <tr>
                                                                      <!-- <td></td> -->
                                                                      <td class="py-1">
                                                                             <a href="<?php echo site_url('AnnonceController/'); ?>">
                                                                                    Un nouvel offre d'emploi a été publié. Soyer le premier à le voir.
                                                                             </a>       
                                                                      </td>
                                                               </tr>
                                                        <?php } if ($notification['id_rendez_vous'] != null) { ?>
                                                               <tr>
                                                                      <!-- <td></td> -->
                                                                      <td class="py-1">Date de rendez-vous de votre entretien : <?php echo $notification['date_rendez_vous']; ?></td>
                                                               </tr>
                                                        <?php } if ($notification['id_resultat_test'] != null) { ?>
                                                               <tr>
                                                                      <!-- <td></td> -->
                                                                      <td class="py-1">Les résultats de vos test du <?php echo $notification['date_test']; ?>. Note : <?php echo $notification['note']; ?></td>
                                                               </tr>
                                                       <?php  } if ($notification['id_test'] != null) { ?>
                                                               <tr>   
                                                                      <!-- <td></td> -->
                                                                      <td class="py-1">La date votre test sera le <?php echo $notification['date_test']; ?></td>
                                                               </tr>
                                                        <?php }?>       
                                                    </tr>
                                                </tbody>
                                                <?php } ?>
                                          </table>
                                   </div>
                            </div>
                     </div>
              </div>
       </div>
</div>