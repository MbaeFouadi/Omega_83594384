<?php 
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="3" or $_SESSION['cat']=="5" )){
include('connexion.php');
include('connexion.php');
$r="SELECT  date_fin FROM date_fin order by id_date DESC";

    $req = mysqli_query($link,$r);
    $dat=mysqli_fetch_array($req);
$d=date("Y");
$dt=$d+1;
$dd=$d-1;
$ddd=$d-2;
$dddd=$d-3;
$ddddd=$d-4;
$dddddd=$d-5;
//$nin=$_SESSION['nin'];
//unset($_SESSION['nin']);
$sql = "SELECT *
from candidats
where nin='".$_SESSION['nin']."'";
$resultat1 = mysqli_query($link,$sql);
$data = mysqli_fetch_array($resultat1);
$type=mysqli_query($link,"SELECT * FROM type_recu Where id_type='".$data['id_type']."'");
$rec=mysqli_fetch_array($type);

$dispo=mysqli_query($link,"SELECT * FROM disposition WHERE code_depart='IBO' and statut=0");
$dip=mysqli_fetch_array($dispo);

    //  $nom = addslashes($r1->nom);
 	// $prenom = addslashes($r1->prenom);
	// $naiss = $r1->date_naiss;
    // $lieu=$r1->lieu_naiss;
    
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
        <h5 align="right" style="color:black;"> <strong><?php echo  $_SESSION['prenom']." ".$_SESSION['nom']?></strong></h5>

        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle'];?></strong></h5>
        <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-50px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-50px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
                <div class="text-left" style="margin-top:0px">
                <a class="btn btn-primary" href="userInterface.php" role=button> Annuler</a>
                </div>
                <div id='sectionAimprimer'>
                    <div class="container">
                    
                        <div class="row">
                            <div class="col-md-3" >
                            </div>
                            <div style="margin-left:-5px"  class="col-md-9"><?php if($rec['id_type']==7){?><br><br><?php }?>

                                <h3 style="margin-left:40px" ><strong>UNION DES COMORES</strong></h3><?php if($rec['id_type']==7){?><br><?php }?>
                                <h6 style="margin-left:70px;margin-top:-10px" ><em>Unité-Solidarité-Dévéloppement</em> </h6>
                                <div style="margin-left:100px;margin-top:-20px">...........................................</div>
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
                                <strong><div style="margin-left:100px;margin-top:-10px">...............................................</div></strong>
                                <h4  style="margin-left:50px;margin-top:10px;" ><strong>UNIVERSITE DES COMORES</em></h4>
                                
                            </div>
                        </div>
        
                            
                        <div class="row" style="margin-top:10px">
                            <div class="col-md-4">
                                    
                            </div>
                            <div  class="col-md-8" >
                                <h5 style="margin-left:-100px;">DIRECTION DES ETUDES ET DE LA SCOLARITE</h5> 
                                <h4 style="margin-left:-100px"> <strong>FICHE DE <?=$rec['nom_type']?><br></strong></h4><h5 style="margin-left:30px">(Année <?php echo $d."-".$dt  ?>)</h5>
                            </div>
                        </div>
                        <h6 style="margin-top:-20px;"><strong>A:&nbsp;<u>ETAT CIVIL</u></strong></h6><br>
                     

                        <div class="row">
                            <div class="col-12">
                                <div class="form-row">
                                    <div class="form-group col-md-6" style="margin-top:-20px;">
                                        <h6>&nbsp; &nbsp;&nbsp;N° de reçu:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $data['num_recu'] ;?></b></h6>
                                    </div>
                                    <div class="form-group col-md-6" style="margin-top:-20px;">
                                        <h6>Nin:&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $data['nin']  ;?></b></h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6" style="margin-top:-10px;">
                                        <h6>&nbsp; &nbsp;&nbsp;Nom :&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $data['nom'] ;?></b></h6>
                                    </div>
                                    <div class="form-group col-md-6" style="margin-top:-10px;">
                                        <h6>Prenom :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>   <?php echo $data['prenom']  ;?></b></h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6" style="margin-top:-10px;">
                                        <h6>&nbsp; &nbsp;&nbsp;Date de naissance :  <b><?php echo $data['date_naiss'] ;?></b></h6>
                                    </div>
                                    <div class="form-group col-md-6" style="margin-top:-10px;">
                                        <h6>Lieu de naissance :&nbsp;<b><?php echo $data['lieu_naiss'] ;?></b></h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6" style="margin-top:-10px;">
                                        <h6>&nbsp; &nbsp;&nbsp;Nationalit&eacute; :    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> <?php echo $data['nationalite'] ;?></b></h6>
                                    </div>
                                    <div class="form-group col-md-6" style="margin-top:-10px;">
                                        <h6>Sexe: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $data['sexe'] ;?></b></h6>
                                    </div>
                                    
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6" style="margin-top:-10px;">
                                        <h6>&nbsp; &nbsp;&nbsp;T&eacute;l&eacute;phone mobile : &nbsp;<b><?php echo $data['tel_mobile'] ;?></b></h6>
                                    </div>
                                    <div class="form-group col-md-6" style="margin-top:-10px;">
                                        <h6>T&eacute;l&eacute;phone fixe:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php if($data['tel_fix'] ==0){
                                            echo "Non renseigné";
                                        }else{
                                            echo $data['tel_fix'] ;
                                        }?></b></h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-6" style="margin-top:-10px;">
                                        <h6>&nbsp; &nbsp;&nbsp;Adresse email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php if($data['mail']==""){
                                            echo "Non renseigné";
                                        }else{
                                            echo $data['mail'] ;
                                        }?></b></h6>
                                    </div>
                                    <div class="form-group col-md-6" style="margin-top:-10px;">
                                        <h6>Adresse actuelle:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $data['adresse_cand'] ;?></b></h6>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6" style="margin-top:-10px;">
                                        <h6>&nbsp; &nbsp;&nbsp;Emploi exercé:  <b>............</b></h6>
                                    </div>
                                    <div class="form-group col-md-6" style="margin-top:-10px;">
                                        <h6>Institution/service employeur :&nbsp;<b>.......................</b></h6>
                                    </div>
                                </div>
                            </div>
            
                            </div>
                            
                        </div>

                        <br><h6 style="margin-top:-40px;margin-bottom:-10px;"><strong>B:&nbsp;<u>ETUDES UNIVERSITAIRES</u></strong></h6><br>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table  table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Année</th>
                                                <th scope="col">Diplome Obtenu</th>
                                                <th scope="col">Option</th>
                                                <th scope="col">Etablissement et Lieu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><?php echo $dd."-".$d?></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><?php echo $ddd."-".$dd?></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><?php echo $dddd."-".$ddd?></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <h6><strong>C:&nbsp;<u>CHOIX DES FILIERES</u></strong></h6>
                        <h6 style="margin-left:10px;"><strong>&nbsp;<u>MASTER </u></strong></h6><br>
                       

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-sx">
                        <h5 style="margin-top:-30px">Faculté de Droit et Sciences Economiques (FDSE)</h5>
                        <div class="line">
                            <div class="lside">                                       
                            

                                <label><input type="checkbox"> Banque et Finance</label>
                            </div>
                            <!--<div class="rside">
                                <label><input type="checkbox"> M1</label>
                                <label style="margin-left:50px"><input type="checkbox"> M2</label>
                                
                            </div>-->
                            <div class="rside">
                                <label><input type="checkbox"></label>
                                <!-- <label><input type="checkbox"> M2</label> -->
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">                                       
                            

                                <label><input type="checkbox"> Droit des Affaires et  Fiscalit&eacute;s</label>
                            </div>
                            <!--<div class="rside">
                                <label><input type="checkbox"> M1</label>
                                <label style="margin-left:50px"><input type="checkbox"> M2</label>
                                
                            </div>-->
                            <div class="rside">
                                <label><input type="checkbox"></label>
                                <!-- <label><input type="checkbox"> M2</label> -->
                            </div>
                        </div>
                        
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Administration Publique et Gestion des Collectivit&eacute;s</label>
                            </div>
                            <!--<div class="rside">
                                <label style="margin-left:50px"><input type="checkbox"> M2</label>
                                
                            </div>-->
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"> D&eacute;centralisation et D&eacute;concentration juridique</label>
                            </div>
                            <!--<div class="rside">
                                
                                <label style="margin-left:50px"><input type="checkbox"> M2</label>
                            </div>-->
                            <div class="rside">
                                <label><input type="checkbox"></label>
                                <!-- <label><input type="checkbox"> M2</label> -->
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"> Economie des institutions</label>
                            </div>
                            <!--<div class="rside">
                                
                                <label style="margin-left:50px"><input type="checkbox"> M2</label>
                            </div>-->
                            <div class="rside">
                                <label><input type="checkbox"></label>
                                <!-- <label><input type="checkbox"> M2</label> -->
                            </div>
                        </div>
                    </div>
                    <!--<div class="form-sx">
                        <h5 style="margin-top:-25px">Facult&eacute; des Lettres et Sciences Humaines (FLSH)</h5>
                        
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Fran&ccedil;ais Langue Etrang&egrave;re</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> M1</label>
                            </div>
                        </div>
                    </div>-->
                    <div class="form-sx">
                        <h5 style="margin-top:-25px">Facult&eacute; Imam Chafiou (FIC)</h5>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Droit Islamique</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"></label>
                                <!-- <label><input type="checkbox"> M2</label> -->
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Enseignement de la Langue Arabe</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"></label>
                                <!-- <label><input type="checkbox"> M2</label> -->
                            </div>
                        </div>
                    </div>
                    <?php if($rec['id_type']==6){?>
                    <div class="form-sx">
                        <h5 style="margin-top:-25px">Faculté de Lettres et Sciences Humaines (FLSH)</h5>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Histoire</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"></label>
                                <!-- <label><input type="checkbox"> M2</label> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-sx">
                        <h5 style="margin-top:-25px">Facult&eacute; des  Sciences et Techniques (FST)</h5>
                        <div class="line">
                            
                           
                        </div>
                       <!--  <div class="line">
                            <div class="lside">
                                <label><input type="checkbox">  Sciences de l'Energie, de l'Environnement et des Espaces B&acirc;ties</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"></label>
                                <label><input type="checkbox"> M2</label>
                            </div>
                        </div> -->
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Gestion des Ressources Halieutiques</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"></label>
                                <!--<label><input type="checkbox"> M2</label>-->
                            </div>
                        </div>
                       

                    </div>
                                   </div>
                          <?php }?>
            </div>
        </div>
    </section>
                        <h6 style="margin-top:-30px;"><strong>D:&nbsp;<u>PI&Eacute;CES &Agrave; FOURNIR</u></strong></h6><?php if($rec['id_type']==7){?><br><?php }?>
                        <div style="margin-left:50px;margin-top:-10px;">
                             &rArr; Copie certifi&eacute;e du BAC pour les primo entrants<br>
                             &rArr; Copie certifi&eacute;e du diplôme universitaire, de l&prime;attestation de r&eacute;ussite &agrave; la Licence ou au Master 1 <br>
                             &rArr;	Copies certifi&eacute;es conformes des Relev&eacute;s des notes de 3&eacute;me  ann&eacute;e de Licence ou du Master 1 <br>
                             &rArr;	Extrait de naissance pour les primo entrants<br>
                             &rArr;	5000 kmf (droit de pr&eacute;inscription) pour les primo entrants<br>
                             &rArr;	2 Photos d&prime;identit&eacute; récentes<br>
                             &rArr;	Attestation de s&eacute;jour en cours de validit&eacute; et couvrant l&prime;ann&eacute;e pour les candidats &eacute;trangers<br>
                        </div><?php if($rec['id_type']==7){?><br><br><?php }?>


                        <div class="border-top" style="margin-bottom:10px;margin-top:10px;"></div><?php if($rec['id_type']==7){?><br><br><?php }?>
                        <h6 style="margin-left:180px;"><strong>Observation de la Direction des Etudes et de la Scolarit&eacute;</strong></h6><br>
                    </div>
                </div>
                
                <div class="text-right" style="margin-bottom:10px;margin-top:10px;">
                    <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer la fiche de Master</button> 
                </div>
            </main>
        </section>
            <script src="./node_modules/jquery/dist/jquery.min.js"></script>
            <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="./assets/js/app.js"></script>
    </body>
    <script>
        function imprimer(divName){
            var restorepage=document.body.innerHTML;
            var printContent=document.getElementById(divName).innerHTML;
            
            document.body.innerHTML=printContent;
            window.print();
            document.body.innerHTML=restorepage;
        }
    </script>
</html>
<?php }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page! </h3>
    <?php }

?>