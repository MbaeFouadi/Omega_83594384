<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7")){
include('connexion.php');
$p=$_GET['p'];
$n = $_SESSION['nin'];
$mat=$_SESSION['matricule'];
$message="";
$sd=mysqli_query($link,"SELECT * FROM date_fin where type=1 order by id_date DESC ");
        $dat=mysqli_fetch_array($sd); 
   // $sexe=$_POST['sexe'];
   // $email=$_POST['email'];
   // $telm=$_POST['telm'];
   // $telf=$_POST['telf'];
  //  $adresse=$_POST['adresse'];
  //  $nationalite=$_POST['nationalite'];
  //  $pays=$_POST['pays'];
 
  
  if(empty($p)){
    $requete = mysqli_query($link,"SELECT * FROM etudiant where mat_etud= '".$mat."' ");
    $data=mysqli_fetch_array($requete);
        //$nin = $data['NIN'];
        $nom = addslashes($data['nom']);
        $prenom = addslashes($data['prenom']);
        $naiss = $data['date_naiss'];
        $lieu_naiss = addslashes($data['lieu_naiss']);
        
        $dateJ=date('Y-m-d');
        $rep = mysqli_query($link,"SELECT * FROM bachelier where NIN = '".$n."'");
        $datas=mysqli_fetch_array($rep);
        $serie = $datas['Serie'];
        $ment = $datas['Mention'];
        $annee = $datas['annee'];
        //$nin = $datas['NIN'];
    
  }
  
    if(isset($_POST['submit'])){
      $bete = mysqli_query($link," SELECT * FROM candidats where nin ='".$n."'");
        
  if(mysqli_num_rows($bete)>0)
    {
      $message="Cet etudiant a déjà un reçu , vous pouvez plus faire un reçu";
}else{
        
        $telm=$_POST['telm'];
        $sexe = $_POST['sexe'];
        $reference=$_POST['reference'];
         $ref=mysqli_query($link,"SELECT * FROM holo WHERE reference='$reference'");
        if(mysqli_num_rows($ref)==0){

            $ins=  mysqli_query($link,"INSERT INTO holo(nin,reference) values('$nin','$reference')");
            $hol=mysqli_query($link,"SELECT * FROM holo where reference='$reference'");
            $holo=mysqli_fetch_array($hol);
            $reference_id=$holo['id'];
            
        $req=mysqli_query($link,"INSERT INTO candidats (nin,nom,date_naiss,lieu_naiss,prenom,datePrescript,id_type,reference_id,traitant_recu,statut,serie,mention,annee,tel_mobile,sexe) values ('$n','$nom','$naiss','$lieu_naiss','$prenom','$dateJ','".$_SESSION['id_type']."','$reference_id','".$_SESSION['login']."','1','$serie','$ment','$annee','".$_POST['telm']."','$sexe')");
    }
    else{
            $message="Le numero de reference est deja inscris";
        }

        
        $d = date("Y");
        $dd=$d-1;
        $ddd=$d-2;
        $ab = $d+1;
        $a = $ddd."-".$dd;
        $aa = $dd."-".$d;
        $sql = "SELECT etudiant.mat_etud,etudiant.NIN,etudiant.lieu_obt_bac,nom,mention_bac,prenom,date_naiss,lieu_naiss,Annee,design_depart,design_facult,intit_niv,annee_bac,serie_bac
        from etudiant,inscription,departement,niveau,faculte
        where etudiant.mat_etud = inscription.mat_etud and departement.code_depart = inscription.code_depart and faculte.code_facult=departement.code_facult 
        and niveau.code_niv = inscription.code_niv and (Annee = '".$a."' or Annee = '".$aa."') and etudiant.mat_etud = '".$mat."' order by inscription.annee DESC";
    $resultat1 =mysqli_query($link,$sql);
    $r1 = mysqli_fetch_object($resultat1);
    header('location: recu.php');
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
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-50px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-50px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
                </div>
            <div class="text-center mb-5">
				</div>
                <h5 align="center" style="color:red;"> <?php echo $message ?></h5>
       
        

            <div class="row">
        <div class="col-12">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5>&nbsp; &nbsp;&nbsp;Matricule:&nbsp;&nbsp; <b><?php echo $mat?></b></h5>
                </div>
                <div class="form-group col-md-6">
                    <h5>Nin :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $n ?></b></h5>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5>&nbsp; &nbsp;&nbsp;Nom :&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo utf8_encode($data['nom'])  ;?></b></h5>
                </div>
                <div class="form-group col-md-6">
                    <h5>Pr&eacute;nom :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo utf8_encode($data['prenom']) ;?></b></h5>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5>&nbsp; &nbsp;&nbsp;Date de naissance : <b><?php echo $data['date_naiss']  ;?></b></h5>
                </div>
                <div class="form-group col-md-6">
                    <h5>Lieu de naissance :&nbsp;&nbsp;<b><?php echo $data['lieu_naiss'] ;?></b></h5>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5>&nbsp; &nbsp;</h5>
                </div>
                <div class="form-group col-md-6">
                    <h5>&nbsp;</h5>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5>&nbsp; &nbsp;&nbsp;S&eacute;rie:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php if( $datas['Serie'] == ""){
                                            echo "Non renseigné";
                                        }else{
                                            echo $datas['Serie'] ;
                                        }?></b></h5>
                </div>
                <div class="form-group col-md-6">
                    <h5>Mention:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php if($datas['Mention'] == ""){
                                            echo "Non renseigné";
                                        }else{
                                            echo $datas['Mention'];
                                        }?></b></h5>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5>&nbsp; &nbsp;&nbsp;Ann&eacute;e d'obtention du bac:&nbsp; <b><?php if($datas['annee'] ==0){
                                            echo "Non renseigné";
                                        }else{
                                            echo $datas['annee'] ;
                                        }?></b></h5>
                                           </div>
            </div>
       
    
                
                           
             </div>
             </div>
             <form action="infoRecu.php" method="POST"> 
             <div class="form-row">
        <div class="form-group col-md-4">
        <h5>&nbsp;&nbsp;&nbsp;Téléphone mobile :</h5>
            <input style="text-align:center;margin-bottom:30px;"  name="telm" type="text" class="form-control" id="inputmat" placeholder="Saisir son numéro de téléphone" required>
            </div>
            
            <div class="form-group col-md-2">
        </div>
        <div class="form-group col-md-4">
        
        <h5>Sexe :</h5>
                            <select id="inputsexe" class="form-control" name="sexe" required>
                                <option value="F">Feminin</option>
                                <option value="M" selected>Masculin</option>
                            </select>
                            </div>
                            </div>
                              <div class="form-row">
        <div class="form-group col-md-4">
        <h5>&nbsp;&nbsp;&nbsp;Reference Holo :</h5>
            <input style="text-align:center;margin-bottom:30px;"  name="reference" type="text" class="form-control" id="inputmat" placeholder="Reference Holo" required>
            </div>
            
            <div class="form-group col-md-2">
        </div>
        
                            </div>
                               
                        <div class="text-right">
                          <button name="submit" type="submit" class="btn btn-primary">Suivant</button>
                        </div>
                        </form>

    
    
      
   
        
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