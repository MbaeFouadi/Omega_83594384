<?php 
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="3" or $_SESSION['cat']=="5" )){
include('connexion.php');
//$link->set_charset("utf8");
$d=date("Y");
$dt=$d+1;
$dd=$d-1;
$ddd=$d-2;
$dddd=$d-3;
$ddddd=$d-4;
$dddddd=$d-5;
$r=mysqli_query($link,"SELECT  date_fin FROM date_fin order by id_date DESC");
$dat = mysqli_fetch_array($r); 
//$nin=$_SESSION['nin'];
//unset($_SESSION['nin']);
$sql = "SELECT *
from candidats
where nin='".$_SESSION['nin']."'";
$resultat1 = mysqli_query($link,$sql);
    $data = mysqli_fetch_array($resultat1);
    $_SESSION['num_recu']=$data['num_recu'];
    //  $nom = addslashes($r1->nom);
 	// $prenom = addslashes($r1->prenom);
	// $naiss = $r1->date_naiss;
    // $lieu=$r1->lieu_naiss;
    $sql1="SELECT * FROM type_recu where id_type='".$data['id_type']."'";
    $resultat2 = mysqli_query($link,$sql1);
    $data1 = mysqli_fetch_array($resultat2);
   
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
    <!-- <link rel="stylesheet" href="assets/css/fiche.css"> -->

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
        <h4 align="right"><strong><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?> </strong></h4>
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-60px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-60px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
                <div class="text-left" style="margin-top:0px">
                    <a class="btn btn-primary" href="userInterface.php" role=button> Annuler</a>
                </div>
                <div id='sectionAimprimer'>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3" ></div>
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
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px">
                            <div class="col-md-4"></div>
                            <div  class="col-md-8" >
                                <h5 style="margin-left:-100px">DIRECTION DES ETUDES ET DE LA SCOLARITE</h5> 
                                <h4  style="margin-left:-100px"> <strong>FICHE DE PRÉINSCRIPTION EN LICENCE<br></strong></h4><h5 style="margin-left:30px">(Année <?php echo $d."-".$dt  ?>)</h5>
                                <h4 style="margin-left:300px"> <strong>N° de re&ccedil;u <?php echo $data['num_recu'] ?><br></strong></h4>
                            </div>
                        </div>
                        <h6 style="margin-bottom:-20px;"><strong>A:&nbsp;<u>ETAT CIVIL</u></strong></h6><br>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-row"style="margin-bottom:-10px;">
                                    <div class="form-group col-md-6">
                                        <h6>&nbsp; &nbsp;&nbsp;Nom :&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo utf8_encode($data['nom']) ;?></b></h6>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6>Pr&eacute;nom :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>   <?php echo utf8_encode($data['prenom'])  ;?></b></h6>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top:-10px;">
                                    <div class="form-group col-md-6">
                                        <h6>&nbsp; &nbsp;&nbsp;Date de naissance :  <b><?php echo $data['date_naiss'] ;?></b></h6>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6>Lieu de naissance :&nbsp;&nbsp;<b><?php echo $data['lieu_naiss'] ;?></b></h6>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top:-10px;">
                                    <div class="form-group col-md-6">
                                        <h6>&nbsp; &nbsp;&nbsp;Sexe:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $data['sexe'] ;?></b></h6>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6>Nin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $data['nin']  ;?></b></h6>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top:-10px;">
                                    <div class="form-group col-md-6">
                                        <h6>&nbsp; &nbsp;&nbsp;Ile/Pays:&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo utf8_encode($data['pays']) ;?></b></h6>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6>Nationalit&eacute; :   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> <?php echo $data['nationalite'];?></b></h6>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top:-10px;">
                                    <div class="form-group col-md-6">
                                        <h6>&nbsp; &nbsp;&nbsp;Situation Familiale:&nbsp;&nbsp; <b><?php echo $data['situation'];?></b></h6> </div> <div class="form-group col-md-6">
                                    <h6>Nombre d'enfants :    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> <?php echo $data['Nbr_enfants'] ;?></b></h6>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top:-10px;">
                                    <div class="form-group col-md-6">
                                        <h6>&nbsp; &nbsp;&nbsp;Adresse:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $data['adresse_cand'] ;?></b></h6>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6>Email :    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php if($data['mail'] ==''){
                                            echo "Non renseigné";
                                        }else{
                                            echo utf8_encode($data['mail']);
                                        }?></b></h6>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top:-10px;">
                                    <div class="form-group col-md-6" >
                                        <h6>&nbsp; &nbsp;&nbsp;T&eacute;l&eacute;phone mobile : <b><?php echo $data['tel_mobile'] ;?></b></h6>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6>T&eacute;l&eacute;phone fixe:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php if($data['tel_fix'] ==0){
                                            echo "Non renseigné";
                                        }else{
                                            echo $data['tel_fix'] ;
                                        }?></b></h6>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <h6 style="margin-top:-25px;margin-bottom:-25px">B:&nbsp;<u>ETUDES SECONDAIRES ET UNIVERSITAIRES</u></strong></h6><br><br>
                        1) <u>Baccalauréat (ou équivalent)</u>

                        <table border-color: "solid 1px black;" >
                            <tr>
                                <td > Série :</td>
                                <td ><strong> <?php echo $data['serie'];?></strong>&nbsp;&nbsp;</td>
                                <td > Mention :&nbsp;</td>
                                <td > <strong><?php echo $data['mention'] ;?></strong>&nbsp;&nbsp;</td>
                                <td > Année :&nbsp;</td>
                                <td > <strong><?php echo $data['annee'] ;?></strong>&nbsp;&nbsp;</td>
                                <td > Centre :&nbsp;</td>
                                <td > <strong><?php echo $data['centre'] ;?></strong>&nbsp;&nbsp;</td>
                                <td > Numéro de l'attestation :&nbsp;</td>
                                <td > <strong><?php echo $data['num_attest'] ;?></strong></td>
                            </tr><br>
                            
                        </table><br>
			            2) <u>Etudes effectu&eacute;es après le BAC</u> :
			
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table border width="850px">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Année</th>
                                                <th scope="col">Nature des &eacute;tudes </th>
                                                <th scope="col">Etablissement et Lieu</th>
                                                <th scope="col">Diplôme Obtenu</th>
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
                        </div><br><br>

                        <h6><strong>C:&nbsp;<u>CHOIX DES FILIERES</u></strong></h6><br>
                        <h6 style="margin-left:10px;margin-top:-10px"><strong>&nbsp;<u>Admission sur dossier</u></strong></h6><br>

                       
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-sx">
                        <h5 style="margin-top:-20px">Facult&eacute; des Lettres et Sciences Humaines (FLSH)</h5>
                        <div class="line">
                            <div class="lside">                                       

                                <label><input type="checkbox"> Département Lettres Modernes Françaises</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Mvouni</label>
                                <label><input type="checkbox"> Patsy</label>
                            </div>
                        </div>
                        
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Département Langues Etrangères Appliquées</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Mvouni</label>
                                <label><input type="checkbox"> Patsy</label>
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Département Histoire</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Mvouni</label>
                                
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label style="margin-left:30px"><input type="radio"> Archivistique et Documentation</label>
                            </div>
                            <div class="rside">
                                
                                <label style="margin-left:173px"><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Mvouni</label>
                            </div>
                        
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Département Géographie</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Mvouni</label>
                                <label><input type="checkbox"> Patsy</label>
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox">  Parcours Langue Chinoise</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Itsangadjou</label>
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Langue et littérature anglaises <b> (Admission sur concours)</b></label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Hamramba</label>
                            </div>
                        </div>
                       
                    </div>

                   
                    <div class="form-sx">
                        <h5>Faculté de Droit et Sciences Economiques (FDSE)</h5>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Département de Droit</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Mvouni</label>
                                <label><input type="checkbox"> Patsy</label>
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Département Sciences économiques (<b>Série C et D</b>)</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Mvouni</label>
                                <label><input type="checkbox"> Patsy</label>
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Départ Administration économique et sociale</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Mvouni</label>
                                <label><input type="checkbox"> Patsy</label>
                                <label><input type="checkbox"> Wanani</label>
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Gestion des Ressources Humaines (Licence pro)</label>
                            </div>
                            <div class="rside">
                                <label style="margin-left:173px"><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Patsy</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div></div>
                <div class="text-right" style="margin-bottom:10px;margin-top:10px;">
                    <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer la fiche de Préincription</button> 
                </div>
                <div class="text-left" style="margin-top:-30px;">
                    <a role="button" class="btn btn-primary" href="modifinmanq.php">Modifier </a>
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