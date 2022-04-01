<?php 
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="3" or $_SESSION['cat']=="4" )){
include('connexion.php');
//$d=date(Y);
$r=mysqli_query($link,"SELECT * FROM date_fin where type=1 order by id_date DESC");
$dat= mysqli_fetch_array($r) or die(mysqli_error($link));
$t=0;
$m="";
if(isset($_POST['submit'])){
    $t=1;
    if(!empty($_POST['recu'])){
        $recu=$_POST['recu'];
        // $_SESSION['recu']=$recu;
         $req=mysqli_query($link,"SELECT * FROM candidats WHERE num_recu='$recu'");
         $data=mysqli_fetch_array($req);
         if(mysqli_num_rows($req)>0){
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

        //$type=$_SESSION['id_type'];
        }
        else
        {
            $m="Ce numero n'existe pas";
        }
    }    
}        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-60px;"> <?php echo (date('d-m-Y'));?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-60px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
        <div class="text-center mb-5">
            
            <?php
                if($t==0){?>
                <h2 class="soft-title-2" style="color:#00b185;"> Vérifier </h2>
                <h5 style="color:red;"><?php echo $m ?></h5>
                <hr /><div style="margin-bottom:80px"></div>
        </div>
                    
   
            <div class="row">
            <div class="col-12">
        
            <form action="recherche_fili.php" method="post">
                   
        
        
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
            <?php } else{?>
                <div class="text-left" style="margin-top:0px">
                    <a class="btn btn-primary" href="userInterface.php" role=button> Annuler</a>
                </div><br>
                <div id='sectionAimprimer'>
                <div  style="border:1px solid black">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3" ></div>
                            <div style="margin-left:-5px"  class="col-md-9"><br>
                                <h3 style="margin-left:40px" ><strong>UNION DES COMORES</strong></h3>
                                <h6 style="margin-left:70px" ><em>Unité-Solidarité-Dévéloppement</em> </h6>
                                <div style="margin-left:100px">...........................................</div>
                                <h5 style="margin-left:10px" >MINISTRE DE L'EDUCATION NATIONALE</h5>
                                <h5 style="margin-left:-80px">DE L'ENSEIGNEMENT DE LA RECHERCHE SCIENTIFIQUE, DE LA FORMATION</h5>
                                <h5 style="margin-left:50px">ET DE L'INSERTION PROFESSIONNELLE</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3" >
                                <img src="./assets/img/udc.png" alt="profile image" class="w-50" style="margin-left:125px">
                            </div>
                            <div style="margin-left:-5px"  class="col-md-9">
                                <strong><div style="margin-left:100px">...............................................</div></strong>
                                <h4  style="margin-left:50px;margin-top:10px;" ><strong>UNIVERSITE DES COMORES</em></h4>
                            </div>
                        </div>
                        <div class="container">
                        <div class="row" style="margin-top:20px">
                            <div class="col-md-4"></div>
                            <div  class="col-md-8" >
                                <h5 style="margin-left:-80px">DIRECTION DES ETUDES ET DE LA SCOLARITE</h5><br>
                                <h2>Choix Des filières</h2>
                            </div>
                        </div>
                    </div>
                    </div>
                        <?php if($type==1){
                            /*$f1 = $_SESSION['facult1'] ; 
                            $f2=$_SESSION['faculte2'] ;
                            $f3=$_SESSION['faculte3'] ;
                            $dep1=$_SESSION['departement'] ;
                            $dep2=$_SESSION['departement1'] ;
                            $dep3=$_SESSION['departement2'] ;
                            $p = mysqli_query($link,"SELECT * FROM faculte where code_facult ='".$_SESSION['facult1']."'");
                            $data = mysqli_fetch_array($p);
                            $p1 = mysqli_query($link,"SELECT * FROM faculte where code_facult ='".$_SESSION['faculte2']."'");
                            $dap = mysqli_fetch_array($p1);
                            $p2 = mysqli_query($link,"SELECT * FROM faculte where code_facult ='".$_SESSION['faculte3']."'");
                            $dap1 = mysqli_fetch_array($p2);
                            $p3 = mysqli_query($link,"SELECT * FROM departement where code_depart='".$_SESSION['departement'] ."'");
                            $datas = mysqli_fetch_array($p3);
                            $p4 = mysqli_query($link,"SELECT * FROM departement where code_depart='".$_SESSION['departement1'] ."'");
                            $dat1 = mysqli_fetch_array($p4);
                            $p5 = mysqli_query($link,"SELECT * FROM departement where code_depart='". $_SESSION['departement2']."'");
                            $dar1 = mysqli_fetch_array($p5);*/
                            $query=mysqli_query($link,"SELECT * FROM candidats WHERE num_recu='".$_SESSION['num_recu']."'");
                            $donnes=mysqli_fetch_array($query);?>
                        <div class="container" style="margin-left:20px">
                            <p>N° de reçu: <?=$donnes['num_recu']?><strong style="margin-left:150px; font-size:25px;"><?=utf8_encode($donnes['nom'])?> <?=utf8_encode($donnes['prenom'])?></strong></p>
                            <div class="row">
                                <div class="col-md-6">Composante: <small style="font-size:19px"><?=utf8_encode($da['design_facult'])?></small></div>
                                <div class="col-md-6">Département: <small style="font-size:19px"> <?=utf8_encode($datas['design_depart'])?></small></div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-6">Composante: <small style="font-size:19px"><?=utf8_encode($dap['design_facult'])?></small></div>
                                <div class="col-md-6">Département: <small style="font-size:19px"><?=utf8_encode($dat1['design_depart'])?></small></div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-6">Composante : <small style="font-size:19px"><?=utf8_encode($dap1['design_facult'])?></small></div>
                                <div class="col-md-6">Département: <small style="font-size:19px"><?=utf8_encode($dar1['design_depart'])?></small></div>
                            </div><br>
                            <div class="row">
                                    <div class="col-md-6">Enregsitré par: <b><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?></b></div>
                                    
                            </div><br>
                        </div>
                        </div>
                        <?php } elseif($type==3 || $type==2 || $type==4 || $type==5 || $type==6 || $type==7){
                            
                            /*$p = mysqli_query($link,"SELECT * FROM faculte where code_facult ='".$_SESSION['facult1']."'");
                            $data = mysqli_fetch_array($p);
                            $p3 = mysqli_query($link,"SELECT * FROM departement where code_depart='".$_SESSION['departement'] ."'");
                            $datas = mysqli_fetch_array($p3);*/
                            $query=mysqli_query($link,"SELECT * FROM candidats WHERE num_recu='".$_SESSION['num_recu']."'");
                            $donnes=mysqli_fetch_array($query);?>
                            <div class="container" style="margin-left:80px">
                            <p>N° de reçu: <?=$donnes['num_recu']?><strong style="margin-left:150px; font-size:25px;"><?=utf8_encode($donnes['nom'])?> <?=utf8_encode($donnes['prenom'])?></strong></p>
                            <div class="row">
                                <div class="col-md-6">Composante: <small style="font-size:19px"><?=utf8_encode($da['design_facult'])?></small></div>
                                <div class="col-md-6">Département: <small style="font-size:19px"> <?=utf8_encode($datas['design_depart'])?></small></div>
                            </div><br>
                            <div class="row">
                                    <div class="col-md-6">Enregsitré par: <b><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?></b></div>
                                    
                            </div><br>
                            </div>
                            
                           
                            
                        <?php }?> 
                        </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer la fiche</button>
                                </div>
                            </div>
                <?php }?>
                           
                            
                    

        </section>                
</body>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
    <script src="./assets/js/datatables.js"></script>
    <script>
        function imprimer(divName){
            var restorepage=document.body.innerHTML;
            var printContent=document.getElementById(divName).innerHTML;
            
            document.body.innerHTML=printContent;
            window.print();
            document.body.innerHTML=restorepage;
        }
    </script>
</html>
<?php }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page! </h3>
    <?php }

?>