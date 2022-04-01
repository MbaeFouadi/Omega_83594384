<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
if(isset($_SESSION['login']) and $_SESSION['cat']=="1" or $_SESSION['cat']=="6" or ($_SESSION['cat']=="7") or ($_SESSION['cat']=="3")){  
    
include('connexion.php');
$s=0;
$m="";
//$message="";
/*$r=mysqli_query($link,"SELECT  * FROM date_fin WHERE type=2 order by id_date DESC");
$dat = mysqli_fetch_array($r); */
if(isset($_GET['periode'])){
    $_SESSION['periode']=$_GET['periode'];
    
  }


if(isset($_POST['valider'])){
    
    $s=1;
    $_SESSION['nin']=$_POST['nin'];
    $_SESSION['mat']=$_POST['mat'];
    $_SESSION['annee']=$_POST['annee'];

    

     $reqa=mysqli_query($link,"SELECT * FROM post_inscription WHERE nin='".$_SESSION['nin']."'  AND Annee ='".$_SESSION['annee']."'");
    if(mysqli_num_rows($reqa)>0){
        $s=0;
        $m="Cette personne a déja une fiche !";
         }else{ 
            $s=1; 

            $red=mysqli_query($link,"SELECT * FROM candidats where nin='".$_SESSION['nin']."'");
            $blue=mysqli_fetch_array($red);
            if(mysqli_num_rows($red)!=0){

               $p=1; 
               $_SESSION['type']=$blue['id_type'];
               $nom=$blue['nom'];
               $prenom=$blue['prenom'];
               $date_n=$blue['date_naiss'];
               $lieu_n=$blue['lieu_naiss'];
   
               $re=mysqli_query($link,"SELECT * FROM type_recu where id_type='".$blue['id_type']."'");
               $datas=mysqli_fetch_array($re);
               $type=$datas['nom_type'];

               $r=mysqli_query($link,"SELECT * FROM etudiant where mat_etud='".$_SESSION['mat']."'  ");
               $data=mysqli_fetch_array($r);

            }else{
                $p=0;
                $re=mysqli_query($link,"SELECT * FROM inscription where mat_etud='".$_SESSION['mat']."' order by Annee DESC");
                $dat=mysqli_fetch_array($re);
                /* $Annee=$data['Annee'];
                $an=date('Y');
                $d = date(Y);
                $dd=$d-1;
                
                $a = $dd."-".$d; */
                $r=mysqli_query($link,"SELECT * FROM etudiant where mat_etud='".$_SESSION['mat']."'");
                $data=mysqli_fetch_array($r);
                
                if(mysqli_num_rows($re)>0){
                    
                    $req=mysqli_query($link,"SELECT * FROM admission where matricule='".$_SESSION['mat']."'");
                    
                   /*  $rectangle=mysqli_query($link,"SELECT * FROM candidats where nin='$nin'");

                    if(mysqli_num_rows($req)>0){
                       
                        $resultat="Admis";
                    } else{
                        if(mysqli_num_rows($rectangle)>0){
                            
                             $cas;
                         } 
                        
                         $resultat="Ajourné";
                    } */
                    
                    if(mysqli_num_rows($req)>0){
                        
                         $resultat="Admis";
                     } else{
                         $resultat="Ajourné";
                     }
                     
                    
                }else{
                    $s=0;
                    $m='Etudiant non inscrit';
                } 
            }

            $re=mysqli_query($link,"SELECT * FROM inscription where mat_etud='".$_SESSION['mat']."' order by Annee DESC");
            $dat=mysqli_fetch_array($re);
            /* $Annee=$data['Annee'];
            $an=date('Y');
            $d = date(Y);
            $dd=$d-1;
            
            $a = $dd."-".$d; */
            $r=mysqli_query($link,"SELECT * FROM etudiant where mat_etud='".$_SESSION['mat']."'");
            $data=mysqli_fetch_array($r);
            $nom=$data['nom'];
            $prenom=$data['prenom'];
            $date_n=$data['date_naiss'];
            $lieu_n=$data['lieu_naiss'];
            if(mysqli_num_rows($re)>0){
                
                $req=mysqli_query($link,"SELECT * FROM admission where matricule='".$_SESSION['mat']."'");
                if(mysqli_num_rows($req)>0){
                   
                    $resultat="Admis";
                } else{
                    $resultat="Ajourné";
                }
                

   /*  $rectangle=mysqli_query($link,"SELECT * FROM candidats where nin='$nin'");
    
        if(mysqli_num_rows($req)>0){
            
            $resultat="Admis";
        } else{
            if(mysqli_num_rows($rectangle)>0){
                
                    $cas;
                } 
            
                $resultat="Ajourné";
        } */
                
            }else{
                $s=0;
                $m="Cet etudiant n'a pas un parcours à l'UDC";
            }  
   }


}


include('header.php');

?>

            <div class="text-center mb-5">
            <?php
                          //echo  "SELECT * FROM etudiant WHERE mat_etud='$mat'";
                            ?>
				</div>
                <?php
                if($s==0){?>

                <h1 align="center" class="soft-title-2">Editer une autorisation de paie</h1>
                <hr />
                <h6 align="center" style="color:red;"> <?php echo $m ?></h6>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="post_autorisation_paie.php" method="POST">
                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        
                        <div class="form-group col-md-4" style="margin-top:40px">
                            <input style="text-align:center;" type="text" name="nin" class="form-control"  placeholder="Saisir le NIN " required> 
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        
                        <div class="form-group col-md-4" style="margin-top:20px">
                            <input style="text-align:center;" type="text" name="mat" class="form-control"  placeholder="Saisir le Numéro de matricule" required> 
                        </div>
                    </div>
                    <?php $query=mysqli_query($link,"SELECT * FROM annee order by id_annee desc"); ?>
                    <!--<div class="form-row ">-->
                        <div class="form-group col-md-4" style="margin-top:auto;margin-left:310px;">
                            <select name="annee" class="form-control">
                                        <?php while($data=mysqli_fetch_array($query)){?>
                                            <option value="<?=$data['Annee']?>"><?=$data['Annee']?></option>
                                        <?php }?>
                            </select><br>
                        </div>
                        
                   <!-- </div>-->

                                <div class="text-center">
                        <button name="valider" type="submit" class="btn btn-primary">Rechercher</button>
                       </div>
                    </form>
                </div>
            </div>
            <?php }elseif($s==1){ ?>
               

            <div class="row">
                <div class="col-12">
                <?php if($p==0 ){ ?>
                <div class="form-row">
               
                        <div class="form-group col-md-4">
                           
                        </div>
                        <div class="form-group col-md-4">
                            <h5>Resultat:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<b><?php echo $resultat  ?></b></h5>
                        </div>

                    </div>
                    <?php } ?>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                            <h5>NIN:&nbsp;&nbsp;&nbsp;<b><?php echo $_SESSION['nin'] ?></b></h5>
                    </div>

                        <div class="form-group col-md-6">
                            <h5>Matricule :&nbsp;&nbsp;<b><?php echo $_SESSION['mat'] ?></b></h5>
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Nom :&nbsp;<b><?php echo (utf8_encode($nom)) ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Pr&eacute;nom :&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo (utf8_encode($data['prenom']));?></b></h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Date de naissance : <b><?php echo $date_n  ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Lieu de naissance :&nbsp;&nbsp;<b><?php echo utf8_encode($lieu_n);?></b></h5>
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
           
            <form action="autorisation_paie.php?periode=2" method="POST">
            
                    <?php if($p==1){?>
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
                <?php } ?> 
            <div class="form-row">
            <div class="form-group col-md-4">
            <h4 style="text-indent:80px;">Téléphone mobile :</h4>
            </div>
                <div class="form-group col-md-4">
                <input name="tel" class="form-control" type="text" placeholder='Téléphone mobile'>  

               </div>
            </div>
                            
            <div class="text-right">
                <?php if($p==1){?>
            <input value="1" name="pers" type="hidden">  
            <input value="1" name="p" type="hidden">
                <?php }?>
                 <input value="<? echo $data['mat_etud'];?>" name="mat" type="hidden">
                 <input value="<? echo $nin;?>" name="nin" type="hidden">
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