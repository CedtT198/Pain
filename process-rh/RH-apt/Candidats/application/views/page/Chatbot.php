<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div class="row">
                                <div class="col-md-12"><h2 class="font-weight-bold">   <small class="h2 text-muted">Conversation</small> </h2></div>
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
                        <h4 class="card-title">Chatbot :</h4>
                        <h6>Domaine de conversation : </h6> 
                        <?php  foreach ($domaines as $domaine) { ?>
                            <form class="forms-sample" style="display:inline-block"  method="post" action ="<?php echo site_url('ChatbotController/choixDomaine'); ?>">
                                <input type="hidden" value="<?php echo $domaine['id']; ?>" name="id">
                                <button  type="submit" class="btn btn-primary mr-2"><?php echo $domaine['nom']; ?></button>
                            </form>
                            <?php } ?><br>
                            <?php if (isset($message)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $message; ?> </span> </p>
                            <?php  } ?>
                        <hr>
                        <div class="container">
                            <div class="row">
                                <!-- foreach -->
                                <?php foreach ($conversations as $conv) {
                                    if ($conv['isChat']) { ?>
                                        <div class="col-md-12" style="display:flex;align-items:left;justify-content:left;">
                                            <p style="margin-bottom:5px;padding:1%;border:1px solid #BF0A30; color:#BF0A30;border-radius:15px;"><?php echo $conv['message']; ?></p> 
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-md-12" style="display:flex;align-items:right;justify-content:right;">
                                            <p style="margin-bottom:5px;padding:1%;background-color:#BF0A30; color:white;border-radius:15px;"><?php echo $conv['message']; ?></p>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div><br><br>

                        <div>
                            <form class="forms-sample" method="post" action ="<?php echo site_url('ChatbotController/talk'); ?>">
                                <div class="container">
                                    <div class="row">
                                        <div class="form-group col-md-9">
                                            <input type="text" class="form-control" name="question" placeholder="Ecrire votre requête ici" required>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-dark mr-2">Envoyer</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="form-group">
                        </div>
                    </div>
                </div>
            </div>
       </div>
</div>