<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7")){
    include('connexion.php');
$req = "SELECT * FROM users";
$reque = mysqli_query($link,$req);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableaux - Université des Comores</title>
    <link rel="shortcut icon" href="./assets/img/udc.png">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./node_modules/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./assets/css/main.css">
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
						<?
						include('interfaces/superAdminRubrique.php');
						?>
         <li class="bord"><a href="profil.php"><i class="icon-user"></i> &nbsp; <span class="nav-item-text">Changer mon mot de passe</span></a></li>
                        
                        <li><a href="deconnexion.php"><i class="icon-logout"></i> &nbsp; <span class="nav-item-text">Déconnexion</span></a></li>
                     
                 </ul>       
            </nav>
				</aside>
				<main class="main-content">
        <h4 align="right"><strong><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?> </strong></h4>
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
       
                <p align="center"> <?php echo (date('d-m-Y'));?></p>
                </div>
            <div class="text-center mb-5">
				</div>
                <h1 class="soft-title-1">Liste des utilisateurs </h1>
                <hr />
                <h5><?php echo $message ?> </h5>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                   
                        <table class="table table-striped table-bordered">
                        
                        
                            <thead class="thead-dark">
                           
                                <tr>
                                    <th scope="col">#id</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">prenom</th>
                                    <th scope="col">login</th>
                                    <th scope="col">statut</th>
                                    <th>Options</th>
                                </tr>
                                
                            </thead>
                           
                                <tr>
                                <?php while ($data = mysqli_fetch_array($reque)){ ?>
                                    <th scope="row"><?php echo $data['id_users'] ?></th>
                                    <td><?php echo $data['nom'] ?></td>
                                    <td><?php echo $data['prenom'] ?></td>
                                    <td><?php echo $data['login'] ?></td>
                                    <td><?php if($data['statut']=="1")
                                    {
                                        echo "actif";
                                    }else if($data['statut']=="0")
                                    {
                                        echo "desactif";
                                    }?></td>
                                    <td><small><a href="supp.php?id=<?php echo $data['id_users'];?>" class="delete-element" name="supprimer">Supprimer</a> &nbsp; &nbsp; <a href="modif.php?id=<?php echo $data['id_users'];?>" name="modifier">modifier</a>  &nbsp; &nbsp;<a href="modif_mdp.php?id=<?php echo $data['id_users'];?>" target="_blank">Changer mot de passe</a> </small></td>
                               
                                    
                                </tr>
                               
                                <?php };
                                mysqli_close($link);
                                 ?>
                            
                        </table>
                    </div>
                </div>
            </div>

            
            </div>
        </main>
    </section>
  
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