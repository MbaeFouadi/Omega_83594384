<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="3" or $_SESSION['cat']=="2" or $_SESSION['cat']=="8"    )){
include('connexion.php');
$nbr=0;
$dateJ=date('Y-m-d');
$h=date('H')-1;
$m=date('i');
$xD="";
$sd=mysqli_query($link,"SELECT * FROM date_fin WHERE type='2' order by id_date DESC ");
$dat=mysqli_fetch_array($sd);     

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
if(isset($_POST['sub'])){
$anne=$_POST['annee'];
$traitant1=$_SESSION['login'];
$r1 = "SELECT * FROM inscription WHERE Annee='$anne' and code_niv='N1' or code_niv='P1' ";
$req1 = mysqli_query($link,$r1) or die(mysqli_error($link));
$nbr1 = mysqli_num_rows($req1); 
$caisse1 = $nbr1 * 5000;

$traitant2=$_SESSION['login'];
$r2 = "SELECT * FROM inscription WHERE Annee='$anne' and code_niv='N2' or code_niv='P2' ";
$req2 = mysqli_query($link,$r2) or die(mysqli_error($link));
$nbr2 = mysqli_num_rows($req2); 
$caisse2 = $nbr2 * 5000;

$traitant3=$_SESSION['login'];
$r3 = "SELECT * FROM inscription  WHERE Annee='$anne' and code_niv='N3' or code_niv='P3'";
$req3 = mysqli_query($link,$r3) or die(mysqli_error($link));
$nbr3 = mysqli_num_rows($req3); 
$caisse3 = $nbr3 * 5000;

$traitant4=$_SESSION['login'];
$r4 = "SELECT * FROM inscription WHERE Annee='$anne' and   code_niv='N4' or code_niv='P4'";
$req4 = mysqli_query($link,$r4) or die(mysqli_error($link));
$nbr4 = mysqli_num_rows($req4); 
$caisse4 = $nbr4 * 5000;


/*$traitant4=$_SESSION['login'];
$r4 = "SELECT * FROM candidats WHERE   id_type=4";
$req4 = mysqli_query($link,$r4);
$nbr4 = mysqli_num_rows($req4); 
$caisse4 = $nbr4 * 5000;*/







$traitant5=$_SESSION['login'];
$r5 = "SELECT * FROM inscription WHERE Annee='$anne' and  code_niv='N5' or code_niv='P5'";
$req5 = mysqli_query($link,$r5) or die(mysqli_error($link));
$nbr5 = mysqli_num_rows($req5); 
$caisse5 = $nbr5 * 5000;

/*$traitant5=$_SESSION['login'];
$r9 = "SELECT * FROM etudiant WHERE code_niv IS NOT NULL";
$req9 = mysqli_query($link,$r9) or die(mysqli_error($link));
$nbr9 = mysqli_num_rows($req9);*/

$caisses=$caisse1+$caisse2+$caisse3+$caisse4+$caisse5;
$nbres=$nbr1+$nbr2+$nbr3+$nbr4+$nbr5;
  // echo $r; 
   //echo "\t"; var_dump($nbr);
   if(mysqli_num_rows($req1)>=1 && mysqli_num_rows($req2) >=1 && mysqli_num_rows($req3) >=1 && mysqli_num_rows($req4) >=1 && mysqli_num_rows($req5) >=1){
   $xD=1;
   }
   else {
       echo 'aucun etudiant inscri cette annee';
   }





// $password=md5($pass);
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


                <hr />
                <!-- <h3 class="soft-title-4" style="color:green;margin-top:20%;font-family:algerian;">Aujourd'hui, Vous avez imprimé <?php echo $nbr ?> reçu(s),<br> donc vous avez encaissé /<!--?php echo " ".$caisse."KMF"; ?> </h3> -->
            </div>
            <?php
                    if($xD==0){
                        $query=mysqli_query($link,"SELECT * FROM annee");
                        ?>
                        <div class="container">
                        <h1 style="color:#00b185; text-align:center">Veuillez selectionner l'Année</h1><br>
                        <form action="ins_par_type.php" method="POST">
                            <select name="annee" class="form-control">
                                <?php while($data=mysqli_fetch_array($query)){?>
                                    <option value="<?=$data['Annee']?>"><?=$data['Annee']?></option>
                                <?php }?>
                            </select><br>
                            <button type="submit" name="sub" class="btn btn-primary">Valider</button>
                        </form>
                    </div>
                    <?php } elseif($xD==1){?>
                    <div class="text-right">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer </button> 
        </div>
        <div id='sectionAimprimer'>
        <h6 style="margin-left:10px;margin-top:20px;"  align=center><STRONG>Nombre d'inscrits par type d'inscription en <?=$_POST['annee']?></STRONG>&nbsp;</h6> 

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Type d'inscription</th>
                                    <th >Nombre d'inscrits</th>
                                    
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Inscription L1</th>
                                    <td><?php echo $nbr1 ?></td>
                                    
                                
                                </tr>
                                <tr>
                                    <th> Inscription L2</th>
                                    <td><?php echo $nbr2 ?></td>
                                   
                                
                                </tr>
                                <tr>
                                    <th> Inscription L3 </th>
                                    <td><?php echo $nbr3 ?></td>
                                   
                                
                                </tr>
                                <tr>
                                    <th> Master 1 </th>
                                    <td><?php echo $nbr4 ?></td>
                                   
                                
                                </tr>
                                
                                <tr>
                                    <th> Master2</th>
                                    <td><?php echo $nbr5 ?></td>
                                   
                                
                                </tr>
                                <tr>
                                    <th  scope="col">TOTAL </th>
                                
                                    <td scope="col"><?php echo $nbres ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         
            <div class="row">
                <div class="col-md-6">
                    <h6 style="margin-left:60px;margin-top:20px;">Le <STRONG>&nbsp;<?php echo (date('d/m/Y'));?></STRONG></h6></b></h5> 
                </div>
                
		    </div>
        
        </div>
    
            
        <div class="text-right">
                    <a role="button" class="btn btn-primary" href="userInterface.php">retour à la page d'accueil</a>
                   </div>
        </main>
        <?php }?> 

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