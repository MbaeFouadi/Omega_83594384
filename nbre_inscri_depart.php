<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="2" or $_SESSION['cat']=="7" or $_SESSION['cat']=="8" )){
include('connexion.php');

$sd=mysqli_query($link,"SELECT * FROM date_fin order by id_date DESC ");
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
            <h2 align="center" class="soft-title-2" style="margin-top:50px;margin-bottom:20px">Nombre inscrits par département </h2>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Composante</th>
                                    <th >Département</th>
                                    <th scope="col">Inscrit</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                            <?php $sq=mysqli_query($link,"SELECT * FROM etudiant WHERE  code_depart='AES'");
                            $re=mysqli_num_rows($sq);
                            $sq1=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='DP'");
                            $re1=mysqli_num_rows($sq1);
                            $sq2=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='SEC'");
                            $re2=mysqli_num_rows($sq2);
                            ?>
                                <TR><TH ROWSPAN=4>FDSE</TH>
                                <TR><TD>AES</TD> 
                                <TD><?php echo $re ?></TD> 
                                

                                <TR> <TD>Droit</TD> 
                                    <TD><?php echo $re1?></TD> 
                                    
                                    
                                
                                <TR><TD>Economie</TD> 
                                    <TD><?php echo $re2?></TD>
                                         </TR>
                               
                                            <TR><TR><TH ROWSPAN=6>FLSH</TH>
                                            <?php $s=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='H.G'");
                            $r=mysqli_num_rows($s);
                            $sr=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='Geo'") or die(mysqli_error($link));
                            $r1=mysqli_num_rows($sr) or die(mysqli_error($link));
                            $s2=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='LEA1'") or die(mysqli_error($link));
                            $r2=mysqli_num_rows($s2) or die(mysqli_error($link));
                            $s9=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='LFM'") or die(mysqli_error($link));
                            $r9=mysqli_num_rows($s9) or die(mysqli_error($link));
                            
                            $s12=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='PLC'");
                            $r12=mysqli_num_rows($s12);
                            ?>
                                    <TD>Histoire</TD> 
                                    <TD><?php echo $r; ?></TD> 
                                    
                                    
                                    <TR>
                                    <TD>Géo</TD> 
                                    <TD><?php echo $r1; ?></TD> 
                                   
                </TR>
                <TR>
                                    <TD>LEA</TD> 
                                    <TD><?php echo $r2; ?></TD> 
                                   
                </TR>
                <TR>
                                    <TD>LMF</TD> 
                                    <TD><?php echo $r9; ?></TD> 
                                    
                </TR>
                <TR>
                                    <TD>Chinois</TD> 
                                    <TD><?php echo $r12; ?></TD> 
                                    
                </TR>
                <TR><TR><TH ROWSPAN=4>FST</TH>
                <?php
                            $m=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='MPC'");
                            $a=mysqli_num_rows($m);
                            $m3=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='S02'");
                            $a3=mysqli_num_rows($m3);
                            $m6=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='S01'");
                            $a6=mysqli_num_rows($m6);
                            ?>
                <TR>
                                    <TD>Math</TD> 
                                    <TD><?php echo $a; ?></TD> 
                                   
                </TR>
                <TR>
                                    <TD>SVT</TD> 
                                    <TD><?php echo $a3; ?></TD> 
                                    
                </TR>
                <TR>
                                    <TD>STE</TD> 
                                    <TD><?php echo $a6; ?></TD> 
                                    
                </TR>
                <TR><TR><TH ROWSPAN=3>FIC</TH>
                <?php
                 $m9=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='LAR'");
                 $a9=mysqli_num_rows($m9);
                 $m14=mysqli_query($link,"SELECT * FROM etudiant WHERE  code_depart='SI'");
                 $a14=mysqli_num_rows($m14);
                 ?>
                <TR>
                                    <TD>Lettres Arabes</TD> 
                                    <TD><?php echo $a9; ?></TD> 
                                    
                </TR>
                <TR>
                                    <TD>Sciences islamiques</TD> 
                                    <TD><?php echo $a14; ?></TD>
                </TR>
                <TR><TR><TH ROWSPAN=10>Centre universitaire de Patsy</TH>
                <?php
                $t0=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='LMFp'");
                $d=mysqli_num_rows($t0);
                $t3=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='Leap'");
                $d3=mysqli_num_rows($t3);
                $t6=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='GEOp'");
                $d6=mysqli_num_rows($t6);
                $t9=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='Drp'");
                $d9=mysqli_num_rows($t9);
                $t12=mysqli_query($link,"SELECT * FROM etudiant WHERE  code_depart='SECp'");
                $d12=mysqli_num_rows($t12);
                $t15=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='AESp'");
                $d15=mysqli_num_rows($t15);
                $t18=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='Svtp'");
                $d18=mysqli_num_rows($t18);
                $t21=mysqli_query($link,"SELECT * FROM  etudiant WHERE  code_depart='ara'");
                $d21=mysqli_num_rows($t21);
                 ?>
              
                <TR>
                                    <TD>LMF</TD> 
                                    <TD><?php echo $d ?></TD> 
                                   
                </TR><TR>
                                    <TD>LEA</TD> 
                                    <TD><?php echo $d3 ?></TD> 
                                    
                </TR><TR>
                                    <TD>G&eacute;o</TD> 
                                    <TD><?php echo $d6 ?></TD> 
                                    
                </TR><TR>
                                    <TD>Droit</TD> 
                                    <TD><?php echo $d9 ?></TD> 
                                    
                </TR><TR>
                                    <TD>Economie</TD> 
                                    <TD><?php echo $d12 ?></TD> 
                                    
                </TR><TR>
                                    <TD>AES</TD> 
                                    <TD><?php echo $d15 ?></TD> 
                                    
                </TR><TR>
                                    <TD>SVTE</TD> 
                                    <TD><?php echo $d18 ?></TD> 
                                    
                </TR><TR>
                                    <TD>Lettres Arabes</TD> 
                                    <TD><?php echo $d21 ?></TD> 
                                   
                </TR>
                <TR><TR><TH ROWSPAN=2>Centre universitaire de Moheli</TH>
                <?php 
                 $tp0=mysqli_query($link,"SELECT * FROM etudiant WHERE  code_depart='AESm'");
                 $l0=mysqli_num_rows($tp0);
                ?>
                <TR>
                                    <TD>AES</TD> 
                                    <TD><?php echo $l0 ?></TD> 
                                    
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