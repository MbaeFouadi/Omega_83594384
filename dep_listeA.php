<?php 
session_start();
include('connexion.php');

  switch ($_POST['option']) {
    
    case 'comp1':
      # code...
      ?>
       <label for="inputdep1">Département</label>
            <select id="inputdep1" class="form-control inputdep" name="depart">
            <option value="" selected>---Choisir---</option>
            <?php 
         
                if(isset($_POST['id'])){
                    $k = $_POST['id'];
                    if($_SESSION['type']==1 || $_SESSION['type']==2){
                   $pic = mysqli_query($link,"SELECT DISTINCT design_depart,departement.code_depart AS code_depart FROM departement,faculte,disposition  WHERE departement.code_depart = disposition.code_depart
            and (disposition.code_niv='N1' or disposition.code_niv='P1' ) and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and departement.statut = 1 and departement.concours=1 ");     
                    }
                    if($_SESSION['type']==3 || $_SESSION['type']==4){
                        $pic = mysqli_query($link,"SELECT DISTINCT design_depart,departement.code_depart FROM departement,faculte,disposition  WHERE departement.code_depart = disposition.code_depart
                 and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and departement.statut = 1 and departement.concours=1 ");     
                         }
                
                }
        while($data=mysqli_fetch_array($pic)){?>
            <option  value="<?php echo $data['code_depart'];?>"><?php echo ($data['design_depart']);?></option>
            
        <?php 
        
        }
        ?>
        </select>
      <?php
      break;
  } ?>
  
  
    
</div>
     
     
     
                          