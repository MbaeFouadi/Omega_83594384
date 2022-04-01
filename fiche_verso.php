<?php 
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="3" or $_SESSION['cat']=="5" or $_SESSION['cat']=="8" )){
include('connexion.php');
$d=date(Y);
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
    //  $nom = addslashes($r1->nom);
 	// $prenom = addslashes($r1->prenom);
	// $naiss = $r1->date_naiss;
    // $lieu=$r1->lieu_naiss;
    $sql1="SELECT * FROM type_recu where id_type='".$data['id_type']."'";
    $resultat2 = mysqli_query($link,$sql1);
    $data1 = mysqli_fetch_array($resultat2);
    unset($_SESSION['nin']);
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
        <h5 align="right" style="color:black;"> <strong><?php echo  $_SESSION['prenom']." ".$_SESSION['nom'];?></strong></h5>

        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle'];?></strong></h5>
                <p align="center"> <?php echo (date('d-m-Y'));?></p>
                <div class="text-left" style="margin-top:0px">
                <a class="btn btn-primary" href="userInterface.php" role=button> Annuler</a>
                </div>
                <div id='sectionAimprimer'>
                   
                        



                        
                            
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-sx">
                        <h5>Facult&eacute; des  Sciences et Techniques (FST)</h5>
                        <h6 style="margin-left:80px;"><em>(<b>Série scientifique exigée</b>)</em></h6>

                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Département Mathématique</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> La Corniche</label>
                                <label> </label>
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Département Physique - Chimie</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> La Corniche</label>
                                <label> </label>
                            </div>
                        </div>
                        
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Département Sciences de la Vie</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> La Corniche</label>
								<label><input type="checkbox"> Patsy</label>
                                <label> </label>
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"> Biologie marine et pêche</label>
                            </div>
                            <div class="rside">
                                
                                <label style="margin-left:173px"><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> La Corniche</label>
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Département Sciences de la Terre et de l'Environnement</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> La Corniche</label>
                                <label><input type="checkbox"> Patsy</label>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-sx">
                        <h5 style="margin-top:-25px">Facult&eacute; Imam Chafiou (FIC)</h5>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Département Lettres Arabes</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Itsangadjou</label>
                                <label><input type="checkbox"> Patsy</label>
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Département Sciences islamiques</label>
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
                                <label><input type="checkbox"> Etudes Coraniques et Formation des Imams</label>
                            </div>
                            <div class="rside">
                                <label ><input type="checkbox"> Licence 1</label>
                                <!-- <label><input type="hidden"> Licence 2</label>
                                <label><input type="hidden"> Licence 3</label> -->
                                <label style="margin-left:175px"><input type="checkbox"> Itsangadjou</label>
                            </div>
                        </div>
                         <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Juridiction Islamique</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                             <!--    <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label> -->
                                <label style="margin-left:175px"><input type="checkbox"> Itsangadjou</label>
                            </div>
                        </div>
                        <!-- <div class="line">
                            <div class="lside">
                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"> Sciences du saint coran</label>
                            </div>
                            <div class="rside">
                                
                                <label style="margin-left:173px"><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Itsangadjou</label>
                            </div>
                        </div>
 -->                    </div>
                        <h6 style="margin-left:10px;margin-top:-25px"><strong>&nbsp;<u>Admission sur Concours</u></strong></h6><br>


                    <div class="form-sx">
                        <h5 style="margin-top:-20px">Institut de Formation des Enseignants et de Recherche en Education (IFERE)</h5>
                        
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Département Formation des profs des écoles</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Hamramba</label>
                                <label><input type="checkbox"> Patsy</label>
                                <label><input type="checkbox"> Fomboni</label>
                                
                            </div>
                        </div>
                       
                    </div>
                        <div class="form-sx">
                        <h5 style="margin-top:-25px">Institut Universitaire de Technologie (IUT)</h5>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox">  Gestion des Entreprises et des Administrations</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label style="margin-left:90px"><input type="checkbox"> Hamramba</label>
                                <label><input type="checkbox"> Patsy</label>
                                <label><input type="checkbox"> Fomboni</label>
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox">  Commerce</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label style="margin-left:90px"><input type="checkbox"> Hamramba</label>
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox">  Tourisme et Hôtellerie</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label style="margin-left:90px"><input type="checkbox"> Hamramba</label>
                            </div>
                        </div>
                       
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Génie Informatique (<b>Série scientifique exigée</b>)</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label style="margin-left:90px"><input type="checkbox"> Hamramba</label>
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"> Administration et sécurité des réseaux</label>
                            </div>
                            <div class="rside">
                                
                                <label style="margin-left:175px"><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Hamramba</label>
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"> Administration et sécurité des systémes d'informations</label>
                            </div>
                            <div class="rside">
                                
                                <label style="margin-left:175px"><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Hamramba</label>
                            </div>
                        </div>
                        
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Habitat et son Environnement (<b>Série scientifique exigée</b>)</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label style="margin-left:90px"><input type="checkbox"> Hamramba</label>
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Statistique (<b>Série scientifique exigée</b>)</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label style="margin-left:90px"><input type="checkbox"> Hamramba</label>
                            </div>
                        </div>
                        <div class="line">
                            <div class="lside">
                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"> Mathématique, Statistique et Informatique Décisionnelle</label>
                            </div>
                            <div class="rside">
                                
                                <label style="margin-left:175px"><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> Hamramba</label>
                            </div>
                        </div>
                        
                    </div>

                    

                    <div class="form-sx">
                        <h5 style="margin-top:-25px">Ecole de Médecine et de Santé Publique (EMSP)</h5>
                        <h6 style="margin-left:80px;"><em>(série C,D ou A1)</em></h6>
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Département Soins infirmiers</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> La Corniche</label>
                                
                            </div>
                        </div>
                       
                        <div class="line">
                            <div class="lside">
                                <label><input type="checkbox"> Département Soins obstétricaux</label>
                            </div>
                            <div class="rside">
                                <label><input type="checkbox"> Licence 1</label>
                                <label><input type="checkbox"> Licence 2</label>
                                <label><input type="checkbox"> Licence 3</label>
                                <label><input type="checkbox"> La Corniche</label>
                            </div>
                        </div>
                       
                    </div>
                    
                    

                </div>
            </div>
        </div>
    </section>




                    <h6 style="margin-left:200px;margin-bottom:-5px;margin-top:-20px;"><strong>&nbsp; A saisir les d&eacute;partements par ordre de pr&eacute;ference</strong></h6><br>

<table border width="900px">
    <tr>
        <td > &nbsp;&nbsp;&nbsp;1er choix (département) :</td>
    </tr>
    <tr>
        <td> &nbsp;&nbsp;&nbsp;2ème choix (département) :</td>
    </tr>
    <tr>
        <td> &nbsp;&nbsp;&nbsp;3ème choix (département) :</td>
    </tr>
</table>
                    <h6 style="margin-top:10px;"><strong>N.B:</strong></h6>
                    <div style="margin-left:20px;margin-bottom:10px;margin-top: -10px">
                        -Le candidat désirant s'inscrire à un concours doit choisir un seul et unique département parmi        les départements exigeant un concours d'entrée<br> 
                        -Les 2 autres choix porteront sur des départements de facultés.<br>
                    </div>



<h6><strong>D:&nbsp;<u>PI&Eacute;CES &Agrave; FOURNIR</u></strong></h6>
                        <div style="margin-left:50px;">
                             &rArr; Copies certifi&eacute;es des bulletins de notes du 3<sup>ème</sup> trimestre des classes de 2<sup>nde</sup> ,1<sup>ère</sup> et Terminale<br>
                             &rArr; Copie certifi&eacute;e du Relevé des notes au BAC <br>
                             &rArr; Copie certifi&eacute;e de l’Attestation de réussite au Bac<br>
                             &rArr;	Pour la 2<sup>ème</sup> ou 3<sup>ème</sup> année universitaire, les copies certifiées de l’Attestation de Diplôme et du relevé des notes  justifiant l’inscription <br>
                             &rArr;	L’extrait de naissance ou Fiche individuelle d’Etat civil de moins de 3 mois <br>
                             &rArr;	2 Photos d&prime;identit&eacute; r&eacute;centes<br>
                             &rArr; Copie certifi&eacute;e du titre de s&eacute;jour pour les &eacute;trangers <br>

                             &rArr; Une pochette transparente<br>
                        </div>
                        
        <table class="table">
 
  <tbody>
    <tr height="50">
      <th scope="row">Avis du conseil d'orientation pour le 1er choix</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right">Le chef de Composante</td>
      
    </tr>
    
    <tr height="50">
      <th scope="row">Avis du conseil d'orientation pour le 2ème choix </th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right">Le chef de Composante</td>
      
    </tr>
    <tr height="50">
      <th scope="row">Avis du conseil d'orientation pour le 3ème choix</th>
      <td> </td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right">Le chef de Composante</td>
     
    </tr>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      
    </tr>
  </tbody>
</table>


        </div>
                <div class="text-right" style="margin-bottom:10px;margin-top:10px;">
                    <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer </button> 
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