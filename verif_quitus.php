<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7" or $_SESSION['cat']=="5")){
include('connexion.php');
$r="SELECT  DATE_ADD(date_fin,INTERVAL 30 DAY) AS date_fin,type,id_date FROM date_fin WHERE type=2 order by id_date DESC";

    $datedebu=mysqli_query($link,"SELECT * FROM date_debut WHERE type=2 ORDER BY id_date_debut DESC");
$datedeb=mysqli_fetch_array($datedebu);

    //parcourir les données de la table date_fin    
    $req = mysqli_query($link,$r);
    $dat=mysqli_fetch_array($req);
    $dateJ=date('Y-m-d');

    //Verification de la date de prinscription
    if($dat['date_fin'] < $dateJ){ ?>
        <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, les inscriptions sont d&eacute;ja ferm&eacute;es!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
        <?php }elseif($datedeb['date_debut']> $dateJ) {?>
            <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, les inscriptions n'ont pas encore debuté<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
       <?php }

        else{
            
             $d =date('Y');
             $dd=$d+1;
             //$ddd=$d-1;
             //$anneee = $ddd."-".$d;
            // $annee = $d."-".$dd;
            $annee = "2019-2020";
$m="";            
$t=0;
if(isset($_POST['submit'])){
    $_SESSION['annee']=$_POST['annee'];
    $t=1;
    if(!empty($_POST['quitus'])){
        
        $_SESSION['quitus']=$_POST['quitus'];
        $rec=mysqli_query($link,"SELECT * FROM post_inscription,quitus WHERE quitus.num_auto = post_inscription.num_auto   and quitus.num_quitus='".$_SESSION['quitus']."' and post_inscription.Annee='".$_SESSION['annee']."' and quitus.Annee='".$_SESSION['annee']."'  ");     
        $da=mysqli_fetch_array($rec);
        
        
      if(mysqli_num_rows($rec)==0){
        $t=0;
            $m="Ce numéro de quitus n'existe pas";
        
        }  
        elseif($da['matricule']==""){
            $t=0;
                $m="Cet etudiant n'a pas un parcours à l'UDC, C'est donc une nouvelle inscription";
            }  
            $SqL=mysqli_query($link,"SELECT * FROM inscription where mat_etud='".$da['matricule']."' and Annee='".$_SESSION['annee']."'");
            if(mysqli_num_rows($SqL)>0){
             $t=0;
             $m="Etudiant déjà inscrit au titre de l'année ".$_SESSION['annee'];
            }
       
}
         
    }else if (isset($_POST['ok'])){ 
        
        $rec=mysqli_query($link,"SELECT * FROM post_inscription,quitus WHERE quitus.num_auto = post_inscription.num_auto and num_quitus='".$_SESSION['quitus']."'    and post_inscription.Annee='".$_SESSION['annee']."' and quitus.Annee='".$_SESSION['annee']."'");     
        $da=mysqli_fetch_array($rec);

         
        $R=mysqli_query($link,"SELECT * FROM admission where matricule='".$da['matricule']."'");
        if(mysqli_num_rows($R)==0){
            $resul="Ajourné";
            $resultat=$resul;
            
        }else{
            $resul="Admis";
            $resultat=utf8_encode($resul);
            
        }
        $dA=mysqli_fetch_array($R);

       $dateJ=date('Y-m-d');
       //$date_J=date('Y-m-d H:i:s');
       mysqli_query($link,"UPDATE etudiant set NIN='".$da['nin']."',Tel_Etud='".$da['tel_mobile']."' where mat_etud='".$da['matricule']."' and Annee='".$_SESSION['annee']."'");
        $ins=$da['num_auto']."/".$_SESSION['annee'];
         
//mysqli_query($link,"INSERT INTO inscription (Num_Inscrip,NIN,Date_Inscrip,Mt_Regl_Inscrip,Date_Reg_Inscrip,code_depart,code_niv,Annee,mat_etud,Parour_Etud,Resultat,Session,Mention)
//values ('$ins','".$da['nin']."','".$dateJ."','".$da['droit']."','".$da['date_trans']."','".$da['code_depart']."','".$da['code_niv']."','$annee','".$da['matricule']."','Ancien','$resultat','".$dA['session']."','".$dA['mention']."')");



mysqli_query($link,"INSERT INTO inscription(Num_Inscrip,NIN,Date_Inscrip,Mt_Regl_Inscrip,Date_Reg_Inscrip,code_depart,code_niv,Annee,mat_etud,Parour_Etud,Resultat,Session,Mention)
values ('$ins','".$da['nin']."','".$dateJ."','".$da['droit']."','".$da['date_trans']."','".$da['code_depart']."','".$da['code_niv']."','".$_SESSION['annee']."','".$da['matricule']."','Ancien','$resultat','".$dA['session']."','".$dA['mention']."')");


    $rsd=mysqli_query($link,"SELECT * FROM departement where code_depart='".$da['code_depart']."'");
    $dat=mysqli_fetch_array($rsd);
    $depart=addslashes($dat['design_depart']);
    $code_fac=$dat['code_facult'];

    $rsdn=mysqli_query($link,"SELECT * FROM niveau where code_niv='".$da['code_niv']."'");
    $datn=mysqli_fetch_array($rsdn);
    $niveau=$datn['intit_niv'];
    
    
    $rsf=mysqli_query($link,"SELECT * FROM faculte where code_facult='$code_fac' ");
    $daf=mysqli_fetch_array($rsf);
    $facult=addslashes($daf['design_facult']); 
                              
   // $nationalite = $dat3['nationalite'];
    //$adresse =addslashes( $dat3['adresse_cand']);
   // $sexe = $dat3['sexe'];
    //$ile = $dat3['ile'];
  /*   $situation = $dat3['situation'];
    $enfant = $dat3['Nbr_enfants'];
    $serie = $dat3['serie'];
    $annee = $dat3['annee'];
    $mention = $dat3['mention']; */
    //$lieu_obt = addslashes($dat3['centre']);
  /*   $equiv_bac = $dat3['equiv'];
    $num_preins = $dat3['num_recu'];
    $date_preins = $dat3['datePrescript']; */
    $nom = addslashes($da['nom']);
    $prenom = addslashes($da['prenom']);
   // $date_naiss = $dat['date_naiss'];
    $lieu_naiss = addslashes($da['lieu_naiss']);
       
    mysqli_query($link,"INSERT INTO carte (matricule,nom,prenom,date_nais,lieu_nais,faculte,departement,niveau,annee,Photo)
values ('".$da['matricule']."','$nom','$prenom','".$da['date_naiss']."','$lieu_naiss','$facult','$depart','$niveau','".$_SESSION['annee']."','".$da['matricule']."')");


$_SESSION['mat_etud']=$da['matricule'];


           
            $t=0;
        
                    // header('location:verif_quitus.php');
                               header('location:fiche_renseign.php');

                 }
                
        
     
    

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
                    case 1:include('interfaces/superAdminRubrique.php'); break;
                    case 2:include('interfaces/administrationRubrique.php');break;
                    case 3:include('interfaces/agtScolariteRubrique.php'); break;
                    case 4:include('interfaces/scolariteRubrique.php'); break;
                    case 5:include('interfaces/desRubrique.php'); break;
                    case 6:include('interfaces/gestionnaireRubrique.php'); break;
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
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']//." "."SELECT * FROM niveau where code_niv='".$da['code_niv']."'"; ?></strong></h5>
       
        <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-80px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-80px;color:#00b185;"> Fin d'inscription : <?php echo $dat['date_fin'] ?></h5>
                </div>
            <div class="text-center mb-5">
            
                <?php
                //echo  "INSERT INTO inscription (Num_Inscrip,NIN,Date_Inscrip,Mt_Regl_Inscrip,Date_Reg_Inscrip,code_depart,code_niv,Annee,mat_etud,Parour_Etud,Resultat,Session,Mention)
//values ('$ins','".$da['nin']."','".$dateJ."','".$da['droit']."','".$da['date_trans']."','".$da['code_depart']."','".$da['code_niv']."','$annee','".$da['matricule']."','Ancien','$resultat','".$dA['session']."','".$dA['mention']."')";
               
                    if($t==0){?>
                    <h2 class="soft-title-2" style="color:#00b185;">Vérification du Quitus</h2>
                    <hr /><div style="margin-bottom:80px"></div>
                    <h5 align="center" style="color:red;"><?php echo $m?></h5>

            </div>
   
       
                <div class="row">
                <div class="col-12">
            
                <form action="verif_quitus.php" method="post">
                       
            
            
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        <div class="form-group col-md-4">
                            <input style="text-align:center;" type="text" name="quitus" class="form-control"  placeholder="Saisir le Numéro du quitus" required> 
                        </div>

                    </div>
                    <!--<div class="form-row ">-->
                    <div class="form-group col-md-4" style="margin-top:auto;margin-left:320px;">
                            <?php $query=mysqli_query($link,"SELECT * FROM annee order by id_annee desc"); ?>
                            <select name="annee" class="form-control">
                                        <?php while($data=mysqli_fetch_array($query)){?>
                                            <option value="<?=$data['Annee']?>"><?=$data['Annee']?></option>
                                        <?php }?>
                            </select><br>
                        </div>
                        
                   <!-- </div>-->
                          
                     
                        <div class="text-center">
                        <button name="submit" type="submit" class="btn btn-primary">Rechercher</button>

                        <!-- <div class="text-left" style="margin-top:-40px;">
                    <a role="button" class="btn btn-primary" href="verif_quitus.php">retour </a> -->
                   </div>  
                       </div>
                       </form>
                </div>
                </div>


                       
               <?php }else if($t==1){
                   ?>
              

            <div class="row">
                <div class="col-12">
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Matricule:&nbsp;&nbsp;<b><?php echo $da['matricule'] ?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Nin :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $da['nin']?></b></h5>
                        </div>
                    </div>
                    <?php 
                    $rsd=mysqli_query($link,"SELECT * FROM departement where code_depart='".$da['code_depart']."' ");
        $dat=mysqli_fetch_array($rsd);
        $depart=$dat['design_depart'];
      
        $rst=mysqli_query($link,"SELECT * FROM niveau where code_niv='".$da['code_niv']."' ");
        $dataS=mysqli_fetch_array($rst);
        $niv=$dataS['intit_niv'];
        ?>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Niveau:&nbsp;&nbsp;<b><?php echo (utf8_encode(($niv))); ?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Département :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo (utf8_encode($depart)); ?></b></h5>
                        </div>
                       
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Nom :&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo (utf8_encode(($da['nom']))) ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Pr&eacute;nom :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo (utf8_encode(($da['prenom'])));?></b></h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Date de naissance : <b><?php echo $da['date_naiss']  ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Lieu de naissance :&nbsp;&nbsp;<b><?php echo (utf8_encode(($da['lieu_naiss'])));?></b></h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>&nbsp; &nbsp;&nbsp;</h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>&nbsp;&nbsp;</h5>
                        </div>
                    </div>
                    <!--div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Serie:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? //echo $data['serie']  ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Mention:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? //echo $data['mention']  ;?></b></h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Ann&eacute;e d obtention du bac:&nbsp; <b><? //echo $data['annee'] ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>N° d'attestation: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? //echo $data['num_attest'];?></b></h5>
                        </div>
                    </div-->
                </div>
            </div>
           
              <?php 
              
           
                ?>
         
            <form action="verif_quitus.php" method="POST">
           <!--  <?php
           // $req=mysqli_query($link,"SELECT * FROM post_inscription WHERE num_auto='$auto'");
            //if(mysqli_num_rows($req)>0){
               //$data= mysqli_fetch_array($req);
            ?> -->
                
               

                <input type="hidden" name="num_quitus" value=<?php echo $da['num_quitus'] ;?> >
                        <div class="text-right">
                          <button name="ok" type="submit" class="btn btn-primary">Ok</button>
                        </div>
            <?php// } ?>
                        </form>
              <?php 
              
            }
        }
                ?>
                <?php  }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
    <?php } ?>

       
        </main>
               

             <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
   
</body>
</html>
