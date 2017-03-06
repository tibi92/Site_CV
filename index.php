<!DOCTYPE html >
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
<html lang="fr">

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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom Fonts -->
    <link href="front/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans|Droid+Serif|Merriweather|Mukta+Vaani|Roboto|Ubuntu" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Open+Sans" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Lato|Oswald|Roboto" rel="stylesheet"> 
   <script src="https://use.fontawesome.com/30a190e011.js"></script>

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
                <a href="#portfolio" onclick=$("#menu-close").click();>Compétences</a>
            </li>
            <li>
                <a href="#about" onclick=$("#menu-close").click();>A propos...</a>
            </li>
            <li>
                <a href="#experience" onclick=$("#menu-close").click();>Expérience</a>
            </li>
            <li>
                <a href="#formation" onclick=$("#menu-close").click();>Formations</a>
            </li>
            <li>
                <a href="#realisation" onclick=$("#menu-close").click();>Réalisations</a>
            </li>
            <li>
                <a href="#contact" onclick=$("#menu-close").click();>Contact</a>
            </li>
        </ul>
    </nav>
    <!-- <div class="parallax-window" data-parallax="scroll" data-image-src="front/img/ordi.jpg"> -->
    <!-- Header -->
        <header id="top" class="header">
        <a href="http://tibilec.ma6tvacoder.org/admin" target="blank"><i class="fa fa-key fa-2x" aria-hidden="true"></i></a>
        <?php
        $sql = $pdo->query("SELECT * FROM utilisateur") ;
        $utilisateur = $sql->fetch();
        ?>
        <div class="text-vertical-center">
            <h1><?php echo $utilisateur['prenom'].' '.$utilisateur['nom']; ?></a></h1>
            <span class="soustitre"><?= $titre['titre_cv'] ?></span>
            <br>

           <!--  <img src="front/img/logo-cv_dev.png " class="logo"> -->
            
            <a href="#portfolio" class="btn btn-dark btn-lg"><i class="fa fa-chevron-down fa-4x" aria-hidden="true"></i></a></br></br></br>

           

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

        <!-- <div class="col-md-<?php echo 2/count($competence); ?> col-sm-6"> -->
        <div class="skills">
            <ul>
                <?php
                //print_r($competence);
                $i = 0;
                while($i < count($competence)){?>
                     <li> <?php echo '<span class="'.$competence[$i]['class_c'].'" aria-label="'.$competence[$i]['class_c'].'">'.$competence[$i]['competence'].'</span>'.'<br>';?></li>
                     <?php
                    $i++;
                } ?>
            </ul>
        </div>
        </div>
            </div>
                </div>
        </section>
<!--  A PROPOS -->
    <section id="about" class="about">

<h2 class="parallax1">À propos</h2>

<div class="row">
                <div class="col-md-12">
                    <div class="logo-loisir text-center">
                        <div class="col-md-offset-2 col-md-3">
                            <img src="front/img/cupcake.png" alt="logo cupcake">
                            <p class="app">Patisser c'est comme coder: L'un est minitieux l'autre délicieux ! </p>
                        </div>
                        <div class="col-md-3">
                            <img src="front/img/book.png" alt="book chat">
                            <p class="app">Je suis une grande lectrice d'autobiographies et de biographies, principalement</p>
                        </div>
                        <div class="col-md-3">
                            <img src="front/img/association.png" alt="logo association">
                            <p class="app">On ne peut pas aider tout le monde mais tout le monde peut aider quelqu'un... Le monde associatif est pour moi un moyen de se rendre utile.</p>
                        </div>
                    </div>
                </div>
            </div>
</div>
    </section>

 
   
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    

                     <!-- Expérience -->
                     <div class="col-lg-12 text-center">
                    <h2 id="experience">Expériences professionnelles</h2>
                    <?php
                    $i = 0;
                    while( $i< count($experience) ){
                        $nb = 12%count($experience);
                        ?>
                        <div class="col-md-<?php echo 12/count($experience); ?> col-sm-6" id="div">
                            <div class="service-item">
                                <i class="fa fa-graduation-cap fa-4x" aria-hidden="true"></i> 
                                <h5>
                                    <strong><?php echo $experience[$i]['titre_e'];?> </strong>
                                </h5>
                                <p><?php echo '<span class="span">'.$experience[$i]['date_e'].'<span>'.'<p>'.$experience[$i]['description_e'].'<p>' ?></p>

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
                    <h2 id="formation">Formations</h2>
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

                                    <span class="span"><?php echo $formation[$i]['date_f'] ?></span><br/>
                                    <?php echo '<br/>'.'<p>'.$formation[$i]['description_f'].'</p>'?>
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
        <div class="button">
                        <a href="CV_Tibile.pdf" target="blank">Télécharger mon cv</a>
                    </div>
        <!-- /.container -->
    
    <!-- Callout -->
    <!-- aside class="callout">
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

 </div>
    <!-- Portfolio -->
    <section id="realisation" class="realisation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-lg text-center">
                    <h2 class="mes_rea">Mes réalisations</h2>

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
                                <a href="https://newsite.metropop.org/" target="blank">
                                    <img class="img-portfolio img-responsive" src="front/img/projets2.jpg">
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
            <h1 class="me_contacter">Me contacter</h1>
            <p>Une idée de projet, un besoin de conseil, de réponses en terme de production ou de délai ? Je vous invite<br/> à renseigner les champs ci-dessous et je m'engage à vous répondre dans les plus brefs délais.</p>
   
        <form method="POST">

            <div id="result"></div>
            <input class="formulaire" type="email" name="email" placeholder="Email" id="email"><br/><br/>
            <input class="formulaire" type="text" name="objet" placeholder="Objet" id="objet"><br/><br/>
            <textarea class="message" placeholder="Votre message" name="message" id="message"></textarea> <br/><br/>

           <input type="submit" class="envoyer">
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
                  
                        <li class="list"><i class="fa fa-phone fa-fw"></i> 07 78 21 56 33</li>
                        <li class="list"><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:name@example.com">tibile.coulibaly@lepoles.com</a>
                        </li>
                 
                    <br>
                    
                    <hr class="small">
                    <p class="text-muted">Copyright &copy;Tibilé Coulibaly</p>
                </div>
            </div>
        </div>
       

    </footer>


    <!-- jQuery -->
     
    <!-- Bootstrap Core JavaScript -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="front/js/form.js"></script>
    <script src="front/parallax.js-1.4.2/parallax.js"></script>
    <script src="front/parallax.js-1.4.2/script.js"></script>
   

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

</body>


</html>