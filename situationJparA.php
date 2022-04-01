<?php
session_start();

if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="5" or $_SESSION['cat']=="6" or $_SESSION['cat']=="2"  )){
include('connexion.php');
$nbr=0;



$dateJ=date('Y-m-d');
$h=date('H')+2;
$m=date('i');
$traitant=$_SESSION['login'];

$sd=mysqli_query($link,"SELECT * FROM date_fin where type=1 order by id_date DESC ");
$dat=mysqli_fetch_array($sd);     
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
                <h4 align="right"><strong><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?> </strong></h4>
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-60px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-60px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
            <div class="text-center mb-5">
            <div class="text-right" style="margin-bottom:20px;">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer</button> 

        </div>

            <div id='sectionAimprimer' >
                <h2 align="center" class="soft-title-2" style="color:#00b185;">Situation Journalière par agent</h2>
                <hr />
                <!-- <h3 class="soft-title-4" style="color:green;margin-top:20%;font-family:algerian;">Aujourd'hui, Vous avez imprimé <--?php echo $nbr ?> reçu(s),<br> donc vous avez encaissé <?php //echo " ".$caisse."KMF"; ?> </h3> -->
            
            

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                       
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    
                                    <th scope="col">Agent</th>
                                    <th scope="col">Nombre de reçu vendu</th>
                                    <th scope="col">Somme encaissée</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                        $rec=mysqli_query($link,"SELECT DISTINCT traitant_recu FROM candidats ") or die("erreur:resc ".mysqli_error());
                        while($da=mysqli_fetch_array($rec)){

                            $sq=mysqli_query($link,"SELECT * FROM users WHERE login='".$da['traitant_recu']."'");
                            $re=mysqli_fetch_array($sq);
                            $nom=$re['nom'];
                            $prenom=$re['prenom'];
                            $r = "SELECT * FROM candidats WHERE  traitant_recu='".$da['traitant_recu']."'and datePrescript='$dateJ'";
                            $req = mysqli_query($link,$r);
                            $nbr = mysqli_num_rows($req); 
                            $caisse = $nbr * 5000;
                            $xD=mysqli_query($link,"SELECT * FROM candidats WHERE datePrescript='$dateJ'");
                            $nbre=mysqli_num_rows($xD);
                            $casseTotal= $nbre * 5000;
                        ?>
                                <tr>
                                    
                                    <td><?php echo $prenom." ".$nom ?></td>
                                    <td><?php echo $nbr?></td>
                                    <td><?php echo $caisse ?> KMF</td>
                                </tr>
                                <?php
                        }?>
                        <tr>
                                    
                                    <th scope="col">Total</th>
                                    <th scope="col"><?php echo $nbre?></th>
                                    <th scope="col"><?php echo $casseTotal ?> KMF</th>
                                </tr>
                        
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>

              
            <div class="row">
                <div class="col-md-6">
                    <h6 style="margin-left:60px;margin-bottom:20px;">Le <STRONG>&nbsp;<?php echo (date('d/m/Y'))." à ".$h." h ".$m." min";?></STRONG></h6></b></h5> 
                </div>
               
		    </div>

                </div>
          
                <div class="text-right">
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
<?php }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page! </h3>
    <?php }

?>