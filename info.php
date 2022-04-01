<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1") OR ($_SESSION['cat']=="3")){
include('connexion.php');
$r="SELECT  date_fin FROM date_fin order by id_date DESC";

    $req = mysqli_query($link,$r);
    $dat=mysqli_fetch_array($req);
    $dateJ=date('Y-m-d');
    
$t=0;
$m="";
if(isset($_POST['submit'])){
    $t=1;
    if(!empty($_POST['recu'])){
        $recu=$_POST['recu'];
        // $_SESSION['recu']=$recu;
         $req=mysqli_query($link,"SELECT * FROM candidats WHERE num_recu='$recu'");
         if(mysqli_num_rows($req)>0){
            $data= mysqli_fetch_array($req);
            $_SESSION['choix1']=$data['choix1'];
            $_SESSION['choix2']=$data['choix2'];
            $_SESSION['choix3']=$data['choix3'];
            $rete=mysqli_query($link,"SELECT * FROM departement");
            $foua=mysqli_fetch_array($rete);
            $_SESSION['code_depart']=$foua['code_depart'];
            $_SESSION['num_recu']=$data['num_recu'];
            $_SESSION['serie']=$data['serie'];
            $type=$data['id_type'];
            $_SESSION['tipe']=$type;
            
            $choix=1;
            $p = mysqli_query($link,"SELECT faculte.design_facult,departement.code_depart FROM faculte,departement where faculte.code_facult=departement.code_facult AND  code_depart ='".$_SESSION['choix1']."'");
            $da = mysqli_fetch_array($p);
            $p1 = mysqli_query($link,"SELECT faculte.design_facult,departement.code_depart FROM faculte,departement where faculte.code_facult=departement.code_facult AND  code_depart ='".$_SESSION['choix2']."'");
            $dap = mysqli_fetch_array($p1);
            $p2 = mysqli_query($link,"SELECT faculte.design_facult,departement.code_depart FROM faculte,departement where faculte.code_facult=departement.code_facult AND  code_depart ='".$_SESSION['choix3']."'");
            $dap1 = mysqli_fetch_array($p2);
            $p3 = mysqli_query($link,"SELECT * FROM departement where code_depart='".$_SESSION['choix1'] ."'");
            $datas = mysqli_fetch_array($p3);
            $p4 = mysqli_query($link,"SELECT * FROM departement where code_depart='".$_SESSION['choix2'] ."'");
            $dat1 = mysqli_fetch_array($p4);
            $p5 = mysqli_query($link,"SELECT * FROM departement where code_depart='". $_SESSION['choix3']."'");
            $dar1 = mysqli_fetch_array($p5);
            
         
      
        $id_type=$data['id_type'];
        //$sql1="SELECT * FROM type_recu where id_type='".$da['id_type']."'";
       // $resultat2 = mysqli_query($link,$sql1);
       // $data1 = mysqli_fetch_array($resultat2);    
        //$d=mysqli_fetch_array($re);
        if($id_type==1){
            $type_recu="Licence 1";
        }
        if($id_type==2){
            $type_recu="Licence 2&3";
        }
        if($id_type==3){
            $type_recu="Transfert";
        }
        if($id_type==4){
            $type_recu="Reprise d'etudes";
        }
        if($id_type==5){
            $type_recu="Master";
        }
       
        
            $requette=mysqli_query($link,"SELECT * FROM note WHERE nin='".$data['nin']."'");
            //echo "SELECT * FROM note WHERE nin='".$data['nin']."'"; 
            
            $note=mysqli_fetch_array($requette);
            $con=0;
            if(mysqli_num_rows($requette)>0){

                $con=1;
                $ang_sec=$note['anglais_sec'];
                $ang_pre=$note['anglais_pre'];
                $ang_tle=$note['anglais_tle'];
                $ang_bac=$note['anglais_bac'];

                $ara_sec=$note['arabe_sec'];
                $ara_pre=$note['arabe_pre'];
                $ara_tle=$note['arabe_tle'];
                $ara_bac=$note['arabe_bac'];

                
                $math_sec=$note['mathematique_sec'];
                $math_pre=$note['mathematique_pre'];
                $math_tle=$note['mathematique_tle'];
                $math_bac=$note['mathematique_bac'];

                $phy_sec=$note['physique_sec'];
                $phy_pre=$note['physique_pre'];
                $phy_tle=$note['physique_tle'];
                $phy_bac=$note['physique_bac'];

                $fr_sec=$note['francais_sec'];
                $fr_pre=$note['francais_pre'];
                $fr_tle=$note['francais_tle'];
                $fr_bac=$note['francais_bac'];
            }

            

        
        

    }else{ $t=0;
        $m="Ce reçu n'existe pas!";
    }

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
                    <h2 class="soft-title-2" style="color:#00b185;"> Vérifier </h2>
                    <h5 style="color:red;"><?php echo $m ?></h5>
                    <hr /><div style="margin-bottom:80px"></div>
            </div>
                        
       
                <div class="row">
                <div class="col-12">
            
                <form action="info.php" method="post">
                       
            
            
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        <div class="form-group col-md-4">
                            <input style="text-align:center;" type="text" name="recu" class="form-control"  placeholder="Saisir le Numéro de recu" required> 
                        </div>
                        
            

           
                     

                    </div>
                          
                     
                        <div class="text-center">
                        <button name="submit" type="submit"  class="btn btn-primary">Rechercher</button>
                       </div>
                       </form>
                </div>
                </div>
                <?php
            }else{
                $lo=mysqli_query($link,"SELECT * FROM log_agentscol where nin='".$data['nin']."'");
                $l=mysqli_fetch_array($lo);
                   $s=2;?>
              
              <h2>Traiteur Dossier:<b><?php echo $l['login']?></b></h2>

            <div class="row">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Nin :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $data['nin']?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Type de reçu:&nbsp;&nbsp;<b><?php echo $type_recu ?></b></h5>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Nom :&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $data['nom'] ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Pr&eacute;nom :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $data['prenom']  ;?></b></h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Date de naissance : <b><?php echo $data['date_naiss']  ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Lieu de naissance :&nbsp;&nbsp;<b><?php echo $data['lieu_naiss'] ;?></b></h5>
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
                            <h5>Serie:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $data['serie']  ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Mention:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $data['mention']  ;?></b></h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Ann&eacute;e d obtention du bac:&nbsp; <b><?php echo $data['annee'] ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>N° d'attestation: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $data['num_attest'];?></b></h5>
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
                </div>
            </div>
                <?php if($data['choix1']!=NULL || $data['choix2']!=NULL || $data['choix3']!=NULL){?>
                    <h2 align="center">CHOIX</h2>
                    <hr>
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>&nbsp; &nbsp;&nbsp;</h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>&nbsp;&nbsp;</h5>
                        </div>
                    </div>
                </div>
                    <?php if($id_type==1){?>
                    

        <div class="col-12">
            <div class="form-row">
                <div class="form-group col-md-4">
                    
                    <h5>&nbsp; &nbsp;&nbsp;Choix1&nbsp;&nbsp;<b></b></h5>
                    <h5>Composante:<b><?= $da['design_facult']?></b></h5><br>
                    <h5>Département:<b><?=$datas['design_depart']?></b></h5>
                </div>
                <div class="form-group col-md-4">
                    <h5>&nbsp;&nbsp;&nbsp;Choix2&nbsp;&nbsp;<b></b></h5>
                    <h5>Composante:<b><?=$dap['design_facult']?></b></h5><br>
                    <h5>Département:<b><?=$dat1['design_depart']?></b></h5>
                </div>
                <div class="form-group col-md-4">
                    <h5>&nbsp;&nbsp;&nbsp;Choix3 &nbsp;&nbsp;<b></b></h5>
                    <h5>Composante:<b><?=$dap1['design_facult']?></b></h5><br>
                    <h5>Département:<b><?=$dar1['design_depart']?></b></h5>
                </div>

            </div>
        </div>
        
                    <?php } else {?>
                        <h5>&nbsp; &nbsp;&nbsp;Choix1&nbsp;&nbsp;<b></b></h5>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Composante:<b> <?= $da['design_facult']?></b></h5><br>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Département:<b> <?=$datas['design_depart']?></b></h5>
                        </div>
                    </div>
                    <?php } ?>
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>&nbsp; &nbsp;&nbsp;</h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>&nbsp;&nbsp;</h5>
                        </div>
                    </div>
                </div>
            <?php }?>
                <?php if($con==1){?>

        <h2 align="center">Notes</h2>
        <hr>

        <div class="col-12">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5>&nbsp; &nbsp;&nbsp;</h5>
                </div>
                <div class="form-group col-md-6">
                    <h5>&nbsp;&nbsp;</h5>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Matière</th>
                                    <th scope="col">Seconde</th>
                                    <th scope="col">Prèmiere</th>
                                    <th scope="col">Terminale</th>
                                    <th scope="col">Bac</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Fran&ccedil;ais</th>
                                    <td><?= $fr_sec ?></td>
                                    <td><?= $fr_pre ?></td>
                                    <td><?= $fr_tle ?></td>
                                    <td><?= $fr_bac ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Anglais</th>
                                    <td><?= $ang_sec ?></td>
                                    <td><?= $ang_pre ?></td>
                                    <td><?= $ang_tle ?></td>
                                    <td><?= $ang_bac ?></td>                               
                                </tr>
                                <tr>
                                    <th scope="row">Arabe</th>
                                    <td><?= $ara_sec ?></td>
                                    <td><?= $ara_pre ?></td>
                                    <td><?= $ara_tle ?></td>
                                    <td><?= $ara_bac ?></td>                              
                                </tr>
                                <tr>
                                    <th scope="row">Math&eacute;matique</th>
                                    <td><?= $math_sec ?></td>
                                    <td><?= $math_pre ?></td>
                                    <td><?= $math_tle ?></td>
                                    <td><?= $math_bac ?></td>                               
                                </tr>
                                <tr>
                                    <th scope="row">Physique </th>
                                    <td><?= $phy_sec ?></td>
                                    <td><?= $phy_pre ?></td>
                                    <td><?= $phy_tle ?></td>
                                    <td><?= $phy_bac ?></td>                              
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        
       

                    
           
                <?php 
                
                    }
                ?>
         
        
              <?php 
              
            }
                ?>
                <?php  }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
    <?php } ?>

                
        </main>

             <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
   
</body>
</html>
