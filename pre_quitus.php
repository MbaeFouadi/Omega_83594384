<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7" or $_SESSION['cat']=="5")){
include('connexion.php');
/*$r="SELECT  date_fin FROM date_fin order by id_date DESC";
$m="";

    $req = mysqli_query($link,$r);
    $data=mysqli_fetch_array($req);
    $dateJ=date('Y-m-d');
    if($data['date_fin'] == $dateJ ){ ?>
        <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, les pr&eacute;inscriptions sont d&eacute;ja ferm&eacute;es !<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
        <?php }else {*/
$t=0;
if(isset($_POST['submit'])){
    $t=1;
   $droit=$_POST['droit'];
   $mutuelle=$_POST['mutuelle'];
   $banque=$_POST['banque'];
   $dateT=$_POST['date'];
   $dateJ=date('Y-m-d');
   if($dateT>$dateJ){
    $m="La date des transactions ne peut pas être supérieur à la date d'aujourd'hui";
   }
        $rec=mysqli_query($link,"SELECT * FROM quitus WHERE trans_udc='".$_POST['droit']."'");

        $sql1="SELECT * FROM quitus where trans_mutuelle='$mutuelle'";
        $resultat2 = mysqli_query($link,$sql1); 
        
         if(mysqli_num_rows($rec)>0){
            $m="Le numero de transaction correspondant au droit d'inscription est déjà utilisé";
        } 
        elseif( mysqli_num_rows($resultat2)>0){
            $m="Le numero de transaction correspondant à la mutuelle  est déjà utilisé";
            
        } 
        elseif( mysqli_num_rows($rec)==0 ){
            $date=date('d/m/Y');

            $sql8="SELECT * FROM quitus where num_auto='".$_SESSION['auto']."' AND Annee ='".$_SESSION['annee']."'";
            $resultat8 = mysqli_query($link,$sql8);
            if(mysqli_num_rows($resultat8)!=0){
                $m="Cet etudiant a déjà un quitus";
            }else{

                $requete=mysqli_query($link,"SELECT Annee FROM quitus WHERE Annee ='".$_SESSION['annee']."'");
                     $re=mysqli_fetch_array($requete);
                     if(mysqli_num_rows($requete)==0){

                        $req=mysqli_query($link,"INSERT INTO quitus (num_quitus,num_auto,trans_udc,trans_mutuelle,traitant_quitus,date_delivrance_quitus,banque,date_trans,Annee)
                             values ('1','".$_SESSION['auto']."','$droit','$mutuelle','".$_SESSION['login']."','$date','$banque','$dateT','".$_SESSION['annee']."')");
                         header('location:quitus.php');

                     }

                     else{

                            $query=mysqli_query($link,"SELECT num_quitus FROM quitus WHERE Annee ='".$_SESSION['annee']."' ORDER BY num_quitus DESC") or die(mysqli_query($link));
                            $donnees=mysqli_fetch_array($query);
                            $num=$donnees['num_quitus']+1;
                                $req=mysqli_query($link,"INSERT INTO quitus (num_quitus,num_auto,trans_udc,trans_mutuelle,traitant_quitus,date_delivrance_quitus,banque,date_trans,Annee)
                                    values ('$num','".$_SESSION['auto']."','$droit','$mutuelle','".$_SESSION['login']."','$date','$banque','$dateT' ,'".$_SESSION['annee']."')");
                                header('location:quitus.php');
                     }

                
            }

            
        }

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
        <h4 align="right"><strong><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?> </strong></h4>
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']?></strong></h5>
       
        <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-80px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-80px;color:#00b185;"> Fin de préinscription : <?php echo $data['date_fin'];?></h5>
                </div>
            <div class="text-center mb-5">
            
            
                <?php
               
                    ?>
                    <h2 class="soft-title-2" > Faire un quitus</h2>
                    <hr /><div style="margin-bottom:80px"></div>

                    <div class="text-left" style="margin-top:-40px;">
                    <a role="button" class="btn btn-primary" href="verif_auto.php">retour </a>
                   </div> 
                   
                    <h5 style="color:red;"><?php echo $m ?></h5>

            </div>
           
                <div class="row">
                <div class="col-12">
            
                <form action="pre_quitus.php" method="post">
                    
           
            <div class="form-row">
                <div class="form-group col-md-4"><h5 style="text-indent:100px;">Transaction UDC</h5></div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="droit" id="inputnom" required >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4"><h5 style="text-indent:100px;">Transaction UESCO </h5></div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="mutuelle" id="inputnom" required >
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-4"><h5 style="text-indent:100px;">Date</h5></div>
                <div class="form-group col-md-4">
                    <input type="date" class="form-control" name="date" id="inputprenom" required>
                </div>
            </div>
     
           
                <div class="form-row">
                <div class="form-group col-md-4"><h5 style="text-indent:100px;">Banque</h5>
                </div>
                <div class="form-group col-md-4">
                    <select type="text" class="form-control" name="banque" id="inputstatut" required>
                        <option value="" selected>--- Choisir ---</option>
                        <option value="SNPSF-RP" >SNPSF-RP</option>
                        <option value="SNPSF-PORT" >SNPSF-PORT</option>
                        <option value="SNPSF-MUTSAMUDU" >SNPSF-MUTSAMUDU</option>
                        <option value="SNPSF-FOMBONI" >SNPSF-FOMBONI</option>
                    </select>                
                </div> 
            </div>
         
            
            
                        
                     
                        <div class="text-center">
                        <button name="submit" type="submit" class="btn btn-primary">Enregistrer</button>
                       </div>
                       </form>
                </div>
                </div>


                       
              
                <?php /*}*/  }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
    <?php } ?>

                
        </main>

             <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
   
</body>
</html>
