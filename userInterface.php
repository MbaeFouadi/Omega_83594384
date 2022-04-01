<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
include('connexion.php');


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
                    case 8:include('interfaces/adminRubrique.php'); break;
                    case 9:include('interfaces/secretariatRubrique.php'); break;
                    
                    }
                ?>
                 <li class="bord"><a href="profil.php"><i class="icon-user"></i> &nbsp; <span class="nav-item-text">Changer mon mot de passe</span></a></li>
                        
                        <li><a href="deconnexion.php"><i class="icon-logout"></i> &nbsp; <span class="nav-item-text">Déconnexion</span></a></li>
                     
                 </ul>       
            </nav>
        </aside>
        <main class="main-content">
        <h5 align="right" > <strong><?php echo  ucwords(utf8_encode($_SESSION['nom'])." ".utf8_encode($_SESSION['prenom'])); ?></strong></h5>

        <h5 align="right" style="color:#00b185;"> <strong><?php echo  utf8_encode($_SESSION['libelle']); ?></strong></h5>
<h1 class="soft-title-1"><span style="font-family:algerian">Bienvenue dans OMEGA</span> </h1>
                <p align="center"> <?php echo (date('d-m-Y'));?></p>
                </div>
            <div class="text-center mb-5">
                <?php
                    switch($_SESSION['cat']){
                        case 1:include('interfaces/superAdminMenu.php'); break;
                        case 2: include('interfaces/administrationMenu.php'); break;
                        case 3:include('interfaces/agtScolariteMenu.php'); break;
                        case 4: include('interfaces/scolariteMenu.php'); break;
                        case 5:include('interfaces/desMenu.php'); break;
                        case 6: include('interfaces/gestionnaireMenu.php'); break;
                        case 7:include('interfaces/agentComptaMenu.php'); break;
                        case 8:include('interfaces/adminMenu.php'); break;
                
                    }
                    ?>
             <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
   
</body>
</html>