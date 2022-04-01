<?php
session_start();
include('connexion.php');
$m="";
$nbr=0;
if(isset($_POST['submit'])){
    $dateJ=date('Y-m-d');
   // $debut=$_POST['date1'];
    $fin=$_POST['date1'];
    //$traitant=$_SESSION['login'];

    //insertion du type (1:preinscription, 2:inscription)...
    
    $r="INSERT INTO date_fin (date_fin,type) values ('$fin','1')";

    $req = mysqli_query($link,$r);
    $nbr = mysqli_affected_rows($link);
     if($nbr!=0){
    //
            $m="Vous venez de fixer le ".$fin."  comme date de fin des préinscriptions ";

      }
     else if($nbr>0){
            $m="La date de fin des préinscriptions n'est pas mis à jour!";
         }
    //  $num=1;
    // } else if($nbr==0){
    //     $m="Du ".$debut." au ".$fin." , Vous avez imprimé aucun reçu , donc vous avez rien encaissé ";

    // }

}

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

                <p align="center"> <?php echo (date('d-m-Y'));?></p>
                </div>
            <div class="text-center mb-5">
				</div>



                <h2 class="soft-title-2" align="center" style="color:#00b185;">Fin des Préinscriptions</h2>
                <hr/>

           <?php if($nbr){ ?>
            <h3 class="soft-title-4" style="color:black;margin-top:20%;font-family:algerian;"> <?php echo $m ?></h3>
            </div>
            <!-- <div class="text-right">
                        <button  type="submit" class="btn btn-primary"> <a href="situationP.php">Rechercher</a></button>
                       </div>  -->
                <?php   }


                else{ ?>




<h3 class="soft-title-4" align="center" style="margin-top:50px;margin-bottom:20px;">Veuillez indiquer la date!</h3>





            </div>
            <form action="fixation_fin.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="inputAddress">Date</label>
                    <input name="date1" type="date" class="form-control" id="inputAddress" placeholder="" required>
                </div>


                        </div>
                        <div class="text-center">
                        <button name="submit" type="submit" class="btn btn-primary">Fixer</button>
                       </div>
                    </form>
                <?php } ?>
                </div>
            </div>
        </main>

             <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>

</body>
</html>
