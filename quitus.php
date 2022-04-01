<?php 
   session_start();
   if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7")){
    include("connexion.php");
    $maintenant=time();

    $r=mysqli_query($link,"SELECT  date_fin FROM date_fin order by id_date DESC");
$dat = mysqli_fetch_array($r); 

    

  //  if(isset($_SESSION['nin'])){
		//$nin= $_SESSION['nin'];
	 //  }
	//$num_recu= $_SESSION["num_recu"];
	
   //header('location: recu.php');

// echo"l etudiant ".$_SESSION['bachelier']." existe son nin est".$_SESSION['nin'];

$my =mysqli_query($link,"SELECT * FROM type_recu ");
while($res = mysqli_fetch_array($my)){
    $nom_recu = $res['nom_type'];
}
  $requete =mysqli_query($link,"SELECT  * FROM post_inscription WHERE  num_auto = '".$_SESSION['auto']."' AND Annee='".$_SESSION['annee']."'");
  $reponse=mysqli_fetch_array($requete);

  $recu =mysqli_query($link,"SELECT  * FROM candidats WHERE  nin = '".$reponse['nin']."'");
  $r=mysqli_fetch_array($recu);

  $requet =mysqli_query($link,"SELECT  * FROM quitus WHERE  num_auto = '".$_SESSION['auto']."' AND Annee= '".$_SESSION['annee']."'");
  $data=mysqli_fetch_array($requet);

  $departement =mysqli_query($link,"SELECT  * FROM departement WHERE  code_depart = '".$reponse['code_depart']."'");
  $depart=mysqli_fetch_array($departement);
  $dep=$depart['design_depart'];
  
  $composante =mysqli_query($link,"SELECT  * FROM faculte WHERE  code_facult = '".$reponse['code_facult']."'");
  $facut=mysqli_fetch_array($composante);
  $facul=$facut['design_facult'];
  

  $niveau =mysqli_query($link,"SELECT  * FROM niveau WHERE  code_niv = '".$reponse['code_niv']."'");
  $niv=mysqli_fetch_array($niveau);
  $n=$niv['intit_niv'];

  $data['date_trans'] = urlEncode(date("d-m-Y"));

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
	<script>
            function imprimer(divName){
                var restorepage=document.body.innerHTML;
                var printContent=document.getElementById(divName).innerHTML;
                
                document.body.innerHTML=printContent;
                window.print();
                document.body.innerHTML=restorepage;
            }
        </script>
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
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-50px;color:#00b185;"> Fin de préinscription : <?php ?></h5>
                </div>
            <div class="text-center mb-5">
				</div>
       
          
                <!--div class="text-left" style="margin-top:1px">
        <a class="btn btn-primary" href="nouv.php" role=button> Nouveau reçu </a>
        </div-->

<div id='sectionAimprimer' >
	<div id='sectionAimprimer' style="border:1px solid black;height:auto; width:800px; margin:40px;padding:4px; "> 

        <div class="row">
                
            <div class="col-md-3"><img src="assets/img/udc.png" class="w-50"></div>
            <div class="col-md-9">
                <h3 style="margin-left:-20px"><STRONG>UNIVERSITE DES COMORES</STRONG></h3>
                <h3 style="margin-left:30px">Agence de comptabilit&eacute;</h3>
                <h6 style="margin-left:90px;margin-top:20px"><strong>QUITUS DE PAIEMENT</strong><br><p style="margin-left: 15px;">Anneé(<?=$_SESSION['annee']?>)</p></h6></br>
                
            </div>    
        </div>
        
		 <div class="row">
         <div class="col-12">
         <div class="form-row" style="margin-left:10px">
         <div class="form-group col-md-6">
             <h5 style="margin-top:-10px;">Quitus Numéro:&nbsp;<b><?php echo $data['num_quitus'] ?></b></h5>
         </div>
         <div class="form-group col-md-6">
         <h6 style="margin-left:-15px;">Nom de la Banque:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?= $data['banque'];?></b></h6>
     </div>

     </div>
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-6">
             <h6 style="margin-left:15px;"><?php 
             if($reponse['matricule']==''){?>
                    N° de reçu :&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $r['num_recu'] ;?></b></h6>
        <?php }else{ ?>
            
            Matricule :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $reponse['matricule'] ;?></b></h6>
            <?php }
             ?>
         </div>
         <div class="form-group col-md-6">
             <!-- <h6 style="margin-left:30px">N°:&nbsp;&nbsp;&nbsp;<b><?php// echo //$data['trans_droit'];?></b> &nbsp;&nbsp;&nbsp;Montant:&nbsp;&nbsp;&nbsp;<b><?php //echo $reponse['droit']);?></b></h6>-->  
             <h6 style="margin-left:-10px;">Transaction UDC:&nbsp;&nbsp;</b></h6>
             </div>
     </div>
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-6">
             <h6 style="margin-left:15px;">NIN:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $reponse['nin']  ;?></b></h6>
         </div>
         <div class="form-group col-md-6">
         <h6 style="margin-left:30px;">N°:&nbsp;&nbsp;&nbsp;<b><?= $data['trans_udc'];?></b> &nbsp;&nbsp;&nbsp;Montant:&nbsp;&nbsp;&nbsp;<b><?php echo $reponse['droit'];?></b></h6>

         </div>
         
     </div>
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-6">
             <h6 style="margin-left:15px;">Nom:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo utf8_encode($reponse['nom']);?></b> </h6>
         </div>
         <div class="form-group col-md-6">
            <h6 style="margin-left:-10px;">Transaction USECO:&nbsp;&nbsp;</b></h6>
         </div>
    </div>
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-6">
             <h6 style="margin-left:15px;">Prénom&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo utf8_encode($reponse['prenom']);?></b></h6>
         </div>
         <div class="form-group col-md-6">
            <h6 style="margin-left:30px;">N°:&nbsp;&nbsp;&nbsp;<b><?= (utf8_encode($data['trans_mutuelle']));?></b> &nbsp;&nbsp;&nbsp;Montant:&nbsp;&nbsp;&nbsp;<b>2 500 KMF</b></h6>

         </div>
     </div>
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-6">
             <h6 style="margin-left:15px;">Date de naissance:&nbsp;&nbsp;&nbsp;<b><?php echo $reponse['date_naiss'] ;?></b></h6>
         </div>
         <div class="form-group col-md-6">
         <h6 style="margin-left:-10px;">Transactions faites, le&nbsp;&nbsp;&nbsp;<b><?php echo $data['date_trans']  ;?></b></h6>

         </div>
     </div>
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-6">
             <h6 style="margin-left:15px;">Lieu de naissance:&nbsp;&nbsp;&nbsp; <b><?php echo utf8_encode($reponse['lieu_naiss']) ;?></b></h6>
         </div>
         <div class="form-group col-md-6">
         </div>

         
     </div>
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-12">
             <h6 style="margin-left:15px;">Composante:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo (utf8_encode($facul));?></b></h6>
         </div>
         <div class="form-group col-md-6">
         </div>
         
     </div>
     <div class="form-row" style="margin-top:-35px">
         <div class="form-group col-md-12">
             <h6 style="margin-left:15px;">Département:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo utf8_encode($dep) ;?></b></h6>
         </div>
         <div class="form-group col-md-6" >
         </div>
     </div>
     <div class="form-row" style="margin-top:-35px">
         <div class="form-group col-md-6">
             <h6 style="margin-left:15px;">Niveau:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo (utf8_encode($n));?></b></h6>
         </div>
         <div class="form-group col-md-6" >
         <h6 style="margin-left:70px">Signature: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php //echo $data['num_attest'];?></b></h6>
         </div>
     </div>
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-6">
         <?php 
             if($reponse['tel_mobile']==0){?>
                    <h6 style="margin-left:15px;">Téléphone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Non renseigné</b></h6>
        <?php }else{ ?>
            
            <h6 style="margin-left:15px;">Téléphone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $reponse['tel_mobile'] ;?></b></h6>
            <?php }
             ?>
             
         </div>
         <div class="form-group col-md-6" style="margin-top:50px">
             <h6 style="margin-left:220px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo ucwords(utf8_encode($_SESSION['nom']))." ".(utf8_encode($_SESSION['prenom']));?></b></h6>
         </div>
     </div>
 </div>
		   </div> 
      
        
                
        <div class="row">
                <div class="col-md-6">
                    <h6 style="margin-left:10px;margin-top:-50px;"><STRONG>Date d'impression:</STRONG>&nbsp;<?php echo (date('d-m-Y'));?></h6> 
                </div>
               
          
		</div>
        

        
	</div>
				</div>

              			

<div class="text-right">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer le quitus</button> 
        </div>
        <div class="text-left" style="margin-top:-40px;">
                    <a role="button" class="btn btn-primary" href="verif_auto.php">retour </a>
                   </div>   	
</main>
    </section>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
   
</body>
</html>
<?php }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page! </h3>
    <?php }

?>								
						