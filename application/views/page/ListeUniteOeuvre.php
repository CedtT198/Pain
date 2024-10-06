<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
              <div class="card-body">
              <h4 class="card-title">UNITE d' OEUVRE</h4>
              <p class="card-description">
              Liste <code>unite d'oeuvre</code>
              </p>
              <div class="table-responsive">
              <table class="table table-striped">
                     <thead>
                     <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Abreviation</th>
                            <th></th>
                     </tr>
                     </thead>
                     <tbody>
                            <?php foreach($unites as $unite) { ?>
                                   <tr>
                                          <td><?php echo $unite['id_unite_oeuvre']; ?></td>
                                          <td><?php echo $unite['nom_unite_oeuvre']; ?></td>
                                          <td><?php echo $unite['abreviation']; ?></td>
                                          <!-- <td>
                                                 <form action="<?php echo site_url("UniteOeuvreController/delete"); ?>">
                                                        <input type="hidden" name="id" value="<?php echo $unite['id_unite_oeuvre']; ?>">
                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                                 </form>
                                          </td> -->
                                   </tr>
                            <?php } ?>
                     </tbody>
              </table>
              </div>
              </div>
       </div>
       </div>
</div>