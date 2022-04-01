<?php 
   session_start();
   if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
   if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7" or $_SESSION['cat']=="3")){
    include("connexion.php");
    $maintenant=time();

    $r=mysqli_query($link,"SELECT  date_fin FROM date_fin order by id_date DESC");
$dat = mysqli_fetch_array($r); 
if(isset($_POST['nin'])){
    $ni=$_POST['nin'];
    $annee=$_POST['annee'];
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
                 $data=mysqli_fetch_array($requete); 
                 $an=date('Y');
                    $d = date('Y');
                    $dd=$d+1;
                    
                    $a = $d."-".$dd; 

                    $rt=mysqli_query($link,"SELECT * FROM post_inscription where nin='".$ni."' and Annee='$annee'");
         if(mysqli_num_rows($rt)>0){
        while( $tata=mysqli_fetch_array($rt)){

            

               
                        
                        
                   
    
$var1 = $tata['code_facult'];

$req1 =mysqli_query($link,"SELECT * FROM faculte where code_facult='$var1' ");
$fac = mysqli_fetch_array($req1);

$var2 = $tata['code_depart'];

$req2 =mysqli_query($link,"SELECT * FROM departement where code_depart='$var2' ");
$dep = mysqli_fetch_array($req2);

$var3 = $tata['code_niv'];

$req3 =mysqli_query($link,"SELECT * FROM niveau where code_niv='$var3' ");
$niv = mysqli_fetch_array($req3);

$nom = utf8_encode($tata['nom']);
   




                 ?>
         <div id='sectionAimprimer' >
        <div id='sectionAimprimer' style="border:1px solid black;height:330; width:820px; margin:40px;padding:4px; "> 
    
            <div class="row">
                    
                <div class="col-md-3"><img src="assets/img/udc.png" width="50%" height="100"></div>
                <div class="col-md-9">
                    <h3 style="margin-left:20px"><STRONG>UNIVERSITE DES COMORES</STRONG></h1>
                    <h4 style="margin-left:-70px"><strong>DIRECTION DES ETUDES ET DE LA SCOLARITE</h1>
                    <h4 style="margin-left:20px;margin-bottom:20px;margin-top:20px;font-family:Arial Rounde MT Bold"><strong>AUTORISATION DE PAIEMENT</strong></h5> 
                    
                </div>    
            </div>

            <h5 style="margin-left:10px;margin-top:10px">Le Directeur des Etudes et de la Scolarité, soussigné, autorise</h6>

<div class="row" style="margin-top:5px">
    <div class="col-md-4">
            
    </div>
    <div  class="col-md-8" >
        <div class="row">
        <div class="col-12">

        <div class="form-row" style="margin-top:10px">

         <div class="form-group col-md-6" >
         <h6 style="margin-left:-200px;margin-bottom:-15px"> <b> Numéro d'autorisation:&nbsp;<?php echo stripslashes($tata['num_auto']);?></h5></b></h6><br>
         </div>
         </div>
        
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-6">
            <h6 style="margin-left:-200px">Nom:<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo stripslashes(utf8_encode($nom));?></h5></b></h6>
         </div>
         <div class="form-group col-md-6">
            <h6 style="margin-left:-50px">Pr&eacute;nom:<b>&nbsp;&nbsp;&nbsp;<?php echo stripslashes(utf8_encode($tata['prenom']));?></h5></b></h6>
         </div>
     </div>
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-12">
             <h6 style="margin-left:-200px">Né le:<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($tata['date_naiss']); ?></b>&nbsp;&nbsp;à &nbsp;&nbsp;<b><?php echo stripslashes(utf8_encode($tata['lieu_naiss']));?></b></h5></b></h6>
         </div>
        
     </div>
     <div class="form-row">

         <div class="form-group col-md-6" >
         <h6 style="margin-left:-200px">NIN:<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo stripslashes($tata['nin']);?></h5></b></h6>
         </div>
         <div class="form-group col-md-6">
            <?php 
                    if(empty($tata['matricule'])){?>
                        <h6 style="margin-left:-50px">N° de reçu:<b><?php echo $data['num_recu'];?></h5></b></h5>
            <?php }else{ ?>
                
                <h6 style="margin-left:-50px">Matricule:<b>&nbsp;<?php echo $tata['matricule'];?></h5></b></h5>
                <?php }
            ?>    
       </div>
       </div>
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-12">
         <h6 style="margin-left:-200px">Pr&eacute;inscrit au titre de l'année:<b>&nbsp;&nbsp;<?php echo "2020-2021" ;?></h5></b></h5>

         </div>
         
     </div>
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-12">
         <h6 style="margin-left:-200px">Composante:<b>&nbsp;&nbsp;<?php echo (utf8_encode($fac['design_facult'])) ;?></h5></b></h5>               
         </div>
        
     </div>
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-12">
         <h6 style="margin-left:-200px">Département:<b>&nbsp;&nbsp;<?php echo (utf8_encode($dep['design_depart'])) ;?></h5></b></h5>
         </div>
        
     </div>
     <div class="form-row" style="margin-top:-40px">
*         <div class="form-group col-md-12" >
         <h6 style="margin-left:-200px">Niveau:<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo (utf8_encode($niv['intit_niv'])) ;?></b></h6>
         </div>        
        
     </div>
     </div>
</div>
          
                <h5 style="margin-left:-260px;margin-top:-10px">à verser à la SNPSF: </h5><br>
                <h6 style="margin-left:-260px;margin-top:-20px">-<strong><?php echo (utf8_encode($tata['droit']))." (".(utf8_encode($tata['droit_lettre'])).")" ;?></strong> de frais d'inscription au compte CPP  368705/02(UDC)</h6><br>
                <h6 style="margin-left:-260px;margin-top:-20px">-<strong>2 500 KMF (Deux mille cinq cent Francs Comoriens)</strong> de frais de mutuelle de santé au compte CPP  501 270/07 - 414 452/16(UESCO)</h6>
                
             </div>
            
          
                
        <div class="row">
            <div class="col-md-3">
                <h6 style="margin-left:20px;margin-top:20px;"> Signature:</h6> 
            </div>
            <div class="col-md-3">
                <h6 style=" margin-left:-10px;margin-top:110px;" ><b><?php echo ucwords(utf8_encode($_SESSION["nom"]))." ". ucwords(utf8_encode($_SESSION["prenom"])) ?></b></h6> 
            </div>
            <div class="col-md-3" >
                <img src="./assets/img/signature.PNG"  alt="profile image" style="margin-left:60px">
            </div>
            <div style="margin-left:0px"  class="col-md-3">
                <h6  style="margin-left:-60px;margin-top:120px;" ><strong>Ben Ousseni MOHAMED</em></h6>
            </div>
     
                </div>
                <div class="row" style="margin-top:-25px;">
                <div class="col-md-12">
                <h6 style="margin-left:15px;margin-top:20px;margin-bottom:0px;"><STRONG>Date d'impression:</STRONG>&nbsp;<?php echo (date('d/m/Y'));?></h6> 

                </div>

            
    </div>
        </div>
        <!-- <h6 style="margin-left:150px;margin-top:60px"><STRONG>MOHAMED Ben Osseini</STRONG></h6> -->
        

        
    </div>
                </div>

                        
                </div> 


<div class="text-right">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer l'autorisation</button> 
        </div>
        
                    <?php 
                           }     
                            }else{ 
                                $message="Cette personne n'a pas d'autorisation"  ;
                                ?>
                            <h4 align="center" style="color:red;margin-bottom:20px"><?php echo $message ?></h4>
                            <div class="text-center" style="margin-top:40px;">
                    <a role="button" class="btn btn-primary" href="recherche_ins.php">Réssayer</a>
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
						