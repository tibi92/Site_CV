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

    <title>Stylish Portfolio - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="front/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="front/css/stylish-portfolio.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="front/css/style_front.css">

    <!-- Custom Fonts -->
    <link href="front/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

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
                <a href="#top" onclick=$("#menu-close").click();>   <?= $utilisateur['nom'].' '.$utilisateur['prenom'] ?></a>
            </li>
            <li>
                <a href="#top" onclick=$("#menu-close").click();>Accueil</a>
            </li>
            <li>
                <a href="#about" onclick=$("#menu-close").click();>Expérience</a>
            </li>
            <li>
                <a href="#about" onclick=$("#menu-close").click();>Compétences</a>
            </li>
            <li>
                <a href="#services" onclick=$("#menu-close").click();>Formations</a>
            </li>
            <li>
                <a href="#portfolio" onclick=$("#menu-close").click();>Portfolio</a>
            </li>
            <li>
                <a href="#contact" onclick=$("#menu-close").click();>Contact</a>
            </li>
        </ul>
    </nav>

    <!-- Header -->
    <header id="top" class="header">
    <?php
    $sql = $pdo->query("SELECT * FROM utilisateur") ;
    $utilisateur = $sql->fetch();
    ?>
        <div class="text-vertical-center">
            <h1><?php echo $utilisateur['nom'].' '.$utilisateur['prenom']; ?></h1>
            <h3><?= $titre['titre_cv'] ?></h3>
            <br>
            <a href="#about" class="btn btn-dark btn-lg">C'est parti !</a></br></br></br>

            <p><?php echo $utilisateur['email'].' '.'<i class="fa fa-star " aria-hidden="true"></i>'.' '.$utilisateur['adresse'].' '.'<i class="fa fa-star" aria-hidden="true"></i>'.' '.$utilisateur['age'].' '.'<i class="fa fa-star" aria-hidden="true"></i>'.' '.$utilisateur['notes']; ?></p>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Expériences</h2>
                    
                        <?php 
                    $i = 0; 
                    while($i < count($experience)){
                        ?> <p class="lead"> <?php echo $experience[$i]['titre_e'].'   '.''.$experience[$i]['date_e'];?></p>
                         <p><?php echo $experience[$i]['description_e'];?><p><?php 
                        $i++;
                    } ?>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Formations</h2>
                    <hr class="small">
                    <div class="row">
                    <?php
                    $i = 0;
                    while( $i< count($formation) ){
                        $nb = 12%count($formation);
                        ?>
                        <div class="col-md- <?php count($formation); ?> col-sm-6"> 
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>

                            </span>
                                <h4>
                                    <strong><?php echo $formation[$i]['titre_f'];?> </strong>
                                </h4>
                                <p><?php echo $formation[$i]['date_f'].' ' .$formation[$i]['description_f'] ?></p>
                                <a href="#" class="btn btn-light">Lire plus</a>
                            </div>
                        </div>
                    <?php $i++;
                    }
                    ?>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Callout -->
    <aside class="callout">
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

    <!-- Portfolio -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h2>Mes réalisations</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="front/img/mauritanie.jpg" width="638.372" height="425.139">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="front/img/portfolio-2.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="front/img/portfolio-3.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="front/img/portfolio-4.jpg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                    <a href="#" class="btn btn-dark">Voir plus de réalisations !</a>
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Call to Action -->
    <aside class="call-to-action bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Aptitudes professionelles</h3>
                    <p>Rigoureuse, attraits pour les nouveautés,
                        attentive, motivée, patiente</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- Map -->
    <section>
        <form id="contact">
            <h4>Me contacter</h4>
            <input type="text" name="nom" placeholder="Nom"><br/><br/>
            <input type="text" name="prenom" placeholder="Prenom"><br/><br/>
            <input type="email" name="email" placeholder="Email"><br/><br/>
            <label>Votre message</label><br/>
            <textarea  ></textarea> 
        </form>
        <!-- <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
        <br />
        <small>
            <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
        </small> -->
    </section> 

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Tibilé Coulibaly</strong>
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
                            <a href="<i class="fa fa-instagram" aria-hidden="true"></i><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </div>
        <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
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

</body>

</html>
