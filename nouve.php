<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7" or $_SESSION['cat']=="5")){
include('connexion.php');
$r="SELECT  date_fin FROM date_fin order by id_date DESC";

    $req = mysqli_query($link,$r);
    $data=mysqli_fetch_array($req);
    $dateJ=date('Y-m-d');
    if($data['date_fin'] < $dateJ ){ ?>
        <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, les pr&eacute;inscriptions sont d&eacute;ja ferm&eacute;s !<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
        <?php }else {
//echo '<pre>';print_r($_SESSION);echo '</pre>';
$message="";
if(isset($_POST['choix'])){
$statut=$_POST['choix'];
}
else{
    $choix=null;
}

switch($choix){
     case "1":$statut="Nouveau"; break; 
     case "2":$statut="Transfert"; break; 
     case "1":$statut="Reprise"; break; 
    
    
 }
if(isset($_POST['nin'])){
    $nin=$_POST['nin'];
    }
    else{
        $nin=null;
    }

    if(isset($_POST['valider'])){
        $valider=$_POST['valider'];
        }
        else{
            $valider=null;
        }

 if( $nin <> null)

{
    
     
         $requete = mysqli_query($link,"SELECT * FROM bachelier where  NIN= '".$_POST['nin']."' ORDER by annee DESC");
         if(mysqli_num_rows($requete)>0){

         
         while($data=mysqli_fetch_array($requete)){
            
             $_SESSION['nin']=$data['NIN'];
            
             $datelog = date('Y-m-d');
		//$log = "INSERT INTO log_gestion (login, date,activite) VALUES ('".$_SESSION['login']."','$datelog','Demande de nouvel etudiant') ";
		//mysqli_query($link,$log) or die('Erreur SQL !'.$log.'<br>'.mysql_error());
		

            header('Location:infoBach.php?p=0');
            
                      
                        }
                    }else{
    
          $message="Ce nin n'existe pas ,cette personne n'a pas eu son bac "  ;

    
                    }
//mysqli_close($link); // fermer la connexion


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
       
                <p align="center"> <?php echo (date('d-m-Y'));?></p>
                </div>
            <div class="text-center mb-5">
				</div>
                <h1 class="soft-title-2" style="text-align:center;">Rechercher un Bachelier</h1>
                <hr />
                <h5 align="center" style="color:red;"> <?php echo $message ?></h5>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="nouve.php" method="POST">
                    <div class="form-row">
                         <div class="form-group col-md-4"></div>
                            <div class="form-group col-md-4">
                                <input style="text-align:center;"  name="nin" type="text" class="form-control" placeholder="Saisir le nin"  id="inputNin" required>
                                 </div></div>
                    <div class="text-center">
                        <button name="valider" type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                    </form>
                    </div>
                </div>
                    
           
              
           

            



        </main>
       
    </section>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
   
</body>
</html>
<?php }  
}else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
    <?php }
