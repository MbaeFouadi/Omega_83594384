<?php 
   session_start();
   if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
   if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7")){
    include("connexion.php");
    $maintenant=time();

    $r=mysqli_query($link,"SELECT  date_fin FROM date_fin order by id_date DESC");
$dat = mysqli_fetch_array($r); 
if(isset($_POST['nin'])){
    $ni=$_POST['nin'];
    }
    else{
        $ni=null;
    }

    if(isset($_POST['valider'])){
        $valider=$_POST['valider'];
        }
        else{
            $valider=null;
        }

 
    
     
         $requete = mysqli_query($link,"SELECT * FROM candidats where  nin= '".$ni."' ");
         if(mysqli_num_rows($requete)>0){
         while($data=mysqli_fetch_array($requete)){
            
             $nin=$data['nin'];
            
               
                        }
                        
                    }else{
                    
    
         $message="Cette personne n'a pas de recu"  ;
                    }
                           
    


$my =mysqli_query($link,"SELECT * FROM type_recu ");
while($res = mysqli_fetch_array($my)){
    $nom_recu = $res['nom_type'];
}
  $requete ="SELECT  nin, nom, prenom, date_naiss, lieu_naiss,num_recu,sexe,id_type,reference_id,tel_mobile,traitant_recu,num_recu FROM candidats WHERE  nin = '".$ni."'";
  

  
 
	//echo $requete;
    $resultat1 = mysqli_query($link,$requete);
    
	//$r1 = mysqli_fetch_object($resultat1);
	/*$nom = stripslashes($r1->nom);
	$prenom = stripslashes($r1->prenom);
	$naiss = $r1->date_naiss;
	$lieu=stripslashes($r1->lieu_naiss);
	$num_recu= $r1->num_recu;
	$tab = explode("-",$naiss);
	$s = $r1->sexe;
    $message=$prenom;
    $type=$r1->id_type;
    $traitant=$r1->traitant_recu;
    $_SESSION['num_recu']=$r1->num_recu;*/
    $r1 = mysqli_fetch_array($resultat1);
    $n= $r1['nin'];
    $nom= $r1['nom'];
    $prenom = $r1['prenom'];
    $naiss=$r1['date_naiss'];
    $lieu = $r1['lieu_naiss'];
    $num_recu= $r1['num_recu'];
    $references=$r1['reference_id'];
    $tab= explode("-",$naiss);
    $sexe= $r1['sexe'];
    $message= $prenom;
    $type = $r1['id_type'];
    $traitant=$r1['traitant_recu'];
    $telephone= $r1['tel_mobile'];
    $_SESSION['num_recu']= $r1['num_recu'];


    $ho=mysqli_query($link,"SELECT * FROM holo WHERE id='".$references."'");
    $da=mysqli_fetch_array($ho);
  $re=mysqli_query($link,"SELECT * FROM type_recu WHERE id_type='".$type."'");     
  $d=mysqli_fetch_array($re);
  $type_recu=$d['nom_type'];
  $v=mysqli_query($link,"SELECT * from users where login='".$traitant."' ");
  $dap=mysqli_fetch_array($v) or die(mysqli_error($link));

    //$requ = $conn->query($req);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome - Universit&eacute; des Comores</title>
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
                <h6 class="m-3 text-center"><strong class="titre"> Universit&eacute; des Comores</strong></h6>
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
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-50px;"> <?php echo (date('d-m-Y'))?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-50px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
                </div>
            <div class="text-center mb-5">
				</div>
       
          
                <?php
                 $requete = mysqli_query($link,"SELECT * FROM candidats where  NIN= '".$ni."' ");
                 if(mysqli_num_rows($requete)>0){
                 while($data=mysqli_fetch_array($requete)){
                     $nin=$data['nin']; ?>
                    
                    <div id='sectionAimprimer' >
	<div id='sectionAimprimer' style="border:1px solid black;height:460; width:800px; margin:40px;padding:4px; "> 

        <div class="row">
                
            <div class="col-md-3"><img src="assets/img/udc.png" width="50%" height="100"></div>
            <div class="col-md-9">
                <h1 style="margin-left:-60px"><STRONG>UNIVERSITE DES COMORES</STRONG></h1>
                <h1 style="margin-left:10px">Agence de comptabilit&eacute;</h1>
                <h6 style="margin-left:80px;margin-top:20px"><strong>RE&Ccedil;U DE &nbsp;<?php echo $type_recu ?></strong></h6></br>
                
            </div>    
        </div>
        <div class="row" style="margin-bottom:20px;">
            <div class="col-md-6">
                <h6 style="margin-left:10px"><strong>N° Reçu&nbsp;<?php echo /*strtoupper("$r1->num_recu")*/$num_recu;?></strong></h6> 
            </div>
            <div class="col-md-6">
                <h6 style=" margin-left:150px"><strong>Montant  pay&eacute;:5000 KMF</strong></h6>
                <h6 style=" margin-left:150px"><strong>Référence Holo: <?=$da['reference']?></strong></h6> 
               
                
            </div>
      
	</div>
		 <div class="row">
			<div class="col-md-8"> 
				<h5 style="margin-left:60px;">Nin:<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo /*"$r1->nin"*/ $n;?></h5></b>
				<h5 style="margin-left:60px">Nom:<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo utf8_encode($nom) /*$nom*/;?></h5></b></h5>
				<h5 style="margin-left:60px">Pr&eacute;nom:<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo utf8_encode($prenom) /*$prenom*/;?></h5></b></h5>
				<h5 style="margin-left:60px">Date de naissance:<b>&nbsp;&nbsp;&nbsp;<?php echo /*"$r1->date_naiss"*/ $naiss; ?></h5></b></h5>
                <h5 style="margin-left:60px">Lieu de naissance:<b>&nbsp;&nbsp;&nbsp;<?php echo /*utf8_encode("$lieu")*/ utf8_encode($lieu);?></h5></b></h5>
                <h5 style="margin-left:60px">Téléphone:<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo /*$r1->tel_mobile*/ $telephone;?></h5></b></h5>
			 </div>
			<div class="col-md-4">
               <h6 style="margin-left:80px;margin-bottom:130px;">Signature:</h6> 
            
                <h6 style="margin-left:80px;"><b><?php echo  utf8_encode($dap['nom'])." ".utf8_encode($dap['prenom']) ?></b></h6> 
			 </div>
		   </div> 
        <div class="row">
                <div class="col-md-6">
                    <h6 style="margin-left:10px;margin-top:10px;"><STRONG>Date d'impression:</STRONG>&nbsp;<?php echo (date('d-m-Y'));?></h6> 
                </div>
		</div>
	</div>
				</div>
<div class="text-right">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer le re&ccedil;u</button> 
        </div>
        <div class="text-left" style="margin-top:-40px;">
                    <a role="button" class="btn btn-primary" href="modifnum.php"> Modifier </a>
                   </div> 
                    <?php }
                                
                            }else{ 
                                $message="Cette personne n'a pas de reçu"  ;
                                ?>
                            <h4 align="center" style="color:red;margin-bottom:20px"><?php echo $message ?></h4>
                            <div class="text-center" style="margin-top:40px;">
                    <a role="button" class="btn btn-primary" href="recherecu.php">Réssayer</a>
                   </div> 
                 <?php }
                ?>


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
<?php }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page! </h3>
    <?php }

?>								
						