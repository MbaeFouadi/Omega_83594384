<?php 
   session_start();
   if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}

   if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="3" )){
   include('connexion.php') ;
   
   $r="SELECT  date_fin FROM date_fin order by id_date DESC";
   
       $req = mysqli_query($link,$r);
       $dat=mysqli_fetch_array($req);

   $message= ""; $sess = $_SESSION['nin']; $error = false;
   /*$_SESSION['num_recu']=$data['num_recu'];
   $_SESSION['serie']=$data['serie'];
   $type=$data['id_type'];
   $_SESSION['tipe']=$type;*/
   $f1 = $_SESSION['facult1'] ; 
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
   $dar1 = mysqli_fetch_array($p5);
  
    $rep = mysqli_query($link,"SELECT DISTINCT matiere.design, matiere.id_matiere,choix1,choix2,choix3 FROM `appartenir`,`matiere`,candidats WHERE (appartenir.id_matiere = matiere.id_matiere and candidats.nin = '".$sess."' and (appartenir.code_depart = candidats.choix1 OR appartenir.code_depart = candidats.choix2 OR appartenir.code_depart = candidats.choix3) )") or die(mysqli_error($link));
    $requ = mysqli_query($link,"SELECT * FROM type_matiere");
    $r = array('note_second' => array(), 'note_premier' => array(), 'note_tle' => array(), 'note_bac' => array());
    $data_ins = array();

    $bete = mysqli_query($link," SELECT * FROM note where nin ='".$sess."'");
    
    if(mysqli_num_rows($bete)>0)
    {
        $message="Des notes concernant cette étudiant existe déjà dans la base!";
        $error = true;
        
    }

    if(isset($_POST['valider'])){
        
        foreach ($_POST['notes'] as $key => $value) {
            # code... $value['note'];
            foreach ($value as $index => $element) {
                # code...                
                if(stripos($index, 'bac') || stripos($index, 'tle') || stripos($index, 'pre') || stripos($index, 'sec')){
                    if(intval($element) > 20){
                        $message = "Vous pouvez pas entrer une note supérieur à  20 !";
                        $error = true;
                        break;
                    }else{
                        $element = stripos($element, ',') ? str_ireplace(',', '.' , $element) : $element; 
                        $data_ins[$index] = floatval( $element );
                    }
                }

            }
        }
        
    //    $nota =split("-", $r['note_second']);
    //     $pr =split("-",$r['note_premier']);
    //     $tle =split("-", $r['note_tle']);
    //     $bac =split("-",$r['note_bac']);
        // $value['matiere'].'_sec'

        // for($b=1;$b<4;$b++){
        //     if($value['concours']==1){
        //     if(strtolower($value['matiere'])=='anglais'){
        //         $note_sec_ang=$nota[0];
        //         $note_pre_ang=$pr[0];
        //         $note_tle_ang=$tle[0];
        //         $note_bac_ang=$bac[0];
        //     }
        //     if(strtolower($value['matiere'])=='arabe'){
        //         $note_sec_arab=$nota[0];
        //         $note_pre_arab=$pr[0];
        //         $note_tle_arab=$tle[0];
        //         $note_bac_arab=$bac[0];
        //     }
        //     if(strtolower($value['matiere'])=='science naturelle'){
        //         $note_sec_sc=$nota[0];
        //         $note_pre_sc=$pr[0];
        //         $note_tle_sc=$tle[0];
        //         $note_bac_sc=$bac[0];
        //     }
        //     if(strtolower($value['matiere'])=='histoire-geo'){
        //         $note_bac_hist=$bac[0];
        //     }
        //     if(strtolower($value['matiere'])=='philosophie'){
        //         $note_bac_philo=$bac[0];
        //     }
        //     if(strtolower($value['matiere'])=='mathématique'){
        //         $note_sec_mat=$nota[0];
        //         $note_pre_mat=$pr[0];
        //         $note_tle_mat=$tle[0];
        //         $note_bac_mat=$bac[0];
        //     }
        //     if(strtolower($value['matiere'])=='français'){
        //         $note_sec_fr=$nota[0];
        //         $note_pre_fr=$pr[0];
        //         $note_tle_fr=$tle[0];
        //         $note_bac_fr=$bac[0];
        //     }
        //     if(strtolower($value['matiere'])=='physique'){
        //         $note_sec_phy=$nota[0];
        //         $note_pre_phy=$pr[0];
        //         $note_tle_phy=$tle[0];
        //         $note_bac_phy=$bac[0];
        //     }
        //     }
        // }
       /* $mat=1;
        for($mat=1;$mat<4;$mat++){
        $id_mat=$_POST['id_mat'];
        $res = mysqli_query($link,"SELECT * FROM matiere where id_matiere='$id_mat' ");
        while($tabres=mysqli_fetch_array($res)){
            if($tabres['concours']==1){
                $resultat = mysqli_query($link,"SELECT * FROM matiere where id_matiere='$id_mat' and concours=1");
                $i = 0;
                for($i=1;$i<5;$i++){
                   
                    $sec.$id_mat=$_POST['notes'.$i.$id_mat];
                    $pre.$id_mat=$_POST['notes'.$i.$id_mat];
                    $tle.$id_mat=$_POST['notes'.$i.$id_mat];
                    $bac.$id_mat=$_POST['notes'.$i.$id_mat];
                   
                }
                } 
            else{
                $bac.$id_mat=$_POST['notes'.$i.$id_mat]; 
            } 
            }
        }*/
        
        $build_sql = "INSERT INTO note (nin, ".
        implode( ',', array_keys($data_ins)) .") VALUES ('$sess' ,".
        implode( ',', array_values($data_ins)) .")";

        if(!$error)
            $b = mysqli_query($link, $build_sql) or die(mysqli_error($link)); 
            $_SESSION['num_recu']=$data['num_recu'];
            $_SESSION['serie']=$data['serie'];
            $type=$data['id_type'];
            $_SESSION['tipe']=$type;
            header('location:liste_choix.php');

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
    <link rel="stylesheet" href="./assets/css/datatables.css">
    
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
        <h1 align="center">Insérer les notes</h1>
        <?php 
        if($sess==1){?>
            <h5 style="color:green" align="center"><?php echo $message;?></h5>
        <?php }else{?>
            <h5 style="color:red" align="center"><?php echo $message;?></h5>
        <?php } if(1){?>
            <div class="row">
        <div class="col-12">
            <div class="form-row">
                <div class="form-group col-md-6">
                    
                    <h5>&nbsp; &nbsp;&nbsp;Composante:&nbsp;&nbsp;<b><?php echo ($data['design_facult'])?></b></h5>
                </div>
                <div class="form-group col-md-6">
                    <h5>&nbsp;&nbsp;&nbsp;Département: &nbsp;&nbsp;<b><?php echo ($datas['design_depart'])?></b></h5>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5>&nbsp; &nbsp;&nbsp;Composante:&nbsp;&nbsp;<b><?php echo ($dap['design_facult']);?></b></h5>
                </div>
                <div class="form-group col-md-6"> 
                    <h5>&nbsp;&nbsp;&nbsp;Département:&nbsp;&nbsp;<b><?php echo ($dat1['design_depart']);?></b></h5>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5>&nbsp;&nbsp; Composante: <b><?php echo ($dap1['design_facult']) ;?></b></h5>
                </div>
                <div class="form-group col-md-6">
                    <h5>&nbsp;&nbsp;&nbsp;Département :&nbsp;&nbsp;<b><?php echo ($dar1['design_depart']);?></b></h5>
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
        </div>
        </div>
            <div class="row">
                <div class="col-12">
            
                <form action="insertion_note.php" method="post">
                       
            
                  <?php  $a = 0;

                   while($data=mysqli_fetch_array($rep)){
                       $mat = $data['design'] ;
                       ?>
                    
                    <div class="form-row">
                        <div class="form-group col-md-4"><h6><?php echo $data['design'] ?></h6>

                    
                        </div>
                        <div class="form-group col-md-4 mb-4">
                        <input type="hidden" name="notes[<?php echo $a; ?>][id_matiere<?php echo $a ?>]" value="<?php echo $data['id_matiere'] ?>" required>
                        <?php 
                        $id_matiere=$data['id_matiere'];
                        $re = mysqli_query($link,"SELECT * FROM matiere where id_matiere='$id_matiere' ");
                        while($tabc=mysqli_fetch_array($re)){
                            if($tabc['concours']==1){
                       
                            $i = 0;
                            $requ = mysqli_query($link,"SELECT * FROM type_matiere");
                            ?>
                           
                                <input style="text-align:center;" type="text" name="notes[<?php echo $a; ?>][<?php echo $mat.'_sec'; ?>]" class="form-control mb-2"  placeholder=" note <?php echo $mat.' Seconde'; ?>"required>
                                <input style="text-align:center;" type="text" name="notes[<?php echo $a; ?>][<?php echo $mat.'_pre'; ?>]" class="form-control mb-2"  placeholder=" note <?php echo $mat.' Premiere'; ?>"required>
                                <input style="text-align:center;" type="text" name="notes[<?php echo $a; ?>][<?php echo $mat.'_tle'; ?>]" class="form-control mb-2"  placeholder=" note <?php echo $mat.' Terminale'; ?>"required>
                                <input style="text-align:center;" type="text" name="notes[<?php echo $a; ?>][<?php echo $mat.'_bac'; ?>]" class="form-control mb-2"  placeholder=" note <?php echo $mat.' Premier groupe Bac'; ?>"required>
                            <?php
                        }else{
                            $i = 0;
                            ?>
                                <input style="text-align:center;" type="text" name="notes[<?php echo $a; ?>][<?php echo $mat.'_bac'; ?>]" class="form-control mb-2"  placeholder=" note <?php echo $mat.' Premier groupe Bac'; ?>"required>
                                <?php  
                        } 
                    }
                        ?>
                        

                            <input style="text-align:center;" type="hidden" name="notes[<?php echo $a; ?>][matiere]" class="form-control mb-2"  value="<?php echo $mat ?>"required>
                        </div>
                         
                    </div>
                        
                  <?php  $a += 1;} ?>
                          
                          
                     
                        <div class="text-right" style="margin-top:50px;">
                        <button name="valider" type="submit" class="btn btn-primary">suivant</button>
                       </div>
                       <div class="text-left" style="margin-top:-30px;">
                    <a role="button" class="btn btn-primary" href="formu.php">retour </a>
                   </div>
                       
                       </div>
                       </form>
                </div>
                </div>
        <?php   }
        ?>
             
                
   <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
    <script src="./assets/js/datatables.js"></script>
   
</body>
</html>
   <?php }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page! </h3>
								<h3 align="center" style="font-family:arial;margin-top:20%;"><a href="userInterface.php"> retour &agrave; la page d'acceuil</a>
		<?php }

?>