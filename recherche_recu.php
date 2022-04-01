<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="2" or $_SESSION['cat']=="5" )){
include('connexion.php');


$s=0;

if(isset($_POST['submit'])){
    if(!empty($_POST['recu'])){
        $recu=$_POST['recu'];
        $req=mysqli_query($link,"SELECT * FROM candidats WHERE num_recu='$recu'");
        if(mysqli_num_rows($req)>0){
           $data= mysqli_fetch_array($req);
            if($data['statut']==1){
                $choix=$data['type_recu'];
                $s=1;
            }
            else if ($s==2){
                switch($choix){
                    case "Pré-inscription": header('location: fichepreinscri.php'); break; 
                    case "2em ou 3em année":header('location: deuxieme.php'); break; 
                    case "Transfert":header('location: FicheTransfert.php'); break; 
                    case "Reprise":header('location: FicheReprise.php'); break; 
                    case "Master":header('location: Fiche_master.php'); break; 
                    
                    
                 }
            }
        }
        else{
            $m="Ce reçu n'existe pas!";
        }
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
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle'] ?></strong></h5>
        <h1 class="soft-title-1">Bienvenue, <?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?> </h1>
                <p align="center"> <?php echo (date('d-m-Y'));?></p>
                </div>
            <div class="text-center mb-5">
                
                <?php
                if($s==0){?>
                    <h2 class="soft-title-2" style="color:#00b185;">Rechercher un reçu</h2>
                <hr />
            </div>

            <div class="row">
                <div class="col-12">
                <form action="recherche_recu.php" method="post">
                        <div class="form-row">
            
            
                       
                            <div class="form-group">
                                <label for="inputPassword">Saisir le Numéro de re&ccdil;</label>
                                <input type="text" name="recu" class="form-control"  placeholder="">
                            </div>

                            
                        </div>
                            
                          
                     
                        
                        <input  type="submit" name="submit" class="float-right" value="rechercher">
                    </form>
                </div>
            </div>
               <?php }else if($s==1){?>
                <table>

        <tr>
                <td>Nin : <b><? echo $data['nin']?></b>
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Type du re&ccedil;: &nbsp;&nbsp;&nbsp;<b><? echo $data['type_recu']  ;?></b>
                </td>
            </tr>
           
            <tr>
                <td>Nom : &nbsp;&nbsp;&nbsp;<b><? echo $data['nom'] ;?></b>
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Prenom : &nbsp;&nbsp;&nbsp;<b><? echo $data['prenom']  ;?></b></td>
            </tr>
            <tr border="1">
                <td>
            Date de naissance : &nbsp;&nbsp;&nbsp;<b><? echo $data['date_naiss'] ;?></b> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            </tr>
            <tr>
                <td>
                lieu de naissance &nbsp;&nbsp;&nbsp;<b><? echo $data['lieu_naiss'] ;?>  &nbsp;&nbsp; &nbsp;&nbsp;</b>
                </td>
           



            <tr>
                <td>
                Série: &nbsp;&nbsp;<b><? echo $data['serie'] ;?></b>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Centre :<b> <? echo $data['Centre'] ;?> </b>
                </td>
            </tr>
            
            <tr>
                <td>
                Mention: &nbsp;&nbsp; <b><? echo $data['mention'] ;?></b>
                </td>
            </tr>
            
            <tr>
                <td>
                      Annee d obtention du bac:&nbsp;&nbsp;<b><? echo $data['annee'] ;?></b>  &nbsp;&nbsp; &nbsp;&nbsp;
                </td>
            </tr>
          
            </table>
            </form>
              <?php 
              
           $s=2;
                ?>
         
            <form action="infoBach.php" method="POST">
                        <div class="text-right">
                          <button name="submit" type="submit" class="btn btn-primary">Rechercher</button>
                        </div>
                        </form>
              <?php 
              
            }
                ?>

                
        </main>

             <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
   
</body>
</html>
<?php
}else{ ?>
    <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
<?php }
?>