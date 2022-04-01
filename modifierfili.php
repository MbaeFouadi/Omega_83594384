<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="3"   )){  
    include('connexion.php');
    $r="SELECT  date_fin FROM date_fin order by id_date DESC";
    
        $req = mysqli_query($link,$r);
        $dat=mysqli_fetch_array($req);

//$numre= $_POST['num_recu'];
$numre=$_GET['num_recu'];
//$numre = $_SESSION['num_recu'];
$bete = mysqli_query($link," SELECT * FROM candidats where  num_recu= '".$numre."'");
    $data=mysqli_fetch_array($bete);
        $nin = $data['nin'];
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $naiss = $data['date_naiss'];
        $lieu_naiss = $data['lieu_naiss'];
        $numre= $data['num_recu'];
        $_SESSION['nin'] = $data['nin'];
        $type = $data['id_type'];
        $_SESSION['id_type']=$data['id_type'];
        $type=$_SESSION['id_type'];

        /*$_SESSION['num_recu']=$data['num_recu'];
             $_SESSION['serie']=$data['serie'];
             $type=$data['id_type'];
             $_SESSION['tipe']=$type;*/

        

if(isset($_POST['submit'])){
    $_SESSION['num_recu']=$data['num_recu'];
    $_SESSION['serie']=$data['serie'];
    $type=$data['id_type'];
    $_SESSION['tipe']=$type;
  $fac1 = $_POST['facult1'];
  $fac2 = $_POST['faculte2'];
  $fac3 = $_POST['faculte3'];
  $dep1 = $_POST['departement'];
  $dep2 = $_POST['departement1'];
  $dep3 = $_POST['departement2'];
  $_SESSION['facult1']=$_POST['facult1'];
  $_SESSION['faculte2']= $_POST['faculte2'];
  $_SESSION['faculte3'] = $_POST['faculte3'];
  $_SESSION['departement']= $_POST['departement'];
  $_SESSION['departement1'] = $_POST['departement1'];
  $_SESSION['departement2'] = $_POST['departement2'];
$date=date("Y-m-d H:i:s");
$requ =mysqli_query($link,"UPDATE candidats set statut=3 , choix1='".$dep1."',choix2='".$dep2."',choix3='".$dep3."' where nin='".$nin."'");
$log=mysqli_query($link,"INSERT INTO log_agentscol(login,date_heure,activite,nin) VALUES ('".$_SESSION['login']."','$date','Insertion choix','$nin')");


$sitti2=mysqli_query($link,"SELECT * FROM departement where code_depart='".$dep2."'");
$dounia2=mysqli_fetch_array($sitti2);
$concours2=$dounia2['concours'];

$sitti3=mysqli_query($link,"SELECT * FROM departement where code_depart='".$dep3."'");
$dounia3=mysqli_fetch_array($sitti3);
$concours3=$dounia3['concours'];
if($concours2==1 || $concours3==1 ){
    header('location: insertion_note.php');
}
 else{
     header('location: liste_choix.php');
 }



}
if(isset($_POST['valider'])){
    $_SESSION['num_recu']=$data['num_recu'];
    $_SESSION['serie']=$data['serie'];
    $type=$data['id_type'];
    $_SESSION['tipe']=$type;
    $fac2 = $_POST['faculte1'];
    $dep1 = $_POST['departement'];
    //$_SESSION['facult1']=$_POST['facult1'];
    $_SESSION['faculte1']= $_POST['faculte1'];
    /*$_SESSION['faculte3'] = $_POST['faculte3'];
    $_SESSION['departement']= $_POST['departement'];*/
    $_SESSION['departement'] = $_POST['departement'];
    //$_SESSION['departement2'] = $_POST['departement2'];
    $requ=mysqli_query($link,"UPDATE candidats set statut=3 ,choix1='".$dep1."'  where nin='".$nin."'") or die(mysqli_error($link));

    if(isset($requ)){
     header('location: liste_choix.php');
    
    }
    else
     {
         echo 'modification non faite';
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
       
        <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-50px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-50px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
                </div>
            <div class="text-center mb-5">
				</div>
   
       
          
            

                <h1 class="soft-title-1">Modifier les choix </h1>
                <hr />
                </div>
            <table>

        <tr>
                <td>Nin :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $data['nin']?></b> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Série: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $_SESSION['serie'] ;?></b></td>
            </tr>
           
            <tr>
                <td>Nom : &nbsp;&nbsp;&nbsp;<b><?php echo utf8_encode($data['nom']) ;?></b>
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Prénom : &nbsp;&nbsp;&nbsp;<b><?php echo utf8_encode($data['prenom'])  ;?></b></td>
            </tr>
            <tr border="1">
                <td>
            Date de naissance : &nbsp;&nbsp;&nbsp;<b><?php echo $data['date_naiss'] ;?></b> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lieu de naissance &nbsp;&nbsp;&nbsp;<b><?php echo utf8_encode($data['lieu_naiss']) ;?>  &nbsp;&nbsp; &nbsp;&nbsp;</b>
                </td>
            </tr>

            </table>
           
            <br><br><br><br>
        <?php if($type == 1) { ?> 
            <div class="row">
                <div class="col-12">
                    <form action="" method="POST">
                    <div class="form-row" >
                    <div class="form-group col-md-3" style="margin-bottom:40px;"> <h4>1er choix:<?php ?></h4> </div>
                    <div class="form-group col-md-4">
                            <label for="inputcomp">Composante</label>
                            <select id="inputcomp" class="form-control" name="facult1">
                            <option value="" >---Choisir---</option>
                            <?php 
                            $pics = mysqli_query($link,"SELECT * FROM faculte where concours=0");
                           
                              while($data=mysqli_fetch_array($pics)){?>
																<option value="<?php echo utf8_encode($data['code_facult']);?>" data-concour="<?php echo utf8_encode($data['concours']);?>"><?php echo ($data['design_facult']);?></option>
																 
															<?php 
                                                            }
                                                        
															 ?>
                            </select>
                            </div>
                            </div>
                           
                            <div class="form-row">
                            <div class="form-group col-md-3"></div>
                            <div class="form-group col-md-4" id='po'>
                            
                            </div>
           </div>
           <br><br><br>
                            <div class="form-row">
                            <div class="form-group col-md-3"><h4 style="">2ème choix:</h4> </div>
                          <div class="form-group col-md-4">
                            <label for="inputcomp1">Composante</label>
                            <select id="inputcomp1" class="form-control" name="faculte2">
                            <option value="" >---Choisir---</option>
                            <?php 
                            $pics = mysqli_query($link,"SELECT * FROM faculte ");
                              while($data=mysqli_fetch_array($pics)){?>
																<option value="<?php echo utf8_encode($data['code_facult']);?>" data-concour="<?php echo $data['concours'];?>"><?php echo ($data['design_facult']);?></option>
																 
															<?php 
															}
															 ?>
                            </select>
                            </div>
                           </div>
                            <div class="form-row">
                            <div class="form-group col-md-3"></div>
                            <div class="form-group col-md-4"id ="polo">
                           
                            </div>
                             </div>
                             <br><br><br>
                             <div class="form-row">
                             <div class="form-group col-md-3"><h4 style="">3ème choix:</h4> </div>
                    <div class="form-group col-md-4">
                            <label for="inputcomp2">Composante</label>
                            <select id="inputcomp2" class="form-control" name="faculte3">
                            <option value="" >---Choisir---</option>
                            <?php 
                             $pics = mysqli_query($link,"SELECT * FROM faculte ");
                              while($data=mysqli_fetch_array($pics)){?>
																<option value="<?php echo utf8_encode($data['code_facult']);?>" data-concour="<?php echo $data['concours'];?>"><?php echo ($data['design_facult']);?></option>
															<?php 
															}
															 ?>
                            </select>
                            </div>
                               </div>
                            <div class="form-row">
                            <div class="form-group col-md-3"></div>
                          <div class="form-group col-md-4" id="kilo">
                            
                            </div>
                            </div>
                            <div class="text-right">
                    <button name="submit" type="submit" class="btn btn-primary">Enregistrer</button>
                   </div>
                </form>
            </div>
        </div>
            <?php }elseif($type==2 || $type==3 || $type==4 || $type==5 || $type==6 || $type==7 ) {?> 
                    <div class="row">
    <div class="col-12">
        <form action="" method="POST">
            <div class="form-row">
                <div class="form-group col-md-3"><h4 style=""></h4> </div>
                <div class="form-group col-md-4">
                    <label for="inputcomp1">Composante </label>
                    <select id="inputcomp1" class="form-control" name="faculte1">
                        <option value="" >---Choisir---</option>

                        <?php 

                        $pics = mysqli_query($link,"SELECT * FROM faculte ");
                        while($data=mysqli_fetch_array($pics)){?>

                        <option value="<?php echo $data['code_facult'];?>" data-concour="<?php echo utf8_encode($data['concours']);?>"><?php echo ($data['design_facult']);?></option>
                                                
                        <?php 
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-4"id ="polo">
                    
                </div>
            </div>
            <br><br><br>
                            
                             
                            <div class="text-right">
                    <button name="valider" type="submit" class="btn btn-primary">Enregistrer</button>
                   </div>
                </form>
            </div>
        </div>

                                                            <?php }?>

    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
    <script src="./assets/js/script.js"></script>        
             
        </body>
</html>
<?php }  else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
    <?php }

?>