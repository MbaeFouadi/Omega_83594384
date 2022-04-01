<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7")){
include('../connexion.php');
$message="";

$r="SELECT  date_fin FROM date_fin order by id_date DESC";

    $req = mysqli_query($link,$r);
    $d=mysqli_fetch_array($req);
//$b = $_SESSION['nin'];
// $br = mysqli_query($link,"SELECT * FROM choix where nin ='".$b."'");
// while($data = mysqli_fetch_array($br)){
//}

$sq= mysqli_query($link,"SELECT * FROM departement where code_depart='".$_SESSION['dep']."'");
$dat = mysqli_fetch_array($sq);
    
    

$req = mysqli_query($link,"SELECT code_depart FROM departement where statut =1 ");
$data = mysqli_fetch_array($req);

if($_SESSION['type']==1){
        /*$sqlist= mysqli_query($link,"SELECT * FROM candidats,note where
    candidats.nin=note.nin
    AND id_type='1'
    AND traitant_recu != 'anjouan' 
    AND traitant_recu != 'moheli' 
    AND (
        candidats.choix1 ='".$_SESSION['dep']."'
        OR candidats.choix2 ='".$_SESSION['dep']."'
        OR candidats.choix3 ='".$_SESSION['dep']."'
        )
    
        order by nom ASC,prenom ASC");*/
        $sqlist= mysqli_query($link,"SELECT candidats.nom as nom, candidats.prenom as prenom, candidats.nin as nin, num_recu, date_naiss,lieu_naiss
        FROM candidats,users where 
        candidats.traitant_recu=users.login AND 
     (id_type='1' OR id_type='4' OR id_type='5') 
    AND (
        candidats.retenu ='".$_SESSION['dep']."'
       
        )
    
        order by candidats.nom ASC , candidats.prenom ASC");
}

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des cadidats autorisés à passés le concours de <?= utf8_encode($dat['design_depart']) ?></title>
    <link rel="shortcut icon" href="../assets/img/udc.png">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../node_modules/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/css.css">
    <link rel="stylesheet" href="../assets/css/datatables.css">
    <link rel="stylesheet" href="../assets/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">



</head>
<body>
        
    <section class="main-wrapper">
       <aside class="left-aside">
            <div class="fontLogo"> 
                <div class="img-rd">
                    <img src="../assets/img/udc.png" alt="profile image">
                </div>
                <h6 class="m-3 text-center"><strong class="titre"> Université des Comores</strong></h6>
                <hr>
            </div>
            <nav class="nav-aside">
            
              

<?php

    if(isset($_SESSION['login']) and $_SESSION['cat']=="1"){?>

<ul class="nav-items">
                    <li><a href="../userInterface.php"><i class="icon-grid"></i> &nbsp; <span class="nav-item-text">Tableau de bord</span></a></li>

                    <li>
                            <a data-toggle="collapse" href="#collapseMenu1" role="button" aria-expanded="false" aria-controls="collapseMenu1"><i class="icon-pencil"></i> &nbsp; <span class="nav-item-text">Préinscription </span></a>
                            <ul class="menu-dd collapse" id="collapseMenu1">
                            <li><a href="../preInsCompta.php?id_type=1"><i class="icon-note"></i> &nbsp; 1<sup>er</sup> année</a></li>
                            <li><a href="../preInsCompta.php?id_type=2"><i class="icon-note"></i> &nbsp; 2<sup>ème</sup> ou 3<sup>ème</sup> année</a></li>
                            <li><a href="../preInsCompta.php?id_type=5"><i class="icon-note"></i> &nbsp; Master</a></li>
                            <li><a href="../enregistFiche.php?id_type=3"><i class="icon-note"></i> &nbsp;Transfert</a></li>
                            <li><a href="../enregistReprise.php?id_type=4"><i class="icon-note"></i> &nbsp; Reprise</a></li>
                        </ul>

                    </li>
                    <li><a href="../verif_recu.php"><i class="icon-printer"></i> &nbsp; <span class="nav-item-text">Imprimer une fiche</a></li>
                    <li><a href="../fixation_fin.php"><i class="icon-clock"></i> &nbsp; <span class="nav-item-text">Fixer une date de fin</span></a></li>
                    <!-- <li><a href="#"><i class="icon-note"></i> &nbsp; <span class="nav-item-text">Inscription</span></a></li> -->


                    <li><a href="../creationCompte.php"><i class="icon-people"></i> &nbsp; <span class="nav-item-text">Ajout des Utilisateurs</span></a></li>
                    <li><a href="../listeUtilisa.php"><i class="icon-people"></i> &nbsp; <span class="nav-item-text">Liste des Utilisateurs</span></a></li>
                    <!-- <li><a href="#"><i class="icon-settings"></i> &nbsp; <span class="nav-item-text">Gestion Admin</span></a></li> -->
                    <!-- <li><a href="#"><i class="icon-folder-alt"></i> &nbsp; <span class="nav-item-text">Resultats</span></a></li>
                    <li><a href="dep_op_cl.php"><i class="icon-options"></i> &nbsp; <span class="nav-item-text">Ouvrir/fermer un departement</span></a></li>
                    <li> -->
                        <!-- <a data-toggle="collapse" href="#collapseMenu2" role="button" aria-expanded="false" aria-controls="collapseMenu1"><i class="icon-direction"></i> &nbsp; <span class="nav-item-text">Admission</span></a>
                        <ul class="menu-dd collapse" id="collapseMenu2">
                            <li><a href=""><i class="icon-doc"></i> &nbsp; Ecole / Institut</a></li>
                            <li><a href=""><i class="icon-doc"></i> &nbsp; Faculté</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-notebook"></i> &nbsp; <span class="nav-item-text">Scolarité</span></a></li>
                    <li><a href="#"><i class="icon-info"></i> &nbsp; <span class="nav-item-text">Renseignements</span></a></li>
                    <li> -->
                    
                    <li>
                            <a data-toggle="collapse" href="#collapseMenu4" role="button" aria-expanded="false" aria-controls="collapseMenu4"><i class="icon-menu"></i> &nbsp; <span class="nav-item-text">Afficher les listes </span></a>
                            <ul class="menu-dd collapse" id="collapseMenu4">
                            <li><a href="../concoursOuNon.php?id_type=1"><i class="icon-list"></i> &nbsp; 1<sup>er</sup> année</a></li>
                            <li><a href="../choix_dep_trans.php?id_type=2"><i class="icon-list"></i> &nbsp; 2<sup>ème</sup> ou 3<sup>ème</sup> année</a></li>
                            <li><a href="../choix_dep_trans.php?id_type=5"><i class="icon-list"></i> &nbsp; Master</a></li>
                            <li><a href="../concoursOuNon.php?id_type=3"><i class="icon-list"></i> &nbsp; Transfert</a></li>
                            <li><a href="../choix_dep_trans.php?id_type=4"><i class="icon-list"></i> &nbsp; Reprise</a></li>
                        </ul>

                    </li>
                    <li>
                    <a data-toggle="collapse" href="#collapseMenu2" role="button" aria-expanded="false" aria-controls="collapseMenu2"><i class="icon-calculator"></i> &nbsp; <span class="nav-item-text">Situation comptable</span></a>
                    <ul class="menu-dd collapse" id="collapseMenu2">
                        <li><a href="../situationJparA.php"><i class="icon-user"></i> &nbsp; Journalière par agent</a></li>
                        <li><a href="../situationP.php"><i class="icon-clock"></i> &nbsp; Durant une periode</a></li>

                    </ul>
                </li>
                <li>
                    <a data-toggle="collapse" href="#collapseMenu3" role="button" aria-expanded="false" aria-controls="collapseMenu3"><i class="icon-graph"></i> &nbsp; <span class="nav-item-text">Statistiques</span></a>
                    <ul class="menu-dd collapse" id="collapseMenu3">
                    <li><a href="../nbropargenre.php"><i class="icon-doc"></i> &nbsp; Nombre de préinscrits par genre</a></li>
                        <li><a href="../preins_par_type.php"><i class="icon-doc"></i> &nbsp;Nombre de préinscrits par type de préinscription</a></li>
                        <li><a href="../preins_ile_genre.php"><i class="icon-doc"></i> &nbsp; Nombre de préinscription par Ile et par genre</a></li>
                        <li><a href="../preinscriConcours.php"><i class="icon-doc"></i> &nbsp; Nombre de préinscrits dans les concours</a></li>
                        <li><a href="../nbrparchoix.php"><i class="icon-doc"></i> &nbsp; Nombre de préinscrits dans les autres départements par choix</a></li>
                    </ul>
                </li>
<?php }
?>

                 <li class="bord"><a href="../profil.php"><i class="icon-user"></i> &nbsp; <span class="nav-item-text">Changer mon mot de passe</span></a></li>
                        
                        <li><a href="../deconnexion.php"><i class="icon-logout"></i> &nbsp; <span class="nav-item-text">Déconnexion</span></a></li>
                     
                 </ul>       
            </nav>
        </aside>
        <main class="main-content">
        <h4 align="right"><strong><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']  ?> </strong></h4>
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']." ".$_SESSION['ile']; ?></strong></h5>
       
        <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-60px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-60px;color:#00b185;"> Fin de préinscription : <?php echo $d['date_fin'];?></h5>
                </div>
            <div class="text-center mb-5">
				</div>
            <h2 align="center">Liste de <?php echo $dat['design_depart']?> </h2>
                <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered tableexcel" id="tableexcel">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Reçu</th>
                                    <th scope="col">NIN</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Date de naissance</th>
                                    <th scope="col">Lieu de naissance</th>
                                    
                                    
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                while($dat=mysqli_fetch_array($sqlist)){
                                    
                                    
                                    # code...
                                    ?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$dat['num_recu']?></td>
                                            <td><?=$dat['nin']?></td>
                                            <td><?=$dat['nom']?></td>
                                            <td><?=$dat['prenom']?></td>
                                            <td><?=$dat['date_naiss']?></td>
                                            <td><?=$dat['lieu_naiss']?></td>
                                          
                                           
                                          
                                        </tr>
                                    <?php
                                     $i++;
                                   }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
     
            <div class="text-centre" style="margin-top:20px;margin-bottom:20px;" >
                <a class="btn btn-primary" href="../concoursOuNon.php" role=button> Un autre liste</a>
            </div>

    <script src="../assets/js/datatables.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/app.js"></script>

    <script type="text/javascript">
$('#tablexcel').DataTable({
    dom:'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5']
})
    </script>

   
                
</body>
</html>
<?php }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page! </h3>
                <h3 align="center" style="font-family:arial;margin-top:20%;"><a href="userInterface.php"> retour &agrave; la page d'acceuil</a>
   <?php }

?>