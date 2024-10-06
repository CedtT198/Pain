<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
              <div class="card-body">
              <h4 class="card-title">CENTRE</h4>
              <p class="card-description">
              Liste <code>center</code>
              </p>
              <div class="table-responsive">
              <table class="table table-striped">
                     <thead>
                     <tr>
                            <th>Id</th>
                            <th>Nom</th>
                     </tr>
                     </thead>
                     <tbody>
                            <?php foreach ($centres as $centre) { ?>
                                   <tr>
                                          <td><?php echo $centre['id_centre']; ?></td>
                                          <td><?php echo $centre['nom_centre']; ?></td>
                                   </tr>
                            <?php } ?>
                     </tbody>
              </table>
              </div>
              </div>
       </div>
       </div>
</div>