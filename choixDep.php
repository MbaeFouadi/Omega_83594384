<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}

   if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="3" )){
   
include('connexion.php');
$r="SELECT  date_fin FROM date_fin order by id_date DESC";

    $req = mysqli_query($link,$r);
    $dat=mysqli_fetch_array($req);

$numre= $_SESSION['num_recu'];
$bete = mysqli_query($link," SELECT * FROM candidats where  num_recu= '".$numre."'");
    $data=mysqli_fetch_array($bete);
        $nin = $data['nin'];
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $naiss = $data['date_naiss'];
        $lieu_naiss = $data['lieu_naiss'];
        $numre= $data['num_recu'];
        $_SESSION['nin'] = $data['nin'];
        $type = $data['id_type'];
        $_SESSION['id_type']= $data['id_type'];
if(isset($_POST['submit'])){ 
    
    $fac2 = $_POST['faculte2'];
    $dep2 = $_POST['depart'];
    $niv=$_POST['opt'];
    $_SESSION['faculte2']= $_POST['faculte2'];
    $_SESSION['depart']= $_POST['depart'];
    $r=mysqli_query($link,"SELECT * FROM disposition WHERE code_depart='$dep2' and code_niv='$niv' and statut=1");
    //echo "SELECT * FROM disposition WHERE code_depart='$dep2' and code_niv='$niv' and statut=1";

    if(mysqli_num_rows($r)>0){
        $requ =mysqli_query($link,"UPDATE candidats set statut=3 , choix1='".$dep2."' where nin='".$nin."'");
        header('location:liste_choix.php');
    }else{
        $m="Le niveau demandé n'est pas ouvert pour ce departement !";
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
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
       
        <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-60px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-60px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
                </div>
            <div class="text-center mb-5">
				</div>
   
       
          
            
<div class="text-center mb-5">
<div class="row">
    <div class="col-12">
        
        <div class="form-row">
            <div class="form-group col-md-3">
                <h6 style="margin-left:-25px">Nom:</h6>

            </div>
            <div class="form-group col-md-3">
                <h6><strong><?php echo $nom?></strong></h6>

            </div>
            <div class="form-group col-md-3">
                <h6 style="margin-left:-65px">Prénom:</h6>
            </div>
            <div class="form-group col-md-3">
                <h6 style=""><strong><?php echo $prenom?></strong></h6>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <h6 style="margin-left:65px">Date de naissance:</h6>

            </div>
            <div class="form-group col-md-3">
                <h6 style="margin-left:-25px"><strong><?php echo $naiss?></strong></h6>

            </div>
            <div class="form-group col-md-3">
                <h6>Lieu de naissance:</h6>
            </div>
            <div class="form-group col-md-3">
                <h6 style=""><strong><?php echo $lieu_naiss ?></strong></h6>
            </div>
        </div>
    </div>
</div>

                
                        
    <hr />
    <div></div>
    <h1 class="soft-title-1">Fait un choix </h1>

                <h6 style="margin-top:30px;margin-bottom:50px;color:red"> <?php echo $m ?></h6>
            </div>
</div>
            
<div class="row">
    <div class="col-12">
        <form action="choixDep.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-3"><h4 style=""></h4> </div>
                <div class="form-group col-md-4">
                    <label for="inputcomp1">Composante</label>
                    <select id="inputcomp1" class="form-control" name="faculte2" required>
                        <option value="" >---Choisir---</option>

                        <?php 

                        $pics = mysqli_query($link,"SELECT * FROM faculte where facul = 1 ");
                        while($data=mysqli_fetch_array($pics)){?>

                        <option value="<?php echo $data['code_facult'];?>" data-concour="<?php echo $data['concours'];?>"><?php echo ($data['design_facult']);?></option>
                                                
                        <?php 
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-4"id ="polo"></div>
            </div>
            <br><br><br>
                            
                            
            <div class="text-center">
                <button name="submit" type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
    <script src="./assets/js/choixdep.js"></script>        
             
        </body>
</html>
<?php }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page! </h3>
								<h3 align="center" style="font-family:arial;margin-top:20%;"><a href="userInterface.php"> retour &agrave; la page d'acceuil</a>
		<?php }

?>