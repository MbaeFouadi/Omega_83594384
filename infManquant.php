<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7")){
include('connexion.php');
$sd=mysqli_query($link,"SELECT * FROM date_fin order by id_date DESC ");
        $dat=mysqli_fetch_array($sd); 
$a = $_SESSION['numre'];
if(isset($_POST['submit'])){
    $sexe=$_POST['sexe'];
    $email=$_POST['email'];
    $telm=$_POST['telm'];
    $telf=$_POST['telf'];
    $adresse=addslashes($_POST['adresse']);
    $nationalite=$_POST['nationalite'];
    $pays=$_POST['pays'];
    $situat =$_POST['situat'];
    $ile = addslashes($_POST['ile']);
    $nbre = $_POST['nbre'];
    $bp = $_POST['bp'];


$req = "UPDATE candidats SET pays='$pays',tel_mobile='$telm' ,tel_fix='$telf',situation ='$situat',adresse_cand='$adresse',mail='$email',ile ='$ile',Nbr_enfants ='$nbre',bp='$bp',sexe ='$sexe',nationalite ='$nationalite' WHERE num_recu='".$a."' ";

mysqli_query($link,$req);
header('location: fichepreinscri.php');
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
           <li class="bord"><a href="#"><i class="icon-user"></i> &nbsp; <span class="nav-item-text">Changer mon mot de passe</span></a></li>
                        
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
   
       
          
            

                <h1 class="soft-title-1">Veuillez completer ces informations </h1>
                <hr />
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="infManquant.php" method="POST">
                    <div class="form-row">
                    <div class="form-group col-md-6">
                            <label for="inputsexe">Sexe</label>
                            <select id="inputsexe" class="form-control" name="sexe">
                                <option value="F">Feminin</option>
                                <option value="M" selected>Masculin</option>
                            </select>
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputile">Ile</label>
                            <select id="inputile" class="form-control" name="ile">
                                <option value="Ngazidja">Ngazidja</option>
                                <option value="Anjouan" selected>Anjouan</option>
                                <option value="Moheli" >Moheli</option>
                                <option value="Mayotte" >Mayotte</option>
                            </select>
                            </div>
         
                            <div class="form-group col-md-6">
                            <label for="inputCountry">Pays</label>
                            <input name="pays" type="text" class="form-control" id="inputCountry"  placeholder="Pays" >
                            </div>
                            </div>
                            <div class="form-row">
                            <label for="inputNati">Nationalite</label>
                            <input name="nationalite" type="text" class="form-control" id="inputNati"  placeholder="Nationalite" >
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputile">situation</label>
                            <select id="inputile" class="form-control" name="situat">
                                <option value="Celibataire" selected>celibataire</option>
                                <option value="Marié(e)" >Marié(e)</option>
                                <option value="Divorcé(e)" >Divorcé(e)</option>
                                    </select>
                            </div>

                            <div class="form-group col-md-6">
                            <label for="inputnbre">Nombre d'enfants</label>
                            <input name="nbre" type="text" class="form-control" id="inputnbre" placeholder="Nombre d'enfants">
                            </div>
                            
                        </div>    
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Addresse Actuelle</label>
                            <input name="adresse" type="text" class="form-control" id="inputAddress"  placeholder="adresse">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputbp">Boite postale</label>
                            <input name="bp" type="text" class="form-control" id="inputbp"  placeholder="Boite postale">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Telephone fixe</label>
                            <input name="telf" type="text" class="form-control" id="inputPassword4"  placeholder="773 .. ..">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                        
                         
                         
                            
                    

                        <div class="text-right">
                        <button name="submit" type="submit" class="btn btn-primary">Enregistrer</button>
                       </div>
                    </form>
                </div>
            </div>
    
   
        
             <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
             
             
        </body>
</html>
<?php }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page! </h3>
    <?php }

?>