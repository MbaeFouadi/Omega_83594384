<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1")){
    include('connexion.php');
    $r="SELECT date_fin FROM date_fin where type=1 order by id_date DESC";
    $f="";
    $m="";
        $req = mysqli_query($link,$r);
        $dat=mysqli_fetch_array($req);
        $dateJ=date('Y-m-d');
        
    if(isset($_POST['submit'])){
        $num_recu=$_POST['num_recu'];
        $_SESSION['num_recu']=$_POST['num_recu'];
        $query=mysqli_query($link,"SELECT * FROM candidats WHERE num_recu=$num_recu") or die(mysqli_error($link));
        $data=mysqli_fetch_array($query);
        $_SESSION['choix1']=$data['choix1'];
        $_SESSION['choix2']=$data['choix2'];
        $_SESSION['choix3']=$data['choix3'];
        $_SESSION['retenu']=$data['retenu'];

        $p3 = mysqli_query($link,"SELECT * FROM departement where code_depart='".$_SESSION['choix1'] ."' ");
        $datas = mysqli_fetch_array($p3);
        $p4 = mysqli_query($link,"SELECT * FROM departement where code_depart='".$_SESSION['choix2'] ."'");
        $dat1 = mysqli_fetch_array($p4);
        $p5 = mysqli_query($link,"SELECT * FROM departement where code_depart='". $_SESSION['choix3']."'");
        $dar1 = mysqli_fetch_array($p5);
        $p = mysqli_query($link,"SELECT * FROM departement where code_depart='". $_SESSION['retenu']."'");
        $daf = mysqli_fetch_array($p);

        
        $_SESSION['id_type']=$data['id_type'];
        $type=$_SESSION['id_type'];
         
        //$exi=mysqli_num_rows($query) or die(mysqli_error($link));
        if(mysqli_num_rows($query)>=1){
            $f=1;
        }

        else{
            $f=0;
            //header('location:recherche_etud.php');
            $m="Ce numero n'existe pas";
        }
    }

    if(isset($_POST['sub'])){
        $num_recu=$_SESSION['num_recu'];
        $choix=$_POST['choix'];
        $req=mysqli_query($link,"UPDATE candidats SET retenu='$choix' WHERE num_recu=$num_recu") or die(mysqli_error($link));
        header('location:superAdminRetenu.php');
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
                    case 8:include('interfaces/adminRubrique.php'); break;
                    
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
            <?php 
                if($f==0){?>
            <div class="text-center mb-5">
                    <h2 class="soft-title-2" style="color:#00b185;"> Recherche </h2>
                    <h5 style="color:red;"><?php echo $m ?></h5>
                    <hr /><div style="margin-bottom:80px"></div>
            </div>
                <div class="row">
                <div class="col-12">
            
                <form action="superAdminRetenu.php" method="post">
                       
            
            
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        <div class="form-group col-md-4">
                            <input style="text-align:center;" type="text" name="num_recu" class="form-control"  placeholder="Saisir le numero de recu" required> 
                        </div>   
                    </div>
                        <div class="text-center">
                        <button name="submit" type="submit"  class="btn btn-primary">Rechercher</button>
                       </div>
                       </form>
                    </div>
                </div>
                <?php }elseif($f==1){?>
                        <div class="container">
                            <h1 style="color:#00b185; text-align:center">Modification</h1><br>
                            <h2 style="text-align: center;">N°:<?=$data['num_recu']?> <?=utf8_encode($data['nom'])?>  <?=utf8_encode($data['prenom'])?></h2><br>
                            <h3 style="text-align: center;">Retenu:<?php if($data['retenu']==""){?>Non Retenu <?php }else{ echo  utf8_encode($daf['design_depart']);}?></h3><br>
                            <form action="" method="POST">
                                <select name="choix" class="form-control">
                                    <?php if($type==1){?>
                                           
                                                <option value="<?=$data['choix1']?>">Choix1: <?php echo utf8_encode($datas['design_depart']);?></option>
                                            
                                            
                                                <option value="<?=$data['choix2']?>">Choix2: <?php echo utf8_encode($dat1['design_depart']);?></option>
                                            
                                            
                                                <option value="<?=$data['choix3']?>">Choix3: <?php echo utf8_encode($dar1['design_depart']);?></option>
                                            
                                    <?php } elseif($type==2 || $type==3 || $type==4 || $type==5){?>
                                            
                                            <option value="<?=$data['choix1']?>">Choix1: <?php  echo utf8_encode($datas['design_depart']);?></option>
                                            
                                   <?php }?>

                                </select><br>            
                                <button type="submit" name="sub" class="btn btn-primary">Modifier</button>
                            </form>
                        </div>
                    <?php }?>
                
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