<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div class="row">
                                <div class="col-md-12"><h2 class="font-weight-bold">   <small class="h2 text-muted">Test technique</small> </h2></div>
                            </div>
                     </div>
              </div>
       </div>
</div>
<div class="row">
       <!-- <div class="col-md-0"></div> -->
       <div class="col-md-12">
            <div class="col-lg-12 grid-margin stretch-card">
                <form class="pt-3" method="post" action="<?php echo site_url('SimulationController/getResultat'); ?>">
                    <input type="hidden" name="data" value="<?php echo htmlspecialchars(json_encode($questions)); ?>">
                    <div class="card">
                        <?php
                        $i = 0;
                        foreach($questions as $question) { ?>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $question['question'] .' - '. $question['id_reponse_simulation'];?></h4>
                            <div class="form-group">
                                <?php
                                $reponses = $this->SimulationModel->getReponsesQuest($question['id_question_simulation']);
                                foreach ($reponses as $reponse) { ?>
                                    <div>
                                        <input type="radio" name="<?php echo $i; ?>[]" value="<?php echo $reponse['id_reponse_simulation']; ?>" required>
                                            <?php echo $reponse['id_reponse_simulation']; ?> - 
                                            <?php echo $reponse['reponse']; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php $i++; } ?>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Valider réponses</button>
                    </div>
                </form><br><br>
             </div>
       </div>
</div>