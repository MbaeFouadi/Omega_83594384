<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
if(isset($_SESSION['login']) and $_SESSION['cat']=="1" or $_SESSION['cat']=="6" or ($_SESSION['cat']=="7")  or ($_SESSION['cat']=="3")){  
    
include('connexion.php');

$m="";
$message="";
$r=mysqli_query($link,"SELECT  date_fin FROM date_fin order by id_date DESC");
$dat = mysqli_fetch_array($r); 
if(isset($_GET['periode'])){
    $_SESSION['periode']=$_GET['periode'];
    //$annee=$_POST['annee'];
    
  }

  $s=0;
  
if(isset($_POST['valider'])){
    
      
        
    $s=1;
$_SESSION['nin']=$_POST['nin'];
$_SESSION['annee']=$_POST['annee'];
//$_SESSION['annee']=$_POST['annee'];

//$dat=mysqli_fetch_array($re); 
/* $Annee=$data['Annee'];*/
$an=date('Y');
$d = date('Y');
$dd=$d+1;
$ins=mysqli_query($link,"SELECT * FROM etudiant where NIN='".$_SESSION['nin']."' ");


$a = $d."-".$dd; 
$reqa=mysqli_query($link,"SELECT * FROM post_inscription WHERE nin='".$_SESSION['nin']."' AND Annee ='".$_SESSION['annee']."'");
if(mysqli_num_rows($reqa)>0){
    $s=0;
    $m="Cette personne a déja une fiche d'inscription";
     }else{
        $s=1;  
        $r=mysqli_query($link,"SELECT * FROM candidats where nin='".$_SESSION['nin']."'");
        $data=mysqli_fetch_array($r);
        $ret = $data['retenu'];
        $annee=$_POST['annee'];

        $req2 = mysqli_query($link,"SELECT * FROM departement where code_depart='$ret'"); 
        $dep = mysqli_fetch_array($req2);

            if($ret=='nR1' || $ret=='nR2' || $ret=='nR3' || $ret=='' || $ret=='0'){
                 $s=0;
                $m= "Fiche indisponible, cet étudiant n'est pas encore retenu dans une département";
            }else{

        
        
        if(mysqli_num_rows($r)!=0){
        
            $_SESSION['type']=$data['id_type'];
            $re=mysqli_query($link,"SELECT * FROM type_recu where id_type='".$data['id_type']."'");
            $datas=mysqli_fetch_array($re);
            $type=$datas['nom_type'];
           
            
        }else{
            $s=0;
            $m="Etudiant non préinscrit au titre de l'année ".$_SESSION['annee'];
        }
}}

if(mysqli_num_rows($ins)!=0){
    $s=0;
    $m="Cette personne a déjà un parcours à l'UDC, c'est plutôt une ré-inscription";
 }
 
}


include('header.php');

?>

            <div class="text-center mb-5">
            <?php  ?>
				</div>
                <?php
                if($s==0){?>

                <h1 align="center" class="soft-title-2">Editer une fiche d'autorisation de paie </h1>
                <hr />
                <h6 align="center" style="color:red;"> <?= $m ?></h6>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="post_autorisation_paieN.php" method="POST">
                        
                    <div class="form-row">
                    <div class="form-group col-md-4">
                    </div>
                    
                    <div class="form-group col-md-4" style="margin-top:40px">
                        <input style="text-align:center;" type="text" name="nin" class="form-control"  placeholder="Saisir le Nin" required> 
                    </div>
                    <?php $query=mysqli_query($link,"SELECT * FROM annee order by id_annee desc"); ?>
                    <!--<div class="form-row ">-->
                        <div class="form-group col-md-4" style="margin-top:90px;margin-left:-321px;">
                            <select name="annee" class="form-control">
                                        <?php while($data=mysqli_fetch_array($query)){?>
                                            <option value="<?=$data['Annee']?>"><?=$data['Annee']?></option>
                                        <?php }?>
                            </select><br>
                        </div>
                        
                   <!-- </div>-->

                </div>
                      
                                <div class="text-center">
                        <button name="valider" type="submit" class="btn btn-primary">Rechercher</button>
                       </div>
                    </form>
                </div>
            </div>
            <?php }elseif($s==1){ ?>
               

            <div class="row">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>NIN :&nbsp;&nbsp;&nbsp; <b><?php echo $data['nin']?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Type de préinscription:&nbsp;<b><?php echo utf8_encode($type)?></b></h5>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Nom :&nbsp;&nbsp; <b><?php echo utf8_encode($data['nom']) ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Pr&eacute;nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo (utf8_encode($data['prenom']));?></b></h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Date de naissance : <b><?php echo $data['date_naiss']  ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Lieu de naissance :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo utf8_encode($data['lieu_naiss']);?></b></h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <h5>Retenu :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo utf8_encode($dep['design_depart']);?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>&nbsp;&nbsp;</h5>
                        </div>
                    </div>
                   
                </div>
            </div>
           
            <form action="autorisation_paie.php?periode=1" method="POST">
            <?php if($_SESSION['type']!=1){?> 
               
            <div class="form-row">
            <div class="form-group col-md-4">
            <h4 style="text-indent:200px;">Niveau:</h4>

            </div>
                <div class="form-group col-md-4">
                <select type="text" class="form-control" name="niveau" id="inputlib" placeholder="Niveau" required>
               
                <option value="">--- Choisir ---</option>
            <?php if($_SESSION['type']==2){?> 
                <option value="l2">Licence 2</option>
                <option value="l3">Licence 3</option>
            <?php } ?>
            <?php if($_SESSION['type']==3 || $_SESSION['type']==4){?> 
                <option value="l1">Licence 1</option>
                <option value="l2">Licence 2</option>
                <option value="l3">Licence 3</option>
                <option value="N4">Master 1</option>
                <option value="N5">Maaster 2</option>
            <?php }?> 
            <?php if($_SESSION['type']==5){?> 
                <option value="N4">Master 1</option>
                <option value="N5">Master 2</option>
            <?php }?> 
                        </select>
               </div>
            </div>
            <?php }else {?> 
                <input value="l1" name="niveau" type="hidden">  
                <?php } ?>         
            <div class="text-right">
                 <input value="<?php echo $data['nin'];?>" name="nin" type="hidden">
                  
            <button name="submit" type="submit" class="btn btn-primary">Suivant</button>
            </div>
        </form>

                <?php }
                ?>
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