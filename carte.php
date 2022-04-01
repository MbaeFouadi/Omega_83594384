<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="4" or $_SESSION['cat']=="8")){
include('connexion.php');
include('calcul.php');
$message="";
$d=date('Y');
$dd=$d+1;
//$an_univ=$d."-".$dd;

//$b = $_SESSION['nin'];
// $br = mysqli_query($link,"SELECT * FROM choix where nin ='".$b."'");
// while($data = mysqli_fetch_array($br)){
//}
$r="SELECT  date_fin FROM date_fin order by id_date DESC";
$dat=mysqli_query($link,"SELECT * FROM annee ORDER BY id_annee DESC");
$date=mysqli_fetch_array($dat);


    $req = mysqli_query($link,$r);
    $d=mysqli_fetch_array($req);
    
    

    
$sq= mysqli_query($link,"SELECT * FROM carte ");






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste de <?php echo utf8_encode($datz['design_depart']);?> pour  <?php// echo utf8_encode($categorie ) ?> </title>
    <link rel="shortcut icon" href="./assets/img/udc.png">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./node_modules/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/css.css">
    <link rel="stylesheet" href="./assets/css/datatables.css">
    <!-- <link rel="stylesheet" href="./assets/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="./assets/css/jquery.dataTables.min.css">   -->
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
                   switch($_SESSION['cat']){
                    case 1:include('interfaces/superAdminRubrique.php'); break;
                    case 2: include('interfaces/administrationRubrique.php');break;
                    case 3:include('interfaces/agtScolariteRubrique.php'); break;
                    case 4: include('interfaces/scolariteRubrique.php'); break;
                    case 5:include('interfaces/desRubrique.php'); break;
                    case 6: include('interfaces/gestionnaireRubrique.php'); break;
                    case 7:include('interfaces/agentComptaRubrique.php'); break;
                    case 8:include('interfaces/adminRubrique.php'); break;
                    
                    }
                ?>
                 <li class="bord"><a href="profil.php"><i class="icon-user"></i> &nbsp; <span class="nav-item-text">Changer mon mot de passe</span></a></li>
                        
                        <li><a href="deconnexion.php"><i class="icon-logout"></i> &nbsp; <span class="nav-item-text">Déconnexion</span></a></li>
                     
                 </ul>       
            </nav>
        </aside>
        <main class="main-content">
        <h4 align="right"><strong><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']." " ?> </strong></h4>
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
       
        <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-60px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-60px;color:#00b185;"> Fin de préinscription : <?php echo $d['date_fin'];?></h5>
                </div>
            <div class="text-center mb-5">
				</div>
            <h2 align="center">Modification de Sexe</h2>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered tableexcel" id="tableexcel">
                            <thead class="thead-dark">
                                <tr>
                                    <!-- <th scope="col">N°</th> -->
                                    <th scope="col">Matricule</th>
                                    <!-- <th scope="col">NIN</th> -->
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Date de naissance</th>
                                    <th scope="col">Lieu de naissance</th>
                                    <th scope="col">Faculte</th>
                                    <th scope="col">Département</th>
                                    <th scope="col">Niveau</th>
                                    <th scope="col">Année</th>
                                    <th scope="col">Photo</th>


                                    
                                    
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                while($dat=mysqli_fetch_array($sq)){

                                    
                                    
                                    ?>
                                        <tr>
                                            <!-- <td><?= $i ?></td> -->
                                            <td><?= $dat['matricule'] ?></td>
                                            <!-- <td><?=  $dat['NIN'] ?></td> -->
                                            <td><?= utf8_encode(strtoupper($dat['nom'])) /*$dat['nom'] */  ?></td>
                                            <td><?=  utf8_encode(strtoupper( $dat['prenom']))?></td>
                                            <td><?=  utf8_encode($dat['date_nais'])?></td>
                                            <td><?=  utf8_encode(strtoupper($dat['lieu_nais']))?></td>
                                            <td><?= utf8_encode($dat['faculte']) ?></td>
                                            <!-- <td><?=  $dat['NIN'] ?></td> -->
                                            <td><?= utf8_encode($dat['departement']) /*$dat['nom'] */  ?></td>
                                            <td><?=  utf8_encode($dat['niveau'])?></td>
                                            <td><?=  utf8_encode($dat['annee'])?></td>
                                            <td><?=  utf8_encode(strtoupper($dat['Photo']))?></td>
                                           
                                          
                                           
                                          
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
                <a class="btn btn-primary" href="choix_dep_ins.php" role=button> Un autre liste</a>
            </div>

    <script src="./assets/js/datatables.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
    <script type="text/javascript">
$('#tableexcel').DataTable({
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