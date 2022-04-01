<?php 
session_start();
include('connexion.php');

  switch ($_POST['option']) {
    
    case 'comp1':
      # code...
      ?>
       <label for="inputdep1">Depart</label>
            <select id="inputdep1" class="form-control inputdep" name="depart">
            <option value="" selected>---Choisir---</option>
            <?php 
         
                if(isset($_POST['id'])){
                    $k = $_POST['id'];
                $pic = mysqli_query($link,"SELECT * FROM departement,faculte where departement.code_facult = faculte.code_facult and faculte.code_facult = '$k'");
                }
        while($data=mysqli_fetch_array($pic)){?>
            <option  value="<?php echo $data['code_depart'];?>"><?php echo $data['design_depart'];?></option>
            
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
      <label for="inputopt">Action</label>
      <select id="inputopt" class="form-control" name="opt">
          <option value="o">Ouvrir le departement(<em>si fermé</em>)</option>
          <option value="f">Fermer le departement(<em>si ouvert</em>)</option>

      </select>
      </div>
      </div>
      </div>
      </div>
