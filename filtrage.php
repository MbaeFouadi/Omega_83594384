<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7")){
include('connexion.php');
include('calcul.php');
$message="";
//$b = $_SESSION['nin'];
// $br = mysqli_query($link,"SELECT * FROM choix where nin ='".$b."'");
// while($data = mysqli_fetch_array($br)){
//}

$sq= mysqli_query($link,"SELECT * FROM departement where code_depart='".$_SESSION['dep']."'");
$dat = mysqli_fetch_array($sq);
    
    

$req = mysqli_query($link,"SELECT code_depart FROM departement where statut =1 ");
$data = mysqli_fetch_array($req);

switch ($_SESSION['dep'] ){
    case "AES" : {
    $w = calc($link,'AES');

        break;
    }
    case "Ac" : {
    $w = calc($link,'Ac');

        break;
    }
    
    case "Com": {
    $w= calc($link,'Com');
        break;
    }
    
    case "G1" : {
    $w = calc($link,'G1');
        break;
    }
    
    case "G2p": {
        $w = calc($link,'G2p');
        break;
    }
    
    case "STQ" : {
        $w = calc($link,'STQ');
        break;
    }
    
    case "IE": {
        $w = calc($link,$b,'IE');
        break;
    }
    
    case "S01" : {
        $w = calc($link,$b,'S01');
        break;
    }
    
    case "S02": {
        $w = calc($link,'S02');
        break;
    }
    
    case "DP" : {
        $w = calc($link,'DP');
        break;
    }
    
    case "Drp": {
        $w = calc($link,'Drp');
        break;
    }
    
    case "ECT" : {
        $w = calc($link,'ECT');
        break;
    }
    
    case "HE": {
        $w = calc($link,'HE');
        break;
    }
    
    case "LAM" : {
        $w = calc($link,'LAM');
        break;
    }
    case "GI" : {
        $w = calc($link,'GI');
        break;
    }
    case "PHQ" : {
        $w = calc($link,'PHQ');
    
            break;
    }
    case "AESp" : {
        $w = calc($link,'AESp');
    
            break;
    }case "Geo" : {
        $w = calc($link,'Geo');
    
            break;
    }case "H.G" : {
        $w = calc($link,'H.G');
    
            break;
    }case "LAR" : {
        $w = calc($link,'LAR');
    
            break;
    }case "LEA1" : {
        $w = calc($link,'LEA1');
    
            break;
    }case "Leap" : {
        $w = calc($link,'Leap');
    
            break;
    }case "LFM" : {
        $w = calc($link,'LFM');
    
            break;
    }case "LMFp" : {
        $w = calc($link,'LMFp');
    
            break;
    }case "MPC" : {
        $w = calc($link,'MPC');
    
            break;
    }case "SEC" : {
        $w = calc($link,'SEC');
    
            break;
    }case "SECp" : {
        $w = calc($link,'SECp');
    
            break;
    }case "SI" : {
        $w = calc($link,'SI');
    
            break;
    }case "TC" : {
        $w = calc($link,'TC');
    
            break;
    }case "Svtp" : {
        $w = calc($link,'Svtp');
    
            break;
    }case "ara" : {
        $w = calc($link,'ara');
    
            break;
    }case "RE" : {
        $w = calc($link,'RE');
    
            break;
    }case "REm" : {
        $w = calc($link,'REm');
    
            break;
    }case "REp" : {
        $w = calc($link,'REp');
    
            break;
    }case "GEOp" : {
        $w = calc($link,'GEOp');
    
            break;
    }case "AESm" : {
        $w = calc($link,'AESm');
    
            break;
    }case "FIP1" : {
        $w = calc($link,'FIP1');
    
            break;
    }case "FIP2" : {
        $w = calc($link,'FIP2');
    
            break;
    }case "FCP1" : {
        $w = calc($link,'FCP1');
    
            break;
    }case "FCP2" : {
        $w = calc($link,'FCP2');
    
            break;
    }
    case "FCP2P" : {
        $w = calc($link,'FCP2P');
    
            break;
    }
    case "FIP1P" : {
        $w = calc($link,'FIP1P');
    
            break;
    }
    case "FCP1M" : {
        $w = calc($link,'FCP1M');
    
            break;
    }
    case "FCP2M" : {
        $w = calc($link,'FCP2M');
    
            break;
    }
    case "FCP2M" : {
        $w = calc($link,'FCP2M');
    
            break;
    }
    case "FIP2P" : {
        $w = calc($link,'FIP2P');
    
            break;
    }case "FIP1M" : {
        $w = calc($link,'FIP1M');
    
            break;
    }case "FIP2M" : {
        $w = calc($link,'FIP2M');
    
            break;
    }case "CSH" : {
        $w = calc($link,'CSH');
    
            break;
    }case "SF" : {
        $w = calc($link,'SF');
    
            break;
    }case "ECT" : {
        $w = calc($link,'ECT');
    
            break;
    }case "ECTp" : {
        $w = calc($link,'ECTp');
    
            break;
    }case "GIp" : {
        $w = calc($link,'GIp');
    
            break;
    }case "REp" : {
        $w = calc($link,'REp');
    
            break;
    }case "RE" : {
        $w = calc($link,'RE');
    
            break;
    }case "GIp" : {
        $w = calc($link,'GIp');
    
            break;
    }case "G1m" : {
        $w = calc($link,'G1m');
    
            break;
    }case "REm" : {
        $w = calc($link,'REm');
    
            break;
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
        </aside>-->
        <main class="main-content">
        <h4 align="right"><strong><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?> </strong></h4>
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
       
                <p align="center"> <?php echo (date('d-m-Y'));?></p>
                </div>
            <div class="text-center mb-5">
				</div>
            <h2>Liste de <?php echo $dat['design_depart'] ?> </h2>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered tableexcel">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">N° du reçu</th>
                                    <th scope="col">NIN</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Date de naissance</th>
                                    <th scope="col">Lieu de naissance</th>
                                    <th scope="col">Matiere</th>
                                    <th scope="col">Moyenne</th>
                                    <th scope="col">Options</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($w as $key => $value) {
                                    # code...
                                    ?>
                                        <tr>
                                            <td><?= $value['candidat']['num_recu']; ?></td>
                                            <td><?= $value['candidat']['nin']; ?></td>
                                            <td><?= $value['candidat']['nom']; ?></td>
                                            <td><?= $value['candidat']['prenom']; ?></td>
                                            <td><?= $value['candidat']['date_naiss']; ?></td>
                                            <td><?= $value['candidat']['lieu_naiss']; ?></td>
                                            <td>
                                           
                                                <?php
                                                    # code...
                                                    foreach ($value['note'] as $l => $p) {
                                                        # code...
                                                        if(is_array($p)){
                                                            echo '<p> '.$p['matiere'].' |</p>';
                                                        }
                                                    }
                                                    // print_r($value);
                                                ?>
                                            </td>
                                            <td> 
                                                <?php
                                                    # code...
                                                    foreach ($value['note'] as $l => $p) {
                                                        # code...
                                                        if(is_array($p)){
                                                            echo '<p> '.$p['moyenne'] .' |</p>';
                                                        }
                                                    }
                                                    
                                                ?>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-info btn-sm">Retenir</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    <script src="./assets/js/datatables.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
   
                
</body>
</html>
<?php }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page! </h3>
                <h3 align="center" style="font-family:arial;margin-top:20%;"><a href="userInterface.php"> retour &agrave; la page d'acceuil</a>
   <?php }

?>