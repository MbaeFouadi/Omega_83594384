<?php
session_start();
include('connexion.php');
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7")){
$dateP=date('Y-m-d');
$sd=mysqli_query($link,"SELECT * FROM date_fin order by id_date DESC ");
        $dat=mysqli_fetch_array($sd); 
   // $sexe=$_POST['sexe'];
   // $email=$_POST['email'];
   // $telm=$_POST['telm'];
   // $telf=$_POST['telf'];
  //  $adresse=$_POST['adresse'];
  //  $nationalite=$_POST['nationalite'];
  //  $pays=$_POST['pays'];

    $requete = mysqli_query($link,"SELECT * FROM bachelier where NIN= '".$_SESSION['nin']."' ");
    $data=mysqli_fetch_array($requete);
        $nin = $data['NIN'];
        $nom =addslashes($data['Nom']) ;
        $prenom = addslashes($data['Prenom']);
        $naiss = $data['Date_nais'];
        $lieu_naiss = $data['Lieu_nais'];
        $num_attest = $data['Num_attest'];
        $annee = $data['annee'];
        $serie = $data['Serie'];
        $ment = $data['Mention'];
      
    
    
    if(isset($_POST['submit'])){
    $req = "INSERT INTO candidats (nin,nom,prenom,date_naiss,lieu_naiss,num_attest,annee_bac,serie,mention,date_prescript,type_recu,traitant_recu)
    values('$nin','$nom','$prenom','$naiss','$lieu_naiss','$num_attest','$annee','$serie','$ment','$dateP','2em ou 3em','".$_SESSION['login']."')";
    mysqli_query($link,$req);
    header('location:recu.php');
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
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-50px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-50px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
                </div>
            <div class="text-center mb-5">
				</div>
   
      
        <table>

        <tr>
                <td>Nin : <b><? echo $data['NIN']?></b></td>
            </tr>
           
            <tr>
                <td>Nom : &nbsp;&nbsp;&nbsp;<b><? echo $data['Nom'] ;?></b>
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Pr&eacute;nom : &nbsp;&nbsp;&nbsp;<b><? echo $data['Prenom']  ;?></b></td>
            </tr>
            <tr border="1">
                <td>
            Date de naissance : &nbsp;&nbsp;&nbsp;<b><? echo $data['Date_nais'] ;?></b> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                lieu de naissance &nbsp;&nbsp;&nbsp;<b><? echo $data['Lieu_nais'] ;?>  &nbsp;&nbsp; &nbsp;&nbsp;</b>
                </td>
           



            <tr>
                <td>
                S&eacute;rie: &nbsp;&nbsp;<b><? echo $data['Serie'] ;?></b>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Centre :<b> <? echo $data['Centre'] ;?> </b>
                </td>
            </tr>
            
            <tr>
                <td>
                Mention: &nbsp;&nbsp; <b><? echo $data['Mention'] ;?></b>
                </td>
            </tr>
            
            <tr>
                <td>
                Num&eacute;ro de l'attestation: &nbsp;&nbsp;&nbsp;<b> <? echo $data['Num_Attest'] ;?></b>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;   Ann&eacute;e d'obtention du bac:&nbsp;&nbsp;<b><? echo $data['annee'] ;?></b>  &nbsp;&nbsp; &nbsp;&nbsp;
                </td>
            </tr>
          
            </table>
                        <form action="infoBach.php" method="POST">
                        <div class="text-right">
                          <button name="submit" type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                        </form>

    
    
       
   
        
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