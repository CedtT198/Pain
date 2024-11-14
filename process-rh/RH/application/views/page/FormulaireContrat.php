<div class="row">
       <div class="col-md-2"></div>
       <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <div class="row">
                                   <div class="col-md-2"></div>
                                   <div class="col-md-8">
                                          <h4 class="card-title">FORMULAIRE D'INSERTION CONTRAT</h4>
                                   </div>
                            </div>
                            <?php if (isset($success)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $success; ?> </span> </p>
                            <?php  } if (isset($error)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $error; ?> </span> </p>
                            <?php  } ?>
                            <form class="forms-sample" method="post" action ="<?php echo site_url('ContratController/insert'); ?>">
                                   <div class="row">
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="personnel">Personnel</label>
                                                        <select class="form-control" id="personnel" name="personnel">
                                                               <?php  foreach ($personnels as $personnel) { ?>
                                                                      <option value="<?php echo $personnel['id_personnel']; ?>"><?php echo $personnel['nom'] . ' ' . $personnel['prenom']; ?></option>
                                                               <?php } ?>
                                                        </select>
                                                 </div>
                                          </div>
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="type_contrat">Type de contrat</label>
                                                        <select class="form-control" id="type_contrat" name="type_contrat">
                                                               <?php  foreach ($type_contrats as $type_contrat) { ?>
                                                                      <option value="<?php echo $type_contrat['id_type_contrat']; ?>"><?php echo $type_contrat['nom']; ?></option>
                                                               <?php } ?>
                                                        </select>
                                                 </div>
                                          </div>
                                   </div>
                                   <div class="row">
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="poste">Poste</label>
                                                        <select class="form-control" id="poste" name="poste">
                                                               <?php  foreach ($postes as $poste) { ?>
                                                                      <option value="<?php echo $poste['id_poste']; ?>"><?php echo $poste['nom']; ?></option>
                                                               <?php } ?>
                                                        </select>
                                                 </div>
                                          </div>
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="date_debu">Date debut</label>
                                                        <input type="date" class="form-control" id="date_debut" name="date_debut">
                                                 </div>
                                          </div>
                                   </div>
                                   <div class="row">
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="date_fin">Date fin</label>
                                                        <input type="date" class="form-control" id="date_fin" name="date_fin" >
                                                 </div>
                                          </div>
                                          <!-- <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="date_renvoie">Date renvoie</label>
                                                        <input type="date" class="form-control" id="date_renvoie" name="date_renvoie">
                                                 </div>
                                          </div> -->
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <p id="nb_mois"></p>
                                                 </div>
                                          </div>
                                   </div>
                                   <div class="row">
                                          <div class="col-md-5"></div>
                                          <div class="col-md-6">
                                                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                          </div>
                                   </div>
                            </form>
                     </div>
              </div>
       </div>
</div>

<script>
        const dateDebutInput = document.getElementById("date_debut");
        const dateFinInput = document.getElementById("date_fin");

        const nb_mois = document.getElementById("nb_mois");

        // Fonction pour calculer le nombre de mois entre deux dates
        function calculerNombreDeMois() {
            const dateDebut = new Date(dateDebutInput.value);
            const dateFin = new Date(dateFinInput.value);

            if (isNaN(dateDebut) || isNaN(dateFin)) {
                nb_mois.textContent = "Veuillez sélectionner deux dates valides.";
                return;
            }

            // S'assurer que dateDebut est antérieure à dateFin
            const d1 = dateDebut < dateFin ? dateDebut : dateFin;
            const d2 = dateDebut < dateFin ? dateFin : dateDebut;

            // Calculer la différence en années et en mois
            const anneesDiff = d2.getFullYear() - d1.getFullYear();
            const moisDiff = d2.getMonth() - d1.getMonth();

            // Calculer le nombre total de mois
            const nombreDeMois = anneesDiff * 12 + moisDiff;

            nb_mois.textContent = `Nombre de mois  : ${nombreDeMois}`;
        }

        // Ajouter des écouteurs d'événements "change" aux deux inputs
        dateDebutInput.addEventListener("change", calculerNombreDeMois);
        dateFinInput.addEventListener("change", calculerNombreDeMois);
</script>