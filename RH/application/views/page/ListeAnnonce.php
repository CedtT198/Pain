<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div class="row">
                                   <div class="col-md-4"></div>
                                   <div class=""><h2 class="font-weight-bold">   <small class="text-muted">LES ANNONCES AVEC CANDIDATURES</small> </h2></div>
                            </div>
                     </div>
              </div>
       </div>
</div>
<div class="row">
       <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <!-- <p class="card-title">Liste</p> -->
                            <div class="row">
                                   <div class="col-12">
                                          <div class="table-responsive">
                                                 <table id="example" class="display expandable-table" style="width:100%">
                                                        <thead>
                                                               <tr>
                                                                      <th>Numéro</th>
                                                                      <th>Date d'envoie</th>
                                                                      <th>Poste</th>
                                                                      <th></th>
                                                               </tr>
                                                        </thead>
                                                        <tbody>
                                                               <?php
                                                                      $i = 0;
                                                                      foreach ($annonces as $annonce) {
                                                               ?>
                                                               <tr class="odd">
                                                                      <td class="sorting_1"><?php echo $annonce['id_annonce'];?></td>
                                                                      <td><?php echo $annonce['date_annonce'];?></td>
                                                                      <td><?php echo $annonce['poste_nom'];?></td>
                                                                      <td>
                                                                             <button type="button" class="btn btn-outline-warning btn-fw" onclick="toggleDetails('details<?php echo $i;?>','listeCV<?php echo $i;?>')">Details</button>
                                                                             <button type="button" class="btn btn-outline-info btn-fw" onclick="toggleDetails('listeCV<?php echo $i;?>','details<?php echo $i;?>')">Voir liste candidature</button>
                                                                      </td>
                                                               </tr>

                                                               <tr  id="details<?php echo $i;?>" style="display:none">   <!-- ilay tr mipoitra refa miclique details -->
                                                                      <td colspan="8">
                                                                             <table cellpadding="5" cellspacing="0" border="0" style="width:100%">
                                                                                    <tbody>
                                                                                           <tr class="expanded-row">
                                                                                                  <td colspan="8" class="row-bg">
                                                                                                         <div>
                                                                                                                <!-- <div class="d-flex justify-content-between"> -->
                                                                                                                <!-- <div class="d-flex"> -->
                                                                                                                <div class="">
                                                                                                                       <div class="row">
                                                                                                                              <div class="col-md-12 grid-margin stretch-card">
                                                                                                                                     <div class="card">
                                                                                                                                            <div class="card-body">
                                                                                                                                                   <div class="row">
                                                                                                                                                          <div class="col-md-4"></div>
                                                                                                                                                          <div class="col-md-5">
                                                                                                                                                                 <h4 class="card-title"><u>Details d'annonce</u></h4>
                                                                                                                                                          </div>
                                                                                                                                                   </div>
                                                                                                                                                   <div class="row">
                                                                                                                                                          <div class="col-md-12 stretch-card grid-margin">
                                                                                                                                                                 <div class="card-body">
                                                                                                                                                                        <div class="table-responsive">
                                                                                                                                                                               <table class="table table-borderless">
                                                                                                                                                                                      <thead>
                                                                                                                                                                                             <tr>
                                                                                                                                                                                                    <th class="border-bottom pb-2">Poste</th>
                                                                                                                                                                                                    <th class="border-bottom pb-2">Travail</th>
                                                                                                                                                                                                    <th class="border-bottom pb-2">Année d'expérience requise</th>
                                                                                                                                                                                                    <th class="border-bottom pb-2">Canal d'envoie</th>
                                                                                                                                                                                                    <!-- <th class="border-bottom pb-2">Type de contrat</th> -->
                                                                                                                                                                                             </tr>
                                                                                                                                                                                      </thead>
                                                                                                                                                                                      <tbody>
                                                                                                                                                                                             <tr>
                                                                                                                                                                                                    <td class="text-muted"><?php echo $annonce['poste_nom'];?></td>
                                                                                                                                                                                                    <td class="text-muted"><?php echo $annonce['travail_nom'];?></td>
                                                                                                                                                                                                    <td class="text-muted"><?php echo $annonce['duree_exp_requise'];?></td>
                                                                                                                                                                                                    <td class="text-muted"><?php echo $annonce['canal_nom'];?></td>
                                                                                                                                                                                                    <!-- <td class="text-muted"><?php echo $annonce['nom_type_contrat'];?></td> -->
                                                                                                                                                                                             </tr>
                                                                                                                                                                                      </tbody>
                                                                                                                                                                               </table>
                                                                                                                                                                        </div>
                                                                                                                                                                 </div>
                                                                                                                                                          </div>
                                                                                                                                                   </div>
                                                                                                                                            </div>
                                                                                                                                     </div>
                                                                                                                              </div>
                                                                                                                       </div>
                                                                                                                </div>
                                                                                                         </div>
                                                                                                  </td>
                                                                                           </tr>
                                                                                    </tbody>
                                                                             </table>
                                                                      </td>
                                                               </tr>






                                                               <tr  id="listeCV<?php echo $i;?>" style="display:none">   <!-- ilay tr mipoitra refa miclique Liste CV -->
                                                                      <td colspan="8">
                                                                             <table cellpadding="5" cellspacing="0" border="0" style="width:100%">
                                                                                    <tbody>
                                                                                           <tr class="expanded-row">
                                                                                                  <td colspan="8" class="row-bg">
                                                                                                         <div>
                                                                                                                <!-- <div class="d-flex justify-content-between"> -->
                                                                                                                <!-- <div class="d-flex"> -->
                                                                                                                <div class="">
                                                                                                                       <div class="row">
                                                                                                                              <div class="col-md-12 grid-margin stretch-card">
                                                                                                                                     <div class="card">
                                                                                                                                            <div class="card-body">
                                                                                                                                                   <div class="row">
                                                                                                                                                          <div class="col-md-5"></div>
                                                                                                                                                          <div class="col-md-5">
                                                                                                                                                                 <!-- <h1 class="card-title"><u>Liste CV</u></h1> -->
                                                                                                                                                                 <h2 class=""><u>Liste candidature</u></h2>
                                                                                                                                                          </div>
                                                                                                                                                   </div>
                                                                                                                                                   <div class="row">
                                                                                                                                                          <div class="col-md-11 grid-margin stretch-card">
                                                                                                                                                                 <div class="card position-relative">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                               <div id="detailedReports<?php echo $i; ?>" class="carousel slide detailed-report-carousel position-static pt-2">
                                                                                                                                                                                      <div class="carousel-inner">
                                                                                                                                                                                             <?php
                                                                                                                                                                                             $id = 0;

                                                                                                                                                                                             // $candidatures = $this->CandidatureModel->getAllForAnnonce($annonce['id_annonce']);
                                                                                                                                                                                             $candidatures = $this->CandidatureModel->getQualifiedCandidates($annonce['id_annonce']);
                                                                                                                                                                                             // echo $annonce['id_annonce'];
                                                                                                                                                                                             // echo var_dump($candidatures);
                                                                                                                                                                                             foreach($candidatures as $candidature) {
                                                                                                                                                                                                    if ($id == 0) { ?>
                                                                                                                                                                                                           <div class="carousel-item active">
                                                                                                                                                                                                    <?php } else { ?>
                                                                                                                                                                                                           <div class="carousel-item activer">
                                                                                                                                                                                                    <?php } ?>
                                                                                                                                                                                             
                                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                                           <div class="col-md-2"></div>
                                                                                                                                                                                                           <div class="col-md-10 grid-margin stretch-card">
                                                                                                                                                                                                                  <!-- <div class="card"> -->
                                                                                                                                                                                                                         <div class="card-body">
                                                                                                                                                                                                                                <div class="row">
                                                                                                                                                                                                                                       <div class="col-md-2"></div>
                                                                                                                                                                                                                                       <div class="">
                                                                                                                                                                                                                                              <!-- <h3>N° Candidature : <?php echo $id+1;?></h3> -->
                                                                                                                                                                                                                                              <h3>N° Candidature : <?php echo $candidature['id_candidature'];?></h3>
                                                                                                                                                                                                                                       </div>
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                <br>
                                                                                                                                                                                                                                <div class="row">
                                                                                                                                                                                                                                       <div class="col-md-5">
                                                                                                                                                                                                                                              <h4 class="card-title">Nom :
                                                                                                                                                                                                                                       </div>
                                                                                                                                                                                                                                       <div class="">
                                                                                                                                                                                                                                              <span class="text-success"> <?php echo $candidature['candidature_nom'];?></span>
                                                                                                                                                                                                                                       </div>
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                <div class="row">
                                                                                                                                                                                                                                       <div class="col-md-5">
                                                                                                                                                                                                                                              <h4 class="card-title">Prenom :</h4>
                                                                                                                                                                                                                                       </div>
                                                                                                                                                                                                                                       <div class="">
                                                                                                                                                                                                                                              <span class="text-success"> <?php echo $candidature['prenom'];?> </span>
                                                                                                                                                                                                                                       </div>
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                <div class="row">
                                                                                                                                                                                                                                       <div class="col-md-5">
                                                                                                                                                                                                                                              <h4 class="card-title">Date de naissance : </h4>
                                                                                                                                                                                                                                       </div>
                                                                                                                                                                                                                                       <div class="">
                                                                                                                                                                                                                                              <span class="text-success"> <?php echo $candidature['date_naissance'];?> </span>
                                                                                                                                                                                                                                       </div>
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                <div class="row">
                                                                                                                                                                                                                                       <div class="col-md-5">
                                                                                                                                                                                                                                              <h4 class="card-title">Date de Candidature : </h4>
                                                                                                                                                                                                                                       </div>
                                                                                                                                                                                                                                       <div class="">
                                                                                                                                                                                                                                              <span class="text-success"> <?php echo $candidature['date_candidature'];?>  </span>
                                                                                                                                                                                                                                       </div>
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                <div class="row">
                                                                                                                                                                                                                                       <div class="col-md-5">
                                                                                                                                                                                                                                              <h4 class="card-title">Diplome : </h4>
                                                                                                                                                                                                                                       </div>
                                                                                                                                                                                                                                       <div class="">
                                                                                                                                                                                                                                              <?php if ($candidature['id_diplome'] == 1) { ?>
                                                                                                                                                                                                                                                     <p style="color:red"><?php echo $candidature['diplome_nom'];?></p> 
                                                                                                                                                                                                                                              <?php } else { ?>
                                                                                                                                                                                                                                                     <p style="color:green"><?php echo $candidature['diplome_nom'];?></p>
                                                                                                                                                                                                                                              <?php }  ?>
                                                                                                                                                                                                                                       </div>
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                         </div>

                                                                                                                                                                                                                  <!-- </div> -->
                                                                                                                                                                                                           </div>
                                                                                                                                                                                                           <div class="row col-md-12">
                                                                                                                                                                                                                  <div class="offset-md-8 col-md-4">
                                                                                                                                                                                                                        <a class="nav-link" href="<?php echo site_url('TestController/index'); ?>">
                                                                                                                                                                                                                                <button type="button" class="btn btn-outline-dark btn-fw">
                                                                                                                                                                                                                                       Appeler pour un test
                                                                                                                                                                                                                                </button>
                                                                                                                                                                                                                         </a>
                                                                                                                                                                                                                  </div>
                                                                                                                                                                                                           </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                             </div>
                                                                                                                                                                                             <?php $id++; } ?>
                                                                                                                                                                                      </div>
                                                                                                                                                                                      <a class="carousel-control-prev" href="#detailedReports<?php echo $i; ?>" role="button" data-slide="prev">
                                                                                                                                                                                             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                                                                                                                                             <span class="sr-only">Previous</span>
                                                                                                                                                                                      </a>
                                                                                                                                                                                      <a class="carousel-control-next" href="#detailedReports<?php echo $i;  ?>" role="button" data-slide="next">
                                                                                                                                                                                             <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                                                                                                                                             <span class="sr-only">Next</span>
                                                                                                                                                                                      </a>
                                                                                                                                                                               </div>
                                                                                                                                                                        </div>
                                                                                                                                                                 </div>
                                                                                                                                                          </div>
                                                                                                                                                   </div>
                                                                                                                                            </div>
                                                                                                                                     </div>
                                                                                                                              </div>
                                                                                                                       </div>
                                                                                                                </div>
                                                                                                         </div>
                                                                                                  </td>
                                                                                           </tr>
                                                                                    </tbody>
                                                                             </table>
                                                                      </td>
                                                               </tr>
                                                               <?php $i++; } ?>
                                                        </tbody>
                                                 </table>
                                          </div>
                                   </div>
                            </div>
                     </div>
              </div>
       </div>
</div>


<script>
       // function toggleDetails(detailsId) {
       //        var details = document.getElementById(detailsId);
       //        if (details.style.display === "none") {
       //               details.style.display = "table-row";
       //        } else {
       //               details.style.display = "none";  // Utiliser table-row pour préserver la structure
       //        }
       // }
       function toggleDetails(FirstParametre,SecondeParametre) {
              var first = document.getElementById(FirstParametre);
              var seconde = document.getElementById(SecondeParametre);
              if (first.style.display === "none") {
                     first.style.display = "table-row";
                     seconde.style.display = "none";
              } else {
                     first.style.display = "none";  // Utiliser table-row pour préserver la structure
                     seconde.style.display = "none";
              }


       }
</script>