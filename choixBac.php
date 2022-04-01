<?php
session_start();
include('connexion.php');
if(isset($_POST['choix'])){
$statut=$_POST['choix'];
}
else{
    $choix=null;
}

 switch($statut){
    case "option1": header('location: bac_non_renseigne.php'); break; 
    case "option2":header('location: nouv_non_renseigne.php'); break; 
    case "option3":header('location: bac_non_renseigne.php'); break; 
    
    
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
         $requete = mysqli_query($link,"SELECT * FROM bachelier where NIN= '".$_POST['nin']."' and annee = '2017' ");
         while($data=mysqli_fetch_array($requete)){
            
             $_SESSION['nin']=$data['NIN'];
            
             

            header('Location:nouv.php');
            
                      
                        }
    }
    
   



mysqli_close($link); // fermer la connexion





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
            <div class="text-center mb-5">
            <h4 align="right"><strong><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?> </strong></h4>
            <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle'] ?></strong></h5>
            <p align="center"> <?php echo (date('d-m-Y'))?></p>
            
            
                <h1 align="center" class="soft-title-2">pre-inscrire un etudiant</h1>
                <hr />
            </div>
            <div class="row" style="margin-top:100px;margin-left:50px;">
                <div class="col-12">
                    <form action="choixBac.php" method="POST"> 
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="choix" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Bac avant 2010</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="choix" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Bac apres 2010</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="choix" id="inlineRadio3" value="option3">
                    <label class="form-check-label" for="inlineRadio3">Bac Etranger</label>
                     
                    <div class="text-right" style="margin-left:50px;">
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