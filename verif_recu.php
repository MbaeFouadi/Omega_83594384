<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7" or $_SESSION['cat']=="5")){
include('connexion.php');
$r="SELECT  date_fin FROM date_fin WHERE type=1 order by id_date DESC";

    $req = mysqli_query($link,$r);
    $dat=mysqli_fetch_array($req);
    $dateJ=date('Y-m-d');
    if($dat['date_fin'] < $dateJ ){ ?>
        <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, les pr&eacute;inscriptions sont d&eacute;ja ferm&eacute;es !<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
        <?php }else {
$t=0;
$m="";
if(isset($_POST['submit'])){
    $t=1;
    if(!empty($_POST['recu'])){
        $rec=mysqli_query($link,"SELECT * FROM candidats WHERE num_recu='".$_POST['recu']."'");     
        $da=mysqli_fetch_array($rec);
        $id_type=$da['id_type'];
        $sql1="SELECT * FROM type_recu where id_type='".$da['id_type']."'";
        $resultat2 = mysqli_query($link,$sql1);
        $data1 = mysqli_fetch_array($resultat2);    
        //$d=mysqli_fetch_array($re);
        $type_recu=$data1['nom_type'];
        $recu=$_POST['recu'];
        $_SESSION['recu']=$recu;
        $req=mysqli_query($link,"SELECT * FROM candidats WHERE num_recu='$recu'");
        if(mysqli_num_rows($req)>0){
           $data= mysqli_fetch_array($req);
           if ($data['statut']==2) {
            $t=0;
            $m="Cette personne a déja une fiche!";
             }else if ($data['statut']==0) {
                $t=0;
                $m="Cette personne n'a meme pas de reçu!";
            }
    }else{ $t=0;
        $m="Ce reçu n'existe pas!";
    }
}
         
    }else if (isset($_POST['ok'])){ 
         $t=0;
             $req=mysqli_query($link,"SELECT * FROM candidats WHERE num_recu='".$_SESSION['recu']."'");
            
             if(mysqli_num_rows($req)>0){
                $data= mysqli_fetch_array($req);
                $m="ok";
                 if($data['statut']==1){
                     $_SESSION['nin']=$data['nin'];
                     $_SESSION['choix']=$data['id_type'];
                     $s=1;
                     if($_SESSION['choix']==4 || $_SESSION['choix']==5){
                        header('location: choixPreins_t_r.php');
                     }else{
                        header('location: choixPreins.php');

                        
                     }
                 }
                // else if ($data['statut']==2) {
                //     $m="Cette personne a déja une fiche!";
                //      }else if ($data['statut']==0){
                //         $m="Cette personne n'a meme pas de reçu!";
                //     }
                // }else{
                //     $m="Ce reçu n'existe pas!";
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
       
        <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-80px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-80px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
                </div>
            <div class="text-center mb-5">
            
                <?php
               
               
                    if($t==0){?>
                    <h2 class="soft-title-2" style="color:#00b185;"> Faire une fiche de Préinscription</h2>
                    <h5 style="color:red;"><?php echo $m ?></h5>
                    <hr /><div style="margin-bottom:80px"></div>
            </div>
                        
       
                <div class="row">
                <div class="col-12">
            
                <form action="verif_recu.php" method="post">
                       
            
            
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        <div class="form-group col-md-4">
                            <input style="text-align:center;" type="text" name="recu" class="form-control"  placeholder="Saisir le Numéro de recu" required> 
                        </div>

                    </div>
                          
                     
                        <div class="text-center">
                        <button name="submit" type="submit" class="btn btn-primary">Rechercher</button>
                       </div>
                       </form>
                </div>
                </div>


                       
               <?php }else if($t==1){
                   $s=2;?>
              

            <div class="row">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Nin :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $data['nin']?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type du recu:&nbsp;&nbsp;<b><?php echo utf8_encode($data1['nom_type'])?></b></h5>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Nom :&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo utf8_encode($data['nom']) ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Pr&eacute;nom :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo utf8_encode($data['prenom']);?></b></h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Date de naissance : <b><?php echo $data['date_naiss']  ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Lieu de naissance :&nbsp;&nbsp;<b><?php echo utf8_encode($data['lieu_naiss']);?></b></h5>
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
                    <!--div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Serie:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? echo $data['serie']  ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Mention:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? echo $data['mention']  ;?></b></h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Ann&eacute;e d obtention du bac:&nbsp; <b><? echo $data['annee'] ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>N° d'attestation: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? echo $data['num_attest'];?></b></h5>
                        </div>
                    </div-->
                </div>
            </div>
           
              <?php 
              
           
                ?>
         
            <form action="verif_recu.php" method="POST">
            <?php
            $req=mysqli_query($link,"SELECT * FROM candidats WHERE num_recu='$recu'");
            if(mysqli_num_rows($req)>0){
               $data= mysqli_fetch_array($req);
            ?>
                <input type="hidden" name="type" value=<?php echo $data['id_type'] ;?> >
                <input type="hidden" name="num_recu" value=<?php echo $data['num_recu'] ;?> >
                <input type="hidden" name="serie" value=<?php echo $data['serie'] ;?>>
                        <div class="text-right">
                          <button name="ok" type="submit" class="btn btn-primary">Ok</button>
                        </div>
            <?php } ?>
                        </form>
              <?php 
              
            }
                ?>
                <?php }  }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
    <?php } ?>

                
        </main>

             <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
   
</body>
</html>
