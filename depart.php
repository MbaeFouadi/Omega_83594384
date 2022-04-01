<?php 
session_start();
include('connexion.php');

  switch ($_POST['option']) {
    
    case 'comp1':
      # code...
      ?>
       <label for="inputdep1">Département</label>
            <select id="inputdep1" class="form-control inputdep" name="depart" required>
            <option value="" selected>---Choisir---</option>
            <?php 
         
                if(isset($_POST['id'])){
                    $k = $_POST['id'];
                $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart
                 FROM departement,faculte,disposition where departement.code_depart = disposition.code_depart and (disposition.code_niv='N5' or disposition.code_niv='N4' ) and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and departement.statut=1 AND disposition.statut=1");
                }
        while($data=mysqli_fetch_array($pic)){?>
            <option  value="<?php echo $data['code_depart'];?>"><?php echo utf8_encode($data['design_depart']);?></option>
            
        <?php 
        
        }
        ?>
        </select>
      <?php
      break;
  } ?>
  <div class="row">
    <div class="col-12">
  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="inputopt">Niveau</label>
      <select id="inputopt" class="form-control" name="opt" required>
          <option value="N4">M1</option>
          <option value="N5">M2</option>
</div>
      </select>
      </div>
      </div>
</div>
     
                          