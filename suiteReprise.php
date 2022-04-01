<?php include('connexion.php');
session_start();
$message="";

$mat = $_SESSION["matricule"];
$s="0";
if(isset($_GET['valider']))
{
    
    $nin = $_GET['nin'];

    $sql4=mysqli_query($link,"SELECT annee,Serie,Centre,Mention from bachelier where NIN ='".$nin."'");
    while ($data=mysqli_fetch_array($sql4)){
        $annee = $data['annee'];
        $serie=$data['Serie'];
        $centre=$data['Centre'];
        $mention = $data['Mention'];
        
    }

    $rep = mysqli_query($link,"UPDATE etudiant SET annee_bac='".$annee."',mention_bac='".$mention."',serie_bac='".$serie."',lieu_obt_bac='".$centre."'where nin='".$nin."'");

    $s="1";
}

if($s=="1")
{
    header('location:suiteReprise.php');

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
       
                <h6 align="center"> <?php echo (date('d-m-Y'));?></h6>
                </div>
            <div class="text-center mb-5">
				</div>
       
            <div class="row">
            <h1 align="center" class="soft-title-2">Veuillez ajouter ces informations </h1>
                <hr />
                <h6> <?php echo $message ?></h6>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="fichecomplet.php" method="GET">
                                <div class="text-center">
                                
                                <input name="matricule" type="text" class="form-control" id="inputmat" value="<?php echo $mat ?>" required>
                                <input name="nin" type="text" class="form-control"  placeholder="Nin">
                                 <br>
                                 </div>
                                <div class="text-right">
                        <button name="valider" type="submit" class="btn btn-primary">Envoyer</button>
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