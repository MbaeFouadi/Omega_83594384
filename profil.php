<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    
    exit();
}

elseif(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or  $_SESSION['cat']=="2" or $_SESSION['cat']=="3" or $_SESSION['cat']=="4" or $_SESSION['cat']=="5" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7" )){
    include('connexion.php');

$message = "";
$r=mysqli_query($link,"SELECT  date_fin FROM date_fin order by id_date DESC");
$dat = mysqli_fetch_array($r); 
   if(isset($_POST['submit'])){

    $passe=$_POST['pass'];
    $mdp1=$_POST['pass1'];
    $mdp2=$_POST['pass2'];
  
  $rq=mysqli_query($link,"SELECT  * FROM users WHERE login='".$_SESSION['login']."' ");
  $data=mysqli_fetch_array($rq);
      $pass=MD5($passe);
    if($pass == $data['password']){
        
      if($mdp1==$mdp2){
        $mdp=MD5($mdp1);
          mysqli_query($link,"UPDATE users SET password='$mdp' where login='".$_SESSION['login']."'");
         $message = "Mot de passe enregistrés";
      }
        else{
            $message = "mauvaise confirmation";
        }
    }
    else{
        $message = "Mot de passe actuel invalide";
    }
  }

   
 
 
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
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-80px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-80px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
            <div class="text-center mb-5">
				</div>
                <h1 class="soft-title-1">Changer mon mot de passe </h1>
                <hr />
                <h5 align="center" style="color:black;"><?php echo $message; ?></h5>
            </div> 
            
                    <form action="profil.php" method="post">
                       
                            <div class="form-group">
                                <label for="inputPassword">Mot de passe actuel</label>
                                <input type="password" name="pass" class="form-control"  placeholder="Password" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputPassword1">Nouveau mot de passe</label>
                                <input type="password" name="pass1" class="form-control"  placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword2">Confirmation du nouveau mot de passe</label>
                                <input type="password" name="pass2" class="form-control"  placeholder="Password" required>
                            </div>
                             <br>
                            <div class="text-right">
                        <button name="submit" type="submit" class="btn btn-primary">Changer</button>
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
<?php
}else{ ?>
    <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
<?php }
?>