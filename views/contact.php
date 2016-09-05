

                <!-- =========
                Start Contact tab content section
                ===================================-->
                <div id='contact' class="tab-pane fade">
                  <div class="body-content">
                    <h3 class="title with-icon"><span class="fa fa-coffee icn-title"></span> On se voit quand ?</h3>

                    <!-- =========
                    Start map section
                    ===================================-->
                    <div class="map-area">
                      <div id="map"></div>
                      <div class="info-map">
                        <h3>Contact</h3>
                        <ul class="list-unstyled list-info">
                          <li><i class="fa fa-home"></i> 62 Rue Brizard | Bordeaux</li>
                          <li><i class="fa fa-phone"></i> 07 86 81 00 44</li>
                          <li><i class="fa fa-github"></i> <a href="https://github.com/Jiedara">Github</a></li>
                          <li><i class="fa fa-codepen"></i> <a href="https://codepen.io/Jiedara/">CodePen</a></li>
                          <li><i class="fa fa-stack-overflow"></i> <a href="http://stackoverflow.com/users/5685789/jiedara">StackOverflow</a></li>
                          <li><i class="fa fa-linkedin"></i> <a href="https://fr.linkedin.com/in/jiedara">Linkedin</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="deviter"></div>
                    <br/>
                    <!-- =========
                    End map section
                    ===================================-->


                    <!-- =========
                    Start form contact section
                    ===================================-->
                    <?php
                        if(isset($_GET['return'])){
                            switch($_GET['return']){
                                case 'ko':
                                    $status = "alert-danger";
                                    $return_message = "Une erreur est survenue, veuillez réessayer ultérieurement.";
                                break;
                                case 'ok':
                                    $status = "alert-success";
                                    $return_message = "Votre demande a bien été envoyée. Je vous recontacte dans les plus bref délais !";
                                break;
                                case 'mail':
                                    $status = "alert-warning";
                                    $return_message = "Votre mail est invalide.";
                                break;
                                case 'name':
                                    $status = "alert-warning";
                                    $return_message = "Veuillez saisir votre nom.";
                                break;
                                default:
                                    $status = "hidden";
                                break;
                            }
                        }else {
                            $status = "hidden";
                        }
                    ?>
                    <div class="alert <?php echo $status; ?>" role="alert"><?php echo $return_message; ?></div>
                    <form method="POST" action="contact-form.php">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="FullnameForm">Votre Nom *</label>
                            <input type="text" required name="name" value="<?php if(isset($_GET['name'])){ echo $_GET['name']; } ?>" class="form-control" id="FullnameForm" placeholder="Par exemple moi, c'est Martin Villanove">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="CompanyForm">Votre entreprise</label>
                            <input type="text" name="enterprise" value="<?php if(isset($_GET['enterprise'])){ echo $_GET['enterprise']; } ?>" class="form-control" id="CompanyForm" placeholder="La meilleure du monde je présume">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="EmailForm">Votre adresse mail *</label>
                            <input type="email" required name="email" value="<?php if(isset($_GET['email'])){ echo $_GET['email']; } ?>" class="form-control" id="EmailForm" placeholder="Sinon, je ne pourrais pas vous contacter...">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="PhoneForm">Votre téléphone</label>
                            <input type="tel" name="phone" class="form-control" value="<?php if(isset($_GET['phone'])){ echo $_GET['phone']; } ?>" id="PhoneForm" placeholder="Si vous voulez que je vous appelle">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="MessageForm">Votre Message *</label>
                        <textarea class="form-control" required name="message" rows="8" id="MessageForm" placeholder="Pleins de mots doux" ><?php if(isset($_GET['message'])){ echo $_GET['message']; }  ?></textarea>
                      </div>
                      <button type="submit" class="btn btn-flat btn-lg"><span class="glyphicon glyphicon-send"></span> Envoyer</button>
                    </form>
                    <!-- =========
                    End form contact section
                    ===================================-->

                  </div>
                </div>

              </div>
              <!-- =========
              End tab content section
              ===================================-->
