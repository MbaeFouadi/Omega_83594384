<?php
session_start();
$message='';
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7")){
include('connexion.php');
$p=$_GET['p'];
$date=date("Y-m-d H:i:s");
   // $sexe=$_POST['sexe'];
   // $email=$_POST['email'];
   // $telm=$_POST['telm'];
   // $telf=$_POST['telf'];
  //  $adresse=$_POST['adresse'];
  //  $nationalite=$_POST['nationalite'];
  //  $pays=$_POST['pays'];
if(empty($p)){
    $requete = mysqli_query($link,"SELECT * FROM bachelier where NIN= '".$_SESSION['nin']."' ");
    $data=mysqli_fetch_array($requete);
        $nin = $data['NIN'];
        $nom = addslashes($data['Nom']);
        $prenom = addslashes($data['Prenom']);
        $naiss = $data['Date_nais'];
        $lieu_naiss = addslashes($data['Lieu_nais']);
        $num_attest = $data['Num_Attest'];
        $annee = $data['annee'];
        $serie = $data['Serie'];
        $ment = $data['Mention'];
        $dateJ=date('Y-m-d');
        $type=$_SESSION['id_type'];
        $centre=$data['Centre'];
       
          
        $sd=mysqli_query($link,"SELECT * FROM date_fin where type=1 order by id_date DESC ");
        $dat=mysqli_fetch_array($sd); 
    if(isset($_POST['submit'])){
        $telm = $_POST['telm'];
        $sexe = $_POST['sexe'];
        $reference=$_POST['reference'];

        $bete = mysqli_query($link," SELECT * FROM candidats where nin ='".$nin."'");
        
        if(mysqli_num_rows($bete)>0)
          {
            $message="Cet etudiant a déjà un reçu , vous pouvez plus faire un reçu";
      }else{
          $a=$_POST['attes'];
    //if(isset($_POST['submit'])){
    //$req = "INSERT INTO candidats(nin,nom,prenom,date_naiss,lieu_naiss,num_attest,annee,serie,mention,traitant_recu,datePrescript,id_type,statut,centre,tel_mobile,sexe) VALUES('$nin','$nom','$prenom','$naiss','$lieu_naiss','$a','$annee','$serie','$ment','".$_SESSION['login']."','$dateJ','$type','1','$centre','$telm','$sexe')";
    $ref=mysqli_query($link,"SELECT * FROM holo WHERE reference='$reference'");
    if(mysqli_num_rows($ref)==0){

        $ins=  mysqli_query($link,"INSERT INTO holo(nin,reference) values('$nin','$reference')");
        $hol=mysqli_query($link,"SELECT * FROM holo where reference='$reference'");
        $holo=mysqli_fetch_array($hol);
        $reference_id=$holo['id'];
        $req="INSERT INTO candidats(nin,nom,prenom,date_naiss,lieu_naiss,sexe,num_attest,annee,serie,mention,centre,datePrescript,tel_mobile,traitant_recu,id_type,reference_id,statut) VALUES('$nin','$nom','$prenom','$naiss','$lieu_naiss','$sexe','$a','$annee','$serie','$ment','$centre','$dateJ','$telm','".$_SESSION['login']."','$type','$reference_id','1')";
        $quer=mysqli_query($link,$req) or die(mysqli_error($link));
        if($quer){
            //echo 'insertion reuissi';
            //header('location:recu.php');
            header('location: recu.php');
        }
    
        else{
            echo 'Insertion non reuissi';
        }
        //}
    }
    else{
        $message="Le numero de reference est deja inscris";
    }
   
// //echo $req;
//     if($_SESSION['cat']=="1"){
//         $log=mysqli_query($link,"INSERT INTO log_super(login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','recu')");
//     }if($_SESSION['cat']=="6"){
//         $log=mysqli_query($link,"INSERT INTO log_gestion (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','recu')");
//     }if($_SESSION['cat']=="7"){
//         $log=mysqli_query($link,"INSERT INTO log_agentcompta (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','recu')");
   // }

    //header('location:recu.php');
    }
    }

}else{
    $requete = mysqli_query($link,"SELECT * FROM etudiant where mat_etud= '$p' ");
    $data=mysqli_fetch_array($requete);
        $nin = $data['NIN'];
        $nom =addslashes( $data['nom']);
        $prenom =addslashes( $data['prenom']);
        $naiss = $data['date_naiss'];
        $lieu_naiss = addslashes($data['lieu_naiss']);
        $sexe= $data['sexe'];
        $ile= $data['ile'];
        $pays= $data['pays'];
        $adresse= $data['adresse'];
        $annee = $data['annee_bac'];
        $serie = $data['serie_bac'];
        $ment = $data['mention_bac'];
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
            <div class="text-center mb-5">
				</div>
                <h5 align="center" style="color:red;"> <?php echo $message ?></h5>
      <?php if(empty($p)){ ?>
       
    <div class="row">
        <div class="col-12">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5>&nbsp; &nbsp;&nbsp;Nin :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $data['NIN']?></b></h5>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5>&nbsp; &nbsp;&nbsp;Nom :&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo utf8_encode($data['Nom']);?></b></h5>
                </div>
                <div class="form-group col-md-6">
                    <h5>Pr&eacute;nom :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo utf8_encode($data['Prenom']);?></b></h5>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5>&nbsp; &nbsp;&nbsp;Date de naissance : <b><?php echo $data['Date_nais']  ;?></b></h5>
                </div>
                <div class="form-group col-md-6">
                    <h5>Lieu de naissance :&nbsp;&nbsp;<b><?php echo ($data['Lieu_nais']);?></b></h5>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5>&nbsp; &nbsp;&nbsp;</h5>
                </div>
                <div class="form-group col-md-6">
                    <h5>&nbsp;&nbsp;</h5>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5>&nbsp; &nbsp;&nbsp;Serie:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $data['Serie']  ;?></b></h5>
                </div>
                <div class="form-group col-md-6">
                    <h5>Mention:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $data['Mention']  ;?></b></h5>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5>&nbsp; &nbsp;&nbsp;Ann&eacute;e d'obtention du bac:&nbsp; <b><?php echo $data['annee'] ;?></b></h5>
                </div>
                <div class="form-group col-md-6">
                    <h5>N° d'attestation: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $data['Num_Attest'];?></b></h5>
                </div>
            </div>
        </div>
    </div>
       <!-- </fildset> -->
                
           
        <form action="infoBach.php" method="POST">
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
                                <option value="F">Féminin</option>
                                <option value="M" selected>Masculin</option>
                            </select>
                            </div>
                            </div>
                            <div class="form-row">
        <div class="form-group col-md-4">
        <h5>&nbsp;&nbsp;&nbsp;Réference Holo :</h5>
            <input style="text-align:center;margin-bottom:30px;"  name="reference" type="text" class="form-control" id="inputmat" placeholder="Saisir son numéro de téléphone" required>
            </div>
            
            <div class="form-group col-md-2">
        </div>
        
        <div class="form-group col-md-4">
        
       
                            </div>
                            
                            
            <div class="text-right">
                <input type="hidden" value="<?php echo $data['Num_Attest'];?>" name="attes">
            <button name="submit" type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>

    
                

    
    
        <?php }
        else{?>


<table>
           
            <tr>
                <td>Nom : &nbsp;&nbsp;&nbsp;<b><? echo $data['nom'] ;?></b>
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Pr&eacute;nom : &nbsp;&nbsp;&nbsp;<b><? echo $data['prenom']  ;?></b></td>
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
            </tr>
            </tr>
            <tr>
                <td>NIN : <b><? echo $data['NIN']?></b>
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Sexe: &nbsp;&nbsp;&nbsp;<b><? if($data['sexe']=="f") echo "Féminin"; else if($data['sexe']=="m") echo "Masculin";?></b></td>
                </td>
            </tr> 

            <tr>
            <td>Ile: &nbsp;&nbsp;&nbsp;<b><? echo $data['ile'] ;?></b>
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Pays: &nbsp;&nbsp;&nbsp;<b><? echo $data['pays']  ;?></b></td>
        </tr>

        <tr>
                <td>Télephone: &nbsp;&nbsp;&nbsp;<b><? echo $data['tel'] ;?></b>
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Adresse: &nbsp;&nbsp;&nbsp;<b><? echo $data['adresse']  ;?></b></td>
            </tr>
            <tr>
            <td>Série: &nbsp;&nbsp;&nbsp;<b><? echo $data['serie_bac'] ;?></b>
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Mention: &nbsp;&nbsp;&nbsp;<b><? echo $data['mention_bac']  ;?></b></td>
        </tr>
                <td>
                      Année d'obtention du bac:&nbsp;&nbsp;<b><? echo $data['annee_bac'] ;?></b>  &nbsp;&nbsp; &nbsp;&nbsp;
                </td>
            </tr>
            </table>
                        


<?php } ?>
    
   
        
             <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
             
             
        </body>
</html>
<?php }else{?>
    <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
    <?php }

?>


