<?php 
session_start();
include('connexion.php');
$dep = $_POST['id'];
if(isset($_POST['id'])){
  $k = $_POST['id'];

if($_SESSION['type']==5){
  $pic = mysqli_query($link,"SELECT DISTINCT departement.code_depart,design_depart FROM faculte,departement,disposition where faculte.code_facult=departement.code_facult and departement.code_depart=disposition.code_depart and code_niv='N5' and disposition.statut=1 and departement.statut=1 and faculte.code_facult = '$k'");
  
} elseif($_SESSION['type']==4){
  $pic = mysqli_query($link,"SELECT DISTINCT departement.code_depart,design_depart FROM faculte,departement,disposition where faculte.code_facult=departement.code_facult and departement.code_depart=disposition.code_depart and code_niv='N4' and disposition.statut=1 and departement.statut=1 and faculte.code_facult = '$k'");
  
}
elseif($_SESSION['type']==3){
  $pic = mysqli_query($link,"SELECT DISTINCT departement.code_depart,design_depart FROM faculte,departement,disposition where faculte.code_facult=departement.code_facult and departement.code_depart=disposition.code_depart and (code_niv='N3'or code_niv='P3')  and disposition.statut=1 and departement.statut=1 and faculte.code_facult = '$k'");
  
}
elseif($_SESSION['type']==2){
  $pic = mysqli_query($link,"SELECT DISTINCT departement.code_depart,design_depart FROM faculte,departement,disposition where faculte.code_facult=departement.code_facult and departement.code_depart=disposition.code_depart and (code_niv='N2'or code_niv='P2')  and disposition.statut=1 and departement.statut=1 and faculte.code_facult = '$k'");

} elseif($_SESSION['type']==1){
  $pic = mysqli_query($link,"SELECT DISTINCT departement.code_depart,design_depart FROM faculte,departement,disposition where faculte.code_facult=departement.code_facult and departement.code_depart=disposition.code_depart and (code_niv='N1'or code_niv='P1')  and disposition.statut=1 and departement.statut=1 and faculte.code_facult = '$k' ");                                
}
}




    ?>
     <label for="inputdep1">Département  </label>
                <select id="inputdep1" class="form-control inputdep" name="depart">
                <option value="" selected>---Choisir---</option>
                <?php 
                while($data=mysqli_fetch_array($pic)){?>
                      <option value="<?php echo $data['code_depart'];?>"><?php echo utf8_encode($data['design_depart']);?></option>
                        
                    <?php 
                                                  }
                                              
                      ?>
                  </select>

 

                          