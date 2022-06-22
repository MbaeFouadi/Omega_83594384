<?php
session_start();
if (isset($_SESSION['login']) and ($_SESSION['cat'] == "1"  or $_SESSION['cat'] == "4")) {
    include('connexion.php');
    $m = "";
    $reep = mysqli_query($link, "SELECT users.id_cat,libelle from users,categorie where users.id_cat=categorie.id_cat");
    $r = "SELECT  date_fin FROM date_fin order by id_date DESC";
    $ret = mysqli_query($link, $r);
    $dat = mysqli_fetch_array($ret);
    if (isset($_POST['re'])) {
        if (!empty($_POST['recu'])) {
            $_SESSION['recu'] = $_POST['recu'];
            $recu = $_SESSION['recu'];
            if ($_SESSION['choix'] == 'choix1') {
                $req = mysqli_query($link, "SELECT DISTINCT num_recu FROM candidats,departement WHERE num_recu='$recu' and departement.code_facult='" . $_SESSION['login'] . "' and choix1='" . $_SESSION['libell'] . "'
        AND departement.code_depart ='" . $_SESSION['libell'] . "'");
                if (mysqli_num_rows($req) == 0) {

                    $m = "Cet étudiant n'a pas fait ce choix";
                } else {

                    $_SESSION['recu'] = $recu;
                    header('location:affichetud.php');
                }
            } else if ($_SESSION['choix'] == 'choix2') {

                $re = mysqli_query($link, "SELECT DISTINCT num_recu,retenu FROM candidats,departement WHERE num_recu='$recu' and departement.code_facult='" . $_SESSION['login'] . "' and choix2='" . $_SESSION['libell'] . "'
        AND departement.code_depart ='" . $_SESSION['libell'] . "' ") or die(mysqli_error($link));
                $r2 = mysqli_fetch_array($re) or die(mysqli_error($link));
                if (mysqli_num_rows($re) == 0) {
                    $m = "Cet étudiant n'a pas fait ce choix";
                } else {
                    if ($r2['retenu'] == "nR1") {
                        $_SESSION['recu'] = $recu;
                        header('location:affichetud.php');
                    } elseif ($r2['retenu'] != "nR1" && $r2['retenu'] != "nR2") {
                        $m = "Candidats déjà retenu";
                    }
                }
            }
            if ($_SESSION['choix'] == 'choix3') {

                $req = mysqli_query($link, "SELECT DISTINCT num_recu,retenu,concours,choix2 FROM candidats,departement WHERE num_recu='$recu' and departement.code_facult='" . $_SESSION['login'] . "' and choix3='" . $_SESSION['libell'] . "'
            AND departement.code_depart ='" . $_SESSION['libell'] . "' ");
                $mah = mysqli_fetch_array($req);
                if (mysqli_num_rows($req) == 0) {
                    $m = "Cet étudiant n'a pas fait ce choix";
                } else {
                    if ($mah['retenu'] == "nR2") {
                        $_SESSION['recu'] = $recu;
                        header('location:affichetud.php');
                    } elseif ($mah['retenu'] == "nR1") {
                        $reqU = mysqli_query($link, "SELECT * from departement WHERE code_depart='" . $mah['choix2'] . "'");
                        $mahA = mysqli_fetch_array($reqU);

                        if ($mahA['concours'] == 1) {
                            $_SESSION['recu'] = $recu;
                            header('location:affichetud.php');
                        }
                    } elseif ($mah['retenu'] != "nR1" && $mah['retenu'] != "nR2") {
                        $m = "Candidats déjà retenu";
                    }
                }
            }
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Welcome - Université des Comores</title>
        <link rel="shortcut icon" href="./assets/img/udc.png">
        <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="./node_modules/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="./assets/css/main.css">
        <link rel="stylesheet" href="./assets/css/css.css">
    </head>

    <body>

        <section class="main-wrapper">
            <aside class="left-aside">
                <div class="fontLogo">
                    <div class="img-rd">
                        <img src="./assets/img/udc.png" alt="profile image">
                    </div>
                    <h6 class="m-3 text-center"><strong class="titre"> Université des Comores</strong></h6>
                    <hr>
                </div>
                <nav class="nav-aside">

                    <?php
                    switch ($_SESSION['cat']) {
                        case 1:
                            include('interfaces/superAdminRubrique.php');
                            break;
                        case 2:
                            include('interfaces/administrationRubrique.php');
                            break;
                        case 3:
                            include('interfaces/agtScolariteRubrique.php');
                            break;
                        case 4:
                            include('interfaces/scolariteRubrique.php');
                            break;
                        case 5:
                            include('interfaces/desRubrique.php');
                            break;
                        case 6:
                            include('interfaces/gestionnaireRubrique.php');
                            break;
                        case 7:
                            include('interfaces/agentComptaRubrique.php');
                            break;
                    }
                    ?>
                    <li class="bord"><a href="profil.php"><i class="icon-user"></i> &nbsp; <span class="nav-item-text">Changer mon mot de passe</span></a></li>

                    <li><a href="deconnexion.php"><i class="icon-logout"></i> &nbsp; <span class="nav-item-text">Déconnexion</span></a></li>

                    </ul>
                </nav>
            </aside>
            <main class="main-content">
                <h4 align="right"><strong><?php echo $_SESSION['prenom'] . " " . $_SESSION['nom'] ?> </strong></h4>
                <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle'];  ?></strong></h5>

                <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-50px;"> <?php echo (date('d-m-Y')); ?></h5>
                <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-50px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'] ?></h5>
                <div class="text-center mb-5">


                    <h2 class="soft-title-2" style="color:#00b185;">Rechercher un étudiant<?php ?></h2>
                    <hr />
                    <div style="margin-bottom:80px"></div>
                    <h5 style="color:red;"><?php echo $m ?></h5>

                </div>


                <div class="row">
                    <div class="col-12">

                        <form action="#" method="post">



                            <div class="form-row">
                                <div class="form-group col-md-4"></div>
                                <div class="form-group col-md-4" style="margin-bottom:90px;">
                                    <input style="text-align:center;" type="text" name="recu" class="form-control" placeholder="Saisir le Numéro de reçu">
                                </div>


                            </div>
                    </div>
                </div>

                <div class="text-center" style="margin-left:30px;">
                    <button name="re" type="submit" class="btn btn-primary"><i class="icon-magnifier"></i> Rechercher</button>
                </div>

                <div class="text-left" style="margin-top:-40px;margin-left:0px;">
                    <a role="button" class="btn btn-primary" href="choix.php"><i class="icon-arrow-left-circle"></i> Retour </a>
                </div>

                </form>
                </div>
                </div>



                <?php


                ?>



            </main>

            <script src="./node_modules/jquery/dist/jquery.min.js"></script>
            <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="./assets/js/app.js"></script>

    </body>
<?php
} else { ?>
    <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php"> ici </a> pour retourner &agrave; la page d accueil ! </h3>
<?php }
?>

    </html>