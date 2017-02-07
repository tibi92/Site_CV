<!DOCTYPE html>
<?php require("connexion/connexion.php"); ?>

<?php
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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Site CV <?=  $utilisateur['prenom'].' '. $utilisateur['nom']; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="front/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="front/css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="front/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Arsenal:700|Roboto+Condensed" rel="stylesheet"> 
    <link href="http://fonts.googleapis.com/css?family=Fenix" rel="stylesheet" type="text/css"> 

    <link rel="stylesheet" type="text/css" href="front/css/advences_barre.css">
    <link rel="stylesheet" type="text/css" href="front/css/style_front.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top" onclick=$("#menu-close").click();>   <?= $utilisateur['prenom'].' '.$utilisateur['nom'] ?></a>
            </li>
            <li>
                <a href="#top" onclick=$("#menu-close").click();>Accueil</a>
            </li>
            <li>
                <a href="#about" onclick=$("#menu-close").click();>A propos...</a>
            </li>
            <li>
                <a href="#realisation" onclick=$("#menu-close").click();>Réalisations</a>
            </li>
            <li>
                <a href="#portfolio" onclick=$("#menu-close").click();>Compétences</a>
            </li>
            <li>
                <a href="#contact" onclick=$("#menu-close").click();>Contact</a>
            </li>
        </ul>
    </nav>
    <div class="parallax-window" data-parallax="scroll" data-image-src="front/img/ordi.jpg">
    <!-- Header -->
        <header id="top" class="header">
        <?php
        $sql = $pdo->query("SELECT * FROM utilisateur") ;
        $utilisateur = $sql->fetch();
        ?>
            <div class="text-vertical-center">
                <h1><?php echo $utilisateur['prenom'].' '.$utilisateur['nom']; ?></h1>  
                <span class="soustitre"><?= $titre['titre_cv'] ?></span>
                <br>
                <a href="#about" class="btn btn-dark btn-lg"><i class="fa fa-chevron-down fa-4x" aria-hidden="true"></i></a></br></br></br>

                <!-- <p><?php echo $utilisateur['email'].' '.$utilisateur['adresse'].' '.$utilisateur['age'].' '.$utilisateur['notes']; ?></p> -->
            </div>
        </header>
    </div>
<div class="wrapper">
    <!-- Compétences -->
        <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-lg text-center">

        <h2>Compétences numériques</h2>
        <div class="col-md-<?php echo 2/count($competence); ?> col-sm-6">
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
        </div>
        </div>
            </div>
                </div>
        </section>
 <div class="parallax-window" data-parallax="scroll" data-image-src="front/img/ordi.jpg">

       <h2 class="parallax1">À propos</h2>

          
            <div  class="parallax">
              <i class="fa fa-book fa-5x" aria-hidden="true"></i>
                <aside class="parallax"> Lectrice assidue ( Biographie et autobiographies )</aside>
            </div>

        <i class="fa fa-heart fa-5x" aria-hidden="true"></i>
            <div class="parallax">
                <aside class="parallax">Passionnée de pâtisserie</aside> 
            </div>



 </div>
   <!--  A PROPOS -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
             
                    <p class="a_propos">Passionée par les nouvelles technologies, j'ai à coeur de réaliser le travail qui m'est confié avec rigueur mais surtout par plaisir. Dynamique et motivée, je saurais mener à bien vos projets et être une partenaire de choix !</p>
                    <div class="button">
                        <a href="CV_Tibile.pdf" target="blank">Télécharger mon cv</a> 
                    </div>
                     <!-- Expérience -->
                     <div class="col-lg-12 text-center">
                    <h3>Expériences professionelles</h3>
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
                    ?>
                    </div>
                    <!-- Formations -->
                     <div class="row">
                <div class="col-lg-12 text-center">
                    <hr class="small">
                    <h3>Formations</h3>                
                    <div class="row">
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
                    </div>

                </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- Callout -->
    <<!-- aside class="callout">
        <div class="text-vertical-center">
            <i class="fa fa-quote-left fa-4x fa-pull-left fa-border" aria-hidden="true"></i><br/><br/>
            <?php 
                $i = 0; 
                while($i < count($loisir)){
                    ?>
                    <?php echo $loisir[$i]['titre_l']. '</br>';?>
                    <?php 
                    $i++;
                } ?>
    </div>
    </aside>
 -->
 <div class="parallax-window" data-parallax="scroll" data-image-src="front/img/ordi.jpg">
 </div>
    <!-- Portfolio -->
    <section id="realisation" class="realisation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-lg text-center">
                    <h2>Mes réalisations</h2>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="front/img/projets.jpg" >
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <!-- <img class="img-portfolio img-responsive" src="front/img/portfolio-2.jpg"> -->
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <!-- <img class="img-portfolio img-responsive" src="front/img/portfolio-3.jpg"> -->
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <!-- <img class="img-portfolio img-responsive" src="front/img/portfolio-4.jpg"> -->
                                </a>
                            </div>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                    <a href="#" class="btn btn-dark">Voir plus de réalisations !</a>
                </div>
                <!-- /.col-lg-10 -->
       <!--      </div> -->
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
</div>

    <!-- Call to Action -->
 <!--    <aside class="call-to-action bg-primary">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Aptitudes professionelles</h3>
                    <p>Rigoureuse, attraits pour les nouveautés,
                    attentive, motivée, patiente</p>
                </div>
            </div>
        </div>
    </aside> -->


    <!-- CONTACT -->
    <section id="contact">
        <form method="POST" action="utilisateur.php">
            <h1 class="me_contacter">Me contacter</h1>
            <p>Une idée de projet, un besoin de conseil, de réponses en terme de production ou de délai ? Je vous invite<br/> à renseigner les champs ci-dessous et je m'engage à vous répondre dans les plus brefs délais.</p>

            <input class="formulaire" type="text" name="nom" placeholder="Nom"><br/><br/>
            <input class="formulaire" type="text" name="prenom" placeholder="Prenom"><br/><br/>
            <input class="formulaire" type="email" name="email" placeholder="Email"><br/><br/>
            <textarea class="message" placeholder="Votre message"></textarea> <br/><br/>    
            <input type="submit" name="envoyer" class="envoyer" value="M'écrire">
        </form>

        <!-- <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
        <br />
        <small>
            <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
        </small> -->
    </section> 
    <!-- Footer -->
    <footer >
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 container">
                    <h4><strong class="fin">Tibilé Coulibaly</strong>
                    </h4>
                    <p>Intégratrice / Développeuse Website
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> (123) 456-7890</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:name@example.com">tibile.coulibaly@lepoles.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="https://www.facebook.com/profile.php?id=100009513039426"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>   
                        <li>
                            <a href="<i class="fa fa-instagram" aria-hidden="true"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </div>
        <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-4x"></i></a>
    </footer>


    <!-- jQuery -->
    <script src="front/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="front/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    //#to-top button appears after scrolling
    var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                // $('#to-top').css({position:'fixed', display:'block'});
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });
    // Disable Google Maps scrolling
    // See http://stackoverflow.com/a/25904582/1607849
    // Disable scroll zooming and bind back the click event
    var onMapMouseleaveHandler = function(event) {
        var that = $(this);
        that.on('click', onMapClickHandler);
        that.off('mouseleave', onMapMouseleaveHandler);
        that.find('iframe').css("pointer-events", "none");
    }
    var onMapClickHandler = function(event) {
            var that = $(this);
            // Disable the click handler until the user leaves the map area
            that.off('click', onMapClickHandler);
            // Enable scrolling zoom
            that.find('iframe').css("pointer-events", "auto");
            // Handle the mouse leave event
            that.on('mouseleave', onMapMouseleaveHandler);
        }
        // Enable map zooming with mouse scroll when the user clicks the map
    $('.map').on('click', onMapClickHandler);
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="front/parallax.js-1.4.2/parallax.js"></script>
<script src="front/parallax.js-1.4.2/script.js"></script>

</body>


</html>
