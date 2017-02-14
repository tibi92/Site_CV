<DOCTYPE html>
<?php require("connexion/connexion.php"); 

$sql = $pdo->query("SELECT * FROM utilisateur") ;
$utilisateur = $sql->fetch();


$sql = $pdo->query("SELECT * FROM competence") ;
$competence = $sql->fetchAll();


$sql = $pdo->query("SELECT * FROM experience") ;
$experience = $sql->fetchAll();

$sql = $pdo->query("SELECT * FROM formation") ;
$formation = $sql->fetchAll();

$sql = $pdo->query("SELECT * FROM loisir") ;
$loisir = $sql->fetchAll();

$sql = $pdo->query("SELECT * FROM titre") ;
$titre = $sql->fetch();

// print_r($utilisateur);
// print_r($competence);
// print_r($experience);
// print_r($formation);
// print_r($loisir);
// print_r($titre);
?>




<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="fr"> <!--<![endif]-->
<head>

   <!--- Basic Page Needs
   ================================================== -->
  <meta charset="utf-8">
	<title>Tibilé Coulibaly | Site CV</title>
	<meta name="description" content="">
	<meta name="author" content="">

   <!-- Mobile Specific Metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="front/css/default.css">
	 <link rel="stylesheet" href="front/css/layout.css">
   <link rel="stylesheet" href="front/css/media-queries.css">
   <link rel="stylesheet" href="front/css/magnific-popup.css">
   <link rel="stylesheet" href="front/css/style_front.css">
   <link rel="stylesheet" href="front/css/skills.css">
   <!-- <link rel="stylesheet" href="front/css/style_front.css"> -->


   <!-- Script
   ================================================== -->
	<script src="front/js/modernizr.js"></script>

   <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.png" >

</head>

<body>

   <!-- Header
   ================================================== -->
   <header id="home">

      <nav id="nav-wrap">

         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
	      <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

         <ul id="nav" class="nav">
            <li class="current"><a class="smoothscroll" href="#home">Accueil</a></li>
            <li><a class="smoothscroll" href="#about"> Compétences numériques</a></li>
	          <li><a class="smoothscroll" href="#resume">Formations</a></li>
            <li><a class="smoothscroll" href="#portfolio">Expériences</a></li>
            <li><a class="smoothscroll" href="#testimonials">À propos</a></li>
            <li><a class="smoothscroll" href="#contact">Contact</a></li>
         </ul> <!-- end #nav -->

      </nav> <!-- end #nav-wrap -->

      <div class="row banner">
         <div class="banner-text">
            <h1 class="responsive-headline"><?=  $utilisateur['prenom'].' '. $utilisateur['nom']; ?></h1>
            <h3>Je suis une jeune  <span> <?= $titre['titre_cv'] ?>.<br/></span>  Commençons <a class="smoothscroll" href="#about">la découverte du site </a>
            afin d'en apprendre <a class="smoothscroll" href="#about"> plus sur moi</a>.</h3>
            <hr />
         </div>
      </div>

      <p class="scrolldown">
         <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
      </p>

   </header> <!-- Header End -->
   <!-- Skills
   ----------------------------------------------- -->
   <div class="row skill">

      <div class="three columns header-col">
         <h1><span >Compétences numériques</span></h1>
      </div>

      <div class="nine columns main-col">

         <p>
         </p>

     <div class="bars">

        <ul class="skills">
                    <?php
                    //print_r($competence);
                    $i = 0;
                    while($i < count($competence)){
                        ?>  <?php echo '<li class="skill" aria-label="'.$competence[$i]['class_c'].'">'.$competence[$i]['competence'].'</li>'.'<br>';?>
                         <?php
                        $i++;
                    } ?>

            </ul>

     </div><!-- end skill-bars -->

   </div> <!-- main-col end -->

   </div> <!-- End skills -->

</section> <!-- Resume Section End-->

<!-- //EXPERIENCE ET FORMATIONS --> 
<h1><span class="titre">Formations</span></h1>

<section id="timeline">
<?php
      $i = 0;
      while( $i< count($formation) ){
          $nb = 12%count($formation);
          ?>
          <article>
          <div class="col-md-<?php echo 12/count($formation); ?> col-sm-6">
              <div class="inner">
                      <span class="date"><?php echo $formation[$i]['date_f'] ?></span>
                      <h2><?php echo $formation[$i]['titre_f'].'<br/>';?> </h2>
                      <?php echo '<p>'.$formation[$i]['description_f'].'</p>'?>
              </div>
          </div>
          </article>
      <?php $i++;
      }
                    ?>
</section>


<!--  // FIN experience et formation -->



   <!-- Resume Section
   ================================================== -->
   <section id="resume">

      <!-- Education
      ----------------------------------------------- -->
      <div class="row education">

         <div class="three columns header-col">
            <h1><span>Formations</span></h1>
         </div>

         <div class="nine columns main-col">

           <?php
           $i = 0;
           while( $i< count($formation) ){
               $nb = 12%count($formation);
               ?>
               <div class="col-md-<?php echo 12/count($formation); ?> col-sm-6">
                <i class="fa fa-graduation-cap fa-4x" aria-hidden="true"></i>

                   <div class="service-item">

                       <h5>
                           <strong><?php echo $formation[$i]['titre_f'].'<br/>';?> </strong>
                       </h5>

                           <span><?php echo $formation[$i]['date_f'] ?></span><br/>
                           <?php echo '<br/>'.$formation[$i]['description_f'] ?>
                   </div>
               </div>
           <?php $i++;
         }
         ?>

         </div> <!-- main-col end -->

      </div> <!-- End Education -->


      <!-- Work
      ----------------------------------------------- -->
      <div class="row work">

         <div class="three columns header-col">
            <h1><span>Expériences professionnelles</span></h1>
         </div>

         <div class="nine columns main-col">

           <?php
           $i = 0;
           while( $i< count($experience) ){
               $nb = 12%count($experience);
               ?>
               <div class="col-md-<?php echo 12/count($experience); ?> col-sm-6">
                   <div class="service-item">
                       <i class="fa fa-graduation-cap fa-4x" aria-hidden="true"></i>

                       <h5>
                           <strong><?php echo $experience[$i]['titre_e'];?> </strong>
                       </h5>
                       <p><?php echo '<span>'.$experience[$i]['date_e'].'<span>'.' ' .$experience[$i]['description_e'] ?></p>

                   </div>
               </div>
           <?php $i++;
           }
           ?> <!-- item end -->

         </div> <!-- main-col end -->

      </div> <!-- End Work -->


    <!-- About Section
    ================================================== -->
    <section id="about">

       <div class="row">

          <div class="three columns">

             <img class="profile-pic"  src="images/profilepic.jpg" alt="" />

          </div>

          <div class="nine columns main-col">

             <h2>À propos</h2>

             <p>Passionée par les nouvelles technologies, j'ai à coeur de réaliser le travail qui m'est confié avec rigueur
               mais surtout par plaisir. Dynamique et motivée, je saurais mener à bien vos projets et être une partenaire de choix !</p>

             <div class="row">

                <div class="columns contact-details">

                   <h3>Contact Details</h3>
                   <p class="address">
                <span>Passionée de pâtisserie</span><br>
                <span>Lectrice assidue  <br>

              </p>

                </div>

                <div class="columns download">
                   <p>
                      <a href="#" class="button"><i class="fa fa-download"></i>Télécharger mon CV</a>
                   </p>
                </div>

             </div> <!-- end row -->

          </div> <!-- end .main-col -->

       </div>

    </section> <!-- About Section End-->


   <!-- Portfolio Section
   ================================================== -->
   <section id="portfolio">

      <div class="row">

         <div class="twelve columns collapsed">

            <h1>Vous pouvez voir mes réalisations</h1>

            <!-- portfolio-wrapper -->
            <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">

          	   <div class="columns portfolio-item">
                  <div class="item-wrap">

                     <a href="#modal-01" title="">
                        <img alt="" src="images/portfolio/coffee.jpg">
                        <div class="overlay">
                           <div class="portfolio-item-meta">
          					      <h5>Coffee</h5>
                              <p>Illustrration</p>
          					   </div>
                        </div>
                        <div class="link-icon"><i class="icon-plus"></i></div>
                     </a>

                  </div>
          		</div> <!-- item end -->

               <div class="columns portfolio-item">
                  <div class="item-wrap">

                     <a href="#modal-02" title="">
                        <img alt="" src="front/img/portfolio/console.jpg">
                        <div class="overlay">
                           <div class="portfolio-item-meta">
          					      <h5>Console</h5>
                              <p>Web Development</p>
          					   </div>
                        </div>
                        <div class="link-icon"><i class="icon-plus"></i></div>
                     </a>

                  </div>
          		</div> <!-- item end -->

               <div class="columns portfolio-item">
                  <div class="item-wrap">

                     <a href="#modal-03" title="">
                        <img alt="" src="images/portfolio/judah.jpg">
                        <div class="overlay">
                           <div class="portfolio-item-meta">
          					      <h5>Judah</h5>
                              <p>Webdesign</p>
          					   </div>
                        </div>
                        <div class="link-icon"><i class="icon-plus"></i></div>
                     </a>

                  </div>
          		</div> <!-- item end -->

               <div class="columns portfolio-item">
                  <div class="item-wrap">

                     <a href="#modal-04" title="">
                        <img alt="" src="images/portfolio/into-the-light.jpg">
                        <div class="overlay">
                           <div class="portfolio-item-meta">
          					      <h5>Into The Light</h5>
                              <p>Photography</p>
          					   </div>
                        </div>
                        <div class="link-icon"><i class="icon-plus"></i></div>
                     </a>

                  </div>
          		</div> <!-- item end -->

               <div class="columns portfolio-item">
                  <div class="item-wrap">

                     <a href="#modal-05" title="">
                        <img alt="" src="images/portfolio/farmerboy.jpg">
                        <div class="overlay">
                           <div class="portfolio-item-meta">
          					      <h5>Farmer Boy</h5>
                              <p>Branding</p>
          					   </div>
                        </div>
                        <div class="link-icon"><i class="icon-plus"></i></div>
                     </a>

                  </div>
          		</div> <!-- item end -->

               <div class="columns portfolio-item">
                  <div class="item-wrap">

                     <a href="#modal-06" title="">
                        <img alt="" src="images/portfolio/girl.jpg">
                        <div class="overlay">
                           <div class="portfolio-item-meta">
          					      <h5>Girl</h5>
                              <p>Photography</p>
          					   </div>
                        </div>
                        <div class="link-icon"><i class="icon-plus"></i></div>
                     </a>

                  </div>
          		</div> <!-- item end -->

               <div class="columns portfolio-item">
                  <div class="item-wrap">

                     <a href="#modal-07" title="">
                        <img alt="" src="images/portfolio/origami.jpg">
                        <div class="overlay">
                           <div class="portfolio-item-meta">
          					      <h5>Origami</h5>
                              <p>Illustrration</p>
          					   </div>
                        </div>
                        <div class="link-icon"><i class="icon-plus"></i></div>
                     </a>

                  </div>
          		</div> <!-- item end -->

               <div class="columns portfolio-item">
                  <div class="item-wrap">

                     <a href="#modal-08" title="">
                        <img alt="" src="images/portfolio/retrocam.jpg">
                        <div class="overlay">
                           <div class="portfolio-item-meta">
          					      <h5>Retrocam</h5>
                              <p>Web Development</p>
          					   </div>
                        </div>
                        <div class="link-icon"><i class="icon-plus"></i></div>
                     </a>

                  </div>
          		</div>  <!-- item end -->

            </div> <!-- portfolio-wrapper end -->

         </div> <!-- twelve columns end -->


         <!-- Modal Popup
	      --------------------------------------------------------------- -->

         <div id="modal-01" class="popup-modal mfp-hide">

		      <img class="scale-with-grid" src="images/portfolio/modals/m-coffee.jpg" alt="" />

		      <div class="description-box">
			      <h4>Coffee Cup</h4>
			      <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
               <span class="categories"><i class="fa fa-tag"></i>Branding, Webdesign</span>
		      </div>

            <div class="link-box">
               <a href="http://www.behance.net">Details</a>
		         <a class="popup-modal-dismiss">Close</a>
            </div>

	      </div><!-- modal-01 End -->

         <div id="modal-02" class="popup-modal mfp-hide">

		      <img class="scale-with-grid" src="front/img/portfolio/modals/m-console.jpg" alt="" />

		      <div class="description-box">
			      <h4>Console</h4>
			      <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
               <span class="categories"><i class="fa fa-tag"></i>Branding, Web Development</span>
		      </div>

            <div class="link-box">
               <a href="http://www.behance.net">Details</a>
		         <a class="popup-modal-dismiss">Close</a>
            </div>

	      </div><!-- modal-02 End -->

         <div id="modal-03" class="popup-modal mfp-hide">

		      <img class="scale-with-grid" src="images/portfolio/modals/m-judah.jpg" alt="" />

		      <div class="description-box">
			      <h4>Judah</h4>
			      <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
               <span class="categories"><i class="fa fa-tag"></i>Branding</span>
		      </div>

            <div class="link-box">
               <a href="http://www.behance.net">Details</a>
		         <a class="popup-modal-dismiss">Close</a>
            </div>

	      </div><!-- modal-03 End -->

         <div id="modal-04" class="popup-modal mfp-hide">

		      <img class="scale-with-grid" src="images/portfolio/modals/m-intothelight.jpg" alt="" />

		      <div class="description-box">
			      <h4>Into the Light</h4>
			      <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
               <span class="categories"><i class="fa fa-tag"></i>Photography</span>
		      </div>

            <div class="link-box">
               <a href="http://www.behance.net">Details</a>
		         <a class="popup-modal-dismiss">Close</a>
            </div>

	      </div><!-- modal-04 End -->

         <div id="modal-05" class="popup-modal mfp-hide">

		      <img class="scale-with-grid" src="images/portfolio/modals/m-farmerboy.jpg" alt="" />

		      <div class="description-box">
			      <h4>Farmer Boy</h4>
			      <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
               <span class="categories"><i class="fa fa-tag"></i>Branding, Webdesign</span>
		      </div>

            <div class="link-box">
               <a href="http://www.behance.net">Details</a>
		         <a class="popup-modal-dismiss">Close</a>
            </div>

	      </div><!-- modal-05 End -->

         <div id="modal-06" class="popup-modal mfp-hide">

		      <img class="scale-with-grid" src="images/portfolio/modals/m-girl.jpg" alt="" />

		      <div class="description-box">
			      <h4>Girl</h4>
			      <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
               <span class="categories"><i class="fa fa-tag"></i>Photography</span>
		      </div>

            <div class="link-box">
               <a href="http://www.behance.net">Details</a>
		         <a class="popup-modal-dismiss">Close</a>
            </div>

	      </div><!-- modal-06 End -->

         <div id="modal-07" class="popup-modal mfp-hide">

		      <img class="scale-with-grid" src="images/portfolio/modals/m-origami.jpg" alt="" />

		      <div class="description-box">
			      <h4>Origami</h4>
			      <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
               <span class="categories"><i class="fa fa-tag"></i>Branding, Illustration</span>
		      </div>

            <div class="link-box">
               <a href="http://www.behance.net">Details</a>
		         <a class="popup-modal-dismiss">Close</a>
            </div>

	      </div><!-- modal-07 End -->

         <div id="modal-08" class="popup-modal mfp-hide">

		      <img class="scale-with-grid" src="images/portfolio/modals/m-retrocam.jpg" alt="" />

		      <div class="description-box">
			      <h4>Retrocam</h4>
			      <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
               <span class="categories"><i class="fa fa-tag"></i>Webdesign, Photography</span>
		      </div>

            <div class="link-box">
               <a href="http://www.behance.net">Details</a>
		         <a class="popup-modal-dismiss">Close</a>
            </div>

	      </div><!-- modal-01 End -->


      </div> <!-- row End -->

   </section> <!-- Portfolio Section End-->


   <!-- Call-To-Action Section
   ================================================== -->



   <!-- Testimonials Section
   ================================================== -->
   <section id="testimonials">
     <div class="parallax-window" data-parallax="scroll" data-image-src="front/img/ordi.jpg">

      <div class="text-container">

         <div class="row">

            <div class="two columns header-col">

               <h1><span>sddfsdcsdvs</span></h1>

            </div>

            <div class="ten columns flex-container">

               <div class="flexslider">


                  <ul class="slides">

                     <li>
                        <blockquote>
                           <p>Your work is going to fill a large part of your life, and the only way to be truly satisfied is
                           to do what you believe is great work. And the only way to do great work is to love what you do.
                           If you haven't found it yet, keep looking. Don't settle. As with all matters of the heart, you'll know when you find it.
                           </p>
                           <cite>Steve Jobs</cite>
                        </blockquote>
                     </li> <!-- slide ends -->

                     <li>
                        <blockquote>
                           <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
                           Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem
                           nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.
                           </p>
                           <cite>Mr. Adobe</cite>
                        </blockquote>
                     </li> <!-- slide ends -->

                  </ul>

               </div> <!-- div.flexslider ends -->

            </div> <!-- div.flex-container ends -->

         </div> <!-- row ends -->

       </div>  <!-- text-container ends -->

   </section> <!-- Testimonials Section End-->


   <!-- Contact Section
   ================================================== -->
   <section id="contact">

         <div class="row section-head">
<h2>Contactez moi !</h2>

            <div class="two columns header-col">

               <h1><span>dqdffsd.</span></h1>

            </div>

            <div class="ten columns">

                  <p class="lead">Une idée de projet, un besoin de conseil, de réponses en terme de production ou de délai ? Je vous invite<br/>
                     à renseigner les champs ci-dessous et je m'engage à vous répondre dans les plus brefs délais.
                  </p>

            </div>

         </div>

         <div class="row">

            <div class="eight columns">

               <!-- form -->
               <form action="" method="post" id="contactForm" name="contactForm">
					<fieldset>

                  <div>
						   <label for="contactName">Nom <span class="required">*</span></label>
						   <input type="text" value="" size="35" id="contactName" name="contactName">
                  </div>

                  <div>
						   <label for="contactName">Prenom <span class="required">*</span></label>
						   <input type="text" value="" size="35" id="contactName" name="contacPrenom">
                  </div>

                  <div>
						   <label for="contactEmail">Email <span class="required">*</span></label>
						   <input type="text" value="" size="35" id="contactEmail" name="contactEmail">
                  </div>

                  <div>
                     <label for="contactMessage">Message <span class="required">*</span></label>
                     <textarea cols="50" rows="15" id="contactMessage" name="contactMessage"></textarea>
                  </div>

                  <div>
                     <button class="submit">Envoyer</button>
                     <span id="image-loader">
                        <img alt="" src="images/loader.gif">
                     </span>
                  </div>

					</fieldset>
				   </form> <!-- Form End -->

               <!-- contact-warning -->
               <div id="message-warning"> Error boy</div>
               <!-- contact-success -->
				   <div id="message-success">
                  <i class="fa fa-check"></i>Your message was sent, thank you!<br>
				   </div>

            </div>


            <aside class="four columns footer-widgets">

               <div class="widget widget_contact">

					   <h4>Address and Phone</h4>
					   <p class="address">
						   Jonathan Doe<br>
						   1600 Amphitheatre Parkway <br>
						   Mountain View, CA 94043 US<br>
						   <span>(123) 456-7890</span>
					   </p>

				   </div>



            </aside>

      </div>

   </section> <!-- Contact Section End-->


   <!-- footer
   ================================================== -->
   <footer>

      <div class="row">

         <div class="twelve columns">

            <ul class="social-links">
               <li><a href="#"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>

            <ul class="copyright">
                 <li>&copy; Copyright 2014 Tibilé Coulibaly</li>
            </ul>

         </div>

         <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#home"><i class="icon-up-open"></i></a></div>

      </div>

   </footer> <!-- Footer End-->

   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

   <script src="front/js/jquery.flexslider.js"></script>
   <script src="front/js/waypoints.js"></script>
   <script src="front/js/jquery.fittext.js"></script>
   <script src="front/js/magnific-popup.js"></script>
   <script src="front/js/init.js"></script>
   <script src="front/js/formaex.js"></script>

</body>

</html>
