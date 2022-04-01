<?php 
session_start();
   if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="9")){
    include("connexion.php");
    $maintenant=time();

    $r=mysqli_query($link,"SELECT  date_fin FROM date_fin order by id_date DESC");
    $dat = mysqli_fetch_array($r); 

  
    $annee=mysqli_query($link,"SELECT * FROM annee order BY id_annee DESC");
    $an=mysqli_fetch_array($annee);
    $sqr= mysqli_query($link,"SELECT etudiant.nom as nom,etudiant.prenom as prenom,etudiant.mat_etud as mat_etud,inscription.code_depart as code_depart , inscription.code_niv as code_niv, etudiant.Fac as Fac,inscription.Annee as Annee,etudiant.date_naiss as date_naiss, etudiant.lieu_naiss as lieu_naiss,faculte.design_facult as design_facult, faculte.code_facult as code_facult, departement.code_depart as code_depart from etudiant,inscription,departement,faculte where etudiant.mat_etud=inscription.mat_etud  AND inscription.code_depart=departement.code_depart and  departement.code_facult=faculte.code_facult AND inscription.Annee='".$_SESSION['annee']."' AND etudiant.mat_etud = '".$_SESSION['matricule']."' ORDER BY inscription.NIN DESC") or die(mysqli_error($link));
    $sqr1=mysqli_fetch_array($sqr);
    $facu=mysqli_query($link,"SELECT * FROM faculte where design_facult= '".$sqr1['design_facult']."'");
    $fac = mysqli_fetch_array($facu);
    $depart=mysqli_query($link,"SELECT * FROM departement where code_depart LIKE '".$sqr1['code_depart']."'");
    $dep = mysqli_fetch_array($depart);
    $niveau=mysqli_query($link,"SELECT * FROM niveau where code_niv= '".$sqr1['code_niv']."'");
    $niv= mysqli_fetch_array($niveau);

 
    
     
         
  
 
	

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
    <style>
    /* h6{
        font-size: 40px;
    } */
    </style>
	
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
                    case 9:include('interfaces/secretariatRubrique.php'); break;
                    
                    }
                ?>
                 <li class="bord"><a href="profil.php"><i class="icon-user"></i> &nbsp; <span class="nav-item-text">Changer mon mot de passe</span></a></li>
                        
                        <li><a href="deconnexion.php"><i class="icon-logout"></i> &nbsp; <span class="nav-item-text">Déconnexion</span></a></li>
                     
                 </ul>       
            </nav>
        </aside>
        <main class="main-content">
        <h4 align="right"><strong><?php  echo utf8_encode($_SESSION['prenom'])." ".utf8_encode($_SESSION['nom'])?> </strong></h4>
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  utf8_encode($_SESSION['libelle']); ?></strong></h5>
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-50px;"> <?php echo (date('d-m-Y'))?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-50px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
                </div>
                <div id='sectionAimprimer'><br>
                    <div class="container" style="border:5px solid black">
                        <div class="row">
                            <div class="col-md-3" ></div>
                            <div style="margin-left:-5px"  class="col-md-9"><br><br>
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
                                <img src="./assets/img/udc.png" alt="profile image" class="w-50" height="100px" width="100px" style="margin-left:125px">
                            </div>
                            <div style="margin-left:-5px"  class="col-md-9">
                                <strong><div style="margin-left:100px">...............................................</div></strong>
                                <h4  style="margin-left:50px;margin-top:10px;" ><strong>UNIVERSITE DES COMORES</em></h4>
                            </div>
                        </div><br>
                        <div class="row" style="margin-top:10px">
                            <div class="col-md-2"></div>
                            <div  class="col-md-10" >
                                <h5 style="margin-right:80px;">SECRETARIAT GENERAL DE L'UNIVERSITE DES COMORES</h5> <br><br>
                                <h4  style="margin-left:90px;"> <strong  style="border-bottom:1px solid black;">CERTIFICAT DE SCOLARITE<br></strong></h4>
                                
                                <!-- <h4 style="margin-left:130px;margin-bottom:30px;font-family:Arial black">Numéro d'inscription:&nbsp;<strong><?// echo stripslashes($rer['num_auto']);?><br></strong></h4> -->
                                </div>
                        </div>
                <div class="text-center mb-5">
				</div>
                        <h6>N° 22__________/UDC/<?php if($_SESSION['sg']==1){ echo "SG"; } else{  echo "SGA"; } ?>/SS</h6>
                        <p style="font-size: 17px;">Le <?php if($_SESSION['sg']==1){ echo "Secretaire Général"; } else{  echo "Secretaire Général Adjoint"; } ?> de l’Université des Comores certifie  que l’étudiant(e):</p>
                        <div class="row" style="text-align: justify;">
                            <div class="col-md-2"><h5>Nom:</h5></div>
                            <div class="col-md-2"><p style="font-size: 20px;"><?= utf8_encode($sqr1['nom'])?></p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><h5>Prenom:</h5></div>
                            <div class="col-md-2"><p style="font-size: 20px;"><?= utf8_encode($sqr1['prenom'])?></p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><h4>Né(e) le:</h4></div>
                            <div class="col-md-10"><p style="font-size: 20px;"><?php echo $sqr1['date_naiss']." à ".utf8_encode($sqr1['lieu_naiss'])?></p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><h4>Matricule:</h4></div>
                            <div class="col-md-2"><p style="font-size: 20px;"><?=$sqr1['mat_etud']?></p></div>
                        </div>
                        <?php if ($_SESSION['annee']==$an['Annee'] ){?>
                        	<p style="font-size: 20px;">Est inscrit(e) au titre de l’année universitaire :<?=$_SESSION['annee']?> </p>
                       <?php }
                       else{?>
                       		<p style="font-size: 20px;">A été inscrit au titre de l’année universitaire :<?=$_SESSION['annee']?> </p>
                       <?php } ?>
                        
                        <h4><?=utf8_encode($fac['design_facult'])?></h4>
                        <div class="row">
                            <div class="col-md-2"><h4>Departement:</h4></div>
                            <div class="col-md-10"><p style="font-size: 20px;"><?=utf8_encode($dep['design_depart'])?></p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><h4>Niveau:</h4></div>
                            <div class="col-md-2"><p style="font-size: 20px;"><?=utf8_encode($niv['intit_niv'])?></p></div>
                            <div class="col-md-2"><h4>Cycle:</h4></div>
                            <div class="col-md-3"><p style="font-size: 20px;"><?=utf8_encode($niv['Cycle'])?> Cycle</p></div>
                        </div>

                        <h5 style="margin-left: 10px;"> Ce  certificat est établi pour servir et valoir ce que de droit.</h5><br><br><br>
                        <p style="text-align: center; font-size:21px">Fait à Moroni, le <?php echo (date('d/m/Y'))?></p><br><br><br><br>
                        <p style="text-align: center; font-size:21px"> <?php if($_SESSION['sg']==1){ echo "Dr AHAMADA SALIMOU"; } else{  echo "Mouigni Hamza SAID ISSIMAILA"; } ?></p><br><br><br>
                <hr>
                        <p style="text-align: center; font-size:12px;">Clamer que le chemin est long ne le raccourcit pas, le raccourcir c'est faire un pas en avant<br>
                        <span class="text-align:center">Udombowandziyakeyishashihayowushashihawurengawusoni</span><br>
                        Université des Comores , rue de Mavingouni BP 2585 Moroni- Tel:+269,7739023-7734243 Email:contact@univ-comores.km<br>
                        <span class="text-align:center">Email:univ-com@comorestelecom.km</span>
                        </p>
                        
                    
                    
              

 
                </div>

</div>
             
    
</div>


</div>

</div>


</div>
</div><br>

<div class="text-right">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer la fiche</button> 
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
<?php }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page! </h3>
    <?php }

?>								
						