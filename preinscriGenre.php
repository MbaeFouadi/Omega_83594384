<?php
session_start();
include('connexion.php');
$nbr=0;
$dateJ=date('Y-m-d');

// for ($i=1; $i <6 ; $i++) { 
//     # code...
    
//     $traitant.$i=$_SESSION['login'];
//     $r.$i = "SELECT * FROM candidats WHERE  traitant_recu='$traitant' and datePrescript='$dateJ' and  id_type='$i'";
//     $req.$i = mysqli_query($link,$r.'".$i."');
//     $nbr.$i  = mysqli_num_rows($req.$i); 
//     $caisse.'".$i."' = $nbr.'".$i."' * 5000;
//    // $caisses=
// }
$dateJ=date('Y-m-d');
$traitant1=$_SESSION['login'];
$r1 = "SELECT * FROM candidats WHERE  traitant_recu='$traitant1' and datePrescript='$dateJ' and  id_type=1";
$req1 = mysqli_query($link,$r1);
$nbr1 = mysqli_num_rows($req1); 
$caisse1 = $nbr1 * 5000;

$traitant2=$_SESSION['login'];
$r2 = "SELECT * FROM candidats WHERE  traitant_recu='$traitant2' and datePrescript='$dateJ' and  id_type=2";
$req2 = mysqli_query($link,$r2);
$nbr2 = mysqli_num_rows($req2); 
$caisse2 = $nbr2 * 5000;

$traitant3=$_SESSION['login'];
$r3 = "SELECT * FROM candidats WHERE  traitant_recu='$traitant3' and datePrescript='$dateJ' and  id_type=3";
$req3 = mysqli_query($link,$r3);
$nbr3 = mysqli_num_rows($req3); 
$caisse3 = $nbr3 * 5000;

$traitant4=$_SESSION['login'];
$r4 = "SELECT * FROM candidats WHERE  traitant_recu='$traitant4' and datePrescript='$dateJ'and   id_type=4";
$req4 = mysqli_query($link,$r4);
$nbr4 = mysqli_num_rows($req4); 
$caisse4 = $nbr4 * 5000;
     
$traitant5=$_SESSION['login'];
$r5 = "SELECT * FROM candidats WHERE  traitant_recu='$traitant5' and datePrescript='$dateJ' and  id_type=5";
$req5 = mysqli_query($link,$r5);
$nbr5 = mysqli_num_rows($req5); 
$caisse5 = $nbr5 * 5000;
$caisses=$caisse1+$caisse2+$caisse3+$caisse4+$caisse5;
  // echo $r; 
   //echo "\t"; var_dump($nbr);





// $password=md5($pass);

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
                                <li class="bord"><a href="#"><i class="icon-user"></i> &nbsp; <span class="nav-item-text">Changer mon mot de passe</span></a></li>
                                <li>
                                <li><a href="deconnexion.php"><i class="icon-logout"></i> &nbsp; <span class="nav-item-text">Déconnexion</span></a></li>
                                
                         </ul>       
                    </nav>
                </aside>
                <main class="main-content">
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
        <h1 class="soft-title-1">Bienvenue, <?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?> </h1>
                <p align="center"> <?php echo (date('d-m-Y'));?></p>
            <div class="text-center mb-5">


                <h2 class="soft-title-2" style="color:#00b185;">Situation Journali&egrave;re</h2>
                <hr />
                <!-- <h3 class="soft-title-4" style="color:green;margin-top:20%;font-family:algerian;">Aujourd'hui, Vous avez imprimé <?php echo $nbr ?> reçu(s),<br> donc vous avez encaissé /<!--?php echo " ".$caisse."KMF"; ?> </h3> -->
            </div>
            
<div class="text-right">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer </button> 
        </div>
        <div id='sectionAimprimer'>
        <h6 style="margin-left:10px;margin-top:20px;"  align=center><STRONG>Situation Journalière de <?php echo $_SESSION['nom']." ".$_SESSION['prenom']?></STRONG>&nbsp;</h6> 

            
        <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Composante</th>
                                    <th >Département</th>
                                    <th scope="col">Ngazidja</th>
                                    <th scope="col">Anjouan</th>
                                    <th scope="col">Mohéli</th>
                                    <th scope="col">Total</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <TR><TH ROWSPAN=7>IUT</TH>
                                <TR><TD>GEA</TD> <TD></TD> <TD></TD> <TD></TD><TD></TD></TR>

                                    <TD>Commerce</TD> 
                                    <TD></TD> 
                                    <TD></TD> 
                                    <TD></TD>
                                    <TD></TD>
                                </TR>
                                <TR><TD>Tourisme</TD> 
                                    <TD></TD>
                                    <TD></TD>
                                    <TD></TD>
                                    <TD></TD>
                                <TR>
                                    <TD>Génie Informatique</TD>
                                    <TD></TD> 
                                    <TD></TD>
                                    <TD></TD>
                                    <TD></TD>
                                </TR>

                                <TR><TD>Génie Civile</TD> <TD></TD> <TD></TD> <TD></TD><TD></TD></TR>
                                <TR><TD>Statistique</TD> <TD></TD> <TD></TD> <TD></TD><TD></TD></TR>


                                
                                <TR><TH>Total</TH>
                                    <TD></TD> <TD></TD> <TD></TD> <TD></TD><TD></TD>
                                    <TR>
                                    

                                </TR>
                                <TR><TH ROWSPAN=2>EMSP</TH>
                                    <TD>Soins Infirmiers</TD> <TD></TD> <TD></TD> <TD></TD><TD></TD>
                                    <TR>
                                    <TD>Soins Obstétricaux</TD> <TD></TD> <TD></TD> <TD></TD><TD></TD>
                                            </TR>

                                </TR>
                                <TR><TH>IFERE</TH>
                                    <TD>Formation des profs d'école</TD> <TD></TD> <TD></TD> <TD></TD><TD></TD>
                                            </TR>
                                            <TR><TH>TOTAL</TH>
                                    <TD></TD> <TD></TD> <TD></TD> <TD></TD><TD></TD>
                                    <TR>
                                                        
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
                    <h6 style="margin-left:60px;margin-top:20px;">Le <STRONG>&nbsp;<?php echo (date('d/m/Y'));?></STRONG></h6></b></h5> 
                </div>
                <div class="col-md-6">
                    <h6 style="margin-right:0px;margin-top:20px;"><STRONG>Signature: </h6> 
                </div>
		    </div>
        
        </div>
    
            
        </main>

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