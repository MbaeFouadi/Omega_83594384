<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat'])=="1" or  ($_SESSION['cat']=="8")){
include('connexion.php');

//$r="SELECT  * FROM date_fin WHERE type=2 order by id_date DESC";
$r="SELECT  DATE_ADD(date_fin,INTERVAL 15 DAY) AS date_fin,type,id_date FROM date_fin WHERE type=2 order by id_date DESC";

    $datedebu=mysqli_query($link,"SELECT * FROM date_debut WHERE type=2 ORDER BY id_date_debut DESC");
$datedeb=mysqli_fetch_array($datedebu);

    //parcourir les données de la table date_fin    
    $req = mysqli_query($link,$r);
    $dat=mysqli_fetch_array($req);
    $dateJ=date('Y-m-d');

    //Verification de la date de prinscription
    if($dat['date_fin'] < $dateJ){ ?>
        <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, les inscriptions sont d&eacute;ja ferm&eacute;es !<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
        <?php }elseif($datedeb['date_debut']> $dateJ) {?>
            <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, les inscriptions ne sont pas encore debuté<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
       <?php }

        else{
$m="";
$t=0;
//$droit="";
if(isset($_POST['submit'])){
    $t=1;
    if(!empty($_POST['auto'])){
        $_SESSION['annee']=$_POST['annee'];
        $rec=mysqli_query($link,"SELECT * FROM post_inscription WHERE num_auto='".$_POST['auto']."' AND Annee ='".$_SESSION['annee']."'");     
        $da=mysqli_fetch_array($rec);
        $code_niv=$da['code_niv'];
        $sql1="SELECT * FROM niveau where code_niv='".$da['code_niv']."'";
        $resultat2 = mysqli_query($link,$sql1);
        $data1 = mysqli_fetch_array($resultat2); 
        //$rec=mysqli_query($link,"SELECT * FROM quitus WHERE trans_udc='".$_POST['droit']."'");
        
       /*  if(mysqli_num_rows($rec)=!0){
            $m="Le numero de transaction correspondant au droit d'inscription est déjà utilisé";
        }   */
        //$d=mysqli_fetch_array($re);
        //$niveau=$d['intit_niv'];
        $auto=$_POST['auto'];
        $_SESSION['auto']=$auto;
        $req=mysqli_query($link,"SELECT * FROM post_inscription WHERE num_auto='$auto' AND Annee ='".$_SESSION['annee']."'");
        if(mysqli_num_rows($req)>0){
           $data= mysqli_fetch_array($req);
           if ($data['statut']==1) {
            $t=0;
            $m="Cette personne a une fiche mais n'a pas encore une autorisation!";
             }
    }else{ $t=0;
        $m="Cette personne n'a même pas une fiche!";
    }
}   
}

if (isset($_POST['ok'])){

    $supp=mysqli_query($link,"DELETE FROM post_inscription WHERE num_auto='".$_SESSION['auto']."' AND Annee ='".$_SESSION['annee']."'");
    if($supp)
    header('location:suppression.php');
    
}
   
  
        
     
    
        include('header.php');

?>

       
                </div>
            <div class="text-center mb-5">
            
                <?php
               
               
                    if($t==0){?>
                    <h2 class="soft-title-2" > Supprimer un autorisation de paie </h2>
                    <hr /><div style="margin-bottom:80px"></div>
                    <h5 style="color:red;"><?php echo $m ?></h5>

            </div>
                        
       
                <div class="row">
                <div class="col-12">
            
                <form action="suppression.php" method="post">
                       
            
            
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        <div class="form-group col-md-4">
                            <input style="text-align:center;" type="text" name="auto" class="form-control"  placeholder="Saisir le Numéro de l'autorisation" required> 
                        </div>
                        <?php $query=mysqli_query($link,"SELECT * FROM annee order by id_annee desc"); ?>
                    </div>
                    <!--<div class="form-row ">-->
                    <div class="form-group col-md-4" style="margin-top:auto;margin-left:320px;">
                            <select name="annee" class="form-control">
                                        <?php while($data=mysqli_fetch_array($query)){?>
                                            <option value="<?=$data['Annee']?>"><?=$data['Annee']?></option>
                                        <?php }?>
                            </select><br>
                        </div>
                        
                   <!-- </div>-->
                   
                          
                     
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
                            <h5 style='margin-left:-90px,margin-right:20px'>Niveau: &nbsp;<b><?php echo ($data1['intit_niv']) ?></b></h5>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Nom :&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo (utf8_encode(($data['nom']))) ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5 style='margin-left:60px'>Pr&eacute;nom :&nbsp;&nbsp;<b><?php echo (utf8_encode(($data['prenom'])));?></b></h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Date de naissance : <b><?php echo $data['date_naiss']  ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Lieu de naissance :&nbsp;&nbsp;<b><?php echo (utf8_encode(($data['lieu_naiss'])));?></b></h5>
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
                            <h5>Serie:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? //echo $data['serie']  ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Mention:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? //echo $data['mention']  ;?></b></h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Ann&eacute;e d obtention du bac:&nbsp; <b><? //echo $data['annee'] ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>N° d'attestation: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? //echo $data['num_attest'];?></b></h5>
                        </div>
                    </div-->
                </div>
            </div>
           
              <?php 
              
           
                ?>
         
            <form action="suppression.php" method="POST">
            <?php
            $req=mysqli_query($link,"SELECT * FROM post_inscription WHERE num_auto='$auto'");
            if(mysqli_num_rows($req)>0){
               $data= mysqli_fetch_array($req);
            ?>
                <input type="hidden" name="code_niv" value=<?php echo $data['code_niv'] ;?> >
               

                <input type="hidden" name="num_auto" value=<?php echo $data['num_auto'] ;?> >
                        <div class="text-right">
                          <button name="ok" type="submit" class="btn btn-primary">Supprimer</button>
                        </div>
            <?php } ?>
                        </form>
              <?php 
              
            }
                ?>
                <?php }  }else{?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
        </main>
        <?php
    }
        ?>
             <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
   
</body>
</html>
