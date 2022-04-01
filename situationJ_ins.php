<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="3" or $_SESSION['cat']=="6" or $_SESSION['cat']=="5"  )){
include('connexion.php');

$nbr=0;
$dateJJ=date('d/m/Y');
$h=date('H')-1;
$m=date('i');
// for ($i=1; $i <6 ; $i++) { 
//     # code...
    
//     $traitant.$i=$_SESSION['login'];
//     $r.$i = "SELECT * FROM candidats WHERE  traitant_recu='$traitant' and datePrescript='$dateJ' and  id_type='$i'";
//     $req.$i = mysqli_query($link,$r.'".$i."');
//     $nbr.$i  = mysqli_num_rows($req.$i); 
//     $caisse.'".$i."' = $nbr.'".$i."' * 5000;
//    // $caisses=
// }
$dateJ=date('Y-m-d');
$traitant=$_SESSION['login'];
$r1 = "SELECT * FROM post_inscription WHERE  traitant_fiche='$traitant' and date_delivrance_fiche='$dateJJ'";
$req1 = mysqli_query($link,$r1);
$nbr1 = mysqli_num_rows($req1); 
$caisse1 = $nbr1 * 5000;


$r2 = "SELECT * FROM post_inscription WHERE  traitant_autorisation='$traitant' and date_delivrance_auto='$dateJJ' and  statut=2";
$req2 = mysqli_query($link,$r2);
$nbr2 = mysqli_num_rows($req2); 
$caisse2 = $nbr2 * 5000;


$caisses=$caisse1+$caisse2;
  // echo $r; 
   //echo "\t"; var_dump($nbr);





// $password=md5($pass);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaires - Université des Comores</title>
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
                    case 1 :include('interfaces/superAdminRubrique.php'); break;
                    case 2 : include('interfaces/administrationRubrique.php');break;
                    case 3:include('interfaces/agtScolariteRubrique.php'); break;
                    case 4: include('interfaces/scolariteRubrique.php'); break;
                    case 5:include('interfaces/desRubrique.php'); break;
                    case 6: include('interfaces/gestionnaireRubrique.php'); break;
                    case 7:include('interfaces/agentComptaRubrique.php'); break;
                    
                    }
                ?>
                                <li class="bord"><a href="#"><i class="icon-user"></i> &nbsp; <span class="nav-item-text">Changer mon mot de passe</span></a></li>
                                <li>
                                <li><a href="deconnexion.php"><i class="icon-logout"></i> &nbsp; <span class="nav-item-text">Déconnexion</span></a></li>
                                
                         </ul>       
                    </nav>
                </aside>
                <main class="main-content">
                <h4 align="right"><strong><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?> </strong></h4>
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle'] ?></strong></h5>
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-60px;"> <?php echo (date('d-m-Y'));?></h5>
<!--         <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-60px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
 -->                
            <div class="text-center mb-5">
				</div>
                <h2 align="center" class="soft-title-2" style="color:#00b185;">Situation Journali&egrave;re</h2>
                <hr />
                <!-- <h3 class="soft-title-4" style="color:green;margin-top:20%;font-family:algerian;">Aujourd'hui, Vous avez imprimé <?php echo $nbr ?> reçu(s),<br> donc vous avez encaissé /<!--?php echo " ".$caisse."KMF"; ?> </h3> -->
            </div>
            
<div class="text-right">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer </button> 
        </div>
        <div id='sectionAimprimer'>
        <h6 style="margin-left:10px;margin-top:20px;"  align=center><STRONG>Situation Journalière de <?php echo $_SESSION['nom']." ".$_SESSION['prenom']?></STRONG>&nbsp;</h6> 

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">TYPE</th>
                                    <th >Nombre (s)</th>
                                    <th scope="col">SOMME</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Fiche d'inscription</th>
                                    <td><?php echo $nbr1 ?></td>
                                    <td><?php echo $caisse1 ?> KMF</td>
                                
                                </tr>
                                <tr>
                                    <th> Autorisation</th>
                                    <td><?php echo $nbr2 ?></td>
                                    <td><?php echo $caisse2 ?> KMF</td>
                                
                                </tr>
                                
                                <tr>
                                    <th colspan="2" scope="col">TOTAL JOURNALI&Egrave;R</th>
                                
                                    <td scope="col"><?php echo $caisses ?> KMF</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         
            <div class="row">
            
                <div class="col-md-6">
                    <h6 style="margin-left:60px;margin-bottom:20px;">Le <STRONG>&nbsp;<?php echo date('d/m/Y');?></STRONG></h6></b></h5> 
                </div>
               
		    
                <div class="col-md-6">
                    <h6 style="margin-right:0px;margin-top:20px;"><STRONG>Signature: </h6> 
                </div>
		    </div>
        
        </div>
    
            
        </main>

    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
    <script>
            function imprimer(divName){
                var restorepage=document.body.innerHTML;
                var printContent=document.getElementById(divName).innerHTML;
                
                document.body.innerHTML=printContent;
                window.print();
                document.body.innerHTML=restorepage;
            }
        </script>
   
</body>
</html>
<?php
}else{ ?>
    <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
<?php }
?>