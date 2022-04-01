<?php 
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="4"  )){
include('connexion.php');
$req=mysqli_query($link,"SELECT * from departement WHERE code_depart='".$_SESSION['libell']."'");
$datass=mysqli_fetch_array($req);
$reep=mysqli_query($link,"SELECT users.id_cat,libelle from users,categorie where users.id_cat=categorie.id_cat");
$r="SELECT  date_fin FROM date_fin order by id_date DESC";

    $req = mysqli_query($link,$r);
    $dat=mysqli_fetch_array($req);
$d=date(Y);
$dd=$d+1;
if(isset($_POST['decision'])){
    $statut=$_POST['decision'];
    }
    else{
        $statut=null;
    };
    
     switch($statut){
        case "option1": $rep=mysqli_query($link,"UPDATE candidats set retenu='".$_SESSION['libell']."' where  num_recu='".$_SESSION['recu']."' ");
        echo ("<script language='javascript'>alert('Traitement éffectué avec succé');location.href='rechercheetud.php'</script>");
          break; 
        case "option2": if($_SESSION['choix']=='choix1'){
        $rep2=mysqli_query($link,"UPDATE candidats set retenu='nR1' where  num_recu='".$_SESSION['recu']."'");
        header('location: rechercheetud.php'); 
    }elseif($_SESSION['choix']=='choix2'){
        $rep2=mysqli_query($link,"UPDATE candidats set retenu='nR2' where  num_recu='".$_SESSION['recu']."'");
        header('location: rechercheetud.php');

    }elseif($_SESSION['choix']=='choix3'){
        $rep2=mysqli_query($link,"UPDATE candidats set retenu='nR3' where  num_recu='".$_SESSION['recu']."'");
        header('location: rechercheetud.php');

    }
        break; 
     }
   
$req=mysqli_query($link,"SELECT * FROM candidats WHERE  num_recu='".$_SESSION['recu']."'");
$data=mysqli_fetch_array($req);
$choix=$data['choix1'];
$choix1=$data['choix2'];
$choix2=$data['choix3'];
$num=$data['num_recu'];
    $nom = utf8_encode($data['nom']);
 	$prenom = utf8_encode($data['prenom']);
	$naiss = $data['date_naiss'];
    $lieu=utf8_encode($data['lieu_naiss']);
    $p0=mysqli_query($link,"SELECT * from departement where code_depart='".$choix."'"); 
    $p1= mysqli_fetch_array($p0);
    $p20=mysqli_query($link,"SELECT * from departement where code_depart='".$choix1."'"); 
    $p21= mysqli_fetch_array($p20);
    $a=mysqli_query($link,"SELECT * from departement where code_depart='".$choix2."'"); 
    $a1= mysqli_fetch_array($a);
    
    $reqU=mysqli_query($link,"SELECT * from faculte WHERE code_facult='".$_SESSION['login']."'");
    $mahA=mysqli_fetch_array($reqU);


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
		<h4 align="right"><strong><?php  echo ucwords($_SESSION['prenom']." ".$_SESSION['nom'])?> </strong></h4>
		<h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle'] ?></strong></h5>
		
		<h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-50px;"> <?php echo (date('d-m-Y'));?></h5>
		<h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-50px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
				</div>
			<div class="text-center mb-5">
				</div>     
                <h2 class="soft-title-2"  align="center"><strong>Information étudiant</strong></h2>
                <hr /> 

                    <div style="margin-top:50px">
                    <h5 style="margin-top:-10px;margin-left:150px;">N° de re&ccedil;u:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? echo "$num";?></b></h5><br>
                    <h5 style="margin-top:-10px;margin-left:150px;">Nom et pr&eacute;nom:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? echo strtoupper("$nom"."  "."$prenom");?></b></h5><br>
                    <h5 style="margin-top:-10px;margin-left:150px;">Date et lieu de naissance:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?echo strtoupper("$naiss"." "."à"." "."$lieu"); ?> </b></h5><br>
                    <h5 style="margin-top:-10px;margin-left:150px;">Série:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? echo utf8_encode($data['serie']);?></b> </h5><br>
                    <h5 style="margin-top:-10px;margin-left:150px;">Année:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? echo utf8_encode($data['annee']);?></b> </h5><br>
                    <h5 style="margin-top:-10px;margin-left:150px;">Faculté:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? echo strtoupper(" ".utf8_encode($mahA['design_facult']));?></b> </h5><br>
                    <h5 style="margin-top:-10px;margin-left:150px;">D&eacute;partement:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> <?php if($_SESSION['choix']== 'choix1'){
                        echo utf8_encode($p1['design_depart']);
                    }else if($_SESSION['choix']== 'choix2'){
                        echo utf8_encode($p21['design_depart']);
                    }elseif($_SESSION['choix']== 'choix3'){
                        echo utf8_encode($a1['design_depart']);
                    }?> </b></h5><br>
                   
                   
                    <div class="row" style="margin-top:100px;margin-left:50px;">
                <div class="col-12">
                    <form action="affichetud.php" method="POST">
                    <h4 style="margin-left:190px;color:green;"><strong>Décision :</strong></h4>
                    <div class="form-check form-check-inline" style="margin-left:400px;margin-top:-500px;">
                    <input class="form-check-input" type="radio" name="decision" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">OUI</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="decision" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">NON</label>
                    </div>
                    
                     
                    <div class="text-center" style="margin-left:50px;margin-top:50px;">
                        <button name="valider" type="submit" class="btn btn-primary">Valider</button>
                       </div>
                       
                    </form>

                </div>
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