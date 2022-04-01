<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7")){
include('connexion.php');
$r="SELECT  date_fin FROM date_fin order by id_date DESC";

    $req = mysqli_query($link,$r);
    $data=mysqli_fetch_array($req);
    $dateJ=date('Y-m-d');
    if($data['date_fin'] < $dateJ ){ ?>
        <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, les pr&eacute;inscriptions sont d&eacute;ja ferm&eacute;s !<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
        <?php }else {
$m="";
$num="";
if(isset($_POST['submit'])){
   $_SESSION['Nin']=$_POST['nin'];
    $nin=$_POST['nin'];
    $nom=addslashes($_POST['nom']);
    $prenom=addslashes($_POST['prenom']);
    $dateNaiss=$_POST['dateNaiss'];
    $lieuNaiss=addslashes($_POST['lieuNaiss']);
    $sexe=$_POST['sexe'];
    $nationalite=$_POST['nationalite']; 
    $situation=$_POST['situation']; 
    $nbrEnf=$_POST['nbrEnf']; 
    $telm=$_POST['telm']; 
    $telf=$_POST['telf']; 
    $email=$_POST['email']; 
    $numAttest=$_POST['num']; 
    $mention=$_POST['mention']; 
    $serie=$_POST['serie']; 
    $anneObtBac=$_POST['anObtBac']; 
    $centre=addslashes($_POST['centre']); 
    $equivBac=$_POST['equivBac']; 
    $pays=addslashes($_POST['pays']); 
    $ile=$_POST['ile'];
    $adresse=addslashes($_POST['adresse']);
    $bp=$_POST['bp'];
    $sexe=$_POST['sexe'];
    $telm=$_POST['telm'];
    $type=$_SESSION['id_type']; 
    $date_prins=date('Y-m-d') ;


    $bete = mysqli_query($link," SELECT * FROM candidats where nin ='".$nin."'");
    
    if(mysqli_num_rows($bete)>0)
      {
        $m="Cet etudiant a déjà un reçu , vous pouvez plus faire un reçu";
    }else{
            
        $reference=$_POST['reference'];
        

         $ref=mysqli_query($link,"SELECT * FROM holo WHERE reference='$reference'");
        if(mysqli_num_rows($ref)==0){

            $ins=  mysqli_query($link,"INSERT INTO holo(nin,reference) values('$nin','$reference')");
            $hol=mysqli_query($link,"SELECT * FROM holo where reference='$reference'");
            $holo=mysqli_fetch_array($hol);
            $reference_id=$holo['id'];
           $sql= mysqli_query($link,"INSERT INTO candidats(nin,nom,prenom,date_naiss,lieu_naiss,num_attest,mention,serie,annee,centre,equiv,datePrescript,id_type,reference_id,statut,traitant_recu,sexe,tel_mobile) values('$nin','$nom','$prenom','$dateNaiss','$lieuNaiss','$numAttest','$mention','$serie','$anneObtBac','$centre','$equivBac','$date_prins','$type','$reference_id','1','".$_SESSION['login']."','$sexe','$telm')");
            $req=mysqli_affected_rows($link);
            if($req!=0){
                $m="Enregistrement effectué avec Succé!";
                $num=1;
                $_SESSION['nin']=$nin;
                header('Location:recu.php');
            }
            else{
                $m="Enregistrement non effectué! ";
                $num=0;
            }
          }
        else{
            $m="Le numero de reference est deja inscris";
        }
  
    }
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
                </div>
            <div class="text-center mb-5">
				</div>
            <h1 class="soft-title-1">Veuillez completer ces informations </h1>
            <hr />
           <?php
           if($num==0){?>
                <h6 style="color:red"> <?php echo $m ?></h6>
    <?php  } else{ ?>
                <h6 style="color:green"> <?php echo $m ?></h6>
                 
                
                <?php   }
            ?>
            
           
            
        </div>
        <div class="row">
            <div class="col-12">
                <form action="bacAv.php" method="POST">
                <div class="form-row">
                     
                            <div class="form-group col-md-12">
                            <input name="nin" type="text" class="form-control" placeholder="Nin" required>
                            </div>
                        
                        
                    </div>
                <div class="form-row">
                            
                            
                            
                            <div class="form-group col-md-6">
                            <input name="nom"  type="text" class="form-control" placeholder="Nom" required>
                            </div>
                            
                           
                            <div class="form-group col-md-6">
                            <input name="prenom" type="text" class="form-control" placeholder="Prenom" required>
                            </div>
                        </div>

                        <div class="form-row">
                            
                           
                            <div class="form-group col-md-6">
                            <input name="dateNaiss" type="date" class="form-control" placeholder="Date de naissance" required>
                            </div>
                            
                            
                            <div class="form-group col-md-6">
                            <input name="lieuNaiss" type="text" class="form-control"placeholder="Lieu de naissance" required>
                            </div>
                            
                        </div>

                    <div class="form-row">
                        
                        
                      
                        <div class="form-group col-md-6">

                        <select name="serie" class="form-control" required>
                        <option hidden>Série</option>
                            <option value="A1">A1</option>
                            <option value="A2">A2</option>
                            <option value="A4">A4</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="G">G</option>
                            <option value="STC">STC</option>
                            <option value="STI">STI</option>
                            <option value="Autre">Autre</option>

                        </select>
                        </div>

                       
                       
                        <div class="form-group col-md-6">
                        

                        <select name="mention" class="form-control" required>
                        <option hidden>Mention</option>
                            <option value="Passable">Passable</option>
                            <option value="Assez-Bien">Assez-Bien</option>
                            <option value="Bien">Bien</option>
                            <option value="Trés-Bien">Trés-Bien</option>
                            <option value="Excellent">Excellent</option>
                            

                        </select>
    </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                    <select name="sexe" class="form-control" required>
                            
                            <option hidden>Sexe</option>
                                <option value="F">Feminin</option>
                                <option value="M">Masculin</option>
                            </select>
                            </div>
    
                            <div class="form-group col-md-6">
                            <input name="telm" type="text" class="form-control" placeholder="Téléphone Mobile" required>
    
                        </div>
                       
        
                        
                        <!--label>(<em>présicer le pays si étranger</em>)</label-->
                       
                        <div class="form-group col-md-6">
                        <input name="centre" type="text" class="form-control"   placeholder="Lieu d'obtention du bac(présicer le pays si étranger)" required>
                        </div>
                        <div class="form-group col-md-6">
                        <input name="anObtBac" type="text" class="form-control"   placeholder="Année d'obtention du bac" required>
                        </div>
                        </div>

                    <div class="form-row">
                    
                        
                    <div class="form-group col-md-6">
                        <input name="num" type="text" class="form-control"  placeholder="Numéro de l'attestation du bac" required>
                        </div>
                        <div class="form-group col-md-6">
                        <input name="equivBac" type="text" class="form-control" placeholder="Equivalent du bac">

                    </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input name="reference" type="text" class="form-control"  placeholder="Reference Holo">
                        </div>
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
<?php }  }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
    <?php }

?>