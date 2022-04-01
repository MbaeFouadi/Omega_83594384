<?php
session_start();
if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7" or $_SESSION['cat']=="5")){
include('connexion.php');
$r="SELECT  date_fin FROM date_fin order by id_date DESC";

    $req = mysqli_query($link,$r);
    $data=mysqli_fetch_array($req);
    $dateJ=date('Y-m-d');
    if($data['date_fin'] == $dateJ ){ ?>
        <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, les pr&eacute;inscriptions sont d&eacute;ja ferm&eacute;es !<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
        <?php }else {
$t=0;
if(isset($_POST['submit'])){
    $t=1;
    if(!empty($_POST['fiche'])){
        $rec=mysqli_query($link,"SELECT * FROM post_inscription WHERE num_auto='".$_POST['fiche']."'");     
        $da=mysqli_fetch_array($rec);
        if(mysqli_num_rows($rec)==0){
            $t=0;
            $m="Ce numéro de fiche n'existe pas!";
        }else{
           if($da['statut']==2) {
            $t=0;  
            $m="Cette personne a déjà un autoration de paie!";
            
           }elseif($da['statut']==0) {
            $t=0;
            $m="Erreur!";
            
           }elseif($da['statut']==1) {
           
            $code_niv=$da['code_niv'];
                    $sql1="SELECT * FROM niveau where code_niv='".$da['code_niv']."'";
                    $resultat2 = mysqli_query($link,$sql1);
                    $data1 = mysqli_fetch_array($resultat2);
                    $niveau=$data1['intit_niv'];
                    $fiche=$_POST['fiche'];
                    $_SESSION['fiche']=$fiche;
           }
         
        }  
  
    }}else if (isset($_POST['ok'])){ 
         $t=0;
         $date=date('d/m/Y');
          $_SESSION['fiche']=$_POST['num_auto'];
          $_SESSION['code_niv']=$_POST['code_niv'];
          $query=mysqli_query($link,"UPDATE post_inscription SET traitant_autorisation='".$_SESSION['login']."', statut=2,date_delivrance_auto='$date' WHERE num_auto='".$_SESSION['fiche']."'");
                     header('location:autorisation_paie.php');
                 }
                
        
     
    
        include('header.php');

?>

       
                </div>
            <div class="text-center mb-5">
            
                <?php
               
               
                    if($t==0){?>
                    <h2 class="soft-title-2" > Editer une autorisation de paie</h2>
                    <hr /><div style="margin-bottom:80px"></div>
                    <h5 style="color:red;"><?php echo $m ?></h5>

            </div>
                        
       
                <div class="row">
                <div class="col-12">
            
                <form action="verif_fiche.php" method="post">
                       
            
            
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        <div class="form-group col-md-4">
                            <input style="text-align:center;" type="text" name="fiche" class="form-control"  placeholder="Saisir le Numéro du fiche d'inscription" required> 
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
                            <h5>Nin :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><? echo $da['nin']?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5 style='margin-left:-90px,margin-right:20px'>Niveau: &nbsp;<b><? echo utf8_encode($data1['intit_niv']) ?></b></h5>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Nom :&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><? echo utf8_encode($da['nom']) ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5 style='margin-left:60px'>Pr&eacute;nom :&nbsp;&nbsp;<b><? echo utf8_encode($da['prenom']);?></b></h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Date de naissance : <b><? echo $da['date_naiss']  ;?></b></h5>
                        </div>
                        <div class="form-group col-md-6">
                            <h5>Lieu de naissance :&nbsp;&nbsp;<b><? echo utf8_encode($da['lieu_naiss']);?></b></h5>
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
           
              <?php 
              
           
                ?>
         
            <form action="verif_fiche.php" method="POST">
            <?php
            $req=mysqli_query($link,"SELECT * FROM post_inscription WHERE num_auto='$fiche'");
            if(mysqli_num_rows($req)>0){
               $data= mysqli_fetch_array($req);
            ?>
                <input type="hidden" name="code_niv" value=<?php echo $data['code_niv'] ;?> >
               

                <input type="hidden" name="num_auto" value=<?php echo $data['num_auto'] ;?> >
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
