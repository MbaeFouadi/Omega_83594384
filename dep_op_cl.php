<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
if(isset($_SESSION['login']) and $_SESSION['cat']=="3"){
include('connexion.php');
if(isset($_POST['submit'])){ 
  $dep = $_POST['depart'];
  $opt = $_POST['opt'];
  
  
$sq= mysqli_query($link,"SELECT * FROM departement where code_depart='$dep'");
$dat = mysqli_fetch_array($sq);

  if($opt=="o"){
    $sql="UPDATE departement set statut=1 where code_depart='$dep'" ;
  }elseif($opt=="f"){
    $sql="UPDATE departement set statut=0 where code_depart='$dep'";
  }
   mysqli_query($link,$sql);
   $n=mysqli_affected_rows($link);
   if($n>0){
    $num=1;
    if($opt=="o"){
        $m=" Le departement ".$dat['design_depart']."  a bien été ouvert ";
      }elseif($opt="f"){
        $m="Le departement ".$dat['design_depart']."   a bien été fermé ";
      }
   }else{
    $num=0;
    $m="Aucune changement n' a été faite";
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
                <p align="center"> <?php echo (date('d-m-Y'))?></p>
                </div>
   
       
          
            
<div class="text-center mb-5">
    <h1 class="soft-title-1">Ouvrir / Fermer un département </h1>
    <hr />
    <?php
           if($num==0){?>
                <h6 style="color:red"> <?php echo $m." ".$sql." ".$opt ?></h6>
    <?php  } else{ ?>
                <h6 style="color:green"> <?php echo $m ?></h6>
                 
                
                <?php   }
            ?>
</div>
            
<div class="row">
    <div class="col-12">
        <form action="dep_op_cl.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-3"><h4 style=""></h4> </div>
                <div class="form-group col-md-4">
                    <label for="inputcomp1">Composante</label>
                    <select id="inputcomp1" class="form-control" name="faculte2">
                        <option value="" >---Choisir---</option>

                        <?php 

                        $pics = mysqli_query($link,"SELECT * FROM faculte ");
                        while($data=mysqli_fetch_array($pics)){?>

                        <option value="<?php echo $data['code_facult'];?>" data-concour="<?php echo $data['concours'];?>"><?php echo $data['design_facult'];?></option>
                                                
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
                            
                            
            <div class="text-right">
                <button name="submit" type="submit" class="btn btn-primary">Changer</button>
            </div>
        </form>
    </div>
</div>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
    <script src="./assets/js/dep_op_cl.js"></script>        
             
        </body>
</html>
<?php
}else{ ?>
    <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
<?php }
?>