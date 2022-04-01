<?php
session_start();
if(isset($_SESSION['login']) and $_SESSION['cat']=="1" or ($_SESSION['cat']=="9")){  
    
include('connexion.php');
$message="";
$r=mysqli_query($link,"SELECT  date_fin FROM date_fin order by id_date DESC");
$dat = mysqli_fetch_array($r); 

if(isset($_POST['valider'])){
    
        // $ann=mysqli_query($link,"SELECT * FROM annee ORDER by id_annee DESC");
        // $annee=mysqli_fetch_array($ann);
        $inscri=mysqli_query($link,"SELECT * FROM inscription WHERE mat_etud ='".$_POST['matricule']."' AND  Annee='".$_POST['annee']."'");
        $xD=mysqli_fetch_array($inscri);
        if(mysqli_num_rows($inscri)!=0)
        {
            $_SESSION['matricule']=$_POST['matricule'];
            $_SESSION['annee']=$_POST['annee'];
            $_SESSION['sg']=$_POST['sg'];
            // $resul_con = $result['connexion'];
            // $conex =$resul_con+1;
            // mysqli_query($link,"UPDATE etudiant set connexion = $conex where mat_etud ='$login'");
            header("Location:secretariat.php");
        }
        else
        {
            $message="Desole cette  etudiant n'est pas inscris cette année";
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
                        case 9:include('interfaces/secretariatRubrique.php'); break;

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
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-60px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-60px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
               
                </div>
            <div class="text-center mb-5">
				</div>
            
                <h1 align="center" class="soft-title-2">Certificat de scolarité</h1>
                <hr />
                <h6 align="center" style="color:red;"> <?php echo $message ?></h6>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="recherche_secretariat.php" method="POST">
                        
                            
                                 <div class="form-row">
                        <div class="form-group col-md-4"></div>
                           <div class="form-group col-md-4" style="margin-top:10px">
                                <input style="text-align:center;" type="text" name="matricule" class="form-control"  placeholder="Saisir le matricule">
                            </div>

                            <div class="form-group col-md-4" style="margin-top:auto;margin-left:380px;">
                            <?php $query=mysqli_query($link,"SELECT * FROM annee order by id_annee desc"); ?>
                            <select name="annee" class="form-control">
                                        <?php while($data=mysqli_fetch_array($query)){?>
                                            <option value="<?=$data['Annee']?>"><?=$data['Annee']?></option>
                                        <?php }?>
                            </select><br>
                        </div>

                        <div class="form-group col-md-4" style="margin-top:auto;margin-left:380px;">
                            
                            <select name="sg" class="form-control">
                                <option value="1">Secretaire Général</option>
                                <option value="2">Secretaire Général Adjoint</option>
                                       
                            </select>
                        </div>
                        </div>
                </div></div>
                                <div class="text-center">
                        <button name="valider" type="submit" class="btn btn-primary">Rechercher</button>
                       </div>
                    </form>
                </div>
            </div>
        </main>
        </main>
    </section>
             <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
   
</body>
</html>
<?php }  else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
    <?php }

?>