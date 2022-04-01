<?php 
   session_start();
   if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
   if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="5")){
    include("connexion.php");
    $maintenant=time();

    $r=mysqli_query($link,"SELECT  date_fin FROM date_fin order by id_date DESC");
$dat = mysqli_fetch_array($r); 
if(isset($_POST['nin'])){
    $mat=$_POST['nin'];
    }
    else{
        $mat=null;
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
                 
                 /*$an=date('Y');
                    $d = date(Y);
                    $dd=$d+1;*/
                    
                    //$a = $d."-".$dd; 
                    //$a = "2019-2020";
                    $que=mysqli_query($link,"SELECT * FROM annee ORDER BY id_annee DESC");
                    $xD=mysqli_fetch_array($que);
                    $a=$xD['Annee'];
                    $requete = mysqli_query($link,"SELECT * FROM etudiant where  mat_etud= '".$mat."' ");
         if(mysqli_num_rows($requete)>0){
        while( $rer=mysqli_fetch_array($requete)){

            
            
               
                        
                        
                   
    

   




                 ?>
                    
                    <div id='sectionAimprimer'>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3" ></div>
                            <div style="margin-left:-5px"  class="col-md-9">
                                <h3 style="margin-left:40px" ><strong>UNION DES COMORES</strong></h3>
                                <h6 style="margin-left:70px" ><em>Unité-Solidarité-Dévéloppement</em> </h6>
                                <div style="margin-left:100px">...........................................</div>
                                <h5 style="margin-left:10px" >MINISTRE DE L'EDUCATION NATIONALE</h5>
                                <h5 style="margin-left:-80px"> DE L'ENSEIGNEMENT ET DE LA RECHERCHE SCIENTIFIQUE</h5>
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
                                <h4  style="margin-left:-30px"> <strong>FICHE DE RENSEIGNEMENT<br></strong></h4></h5>
                                <!-- <h4 style="margin-left:130px;margin-bottom:30px;font-family:Arial black">Numéro d'inscription:&nbsp;<strong><?// echo stripslashes($rer['num_auto']);?><br></strong></h4> -->
                                </div>
                        </div>
                        
                    <div class="row">
                        <div class="col-12">
                            <div class="form-row" style="margin-top:-10px;">
                                <div class="form-group col-md-6">
                                </div>
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                            
                            <div class="form-row" style="margin-top:-10px;">
                                <div class="form-group col-md-12">
                                    <h5 style="margin-bottom:20px;">&nbsp; &nbsp;&nbsp;Matricule :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo utf8_encode($rer['mat_etud']) ;?></b></h6>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top:-10px;">
                                <div class="form-group col-md-12">
                                    <h5 style="margin-bottom:20px;">&nbsp; &nbsp;&nbsp;NIN :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo utf8_encode($rer['NIN']) ;?></b></h6>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top:-10px;">
                                <div class="form-group col-md-12">
                                    <h5 style="margin-bottom:20px;">&nbsp; &nbsp;&nbsp;Nom:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo (utf8_encode( $rer['nom'])) ;?></b></h6>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top:-10px;">
                                <div class="form-group col-md-12">
                                    <h5 style="margin-bottom:20px;">&nbsp; &nbsp;&nbsp;Prénom: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo (utf8_encode($rer['prenom'])) ;?></b></h6>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top:-10px;">
                                <div class="form-group col-md-12">
                                    <h5 style="margin-bottom:20px;">&nbsp; &nbsp;&nbsp;Date de naissance: &nbsp; <b><?php echo utf8_encode($rer['date_naiss']) ;?></b></h6>
                                </div>
                                
                            </div>
                            <div class="form-row" style="margin-top:-10px;">
                                <div class="form-group col-md-12">
                                <h5 style="margin-bottom:20px;">&nbsp; &nbsp;&nbsp;Lieu de naissance: &nbsp;&nbsp;&nbsp;<b><?php echo (utf8_encode($rer['lieu_naiss']));?></b></h6>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <h4 style="margin-left:10px;margin-top:10px;"  align="center"><STRONG>Parcours  de <?php echo (utf8_encode($rer['nom']))." ".(utf8_encode($rer['prenom'])) ?> à l'UDC</STRONG>&nbsp;</h4> 

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Composante</th>
                                    <th scope="col">Département</th>
                                    <th scope="col">Niveau</th>
                                    <th scope="col">Année Universitaire</th>
                                
                                </tr>
                            </thead>

                            <?php 
                             
                                $rst=mysqli_query($link,"SELECT * FROM niveau,inscription,departement,faculte where inscription.code_niv=niveau.code_niv and inscription.code_depart=departement.code_depart and departement.code_facult=faculte.code_facult and inscription.mat_etud='".$mat."' order by Annee desc ");
                                //$dataS=mysqli_fetch_array($rst);
                               
                            while ($dataS=mysqli_fetch_array($rst)) {
                                
                                $niv=$dataS['intit_niv'];
                                
                                $facult=$dataS['design_facult'];
                                $depart=$dataS['design_depart'];
                                $annee=$dataS['Annee'];

                               
                              
                               /*  $rsd=mysqli_query($link,"SELECT * FROM departement where code_depart='".$rer['code_depart']."'");
                                $dat=mysqli_fetch_array($rsd);
                                $depart=$dat['design_depart'];
                                $code_fac=$dat['code_facult'];
                                
                              
                                $rsf=mysqli_query($link,"SELECT * FROM faculte where code_facult='$code_fac' ");
                                $daf=mysqli_fetch_array($rsf);
                                $facult=$daf['design_facult']; */
                              
                                ?>

                            <tbody>
                                <tr>
                                    <td><?php echo (utf8_encode($facult)); ?></td>
                                    <td><?php echo (utf8_encode($depart)); ?></td>
                                    <td><?php echo (utf8_encode($niv)); ?></td>
                                    <td><?php echo $annee ?></td>
                                
                                </tr>
                            </tbody>

                            <?php } ?>

                        </table>
                    </div>
                </div>
                            
                            
                </div>
<h2 style="font-family:Brush Script MT;margin-top:80px;"><b></b> Cette fiche est à signer et déposer à la DES pour obtenir la carte d'étudiant</h2>

</div>
             
    
</div>


</div>

</div>


</div>
</div>

<div class="text-right">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer la fiche</button> 
        </div>
        
                    <?php 
                           }     
                            }else{ 
                                $message="Cette personne n'a pas une fiche de renseignement"  ;
                                ?>
                            <h4 align="center" style="color:red;margin-bottom:20px"><?php echo $message ?></h4>
                            <div class="text-center" style="margin-top:40px;">
                    <a role="button" class="btn btn-primary" href="rech_fiche_renseign.php">Réssayer</a>
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
						