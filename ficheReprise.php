<?php 
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="3" or $_SESSION['cat']=="5" )){
include('connexion.php');
$r="SELECT  date_fin FROM date_fin order by id_date DESC";

    $req = mysqli_query($link,$r);
    $dat=mysqli_fetch_array($req);
$d=date(Y);
$dd=$d+1;

$req=mysqli_query($link,"SELECT * FROM candidats,etudiant WHERE candidats.nin=etudiant.NIN and candidats.nin='".$_SESSION['nin']."'");
$data=mysqli_fetch_array($req);
$_SESSION['mat_etud']=$data['mat_etud'];
$num=$data['num_recu'];
$mat=$_SESSION['mat_etud'];

$sql = "SELECT etudiant.mat_etud,etudiant.NIN,nom,prenom,date_naiss,lieu_naiss,Annee,design_depart,design_facult,intit_niv,annee_bac,serie_bac
from etudiant,inscription,departement,niveau,faculte
where etudiant.mat_etud = inscription.mat_etud and departement.code_depart = inscription.code_depart and faculte.code_facult=departement.code_facult 
and niveau.code_niv = inscription.code_niv and etudiant.mat_etud = '".$mat."' order by inscription.annee DESC";
$resultat1 = mysqli_query($link,$sql);
    $r1 = mysqli_fetch_object($resultat1);
     $nom = utf8_encode($r1->nom);
 	$prenom = utf8_encode($r1->prenom);
	$naiss = $r1->date_naiss;
    $lieu=utf8_encode($r1->lieu_naiss);
    
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
                    case 1 :include('interfaces/superAdminRubrique.php'); break;
                    case 2 : include('interfaces/administrationRubrique.php');break;
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
		<h4 align="right"><strong><?php  echo ucwords($_SESSION['prenom']." ".$_SESSION['nom'])?> </strong></h4>
		<h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
		
		<h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-50px;"> <?php echo (date('d-m-Y'));?></h5>
		<h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-50px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
				</div>
			<div class="text-center mb-5">
				</div> 
                 <div id='sectionAimprimer'>
                <div class="container">
                
                        <div class="row">
                            <div class="col-md-3" >
                            </div>
                            <div style="margin-left:-5px"  class="col-md-9">
                                <h3 style="margin-left:40px" ><strong>UNION DES COMORES</strong></h3>
                                <h6 style="margin-left:70px" ><em>Unité-Solidarité-Dévéloppement</em> </h6>
                               <div style="margin-left:100px">...........................................</div>
                               <h5 style="margin-left:10px" >MINISTRE DE L'EDUCATION NATIONALE</h5>
                                <h5 style="margin-left:-80px">DE L'ENSEIGNEMENT DE LA RECHERCHE SCIENTIFIQUE, DE LA FORMATION</h5>
                                <h5 style="margin-left:50px">ET DE L'INSERTION PROFESSIONNELLE</h5>
                               </div>
                        </div>
                              
                              
                        <div class="row">
                            <div class="col-md-3" >
                                <img src="./assets/img/udc.png" alt="profile image" class="w-50" style="margin-left:125px">
                            </div>
                            <div style="margin-left:-5px"  class="col-md-9">
                            <strong><div style="margin-left:100px">...............................................</div></strong>
        
                               <h4  style="margin-left:50px;margin-top:10px;" ><strong>UNIVERSITE DES COMORES</em></h4>
                                
                               </div></div>
        
        
                            
                        <div class="row" style="margin-top:20px">
                            <div class="col-md-4">
                                    
                            </div>
                            <div  class="col-md-8" >
                                <h5 style="margin-left:-100px">DIRECTION DES ETUDES ET DE LA SCOLARITE</h5> 
                                <h4 style="margin-left:-50px"> <strong>FICHE DE REPRISE D'ETUDES<br></strong></h4><h5 style="margin-left:30px">(Année <?php echo $d."-".$dd  ?>)</h5>
                                
                                
                                
                            </div>
                                    
        
                        </div>
                

                    <div style="margin-top:50px">
                    <h5 style="margin-top:-10px">N° de re&ccedil;u:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo "$num";?></b></h5><br>
                    <h5 style="margin-top:-10px">Nom et pr&eacute;nom:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo strtoupper ("$nom"."  "."$prenom");?></b></h5><br>
                    <h5 style="margin-top:-10px">Date et lieu de naissance:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo utf8_encode("$r1->date_naiss"." "."  A  "." "."$lieu"); ?> </b></h5><br>
                    <h5 style="margin-top:-10px">Matricule:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo strtoupper(" "."$r1->mat_etud");?></b> </h5><br>
                    <h5 style="margin-top:-10px">Année et série du Bac:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> <?php echo "   "."$r1->annee_bac";?> <?php echo "  - Série "."  "." $r1->serie_bac";?></b></h5><br>
                    <h5 style="margin-top:-10px">Niveau, d&eacute;partement et composante d'origine:&nbsp;&nbsp;&nbsp;<b><?php echo utf8_encode($r1->intit_niv)." en  ".utf8_encode($r1->design_depart)."  -  ".utf8_encode($r1->design_facult) ?></b> </h5><br>
                    <h5 style="margin-top:-10px">Niveau, d&eacute;partement et composante demandés : ..........................................................................</h5><br>
                    <h5 style="margin-top:-10px">Raison de l'interruption d'&eacute;tudes: </h5>
                    .................................................................................................................................................................................................................<br>
                    .................................................................................................................................................................................................................<br>
                    <h5 >Activité pendant l'interruption: </h5>
                    .................................................................................................................................................................................................................<br>
                    .................................................................................................................................................................................................................<br>
                    <h5 >Raison de la reprise d'etudes: </h5>
                        .................................................................................................................................................................................................................<br>
                        .................................................................................................................................................................................................................<br>
                        .................................................................................................................................................................................................................<br>

                        <div style="margin-left:550px"><br>
                        <h5>...........,le............ </h5><br>
                                <h5 style="margin-bottom:100px">Signature de l'&eacute;tudiant:</h5>
                        </div>
                        <div class="border-top"></div>
                       
                       
                        <div class="row" style="margin-top:0px;margin-bottom:180px">
                                <div class="col-md-6">
                                        Avis du chef de département demandé&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                <div  style="text-indent:70px" >
                                Visa du Directeur des Etudes et de la Scolarité
                                    
                                </div>
                                        
            
                            </div>
                            
                        
                        <h6  style="margin-top:-100px"><b><strong>Piéces à fournir</strong>:<br>-photocopie du relevé des notes annuelles</b></h6>
                        <div class="border-top"></div>
                        <div align="center" style="margin-top:0px;">
                            <h6>
                                    Clamer que le chemin est long ne le raccourcit pas le raccourcir c'est faire un pas en avant.<br>
                                    Udombowandziaya ke yishashiha yowushashiha hawurenga wusoni<br>
                                    <strong>Université des Comores, Mapvigouni BP 2585 Moroni - Tél : +269 763 24 01 - email:contact@univ-comores.km</strong>
                            </h6>
                        </div>
                        
                     </div>
        </div>
                    
                
    </div>
        </div>
        <br>
    <div class="text-right">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer la fiche de Reprise</button> 
        </div>
</main>
</section>

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