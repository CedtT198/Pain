<style>
       .cardColor {
              color : white ;
              background-color : #d38c3c;
       }
       .resultatDetails {
              display : none ;
       }
</style>
<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">BON COMMANDE</h3>
                            <h6 class="font-weight-normal mb-0">Liste des bon commande <span class="text-primary">3 unread alerts!</span></h6>
                     </div>
              </div>
       </div>
</div>
<!-- <div class="row"> -->
       <div class="col-md-12 mb-4 stretch-card transparent">
              <div class="card cardColor">
                     <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8  card-body">
                                   <p class="fs-30 mb-2">Exemple de libelle</p>
                                   <p>10 Janvier 2024</p>
                            </div>
                            <div class="mt-4">
                                   <button type="button" class="btn btn-outline-light btn-fw" onclick="toggleDetails('details1')">Details</button>
                            </div>
                     </div>
              </div>
       </div>
       <div class="col-md-6 mb-4 stretch-card transparent resultatDetails" id="details1">
              <div class="card">
                     <div class="col-md-1"></div>
                     <div class="col-md-8  card-body">
                            <p class="fs-30 mb-2">Liste des produits :</p>
                            <ul>
                                   <li>exemple</li>
                                   <li>exemple</li>
                                   <li>exemple</li>
                            </ul>
                     </div>
                     <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                   <button type="button" class="btn btn-success btn-rounded btn-fw">Accepter</button>
                            </div>
                            <div>
                                   <button type="button" class="btn btn-danger btn-rounded btn-fw">Refuser</button>
                            </div>
                     </div>
              </div>
       </div>
       <div class="col-md-12 mb-4 stretch-card transparent">
              <div class="card cardColor">
                     <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8  card-body">
                                   <p class="fs-30 mb-2">Exemple de libelle</p>
                                   <p>10 Janvier 2024</p>
                            </div>
                            <div class="mt-4">
                                   <button type="button" class="btn btn-outline-light btn-fw" onclick="toggleDetails('details2')">Details</button>
                            </div>
                     </div>
              </div>
       </div>
       <div class="col-md-6 mb-4 stretch-card transparent resultatDetails" id="details2">
              <div class="card">
                     <div class="col-md-1"></div>
                     <div class="col-md-8  card-body">
                            <p class="fs-30 mb-2">Liste des produits :</p>
                            <ul>
                                   <li>exemple</li>
                                   <li>exemple</li>
                                   <li>exemple</li>
                            </ul>
                     </div>
                     <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                   <button type="button" class="btn btn-success btn-rounded btn-fw">Accepter</button>
                            </div>
                            <div>
                                   <button type="button" class="btn btn-danger btn-rounded btn-fw">Refuser</button>
                            </div>
                     </div>
              </div>
       </div>
       <div class="col-md-12 mb-4 stretch-card transparent">
              <div class="card cardColor">
                     <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8  card-body">
                                   <p class="fs-30 mb-2">Exemple de libelle</p>
                                   <p>10 Janvier 2024</p>
                            </div>
                            <div class="mt-4">
                                   <button type="button" class="btn btn-outline-light btn-fw" onclick="toggleDetails('details3')">Details</button>
                            </div>
                     </div>
              </div>
       </div>
       <div class="col-md-6 mb-4 stretch-card transparent resultatDetails" id="details3">
              <div class="card">
                     <div class="col-md-1"></div>
                     <div class="col-md-8  card-body">
                            <p class="fs-30 mb-2">Liste des produits :</p>
                            <ul>
                                   <li>exemple</li>
                                   <li>exemple</li>
                                   <li>exemple</li>
                            </ul>
                     </div>
                     <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                   <button type="button" class="btn btn-success btn-rounded btn-fw">Accepter</button>
                            </div>
                            <div>
                                   <button type="button" class="btn btn-danger btn-rounded btn-fw">Refuser</button>
                            </div>
                     </div>
              </div>
       </div>
<!-- </div> -->
<script>
       function toggleDetails(detailsId) {
              var details = document.getElementById(detailsId);
              if (details.style.display === "block") {
                     details.style.display = "none";
              } else {
                     details.style.display = "block";
              }
       }
</script>