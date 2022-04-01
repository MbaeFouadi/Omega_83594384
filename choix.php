<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="4" )){
include('connexion.php');
$m="";
$reep=mysqli_query($link,"SELECT users.id_cat,libelle from users,categorie where users.id_cat=categorie.id_cat");
$sd=mysqli_query($link,"SELECT * FROM date_fin order by id_date DESC ");
        $dat=mysqli_fetch_array($sd); 
        $req=mysqli_query($link,"SELECT * from departement where code_facult='".$_SESSION['login']."' and statut=1 and concours=0 ");
        if(isset($_POST['libell'])){ 
        $libell =  $_POST['libell']; 
    } 
    else { 
    $libell = null;
    } ;
    if(isset($_POST['choix'])){ 
        $li =  $_POST['choix']; 
    } 
    else { 
    $choix = null;
    } ;
        
          
            if(isset($_POST['valider'])){
               $_SESSION['libell']=$_POST['libell'];

               $_SESSION['choix']=$_POST['choix'];
               header('location:rechercheetud.php');
            }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaires - Université des Comores</title>
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
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-50px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-50px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
        <h1 class="soft-title-1">Selectionner </h1>
            <hr/>
                </div>
                
            <div class="text-center mb-5">
				</div>
          
           <?php  
           if($num==0){?>
                <h6 style="color:red"> <?php echo $m ?></h6>
    <?php  } else{ ?>
                <h6 style="color:green"> <?php echo $m ?></h6>
                 
                
                <?php   }
            ?>
            
           
            
       
        <div class="row">
            <div class="col-12">
                <form action="choix.php" method="POST">
            
                <div class="form-row">
                    <div class="form-group col-md-4">
                    </div>
                </div>
                  <div class="form-row">    
                  <div class="form-group col-md-4">
                </div>
        <div class="form-group col-md-4">


                    <select type="text" class="form-control" name="libell" id="inputlib" placeholder="Département" required>
                    <option value="">--- Choisir ---</option>
                    <?php 
                                                          
        while($data=mysqli_fetch_array($req)){?>
        <option value="<?php echo utf8_encode($data['code_depart']);?>"><?php echo utf8_encode($data['design_depart']);?></option>
                    
        <?php 
        }
            ?>
                            </select>
                        
                                                
                                            
                                </div>
                        
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        
                    </div>
                        <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        
                        </div>
                    <div class="form-row">
                        
                        <div class="form-group col-md-4">
                        </div>
                        
                            
                        <div class="form-group col-md-4" >
                            <select name="choix" class="form-control" required>
                            <option hidden>---Choisir----</option>
                                <option value="choix1">Choix 1</option>
                                <option value="choix2">Choix 2</option>
                                <option value="choix3">Choix 3</option>
                                

                            </select>
                        </div>
                    </div>
                        <div class="form-row">
                           <div class="form-group col-md-4">
                           </div>
                        
                        </div>
                
                       
                <div class="text-center" style="margin-top:50px;">
                    <button name="valider" type="submit" class="btn btn-primary">Enregistrer</button>
                   </div>
                   
                </form>
           
                </div>
                        
                        </div>
               


    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
</body>
</html>
<?php   }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
    <?php }

?>