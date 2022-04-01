<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="2" or $_SESSION['cat']=="8")){
    include('connexion.php');
    $dateP=date('Y-m-d');
    $sd=mysqli_query($link,"SELECT * FROM date_fin order by id_date DESC ");
            $dat=mysqli_fetch_array($sd); 


$nbr=0;
$dateJ=date('Y-m-d');
$h=date('H')-1;
$m=date('i');

$xD="";
  //pour Ngazidja
    
 /*/ $sqN=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart  and etudiant.sexe='F' and departement.code_facult='IUT' or departement.code_facult='IFERE' or departement.code_facult='FST' or departement.code_facult='FLSH' or departement.code_facult='FIC' or departement.code_facult='FDSE' or departement.code_facult='EMSP' ") or die(mysqli_error($link));
  $reN=mysqli_num_rows($sqN);*/

  //IUT

  if(isset($_POST['sub'])){

    $annee=$_POST['annee'];  
    $xD=1;
  $sqIU1=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and departement.code_facult='IUT' and etudiant.sexe='F' and inscription.Annee= '$annee' ") or die(mysqli_error($link));
  $reIUF=mysqli_num_rows($sqIU1);

  $sqIU=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and departement.code_facult='IUT' and etudiant.sexe='M' and inscription.Annee= '$annee' ") or die(mysqli_error($link));
  $reIUM=mysqli_num_rows($sqIU);
  $iut=$reIUF+$reIUM;
  //FST
  $sqFS1=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and departement.code_facult='FST' and etudiant.sexe='F' and inscription.Annee= '$annee' ") or die(mysqli_error($link));
  $reFSF=mysqli_num_rows($sqFS1);

  $sqFS=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and departement.code_facult='FST' and etudiant.sexe='M' and inscription.Annee= '$annee' ") or die(mysqli_error($link));
  $reFSM=mysqli_num_rows($sqFS);

  $fst=$reFSF+$reFSM;

 //FDSE
 $sqFD1=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and departement.code_facult='FDSE' and etudiant.sexe='F' and inscription.Annee= '$annee' ") or die(mysqli_error($link));
 $reFDF=mysqli_num_rows($sqFD1);

 $sqFD=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and departement.code_facult='FDSE' and etudiant.sexe='M' and inscription.Annee= '$annee' ") or die(mysqli_error($link));
 $reFDM=mysqli_num_rows($sqFD);

 $fdse= $reFDF+$reFDM;

 //FLSH

 $sqFL1=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and departement.code_facult='FLSH' and etudiant.sexe='F' and inscription.Annee= '$annee' ") or die(mysqli_error($link));
 $reFLF=mysqli_num_rows($sqFL1);

 $sqFL=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and departement.code_facult='FLSH' and etudiant.sexe='M' and inscription.Annee= '$annee' ") or die(mysqli_error($link));
 $reFLM=mysqli_num_rows($sqFL);
 
 $flsh= $reFLF+$reFLM;
 //IFERE

 $sqIF1=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and departement.code_facult='IFERE' and etudiant.sexe='F'and inscription.Annee= '$annee' ") or die(mysqli_error($link));
 $reIFF=mysqli_num_rows($sqIF1);

 $sqIF=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and departement.code_facult='IFERE' and etudiant.sexe='M' and inscription.Annee= '$annee'") or die(mysqli_error($link));
 $reIFM=mysqli_num_rows($sqIF);

 $ifere= $reIFF+$reIFM;

 //FIC

 $sqFI1=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and departement.code_facult='FIC' and etudiant.sexe='F' and inscription.Annee= '$annee'") or die(mysqli_error($link));
 $reFIF=mysqli_num_rows($sqFI1);

 $sqFI=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and departement.code_facult='FIC' and etudiant.sexe='M' and inscription.Annee= '$annee' ") or die(mysqli_error($link));
 $reFIM=mysqli_num_rows($sqFI);

$fic= $reFIF+$reFIM;
 //EMSP

 $sqEM1=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and departement.code_facult='EMSP' and etudiant.sexe='F' and inscription.Annee= '$annee'  ") or die(mysqli_error($link));
 $reEMF=mysqli_num_rows($sqEM1);

 $sqEM=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and departement.code_facult='EMSP' and etudiant.sexe='M' and inscription.Annee= '$annee'  ") or die(mysqli_error($link));
 $reMM=mysqli_num_rows($sqEM);
  
 $emsp= $reEMF+$reMM;
 
  /*$rN = "SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart  and etudiant.sexe='M' and departement.code_facult='IUT' or departement.code_facult='IFERE'or departement.code_facult='FST' or departement.code_facult='FLSH' or departement.code_facult='FIC' or departement.code_facult='FDSE' or departement.code_facult='EMSP'";
  $reqN = mysqli_query($link,$rN) or die(mysqli_error($link));
  $nbrN = mysqli_num_rows($reqN); */

  //addition faculte F

  $ngazidjaF= $reIUF+$reFSF+$reFDF+$reFLF+$reIFF+$reFIF+$reEMF;

  //addition faculte M;

  $ngazidjaM= $reIUM+$reFSM+$reFDM+$reFLM+$reIFM+$reFIM+$reMM;

  //addition des faculté
  $ngazidja= $iut+$fst+$fdse+$flsh+$ifere+$fic+$emsp;

  //pour Anjouan
    
  $sqA=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and departement.code_facult='SP' and etudiant.sexe='F' and inscription.Annee= '$annee'  ") or die(mysqli_error($link));
  $reA=mysqli_num_rows($sqA);
  
 
  $rA = "SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and  departement.code_facult='SP' and etudiant.sexe='M' and inscription.Annee= '$annee' ";
  $reqA = mysqli_query($link,$rA) or die(mysqli_error($link));
  $nbrA = mysqli_num_rows($reqA);
  
  //pour Moheli
    
  $sqM=mysqli_query($link,"SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and  departement.code_facult='AUM' and  etudiant.sexe='F' and inscription.Annee= '$annee' ") or die(mysqli_error($link));
  $reM=mysqli_num_rows($sqM);
  
 
  $rM = "SELECT * FROM etudiant,inscription,departement WHERE etudiant.mat_etud=inscription.mat_etud and inscription.code_depart=departement.code_depart and  departement.code_facult='AUM' and  etudiant.sexe='M' and inscription.Annee= '$annee' ";
  $reqM = mysqli_query($link,$rM) or die(mysqli_error($link));
  $nbrM = mysqli_num_rows($reqM);

  }


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
                    case 8:include('interfaces/adminRubrique.php'); break;
                    
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
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-60px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-60px;color:#00b185;"> Fin des inscriptions : <?php echo $dat['date_fin'];?></h5>
            <div class="text-center mb-5">
				</div>


                <hr />
                <!-- <h3 class="soft-title-4" style="color:green;margin-top:20%;font-family:algerian;">Aujourd'hui, Vous avez imprimé <--?php echo $nbr ?> reçu(s),<br> donc vous avez encaissé <?php echo " ".$caisse."KMF"; ?> </h3> -->
            </div>
            <?php
                    if($xD==0){
                        $query=mysqli_query($link,"SELECT * FROM annee");
                        ?>
                        <div class="container">
                        <h1 style="color:#00b185; text-align:center">Veuillez selectionner l'Année</h1><br>
                        <form action="inscri_ile_genre.php" method="POST">
                            <select name="annee" class="form-control">
                                <?php while($data=mysqli_fetch_array($query)){?>
                                    <option value="<?=$data['Annee']?>"><?=$data['Annee']?></option>
                                <?php }?>
                            </select><br>
                            <button type="submit" name="sub" class="btn btn-primary">Valider</button>
                        </form>
                    </div>
                    <?php } elseif($xD==1){?>
            <div class="text-right" style="margin-bottom:20px;">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer</button> 

        </div>
            <div id='sectionAimprimer' >
            <h2 align="center"  style="color:black;margin-bottom:20px;">Nombre d'inscription par Ile et par genre en <?=$_POST['annee']?></h2>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                       
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Ile</th>
                                    <th scope="col">Féminin</th>
                                    <th scope="col">Masculin</th>
                                    <th scope="col">TOTAL</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                           
                                <tr>
                                    <td>Ngazidja</td>
                                    <td><?php echo $ngazidjaF?></td>
                                    <td><?php echo $ngazidjaM?></td>
                                    <td><?php echo $ngazidja?></td>
                                </tr>
                                <tr>
                                    <td>Anjouan</td>
                                    <td><?php echo $reA?></td>
                                    <td><?php echo $nbrA?></td>
                                    <td><?php echo $reA+$nbrA?></td>
                                </tr>
                                <tr>
                                    <td>Mohéli</td>
                                    <td><?php echo $reM?></td>
                                    <td><?php echo $nbrM?></td>
                                    <td><?php echo $reM+$nbrM?></td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><?php echo $ngazidjaF+$reA+$reM?></td>
                                    <td><?php echo $ngazidjaM+$nbrA+$nbrM?></td>
                                    <td><?php echo $ngazidjaF+$ngazidjaM+$reA+$nbrA+$reM+$nbrM ?></td>
                                </tr>
                              
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6 style="margin-left:60px;margin-bottom:20px;">Le <STRONG>&nbsp;<?php echo (date('d/m/Y'));?></STRONG></h6></b></h6> 
                </div>
               
		    </div>

                </div>
          

              			


        <div class="text-right">
                    <a role="button" class="btn btn-primary" href="userInterface.php">retour à la page d'accueil</a>
                   </div>
        </main>
        <?php }?> 
        <script>
            function imprimer(divName){
                var restorepage=document.body.innerHTML;
                var printContent=document.getElementById(divName).innerHTML;
                
                document.body.innerHTML=printContent;
                window.print();
                document.body.innerHTML=restorepage;
            }
        </script>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
   
</body>
</html>
<?php
}else{ ?>
    <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
<?php }
?>