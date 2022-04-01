<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="3" or $_SESSION['cat']=="6"  )){
include('connexion.php');
$r=mysqli_query($link,"SELECT * FROM date_fin where type=1 order by id_date DESC");
$data= mysqli_fetch_array($r) or die(mysqli_error($link));

$m="";
$nbr=0;
if(isset($_POST['submit'])){
    $dateJ=date('Y-m-d');
    $debut=$_POST['date1'];
    $fin=$_POST['date2'];
    $traitant=$_SESSION['login'];
    $m="";
    if($debut >  $fin){
        $m="le date du début ne peut pas être supérieur à la date de fin!";
    }else if($fin > $dateJ){
        $m="le date du fin ne peut pas être supérieur à la date d' aujourd'hui!";
        
    }else{
        $r="SELECT * from candidats where traitant_recu='$traitant' and datePrescript >= '$debut' and datePrescript<='$fin' ";
        $req = mysqli_query($link,$r);
        $nbr = mysqli_num_rows($req); 

        $traitant1=$_SESSION['login'];
        $r1 = "SELECT * FROM candidats WHERE  traitant_recu='$traitant1' and datePrescript >= '$debut' and datePrescript<='$fin'  and  id_type=1";
        $req1 = mysqli_query($link,$r1);
        $nbr1 = mysqli_num_rows($req1); 
        $caisse1 = $nbr1 * 5000;
        
        $traitant2=$_SESSION['login'];
        $r2 = "SELECT * FROM candidats WHERE  traitant_recu='$traitant2'  and datePrescript >= '$debut' and datePrescript<='$fin' and  id_type=2";
        $req2 = mysqli_query($link,$r2);
        $nbr2 = mysqli_num_rows($req2); 
        $caisse2 = $nbr2 * 5000;
        
        $traitant3=$_SESSION['login'];
        $r3 = "SELECT * FROM candidats WHERE  traitant_recu='$traitant3' and datePrescript >= '$debut' and datePrescript<='$fin'  and  id_type=3";
        $req3 = mysqli_query($link,$r3);
        $nbr3 = mysqli_num_rows($req3); 
        $caisse3 = $nbr3 * 5000;
        
        $traitant4=$_SESSION['login'];
        $r4 = "SELECT * FROM candidats WHERE  traitant_recu='$traitant4' and datePrescript >= '$debut' and datePrescript<='$fin'  and   id_type=4";
        $req4 = mysqli_query($link,$r4);
        $nbr4 = mysqli_num_rows($req4); 
        $caisse4 = $nbr4 * 5000;
             
        $traitant5=$_SESSION['login'];
        $r5 = "SELECT * FROM candidats WHERE  traitant_recu='$traitant5' and datePrescript >= '$debut' and datePrescript<='$fin'  and  id_type=5";
        $req5 = mysqli_query($link,$r5);
        $nbr5 = mysqli_num_rows($req5); 
        $caisse5 = $nbr5 * 5000;

        $caisses=$caisse1+$caisse2+$caisse3+$caisse4+$caisse5;  
        //$nbres=$nbre1+$nbre2+$nbre3+$nbre4+$nbre5;

        if($nbr!=0){
            $caisse = $nbr * 5000;
            if($nbr==1){
                $m="Du ".$debut." au ".$fin." , Vous avez imprimé ".$nbr." seul reçu , donc vous avez encaissé ".$caisse." KMF ";
                
            }
            else if($nbr>0){
                $m="Du ".$debut." au ".$fin." , Vous avez imprimé ".$nbr." reçu(s) , donc vous avez encaissé ".$caisse." KMF ";    
            }
         $num=1;
        } else if($nbr==0){
            $m="Du ".$debut." au ".$fin." , Vous avez imprimé aucun reçu , donc vous avez rien encaissé ";
            
        }
        
    }
  

}




// $password=md5($pass);

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
        <h4 align="right"><strong><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?> </strong></h4>
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-80px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-80px;color:#00b185;"> Fin de préinscription : <?php echo $data['date_fin'];?></h5>
                </div>
            <div class="text-center mb-5">
				</div>


                <h2 class="soft-title-2" style="color:#00b185;" align="center">Situation Périodique</h2>
                <hr />
               
           <?php if($nbr){ ?>
            <!--h3 class="soft-title-4" style="color:green;margin-top:20%;font-family:algerian;"> <!--?php echo $m ?></h3-->
            </div>
            
            <div class="text-right">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer </button> 
        </div>

           
        <div id='sectionAimprimer'>
        <h6 style="margin-left:10px;margin-top:60px;"  align="center"><STRONG>Situation Périodique de <?php echo $_SESSION['nom']." ".$_SESSION['prenom']?></STRONG>&nbsp;</h6> 

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Type Préinscription</th>
                                    <th >Nombre de re&ccedil;u (s)</th>
                                    <th scope="col">SOMME</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Préinscription L1</th>
                                    <td><?php echo $nbr1 ?></td>
                                    <td><?php echo $caisse1 ?> KMF</td>
                                
                                </tr>
                                <tr>
                                    <th> Préinscription L2&L3</th>
                                    <td><?php echo $nbr2 ?></td>
                                    <td><?php echo $caisse2 ?> KMF</td>
                                
                                </tr>
                                <tr>
                                    <th > Transfert</th>
                                    <td><?php echo $nbr3 ?></td>
                                    <td><?php echo $caisse3 ?> KMF</td>
                                
                                </tr>
                                
                                <tr>
                                <th> Reprise</th>
                                    <td><?php echo $nbr4 ?></td>
                                    <td><?php echo $caisse4 ?> KMF</td>
                                
                                </tr>
                                <tr>
                                    <th> Master</th>
                                    <td><?php echo $nbr5 ?></td>
                                    <td><?php echo $caisse5 ?> KMF</td>
                                
                                </tr>
                                <tr>
                                    <th  scope="col">TOTAL </th>
                                    <td scope="col"><?php echo $nbr?> </td>
                                    <td scope="col"><?php echo $caisses ?> KMF</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         
            <div class="row">
                <div class="col-md-6">
                    <h6 style="margin-left:60px;margin-top:20px;">Du <STRONG>&nbsp;<?php echo $debut ;?></STRONG> au <STRONG>&nbsp;<?php echo $fin ;?></STRONG></h6></b></h5> 
                </div>
               
		    </div>
        
        </div>
       
        <div class="text-right" style="margin-top:20px;margin-bottom:20px;" >
                    <a class="btn btn-primary" href="situationP.php" role=button> Rechercher pour une autre période</a>
                </div>

                    
                <?php   }
                

           
                else{ ?>


                
    
<h3 class="soft-title-4" >Veuillez indiquer la période!</h3>


               
           
<h6 class="soft-title-4" style="color:red;" align="center" > <?php echo $m ?></h6>
     
            </div>
            <form action="situationP.php" method="POST">
            <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Début</label>
                            <input name="date1" type="date" class="form-control" id="inputAddress" placeholder="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Fin</label>
                            <input name="date2" type="date" class="form-control"  placeholder="" required>
                        </div>
                        
                        </div>
                        <div class="text-center" style="margin-top:20px">
                        <button name="submit" type="submit" class="btn btn-primary">Rechercher</button>
                       </div>                    
                    </form>
                <?php } ?>
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
<?php
}else{ ?>
    <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
<?php }
?>

                   