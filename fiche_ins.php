<?php 
   session_start();
   if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7")){
    include("connexion.php");
    $date=date('d/m/Y');

    $r=mysqli_query($link,"SELECT  date_fin FROM date_fin order by id_date DESC");
$dat = mysqli_fetch_array($r); 

$mat="";  

  //  if(isset($_SESSION['nin'])){
        //$nin= $_SESSION['nin'];
     //  }
    //$num_recu= $_SESSION["num_recu"];
    
   //header('location: recu.php');

// echo"l etudiant ".$_SESSION['bachelier']." existe son nin est".$_SESSION['nin'];

if(isset($_POST['submit'])){
   
    if(isset($_POST['pers'])){
        $per=$_POST['p'];
        $pers=$_POST['pers'];
        $_SESSION['periode']=$pers;
            $mat=$_POST['mat'];
            $nin=$_POST['nin'];
        }

    if($_SESSION['periode']==2){ 
    $mat=$_POST['mat'];
    $nin=$_POST['nin'];
    $tel=$_POST['tel'];
    $r=mysqli_query($link,"SELECT * FROM etudiant where mat_etud='$mat'");
    $data=mysqli_fetch_array($r);
    
   /*  if(isset($per)){}else{
        
    } */
    if(mysqli_num_rows($r)!=0){
        
        $req=mysqli_query($link,"SELECT * FROM admission where matricule='$mat'");
        if(mysqli_num_rows($req)!=0){
           
            $resultat="Admis";
            $rs=mysqli_query($link,"SELECT * FROM inscription where mat_etud='$mat' order by inscription.annee DESC");
            $datas=mysqli_fetch_array($rs);
            $niveau=$datas['code_niv'];
            $code_dep=$datas['code_depart'];
            switch ($niveau) {
                case 'N1':
                    $code="N2";
                    break;
                case 'N2':
                    $code="N3";
                    break;
                case 'N3':
                    $code="N4";
                    break; 
                case 'N4':
                    $code="N5";
                    break; 
                case 'P1':
                    $code="P2";
                    break;
                case 'P2':
                    $code="P3";
                    break;
                default:
                    $m="le niveau suivant n'est pas disponible";
                    break;
            }
            $rst=mysqli_query($link,"SELECT * FROM niveau where code_niv='$code' ");
            $dataS=mysqli_fetch_array($rst);
            $niv=$dataS['intit_niv'];

            $rsd=mysqli_query($link,"SELECT * FROM departement where code_depart='$code_dep' ");
            $dat=mysqli_fetch_array($rsd);
            $depart=$dat['design_depart'];
            $code_fac=$dat['code_facult'];
            $concours=$dat['concours'];

            $rsf=mysqli_query($link,"SELECT * FROM faculte where code_facult='$code_fac' ");
            $daf=mysqli_fetch_array($rsf);
            $facult=$daf['design_facult'];
        } else{
            $resultat="Ajourné";

            $rs=mysqli_query($link,"SELECT * FROM inscription where mat_etud='$mat' order by inscription.annee DESC");
            $datas=mysqli_fetch_array($rs);
            $niveau=$datas['code_niv'];
            $code_dep=$datas['code_depart'];
          
            $rst=mysqli_query($link,"SELECT * FROM niveau where code_niv='$niveau' ");
            $dataS=mysqli_fetch_array($rst);
            $niv=$dataS['intit_niv'];

            $rsd=mysqli_query($link,"SELECT * FROM departement where code_depart='$code_dep' ");
            $dat=mysqli_fetch_array($rsd);
            $depart=$dat['design_depart'];
            $code_fac=$dat['code_facult'];
            $concours=$dat['concours'];

            $rsf=mysqli_query($link,"SELECT * FROM faculte where code_facult='$code_fac' ");
            $daf=mysqli_fetch_array($rsf);
            $facult=$daf['design_facult'];
        }
        
        
    }else{
        $m='Etudiant non inscrit';
    }

    if($resultat=="Admis"){
        $n=$code;
    } elseif($resultat=="Ajourné"){
        $n=$niveau;
    }

    if($n=="N4" || $n=="N5"){
        $udc="60 000 KMF"; 
        $lettre="Soixante mille Francs Comoriens";
    }
    if( $concours==1){
        if($n=="N1" || $n=="N2" || $n=="P1" || $n=="P2"){
            $udc="45 000 KMF";
            $lettre="Quarante cinq mille Francs Comoriens";
        } elseif($n=="N3" || $n=="P3" ){
            $udc="55 000 KMF";
            $lettre="Cinquante cinq mille Francs Comoriens";
        } 
    }else{
        if($n=="N1" || $n=="N2" || $n=="P1" || $n=="P2"){
            $udc="40 000 KMF";
            $lettre="Quarante mille Francs Comoriens";
        } elseif($n=="N3" || $n=="P3" ){
            $udc="50 000 KMF";
            $lettre="Cinquante mille Francs Comoriens";
        }
    
    }
  
    $rt=mysqli_query($link,"SELECT * FROM post_inscription where nin='$nin'");
    //$tadata=mysqli_fetch_array($r);
    if(mysqli_num_rows($rt)==0){
        $nn = addslashes($data['nom']);
        $p = addslashes($data['prenom']);
        $l = addslashes($data['lieu_naiss']);

        mysqli_query($link,"INSERT INTO post_inscription (nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_fiche,code_depart,code_niv,date_delivrance_fiche,code_facult,tel_mobile,droit,droit_lettre,matricule)
        values ('$nin','".$nn."','".$p."','".$data['date_naiss']."','".$l."',1,'".$_SESSION['login']."','".$datas['code_depart']."','$n','$date','$code_fac','$tel','$udc','$lettre','$mat')");
    }
    
  $k="ok bar";  
  $p= mysqli_query($link,"SELECT * FROM post_inscription where nin='$nin'");
  $rer=mysqli_fetch_array($p);
  
}

if($_SESSION['periode']==1){ 
    $k="ok";
    $nin=$_POST['nin'];
    $niveau=$_POST['niveau'];
    if(isset($_POST['pers'])){
       // $per=$_POST['per'];
       // $per=$_POST['per'];
        //$_SESSION['periode']=$per;
            $mat=$_POST['mat'];
            $nin=$_POST['nin'];
        }

    $r=mysqli_query($link,"SELECT * FROM candidats where nin='$nin'");
    $data=mysqli_fetch_array($r);

    $rsd=mysqli_query($link,"SELECT * FROM departement where code_depart='".$data['retenu']."' ");
    $dat=mysqli_fetch_array($rsd);
    $depart=$dat['design_depart'];
    $code_fac=$dat['code_facult'];
    $concours=$dat['concours'];

    $rsf=mysqli_query($link,"SELECT * FROM faculte where code_facult='$code_fac' ");
    $daf=mysqli_fetch_array($rsf);
    $facult=$daf['design_facult'];

    if($niveau=="N4" || $niveau=="N5"){
        $udc="60 000 KMF";
        $lettre="Soixante mille Francs Comoriens";
    }
    if( $concours==1){
        if($niveau=="l1" || $niveau=="l2"){
            $udc="45 000 KMF";
            $lettre="Quarante cinq mille Francs Comoriens";
        } elseif($niveau=="l3"){
            $udc="55 000 KMF";
            $lettre="Cinquante cinq mille Francs Comoriens";
        } 
    }else{
        if($niveau=="l1" || $niveau=="l2" ){
            $udc="40 000 KMF";
            $lettre="Quarante mille Francs Comoriens";
        } elseif($niveau=="l3"){
            $udc="50 000 KMF";
            $lettre="Cinquante mille Francs Comoriens";
        }
    
    }
    if($niveau=="l1"){
        if($concours==1 and $code_facult!="EMSP"){
            $niv="1ère Année" ;  
            $n="P1" ;     
        } 
        if($concours==0 || $code_facult=="EMSP"){
            $niv="Licence 1" ; 
            $n="N1" ;        
        } 
    } if($niveau=="l2"){
        if($concours==1 and $code_facult!="EMSP"){
            $niv="2ème Année" ; 
            $n="P2" ;        
        } 
        if($concours==0 || $code_facult=="EMSP"){
            $niv="Licence 2" ;  
            $n="N2" ;       
        } 
    }if($niveau=="l3"){
        if($concours==1 and $code_facult!="EMSP"){
            $niv="3ème Année" ;   
            $n="P3" ;      
        } 
        if($concours==0 || $code_facult=="EMSP"){
            $niv="Licence 3" ; 
            $n="N3" ;        
        } 
    }
    if($niveau=="N4"){
        
            $niv="Master 1" ;        
            $n="N4" ;
    }
    if($niveau=="N5"){
        
            $niv="Master 2" ;  
            $n="N5" ;      
        
    }
    $rt=mysqli_query($link,"SELECT * FROM post_inscription where nin='$nin'");
    $tadata=mysqli_fetch_array($r);
    if(mysqli_num_rows($rt)==0){
        $nn = addslashes($data['nom']);
        $p = addslashes($data['prenom']);
        $l = addslashes($data['lieu_naiss']);
        //echo "INSERT INTO post_inscription (nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_fiche,code_depart,code_niv,date_delivrance_fiche,code_facult,tel_mobile,droit,droit_lettre,matricule)
        //values ('".$data['nin']."','".$nn."','".$p."','".$data['date_naiss']."','".$l."',1,'".$_SESSION['login']."','".$data['retenu']."','$n','$date','$code_fac','".$data['tel_mobile']."','$udc','$lettre','$mat')";
        //die;
    mysqli_query($link,"INSERT INTO post_inscription (nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_fiche,code_depart,code_niv,date_delivrance_fiche,code_facult,tel_mobile,droit,droit_lettre,matricule)
    values ('".$data['nin']."','".$nn."','".$p."','".$data['date_naiss']."','".$l."',1,'".$_SESSION['login']."','".$data['retenu']."','$n','$date','$code_fac','".$data['tel_mobile']."','$udc','$lettre','$mat')");
     }
$p= mysqli_query($link,"SELECT * FROM post_inscription where nin='".$data['nin']."'");
    $rer=mysqli_fetch_array($p);

}

}

    $an=date('Y');
    //$d = date(Y);
    //$dd=$d+1;
    
    //$a = $d."-".$dd; 
    $a = "2019-2020";
    
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
    <!-- <link rel="stylesheet" href="assets/css/fiche.css"> -->

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
        <h4 align="right"><strong><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?> </strong></h4>
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-60px;"> <?php echo (date('d-m-Y'));?></h5>
        <!-- <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-60px;color:#00b185;"> Fin de préinscription : <?php //echo $dat['date_fin'];?></h5> -->
                
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
                                <h4  style="margin-left:-30px"> <strong>FICHE D'INSCRIPTION<br></strong></h4><h5 style="margin-left:30px;margin-bottom:40px">(Année <?php echo $a  ?>)</h5>
                                <h4 style="margin-left:130px;margin-bottom:30px;font-family:Arial black">Numéro d'inscription:&nbsp;<strong><? echo stripslashes($rer['num_auto']);?><br></strong></h4>
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
                                <div class="form-row"style="margin-bottom:-10px;">
                                
                                     <div class="form-group col-md-6">
                                    <?php 
                                            if($_SESSION['periode']==1 and !isset($_POST['pers'])){?>
                                                <h5 >&nbsp; &nbsp;&nbsp;Numéro de reçu:<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo utf8_encode($data['num_recu']);?></h5></b></h5>
                                    <?php }else{ ?>
                                        
                                        <h5 style="margin-bottom:20px;">&nbsp; &nbsp;&nbsp;Matricule:<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $mat;?></h5></b></h5>
                                        <?php }
                                      ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 >NIN :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo utf8_encode($rer['nin']) ;?></b></h6>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 style="margin-bottom:20px;">&nbsp; &nbsp;&nbsp;Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo utf8_encode($rer['nom']) ;?></b></h6>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5>Pr&eacute;nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>   <?php echo utf8_encode($rer['prenom'])  ;?></b></h6>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top:-10px;">
                                    <div class="form-group col-md-6">
                                        <h5 style="margin-bottom:20px;">&nbsp; &nbsp;&nbsp;Date de naissance : &nbsp; <b><?php echo utf8_encode($rer['date_naiss']) ;?></b></h6>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5>Lieu de naissance : &nbsp; <b><?php echo utf8_encode($rer['lieu_naiss']) ;?></b></h6>
                                    </div>

                                    
                                </div>
                                <div class="form-row" style="margin-top:-10px;">
                                    <div class="form-group col-md-6">
                                        <h5 style="margin-bottom:20px;">&nbsp; &nbsp;&nbsp;Pr&eacute;inscrit au titre de l'ann&eacute;e:&nbsp;&nbsp;<b><?php echo utf8_encode($a) ;?></b></h6>
                                    </div>
                                    <div class="form-group col-md-6">
                                    </div>
                                </div>
                            
                                <div class="form-row" style="margin-top:-10px;">
                                    <div class="form-group col-md-12">
                                        <h5 style="margin-bottom:20px;">&nbsp; &nbsp;&nbsp;Composante :   &nbsp;&nbsp;<b> <?php echo utf8_encode($facult) ;?></b></h6>
                                    </div>
                                     
                                </div> 
                                <div class="form-row" style="margin-top:-10px;">
                                <div class="form-group col-md-12">
                                        <h5 style="margin-bottom:20px;">&nbsp; &nbsp;&nbsp;Département:&nbsp;&nbsp;&nbsp; <b><?php echo utf8_encode($depart) ;?></b></h6>
                                    </div>
                                   
                                </div>
                                <div class="form-row" style="margin-top:-10px;">
                                    <div class="form-group col-md-6">
                                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;Niveau:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? echo utf8_encode($niv) ;?></b></h6>
                                </div>
                                     
                                </div> 
                                <h5 style="margin-bottom:20px;">&nbsp; &nbsp;&nbsp;Est autorisé(e) à s'inscrire.</h6>
                                

                                <hr>
                                <div class="form-row" style="margin-bottom: :-10px;">

                            <div class="form-group col-md-6">
                            <div class="col-md-6">
               <h6 style="margin-bottom:80px;"><b>Signature de l'étudiant</b></h6> <br><br><br>
            
                <h6 style="margin-left:30px;" ><b><?php echo utf8_encode($data['nom']) ;?>&nbsp;<?php echo utf8_encode($data['prenom']) ;?></b></h6> 
             </div>
                                    


                            </div>
                            
                            
                                <div class="form-group col-md-6">
                                <h6 style="margin-bottom:-50px;"><b> Directeur des Etudes et de la Scolarit&eacute;</b></h6><br><br><br>

                                    <img src="./assets/img/signature.PNG" alt="signature"  style="margin-left:60px">
                                
                                <div style="margin-left:-10px"  class="col-md-9">
                                     <h6  style="margin-left:100px;margin-top:10px;" ><strong>Ben Ousseni MOHAMED</em></h6>
                                     </div>

                            </div>

                             </div>
                            <!--  <div class="form-row" style="margin-bottom:100px;">
                                <div class="form-group col-md-6">
                                        <h5></h6>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <h5></h6>
                                </div>
                                     
                                </div> -->
                             
                              <hr>


                              <!-- <div class="form-row" style="margin-bottom: :-10px;">

                            <div class="form-group col-md-6">
                            <div class="col-md-6">
               <h6 style="margin-bottom:100px;"><b>Signature de l'étudiant </b></h5> <br><br><br>
            
                <h6 style="margin-left:-80px;" ><b><?php //echo utf8_encode($data['nom']) ;?>&nbsp;<?php //echo utf8_encode($data['prenom']) ;?></b></h6> 
             </div>
                                    


                            </div>
                            
                            
                                <div class="form-group col-md-6">
                                <h6 style="margin-bottom:100px;"> <b>Viste Médicale *</b>  </h6><br><br><br>

                                
                                <div style="margin-left:-10px"  class="col-md-9">
                                     <h6  style="margin-left:100px;"><b>Le Medecin</b></h6>
                                     </div>

                            </div>

                             </div>


                           
                            </div>
                             </div> -->
                            
                            

                              
                            
                             
                                
                                


                            
                       
                                                

                        
    
</div>
<!--h2 style="font-family:Brush Script MT;margin-top:80px;"><b>*</b> La visite médicale est obligatoire pour faire la carte d'étudiant</h2-->

</div>

</div>


</div>
</div>



                <div class="text-right" style="margin-bottom:10px;margin-top:10px;">
                    <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer la fiche d'inscription</button> 

                </div>
                <div class="text-left" style="margin-bottom:10px;margin-top:10px;">
                    <a class="btn btn-primary" href="periode_preinscri.php" role=button> Faire une autre fiche</a>
                </div>
               
            </main>
        </section>
            <script src="./node_modules/jquery/dist/jquery.min.js"></script>
            <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="./assets/js/app.js"></script>
    </body>
    <script>
        function imprimer(divName){
            var restorepage=document.body.innerHTML;
            var printContent=document.getElementById(divName).innerHTML;
            
            document.body.innerHTML=printContent;
            window.print();
            document.body.innerHTML=restorepage;
        }
    </script>
</html>
<?php }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page! </h3>
    <?php }

?>