<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div class="row">
                                <div class="col-md-12"><h2 class="font-weight-bold">   <small class="h2 text-muted">Profil</small> </h2></div>
                            </div>
                     </div>
              </div>
       </div>
</div>
<div class="row">
       <div class="col-md-12">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                        <div class="card-body">
                            <h3>Personnel</h3>
                            <p><strong>Nom :</strong> <?php echo $candidat['nom']; ?></p>
                            <p><strong>Prénom :</strong> <?php echo $candidat['prenom']; ?></p>
                            <p><strong>Date de naissance :</strong> <?php echo $candidat['date_naissance']; ?></p>
                            <p><strong>Date de Diplome :</strong> <?php echo $candidat['diplome_nom']; ?></p>
                            <hr>
                            <h3>Professionnel</h3>
                            <p><a href="<?php echo site_url('ExperienceTravailController'); ?>">Ajouter nouvelle expérience professionnelle</a></p>
                            <?php if (Count($experiences) > 0) { ?>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Durée de travail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($experiences as $exp) { ?>
                                                <tr>
                                                    <td class="py-1"><?php echo $exp['nom']; ?></td>
                                                    <td><?php echo $exp['duree']; ?></td>
                                                </tr>       
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } else {?> 
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                                <h4 class="card-title">Formulaire d'insetion d'expérience professionnelle</h4>
                                        </div>
                                    </div>
                                    <?php if (isset($success)) { ?>
                                        <p class="card-description"><span class="text-info"><?php echo $success; ?> </span> </p>
                                    <?php  } if (isset($error)) { ?>
                                        <p class="card-description"><span class="text-info"><?php echo $error; ?> </span> </p>
                                    <?php  } ?>
                                    <form class="forms-sample" method="post" action ="<?php echo site_url('ProfilController/addExperiences'); ?>">
                                        <div class="form-group">
                                                <label for="travail">Travail</label>
                                                <select class="form-control" id="travail" name="travail">
                                                        <?php  foreach ($travails as $travail) { ?>
                                                                <option value="<?php echo $travail['id_travail']; ?>"><?php echo $travail['nom']; ?></option>
                                                        <?php } ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <label for="exp">Duree d'experience (en année)</label>
                                                <input type="number" class="form-control" id="exp"name="exp"  placeholder="0">
                                        </div>
                                        <div class="row">
                                                <div class="col-md-5"></div>
                                                <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                </div>
                                        </div>
                                    </form>
                                </div>
                            <?php } ?> 
                        </div>
                </div>
             </div>
       </div>
</div>