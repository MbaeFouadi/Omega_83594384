<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="4")){
include('connexion.php');
include('calcul.php');
$message="";
$i=1;
//$b = $_SESSION['nin'];
// $br = mysqli_query($link,"SELECT * FROM choix where nin ='".$b."'");
// while($data = mysqli_fetch_array($br)){
//}
$r="SELECT  date_fin FROM date_fin order by id_date DESC";

    $req = mysqli_query($link,$r);
    $d=mysqli_fetch_array($req);

    if($_SESSION['type']==1){
        $sq= mysqli_query($link,"SELECT * FROM candidats where (choix1='".$_SESSION['dep']."' or choix2 ='".$_SESSION['dep']."' or choix3 ='".$_SESSION['dep']."') AND (id_type=1 OR id_type=3 OR id_type=4) AND retenu='".$_SESSION['dep']."'  order by nom ASC,prenom ASC");
        //$dat = mysqli_fetch_array($sq);
        $categorie="Licence 1";
    }
    if($_SESSION['type']==2){
        $sq= mysqli_query($link,"SELECT * FROM candidats where (choix1='".$_SESSION['dep']."' or choix2 ='".$_SESSION['dep']."' or choix3 ='".$_SESSION['dep']."') AND id_type=2 AND retenu='".$_SESSION['dep']."' order by nom ASC,prenom ASC");
        //$dat = mysqli_fetch_array($sq);
        $categorie="Licence 2&3";
        
    }
    if($_SESSION['type']==3){
        $sq= mysqli_query($link,"SELECT * FROM candidats where (choix1='".$_SESSION['dep']."' or choix2 ='".$_SESSION['dep']."' or choix3 ='".$_SESSION['dep']."') AND id_type=3 AND retenu='".$_SESSION['dep']."'  order by nom ASC,prenom ASC");
       // $dat = mysqli_fetch_array($sq);
        $categorie="Transfert";
        
    }
    if($_SESSION['type']==4){
        $sq= mysqli_query($link,"SELECT * FROM candidats where (choix1='".$_SESSION['dep']."' or choix2 ='".$_SESSION['dep']."' or choix3 ='".$_SESSION['dep']."') AND id_type=4 AND retenu='".$_SESSION['dep']."'  order by nom ASC,prenom ASC");
       // $dat = mysqli_fetch_array($sq);
        $categorie="Reprise d'Etudes";
        
    }
    if($_SESSION['type']==5){
        $sq= mysqli_query($link,"SELECT * FROM candidats where (choix1='".$_SESSION['dep']."' or choix2 ='".$_SESSION['dep']."' or choix3 ='".$_SESSION['dep']."') AND id_type=5 AND retenu='".$_SESSION['dep']."'  order by nom ASC,prenom ASC");
        //$dat = mysqli_fetch_array($sq);
        $categorie="Master";
        
    }
$sqg= mysqli_query($link,"SELECT * FROM departement where code_depart='".$_SESSION['dep']."'");
$datz = mysqli_fetch_array($sqg);
     





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des candidats retenus en <?php echo utf8_encode($datz['design_depart']) ?> pour  <?php echo $categorie ?>  </title>
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
                    
                    }
                ?>
                 <li class="bord"><a href="profil.php"><i class="icon-user"></i> &nbsp; <span class="nav-item-text">Changer mon mot de passe</span></a></li>
                        
                        <li><a href="deconnexion.php"><i class="icon-logout"></i> &nbsp; <span class="nav-item-text">Déconnexion</span></a></li>
                     
                 </ul>       
            </nav>
        </aside>
        <main class="main-content">
        <h4 align="right"><strong><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?> </strong></h4>
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
       
        <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-60px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-60px;color:#00b185;"> Fin de préinscription : <?php echo $d['date_fin'];?></h5>
                </div>
            <div class="text-center mb-5">
				</div>
            <h2 align="center">Liste des candidats retenus en <strong><?php echo utf8_encode($datz['design_depart']) ?></strong> pour <strong> <?php echo $categorie ?> </strong></h2>
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
                                while(   $dat = mysqli_fetch_array($sq)){

                                    
                                    # code...
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $dat['num_recu'] ?></td>
                                            <td><?=  $dat['nin'] ?></td>
                                            <td><?=   $dat['nom'] ?></td>
                                            <td><?=   $dat['prenom'] ?></td>
                                            <td><?=  $dat['date_naiss'] ?></td>
                                            <td><?=  $dat['lieu_naiss'] ?></td>
                                          
                                           
                                          
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
                <a class="btn btn-primary" href="departement_liste.php" role=button> Une autre liste</a>
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