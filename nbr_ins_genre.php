<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="2" or $_SESSION['cat']=="7" or $_SESSION['cat']=="8" )){
include('connexion.php');

$sd=mysqli_query($link,"SELECT * FROM date_fin WHERE type='2' order by id_date DESC ");
$dat=mysqli_fetch_array($sd);   
$nbr=0;

$dateJ=date('Y-m-d');
$traitant=$_SESSION['login'];
$h=date('H')-1;
$m=date('i');
$xD="";

if(isset($_POST['sub']))
{
    $annee=$_POST['annee'];
    $sqx=mysqli_query($link,"SELECT * FROM inscription,etudiant WHERE inscription.mat_etud=etudiant.mat_etud and  etudiant.sexe='F' and inscription.Annee='$annee'") or die(mysli_error($link));
    $rex=mysqli_num_rows($sqx);

    
    $rx = "SELECT * FROM inscription,etudiant WHERE inscription.mat_etud=etudiant.mat_etud and  etudiant.sexe='M' and inscription.Annee='$annee'";
    $reqx = mysqli_query($link,$rx) or die(mysli_error($link));
    $nbrx = mysqli_num_rows($reqx); 
    $caissex = $nbrx * 5000;
    if(mysqli_num_rows($sqx)>=1 && mysqli_num_rows($reqx)>=1){
        $xD=1;
    }
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
                <?php
                    if($xD==0){
                        $query=mysqli_query($link,"SELECT * FROM annee");
                        ?>
                        <div class="container">
                        <h1 style="color:#00b185; text-align:center">Veuillez selectionner l'Année</h1><br>
                        <form action="nbr_ins_genre.php" method="POST">
                            <select name="annee" class="form-control">
                                <?php while($data=mysqli_fetch_array($query)){?>
                                    <option value="<?=$data['Annee']?>"><?=$data['Annee']?></option>
                                <?php }?>
                            </select><br>
                            <button type="submit" name="sub" class="btn btn-primary">Valider</button>
                        </form>
                    </div>
                

                <?php } elseif($xD==1){?>
                <!-- <h3 class="soft-title-4" style="color:green;margin-top:20%;font-family:algerian;">Aujourd'hui, Vous avez imprimé <--?php echo $nbr ?> reçu(s),<br> donc vous avez encaissé <?php echo " ".$caisse."KMF"; ?> </h3> -->
            </div>
            <div class="text-right" style="margin-bottom:50px;">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer</button> 
        </div>
            <div id='sectionAimprimer' >
            <h2 align="center" style="margin-bottom:20px;" class="soft-title-2" style="color:#00b185;">Nombre d'inscrits par sexe en <?=$_POST['annee']?></h2>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                       
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    
                                    <th scope="col">Féminin</th>
                                    <th scope="col">Masculin</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $xD==1;
                        /*$rec=mysqli_query($link,"SELECT DISTINCT ile FROM etudiant ") or die("erreur:resc ".mysqli_error());
                        while($da=mysqli_fetch_array($rec)){*/

                           //}
                        ?>
                                <tr>
                                    
                                    <td><?php echo $rex?></td>
                                    <td><?php echo $nbrx?></td>
                                </tr>
                                <?php
                        
                        ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h6 style="margin-left:60px;margin-bottom:20px;">Le <STRONG>&nbsp;<?php echo (date('d/m/Y'));?></STRONG></h6></b></h5> 
                </div>
               
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