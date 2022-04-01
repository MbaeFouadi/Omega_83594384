<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="3" or $_SESSION['cat']=="5" )){
include('connexion.php');

$s="0";
if(isset($_POST['submit'])){
    //$mat=$_POST['matricule'];
    $_SESSION['p']=$_POST['num_recu'];
    $req=mysqli_query($link,"SELECT * FROM candidats WHERE num_recu='".$_SESSION['p']."'");
    $s="1";
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
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-80px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-80px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
            <div class="text-center mb-5">
				</div>

                

            <?php
                    if($s==0){ ?>

<h2 align="center" class="soft-title-2" style="color:#00b185;">Rechercher un étudiant</h2>
                <hr />

                <form action="recherche_etudiant.php" method="post">
                <div class="form-row">
                <div class="form-group col-md-4"></div>
                   <div class="form-group col-md-4">
                                
                                <input style="text-align:center;margin-top:40px;" type="text" name="num_recu" class="form-control"  placeholder="Saisir son numéro de recu">
                            </div>

                            
                        </div>
                        </div></div>
                            
                          
                     
                        <div class="text-center">
                        <input  type="submit" name="submit" class="btn btn-primary" value="rechercher">
                        </div>
                    </form>
            </div>
            
                </div>
            </div>
        </main>

                  <?php  } else if($s==1){ ?>


                    <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">N° recu </th>
                                    <th scope="col">Nin</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Année d'obtention du bac</th>
                                    <th scope="col">Lieu d'obtention du bac</th>
                                    <th scope="col">Série</th>
                                    <th scope="col">Mention</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while($data=mysqli_fetch_array($req)){ ?>
                                <tr>
                                    <th scope="row"><?php echo $_SESSION['p']?></th>
                                    <td><?php echo $data['nin']?></td>
                                    <td><?php echo $data['nom']?></td>
                                    <td><?php echo $data['prenom']?></td>
                                    <td><?php echo $data['annee']?></td>
                                    <td><?php echo $data['centre']?></td>
                                    <td><?php echo $data['serie']?></td>
                                    <td><?php echo $data['mention']?></td>
                                    <td><small> <a href="modif_etud.php">Éditer</a>  &nbsp; &nbsp; </td>
                                </tr>
                               <?php }
                                ?>
                               
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mt-2 text-right">
                        <a href="recherche_etudiant.php" class="btn btn-primary btn-sm"><i class="icon-magnifier"></i> Rechercher un autre etudiant </a>
                    </div>
                </div>
            </div>

                    <?php  }
            ?>
                

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