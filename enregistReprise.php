<?php
 session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7")){
include('connexion.php');
$r="SELECT  date_fin FROM date_fin where type=1 order by id_date DESC";

    // $req = mysqli_query($link,$r);
    // $datedebu=mysqli_query($link,"SELECT * FROM date_debut WHERE type=2 ORDER BY id_date_debut DESC");
    // $datedeb=mysqli_fetch_array($datedebu);
 
     //parcourir les données de la table date_fin    
     $req = mysqli_query($link,$r);
     $data=mysqli_fetch_array($req);
     $dateJ=date('Y-m-d');
 
     //Verification de la date de prinscription
     if($data['date_fin'] < $dateJ){ ?>
         <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, les préinscriptions sont d&eacute;ja ferm&eacute;es, ou n'ont pas encore debuté !<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
         
             <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, les préinscriptions ne sont pas encore debuté<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
        <?php }
 
         else{
$message="";


$dateJ=date('Y-m-d');

if(isset($_GET['id_type'])){
    $_SESSION['id_type']=$_GET['id_type'];
    // $type=$_SESSION['id_type'];
}
if(isset($_POST["valider"])){
    $matricule = $_POST["matricule"];
    $nin = $_POST['nin'];
		$_SESSION['matricule'] = $matricule;
		$_SESSION['nin'] = $nin;
		
	    //	$datelog = date('Y-m-d');
	    //	$log = "INSERT INTO log_gestion (activite, login, date_heure) VALUES ('Transfert','$login','$datelog') ";
        //mysqli_query($link,$log) or die('Erreur SQL !'.$log.'<br>'.mysqli_error());
        $sql = "SELECT NIN,mat_etud,etudiant.nom,etudiant.prenom,etudiant.date_naiss,etudiant.lieu_naiss from etudiant  where  mat_etud ='".$matricule."'";
$sql1 = mysqli_query($link,$sql);
    while ($data = mysqli_fetch_array($sql1))
    {
       
        $nom = $data['nom'];
        $prenom=$data['prenom'];
        $date_naiss=$data['date_naiss'];
        $lieu_naiss = $data['lieu_naiss'];
        
    }
        $sql4=mysqli_query($link,"SELECT annee,Serie,Centre,Mention from bachelier where NIN ='".$nin."'");
            while ($data=mysqli_fetch_array($sql4)){
                $annee = $data['annee'];
                $serie=$data['Serie'];
                $centre=$data['Centre'];
                $mention = $data['Mention'];
                
            }
        if(mysqli_num_rows($sql4)>0)
        {
            
            $rep = mysqli_query($link,"UPDATE candidats SET annee='".$annee."',mention='".$mention."',serie='".$serie."',centre='".$centre."' where nin='".$nin."'");
            
            header('location:infoReprise.php');
        }
        else{
            header('location:infoReprise.php');
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
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
        <h1 class="soft-title-1">Bienvenue, <?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?> </h1>
                <p align="center"> <?php echo (date('d-m-Y'));?></p>
                </div>
   
       
            <div class="row">
                <hr />
                <h6> <?php echo $message ?></h6>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="enregistReprise.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        <div class="form-group col-md-4">
                                
                                <input style="text-align:center;margin-bottom:20px;"  name="matricule" type="text" class="form-control" id="inputmat" placeholder="Saisir le Numéro de matricule" required>
                                <input style="text-align:center;"  name="nin" type="text" class="form-control" id="inputmat" placeholder="Saisir le nin " required>
                                 
                                 </div>
                                 </div>
                                 
                                <div class="text-center">
                        <button name="valider" type="submit" class="btn btn-primary">Envoyer</button>
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
<?php }  }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
    <?php }

?>