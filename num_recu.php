<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="3" or $_SESSION['cat']=="7" )){
include('connexion.php');
$r="SELECT  date_fin FROM date_fin WHERE  type=1 order by id_date DESC";

    $req = mysqli_query($link,$r);
    $data=mysqli_fetch_array($req);
    $dateJ=date('Y-m-d');
    if($data['date_fin'] < $dateJ ){ ?>
        <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, les pr&eacute;inscriptions sont d&eacute;ja ferm&eacute;es !<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
        <?php }else { 

$message="";


if(isset($_POST['num_recu'])){
    $numre=$_POST['num_recu'];
    }
    else{
        $numre=null;
    }

    if(isset($_POST['valider'])){
        $valider=$_POST['valider'];
        }
        else{
            $valider=null;
        }

 if( $numre <> null)

{
    
     
         $requete = mysqli_query($link,"SELECT * FROM candidats where  num_recu= '".$_POST['num_recu']."' ");
         
         while($data=mysqli_fetch_array($requete)){
            
             $_SESSION['num_recu']=$data['num_recu'];
             $_SESSION['serie']=$data['serie'];
             $type=$data['id_type'];
             $_SESSION['tipe']=$type;
         }
         if(mysqli_num_rows($requete)>0)
         {
             if($type == 6 || $type ==7){

            header('Location:choixDep.php');
             }else{
                header('Location:formu.php');
             }
         }else{
             $message = "Ce recu n'existe pas dans la base de donnée";
         }

            
            
                      
                        
        }

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
       
        <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-60px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-60px;color:#00b185;"> Fin de préinscription : <?php echo $data['date_fin'];?></h5>
                </div>
            <div class="text-center mb-5">
				</div>
                <h2 align="center" class="soft-title-2" style="color:#00b185;">Donnez le numero de reçu</h2>
                <hr /><div style="margin-bottom:80px"></div>
                <h5 align="center" style="color:red;"> <?php echo $message ?></h5>
            </div>
            
         

            <form action="num_recu.php" method="POST">
                    
                         <div class="form-row">
                         <div class="form-group col-md-4"></div>
                            <div class="form-group col-md-4">
                   
                            <input style="text-align:center;" name="num_recu" type="text" class="form-control"   placeholder="Saisir le numéro de reçu" required >
                            </div></div>
                   
                    </div></div>
                            <div class="text-center">
                        <button name="valider" type="submit" class="btn btn-primary">Enregistrer</button>
                       </div>
                       </form>


        </main>
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