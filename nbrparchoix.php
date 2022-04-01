<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="2" or $_SESSION['cat']=="7" or $_SESSION['cat']=="8"  )){
include('connexion.php');

$sd=mysqli_query($link,"SELECT * FROM date_fin where type=1 order by id_date DESC ");
$dat=mysqli_fetch_array($sd);     
$nbr=0;

$dateJ=date('Y-m-d');
$h=date('H')-1;
$m=date('i');
$traitant=$_SESSION['login'];

   

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
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-60px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
            <div class="text-center mb-5">
				</div>


                <hr />
                <!-- <h3 class="soft-title-4" style="color:green;margin-top:20%;font-family:algerian;">Aujourd'hui, Vous avez imprimé <--?php echo $nbr ?> reçu(s),<br> donc vous avez encaissé <?php //echo " ".$caisse."KMF"; ?> </h3> -->
            </div>
            <div class="text-right" style="margin-bottom:20px;">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer</button> 
        </div>

            <div id='sectionAimprimer' >
            <h2 align="center" class="soft-title-2" style="margin-top:50px;margin-bottom:20px">Nombre de préinscrits par choix </h2>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Composante</th>
                                    <th >Département</th>
                                    <th scope="col">Choix1</th>
                                    <th scope="col">Choix2</th>
                                    <th scope="col">Choix3</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                            <?php $sq=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='AES'");
                            $re=mysqli_num_rows($sq);
                            $sq1=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='DP'");
                            $re1=mysqli_num_rows($sq1);
                            $sq2=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='SEC'");
                            $re2=mysqli_num_rows($sq2);
                            $sq3=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='AES'");
                            $re3=mysqli_num_rows($sq3);
                            $sq4=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='DP'");
                            $re4=mysqli_num_rows($sq4);
                            $sq5=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='SEC'");
                            $re5=mysqli_num_rows($sq5);
                            $sq6=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='AES'");
                            $re6=mysqli_num_rows($sq6);
                            $sq7=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='DP'");
                            $re7=mysqli_num_rows($sq7);
                            $sq8=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='SEC'");
                            $re8=mysqli_num_rows($sq8);?>
                                <TR><TH ROWSPAN=4>FDSE</TH>
                                <TR><TD>AES</TD> 
                                <TD><?php echo $re ?></TD> 
                                <TD><?php echo $re3?></TD> 
                                <TD><?php echo $re6?></TD></TR>

                                    <TD>Droit</TD> 
                                    <TD><?php echo $re1?></TD> 
                                    <TD><?php echo $re4?></TD> 
                                    <TD><?php echo $re7?></TD>
                                    
                                
                                <TR><TD>Economie</TD> 
                                    <TD><?php echo $re2?></TD>
                                    <TD><?php echo $re5?></TD>
                                    <TD><?php echo $re8?></TD>
                                         </TR>
                               
                                            <TR><TR><TH ROWSPAN=6>FLSH</TH>
                                            <?php $s=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='H.G'");
                            $r=mysqli_num_rows($s);
                            $sr=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='Geo'");
                            $r1=mysqli_num_rows($sr);
                            $s2=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='LEA1'");
                            $r2=mysqli_num_rows($s2);
                            $s3=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='H.G'");
                            $r3=mysqli_num_rows($s3);
                            $s4=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='Geo'");
                            $r4=mysqli_num_rows($s4);
                            $s5=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='LEA1'");
                            $r5=mysqli_num_rows($s5);
                            $s6=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='H.G'");
                            $r6=mysqli_num_rows($s6);
                            $s7=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='Geo'");
                            $r7=mysqli_num_rows($s7);
                            $s8=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='LEA1'");
                            $r8=mysqli_num_rows($s8);
                            $s9=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='LFM'");
                            $r9=mysqli_num_rows($s9);
                            $s10=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='LFM'");
                            $r10=mysqli_num_rows($s10);
                            $s11=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='LFM'");
                            $r11=mysqli_num_rows($s11);
                            $s12=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='PLC'");
                            $r12=mysqli_num_rows($s12);
                            $s13=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='PLC'");
                            $r13=mysqli_num_rows($s13);
                            $s14=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='PLC'");
                            $r14=mysqli_num_rows($s14);?>
                                    <TD>Histoire</TD> 
                                    <TD><?php echo $r; ?></TD> 
                                    <TD><?php echo $r3; ?></TD> 
                                    <TD><?php echo $r6; ?></TD>
                                    <TR>
                                    <TD>Géo</TD> 
                                    <TD><?php echo $r1; ?></TD> 
                                    <TD><?php echo $r4; ?></TD> 
                                    <TD><?php echo $r7; ?></TD>
                </TR>
                <TR>
                                    <TD>LEA</TD> 
                                    <TD><?php echo $r2; ?></TD> 
                                    <TD><?php echo $r5; ?></TD> 
                                    <TD><?php echo $r8; ?></TD>
                </TR>
                <TR>
                                    <TD>LMF</TD> 
                                    <TD><?php echo $r9; ?></TD> 
                                    <TD><?php echo $r10; ?></TD> 
                                    <TD><?php echo $r11; ?></TD>
                </TR>
                <TR>
                                    <TD>Chinois</TD> 
                                    <TD><?php echo $r12; ?></TD> 
                                    <TD><?php echo $r13; ?></TD> 
                                    <TD><?php echo $r14; ?></TD>
                </TR>
                <TR><TR><TH ROWSPAN=5>FST</TH>
                <?php
                            $m=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='MPC'");
                            $a=mysqli_num_rows($m);
                            $m1=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='MPC'");
                            $a1=mysqli_num_rows($m1);
                            $m2=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='MPC'");
                            $a2=mysqli_num_rows($m2);
                            $m3=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='S02'");
                            $a3=mysqli_num_rows($m3);
                            $m4=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='S02'");
                            $a4=mysqli_num_rows($m4);
                            $m5=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='S02'");
                            $a5=mysqli_num_rows($m5);
                            $m6=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='S01'");
                            $a6=mysqli_num_rows($m6);
                            $m7=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='S01'");
                            $a7=mysqli_num_rows($m7);
                            $m8=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='S01'");
                            $a8=mysqli_num_rows($m8);
                            $ph1=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='PHQ'");
                            $phi1=mysqli_num_rows($ph1);
                            $ph2=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='PHQ' ");
                            $phi2=mysqli_num_rows($ph2);
                            $ph3=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='PHQ'");
                            $phi3=mysqli_num_rows($ph3); 
                            ?>
                <TR>
                                    <TD>Math</TD> 
                                    <TD><?php echo $a; ?></TD> 
                                    <TD><?php echo $a1; ?></TD> 
                                    <TD><?php echo $a2; ?></TD>
                </TR>
                <TR>
                                    <TD>SVT</TD> 
                                    <TD><?php echo $a3; ?></TD> 
                                    <TD><?php echo $a4; ?></TD> 
                                    <TD><?php echo $a5; ?></TD>
                </TR>
                <TR>
                                    <TD>STE</TD> 
                                    <TD><?php echo $a6; ?></TD> 
                                    <TD><?php echo $a7; ?></TD> 
                                    <TD><?php echo $a8; ?></TD>
                </TR>
                <TR>
                                    <TD>Physique</TD> 
                                    <TD><?php echo $phi1; ?></TD> 
                                    <TD><?php echo $phi2; ?></TD> 
                                    <TD><?php echo $phi3; ?></TD>
                </TR>
              
                
                <TR><TR><TH ROWSPAN=5>FIC</TH>
                <?php
                 $m9=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='LAR' AND id_type='1'");
                 $a9=mysqli_num_rows($m9);
                 $m10=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='LAR' AND id_type='1'");
                 $a10=mysqli_num_rows($m10);
                 $m11=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='LAR' AND id_type='1'");
                 $a11=mysqli_num_rows($m11);
                 $m12=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='SI' AND id_type='1'");
                 $a12=mysqli_num_rows($m12);
                 $m13=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='SI' AND id_type='1'");
                 $a13=mysqli_num_rows($m13);
                 $m14=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='SI' AND id_type='1'");
                 $a14=mysqli_num_rows($m14);

                 $J1=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='JI' AND id_type='1'");
                 $aJ1=mysqli_num_rows($J1);
                 $J2=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='JI' AND id_type='1'");
                 $aJ2=mysqli_num_rows($J2);
                 $J3=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='JI' AND id_type='1'");
                 $aJ3=mysqli_num_rows($J3);

                 $EC1=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='ECIF' AND id_type='1'");
                 $aC1=mysqli_num_rows($EC1);
                 $EC2=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='ECIF' AND id_type='1'");
                 $aC2=mysqli_num_rows($EC2);
                 $EC3=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='ECIF' AND id_type='1'");
                 $aC3=mysqli_num_rows($EC3);
                 ?>
                <TR>
                                    <TD>Lettres Arabes</TD> 
                                    <TD><?php echo $a9; ?></TD> 
                                    <TD><?php echo $a10; ?></TD> 
                                    <TD><?php echo $a11; ?></TD>
                </TR>
                <TR>
                                    <TD>Sciences islamiques</TD> 
                                    <TD><?php echo $a12; ?></TD> 
                                    <TD><?php echo $a13; ?></TD> 
                                    <TD><?php echo $a14; ?></TD>
                </TR>
                 <TR>
                                    <TD>Juridique Islamique</TD> 
                                    <TD><?php echo $aJ1; ?></TD> 
                                    <TD><?php echo $aJ2; ?></TD> 
                                    <TD><?php echo $aJ3; ?></TD>
                </TR>
                 <TR>
                                    <TD>Etudes Coraniques et Formation des Imams</TD> 
                                    <TD><?php echo $aC1; ?></TD> 
                                    <TD><?php echo $aC2; ?></TD> 
                                    <TD><?php echo $aC3; ?></TD>
                </TR>
                <TR><TR><TH ROWSPAN=10>Centre universitaire de Patsy</TH>
                <?php
                $t0=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='LMFp'");
                $d=mysqli_num_rows($t0);
                $t1=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='LMFp'");
                $d1=mysqli_num_rows($t1);
                $t2=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='LMFp'");
                $d2=mysqli_num_rows($t2);
                $t3=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='Leap'");
                $d3=mysqli_num_rows($t3);
                $t4=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='Leap'");
                $d4=mysqli_num_rows($t4);
                $t5=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='Leap'");
                $d5=mysqli_num_rows($t5);
                $t6=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='GEOp'");
                $d6=mysqli_num_rows($t6);
                $t7=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='GEOp'");
                $d7=mysqli_num_rows($t7);
                $t8=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='GEOp'");
                $d8=mysqli_num_rows($t8);
                $t9=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='Drp'");
                $d9=mysqli_num_rows($t9);
                $t10=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='Drp'");
                $d10=mysqli_num_rows($t10);
                $t11=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='Drp'");
                $d11=mysqli_num_rows($t11);
                $t12=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='SECp'");
                $d12=mysqli_num_rows($t12);
                $t13=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='SECp'");
                $d13=mysqli_num_rows($t13);
                $t14=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='SECp'");               
                $d14=mysqli_num_rows($t14);
                $t15=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='AESp'");
                $d15=mysqli_num_rows($t15);
                $t16=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='AESp'");
                $d16=mysqli_num_rows($t16);
                $t17=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='AESp'");
                $d17=mysqli_num_rows($t17);
                $t18=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='Svtp'");
                $d18=mysqli_num_rows($t18);
                $t19=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='Svtp'");
                $d19=mysqli_num_rows($t19);
                $t20=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='Svtp'");
                $d20=mysqli_num_rows($t20);
                $t21=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='ara'");
                $d21=mysqli_num_rows($t21);
                $t22=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='ara'");
                $d22=mysqli_num_rows($t22);
                $t23=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='ara'");
                $d23=mysqli_num_rows($t23);
                 ?>
              
                <TR>
                                    <TD>LMF</TD> 
                                    <TD><?php echo $d ?></TD> 
                                    <TD><?php echo $d1 ?></TD> 
                                    <TD><?php echo $d2 ?></TD>
                </TR><TR>
                                    <TD>LEA</TD> 
                                    <TD><?php echo $d3 ?></TD> 
                                    <TD><?php echo $d4 ?></TD> 
                                    <TD><?php echo $d5 ?></TD>
                </TR><TR>
                                    <TD>G&eacute;o</TD> 
                                    <TD><?php echo $d6 ?></TD> 
                                    <TD><?php echo $d7 ?></TD> 
                                    <TD><?php echo $d8 ?></TD>
                </TR><TR>
                                    <TD>Droit</TD> 
                                    <TD><?php echo $d9 ?></TD> 
                                    <TD><?php echo $d10 ?></TD> 
                                    <TD><?php echo $d11 ?></TD>
                </TR><TR>
                                    <TD>Economie</TD> 
                                    <TD><?php echo $d12 ?></TD> 
                                    <TD><?php echo $d13 ?></TD> 
                                    <TD><?php echo $d14 ?></TD>
                </TR><TR>
                                    <TD>AES</TD> 
                                    <TD><?php echo $d15 ?></TD> 
                                    <TD><?php echo $d16 ?></TD> 
                                    <TD><?php echo $d17 ?></TD>
                </TR><TR>
                                    <TD>SVTE</TD> 
                                    <TD><?php echo $d18 ?></TD> 
                                    <TD><?php echo $d19 ?></TD> 
                                    <TD><?php echo $d20 ?></TD>
                </TR><TR>
                                    <TD>Lettres Arabes</TD> 
                                    <TD><?php echo $d21 ?></TD> 
                                    <TD><?php echo $d22 ?></TD> 
                                    <TD><?php echo $d23 ?></TD>
                </TR>
                <TR><TR><TH ROWSPAN=2>Centre universitaire de Moheli</TH>
                <?php 
                 $tp0=mysqli_query($link,"SELECT * FROM candidats WHERE  choix1='AESm'");
                 $l0=mysqli_num_rows($tp0);
                 $k=mysqli_query($link,"SELECT * FROM candidats WHERE  choix2='AESm'");
                 $l1=mysqli_num_rows($k);
                 $k2=mysqli_query($link,"SELECT * FROM candidats WHERE  choix3='AESm'");
                 $l2=mysqli_num_rows($k2);
                ?>
                <TR>
                                    <TD>AES</TD> 
                                    <TD><?php echo $l0 ?></TD> 
                                    <TD><?php echo $l1 ?></TD> 
                                    <TD><?php echo $l2 ?></TD>
                </TR>
                                                     </tbody>
                                                        </table>
                    </div>
                </div>
            </div>
                    
             
<!--     
                                    <td>GEA</td>                                
                                    <td>Commerce</td>
                                    <td>Tourisme</td>
                                    <td>Génie Informatique</td>
                                    <td>Génie Civile</td>
                                    <td>Statistique</td>
                                    <td>Total</td> -->
                                
                               
            <div class="row">
            <div class="col-md-6">
            <!-- <h6 style="margin-left:60px;margin-top:20px;">Le <STRONG>&nbsp;<?php //echo $dateJ." à ".$h." h ".$m." min";?></STRONG></h6></b></h6>  -->
        </div>
                
		    </div>
          
        </div>
    
        <div class="text-center">
                    <a role="button" class="btn btn-primary" href="userInterface.php">retour à la page d'accueil</a>
                   </div>
        </main>
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