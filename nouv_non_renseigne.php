<?php
session_start();
include('connexion.php');
$message="";
    if(isset($_POST['valider'])){
        $valider=$_POST['valider'];
        }
        else{
            $valider=null;
        }
$nin=$_POST['nin'];
 if( $nin <> null )

{
    
     
         $requete = mysqli_query($link,"SELECT * FROM bachelier where  NIN= '".$_POST['nin']."'");
         while($data=mysqli_fetch_array($requete)){
            
             $_SESSION['nin']=$data['NIN'];
            
             $datelog = date('Y-m-d');
		//$log = "INSERT INTO log_gestion (login, date,activite) VALUES ('".$_SESSION['login']."','$datelog','Demande de nouvel etudiant') ";
		//mysqli_query($link,$log) or die('Erreur SQL !'.$log.'<br>'.mysql_error());
		

            header('Location:info_etud.php');
            
                      
                        }
                    }
    
         // $message="Ce nin n'existe pas ,cette personne n'a pas eu son bac cette annee"  ;

    

//mysqli_close($link); // fermer la connexion





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
            <div class="text-center mb-5">
            <h1 class="soft-title-1">Bienvenue,<?php echo $_SESSION['prenom']." ".$_SESSION['nom']?></h1>
                <p>Samedi, 8 juin 2019</p>
            </div>
            
                <h1 class="soft-title-2">Rechercher un Bachelier</h1>
                <hr />
                <h6> <?php echo $message ?></h6>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="nouv_non_renseigne.php" method="POST">
                        
                                <label for="inputNin">Nin</label>
                                <input name="nin" type="text" class="form-control" id="inputNin" required>
                                 <br>
                                <div class="text-right">
                        <button name="valider" type="submit" class="btn btn-primary">Enregistrer</button>
                       </div>
                    </form>
                </div>
            </div>
        </main>
        </main>
    </section>
             <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
   
</body>
</html>