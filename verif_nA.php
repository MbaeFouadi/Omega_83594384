<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7" or $_SESSION['cat']=="5")){
include('connexion.php');
$r="SELECT  date_fin FROM date_fin order by id_date DESC";

    $req = mysqli_query($link,$r);
    $data=mysqli_fetch_array($req);
    $dateJ=date('Y-m-d');
    if($data['date_fin'] < $dateJ ){ ?>
        <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, les pr&eacute;inscriptions sont d&eacute;ja ferm&eacute;es !<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
        <?php }else {
$t=0;
if(isset($_POST['submit'])){
    $t=1;
    if(!empty($_POST['quitus'])){
        $quitus=$_POST['quitus'];
        
        $rec=mysqli_query($link,"SELECT * FROM post_inscription,quitus WHERE post_inscription.num_auto=quitus.num_auto and num_quitus= '".$quitus."'");     
        $da=mysqli_fetch_array($rec);
        //$_SESSION['quitus']=$quitus;
        $h= date('Y');
        $nin=$da['nin'];
        $tt = date('Y')+1;
        $annee = $h."-".$tt;  
        $code_niv=$da['code_niv'];
        $sql1="SELECT * FROM niveau where code_niv='".$da['code_niv']."'";
        $resultat2 = mysqli_query($link,$sql1);
        $data1 = mysqli_fetch_array($resultat2); 
        $rec=mysqli_query($link,"SELECT * FROM quitus WHERE trans_udc='".$_POST['droit']."'");
        
       /*  if(mysqli_num_rows($rec)=!0){
            $m="Le numero de transaction correspondant au droit d'inscription est déjà utilisé";
        }   */
        //$d=mysqli_fetch_array($re);
        $niveau=$d['intit_niv'];
        
        $_SESSION['quitus']=$quitus;
        $req=mysqli_query($link,"SELECT * FROM quitus WHERE num_quitus='$quitus'");
       
    $SqL=mysqli_query($link,"SELECT * FROM inscription where mat_etud='".$da['matricule']."'");
    $SqL9=mysqli_fetch_array($SqL);

     
    if(mysqli_num_rows($SqL)>0){
     $t=0;
     if($SqL9['Annee']==$annee){
        $m="Etudiant déjà inscrit au titre de l'année ".$annee;
        
     }else{
        $m="Cet etudiant a déjà un parcours à l'UDC, C'est donc une ré-inscription ";
    }  
     }
     if(mysqli_num_rows($req)>0){
           $data= mysqli_fetch_array($req);
           
    }else{ $t=0;
        $m="Ce quitus n'existe pas!";
    }
    }
}
         
     if (isset($_POST['ok'])){ 

        $_SESSION['quitus']=$quitus;
        $quitus=$_POST['quitus'];
        $rec=mysqli_query($link,"SELECT * FROM post_inscription,quitus WHERE post_inscription.num_auto=quitus.num_auto and num_quitus= '".$quitus."'");     
        $dat=mysqli_fetch_array($rec);
        $nin = $dat['nin'];
        $nom = $dat['nom'];
        $prenom = $dat['prenom'];
        $date_naiss = $dat['date_naiss'];
        $lieu_naiss = $dat['lieu_naiss'];
        $code_niv = $dat['code_niv'];
        $code_depart = $dat['code_depart'];
        $tel = $dat['tel_mobile'];
        $date_reg_ins = $dat['date_trans'];
       
  
        $d = date('Y');
        $dd = date('Y')+1;
        $annee_univ = "$d-$dd";
        $anneee = $d."-".$dd;  
  $ins=$dat['num_auto']."/".$anneee;
         
         $req =mysqli_query($link,"SELECT * FROM etudiant ORDER BY date_j DESC LIMIT 0,1"); 

          $n = mysqli_fetch_array($req);
         $dernier = intval($n['mat_etud']);
         $dernier++;
         $mat = (string) $dernier;
         $mat=$dernier++;
        
        

         $req3 = mysqli_query($link,"SELECT * FROM candidats WHERE nin='$nin'");
         $dat3 = mysqli_fetch_array($req3);

         
         $nationalite = $dat3['nationalite'];
         $adresse = $dat3['adresse_cand'];
         $sexe = $dat3['sexe'];
         $ile = $dat3['ile'];
         $situation = $dat3['situation'];
         $enfant = $dat3['Nbr_enfants'];
         $serie = $dat3['serie'];
         $annee = $dat3['annee'];
         $mention = $dat3['mention'];
         $lieu_obt = $dat3['centre'];
         $equiv_bac = $dat3['equiv'];
         $num_preins = $dat3['num_recu'];
         $date_preins = $dat3['datePrescript'];
         $date = date('Y-m-d h:i:s');
         $dateJ=date('Y-m-d');

         $R=mysqli_query($link,"SELECT * FROM admission where matricule='".$da['matricule']."'");
         $dA=mysqli_fetch_array($R);
         
         if(mysqli_num_rows($R)==0){
            $resul="Ajourné";
            $resultat=utf8_encode($resul);
            
        }else{
            $resul="Admis";
            $resultat=utf8_encode($resul);
            
        }
        $RSML=mysqli_query($link,"SELECT * FROM inscription where NIN='".$da['nin']."' and Annee='=$annee' ");
        if(mysqli_num_rows($RSML)==0){
            mysqli_query($link,"INSERT INTO etudiant (mat_etud,nin,nom,prenom,date_naiss,lieu_naiss,nationalite,sexe,Adr_Etud,Tel_Etud,ile,situat_familliale,nbr_enfants,serie_bac,mention_bac,annee_bac,lieu_obt_bac,eqv_bac,code_niv,code_depart,Num_preinscr,Date_preinscr,An_Univ,date_j)
            values ('$mat','$nin','$nom','$prenom','$date_naiss','$lieu_naiss','$nationalite','$sexe','$adresse','$tel','$ile','$situation','$enfant','$serie','$mention','$annee','$lieu_obt','$equiv_bac','$code_niv','$code_depart','$num_preins','$date_preins','$annee_univ','$date')"); 
        }

       
mysqli_query($link,"INSERT INTO inscription (Num_Inscrip,NIN,Date_Inscrip,Mt_Regl_Inscrip,Date_Reg_Inscrip,code_depart,code_niv,Annee,mat_etud,Parour_Etud,Resultat,Session,Mention)
values ('$ins','".$dat['nin']."','".$dateJ."','".$dat['droit']."','$date_reg_ins','".$dat['code_depart']."','".$dat['code_niv']."','$annee_univ','$mat','Nouveau','$resultat','".$dA['session']."','".$dA['mention']."')");

         $message = 'Reussi';   
         $mes='MERCI'; 
         $rsd=mysqli_query($link,"SELECT * FROM departement where code_depart='".$dat['code_depart']."'");
         $dat=mysqli_fetch_array($rsd);
         $depart=$dat['design_depart'];
         $code_fac=$dat['code_facult'];
     
         $rsdn=mysqli_query($link,"SELECT * FROM niveau where code_niv='".$dat['code_niv']."'");
         $datn=mysqli_fetch_array($rsdn);
         $niveau=$datn['intit_niv'];
         
         
         $rsf=mysqli_query($link,"SELECT * FROM faculte where code_facult='$code_fac' ");
         $daf=mysqli_fetch_array($rsf);
         $facult=$daf['design_facult']; 
                                   
            
         mysqli_query($link,"INSERT INTO carte (matricule,nom,prenom,date_nais,lieu_nais,faculte,departement,niveau,annee,Photo)
     values ('$mat','$nom','$prenom','$date_naiss','$lieu_naiss','$facult','$depart','$niveau','$annee_univ','$mat')");
     
     
     $_SESSION['mat_etud']=$mat;
    header('location:fiche_renseign.php');        
                     
                 }
                 else{
                    $mes='merci';
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
        <h4 align="right"><strong><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']//." "."SELECT * FROM inscription where NIN='".$da['nin']."'"." "."INSERT INTO inscription (Num_Inscrip,NIN,Date_Inscrip,Mt_Regl_Inscrip,Date_Reg_Inscrip,code_depart,code_niv,Annee,mat_etud,Parour_Etud,Resultat,Session,Mention)
//values ('$ins','".$da['nin']."','".$dateJ."','".$dat['droit']."','$date_reg_ins','".$dat['code_depart']."','".$dat['code_niv']."','$annee_univ','$mat','Nouveau','$resultat','".$dA['session']."','".$dA['mention']."')"?> </strong></h4>
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
       
        <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-80px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-80px;color:#00b185;"> Fin Inscriptions : <?php //echo $dat['date_fin']." "."INSERT INTO inscription (Num_Inscrip,NIN,Date_Inscrip,Mt_Regl_Inscrip,Date_Reg_Inscrip,code_depart,code_niv,Annee,mat_etud,Parour_Etud,Resultat,Session,Mention)
//values ('$ins','".$dat['nin']."','".$dateJ."','".$dat['droit']."','$date_reg_ins','".$dat['code_depart']."','".$dat['code_niv']."','$annee_univ','$mat','Nouveau','$resultat','".$dA['session']."','".$dA['mention']."')" ?></h5>
                </div>
            <div class="text-center mb-5">
            
                <?php
               
               
                    if($t==0){?>
                    <h2 class="soft-title-2" style="color:#00b185;"> Verifier un quitus</h2>
                    <hr /><div style="margin-bottom:80px"></div>
                    <h5 style="color:red;"><?php echo $m ?></h5>

            </div>
                
                <div class="row">
                <div class="col-12">
            
                <form action="verif_n.php" method="POST">
                       
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        <div class="form-group col-md-4">
                            <input style="text-align:center;" type="texte" name="quitus" class="form-control"  placeholder="Saisir le Numéro du quitus" required> 
                        </div>

                    </div>
                          
                     
                        <div class="text-center">
                        <button name="submit" type="submit" class="btn btn-primary">Rechercher</button>
                       </div>
                       </form>
                </div>
                </div>


                       
               <?php }else if($t==1){
                   $s=2;?>
              

            <div class="row">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Nin :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? echo $da['nin']?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Niveau:&nbsp;&nbsp;<b><? echo utf8_encode($data1['intit_niv']) ?></b></h5>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Nom :&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><? echo utf8_encode($da['nom']) ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Pr&eacute;nom :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? echo utf8_encode($da['prenom']);?></b></h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Date de naissance : <b><? echo $da['date_naiss']  ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Lieu de naissance :&nbsp;&nbsp;<b><? echo utf8_encode($da['lieu_naiss']);?></b></h5>
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
                    
                </div>
            </div>
           
              <?php 
              
           
                ?>
         
            <form action="verif_n.php" method="POST">
            <?php
            $req=mysqli_query($link,"SELECT * FROM post_inscription,quitus WHERE post_inscription.num_auto=quitus.num_auto and num_quitus= '".$_POST['quitus']."'");
            if(mysqli_num_rows($req)>0){
               $data= mysqli_fetch_array($req);
            ?>
                <input type="hidden" name="code_niv" value=<?php echo $data['code_niv'] ;?> >
               <input type="hidden" name="quitus" value=<?php echo $data['num_quitus'] ;?> >

                <input type="hidden" name="num_auto" value=<?php echo $data['num_auto'] ;?> >
                        <div class="text-right">
                          <button name="ok" type="submit" class="btn btn-primary">Ok</button>
                        </div>
            <?php } ?>
                        </form>
              <?php 
              
            }
                ?>
                <?php }  }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
    <?php } ?>

                
        </main>

             <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
   
</body>
</html>
