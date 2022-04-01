<?php
//session_start();
    if(isset($_SESSION['login']) and $_SESSION['cat']=="7"){?>
        <ul class="nav-items">
                     <li><a href="userInterface.php"><i class="icon-grid"></i> &nbsp; <span class="nav-item-text">Tableau de bord</span></a></li>
                     <li>
                        <a data-toggle="collapse" href="#collapseMenu1" role="button" aria-expanded="false" aria-controls="collapseMenu1"><i class="icon-pencil"></i> &nbsp; <span class="nav-item-text">Pr&eacute;inscription</span></a>
                            <ul class="menu-dd collapse" id="collapseMenu1">
                                <li><a href="preInsCompta.php?id_type=1"><i class="icon-note"></i> &nbsp; 1er année</a></li>
                                <li><a href="preInsCompta.php?id_type=2"><i class="icon-note"></i> &nbsp; 2<sup>ème</sup> ou 3<sup>ème</sup> année</a></li>
                                <li><a href="preInsCompta.php?id_type=5"><i class="icon-note"></i> &nbsp; Master</a></li>
                                <li><a href="enregistFiche.php?id_type=3"><i class="icon-note"></i> &nbsp;Transfert</a></li>
                                <li><a href="enregistReprise.php?id_type=4"><i class="icon-note"></i> &nbsp; Reprise</a></li>
                            </ul>

                    </li>
                    <li>
                        <a data-toggle="collapse" href="#collapseMenu8" role="button" aria-expanded="false" aria-controls="collapseMenu8"><i class="icon-pencil"></i> &nbsp; <span class="nav-item-text">Inscription</span></a>
                            <ul class="menu-dd collapse" id="collapseMenu8">
                                <li><a href="periode_preinscri.php">Autorisation de paie</a></li>
                                
                                <li><a href="verif_auto.php">Quitus</a></li>
                               
                            </ul>

                    </li>
                    <!-- <li class="bord"><a href="periode_preinscri.php"><i class="icon-pencil"></i> &nbsp; <span class="nav-item-text">Inscription</span></a></li> -->
                                <!-- <li><a href=""><i class="icon-doc"></i> &nbsp; Quitus</a></li> -->
                                <!-- <li>
                                <a data-toggle="collapse" href="#collapseMenu1" role="button" aria-expanded="false" aria-controls="collapseMenu1"><i class="icon-calculator"></i> &nbsp; <span class="nav-item-text">Situation comptable</span></a>
                                <ul class="menu-dd collapse" id="collapseMenu1">
                                    <li><a href="situationJparA.php"><i class="icon-user"></i> &nbsp; Journalière par agent</a></li>
                                    <li><a href="situationP.php"><i class="icon-clock"></i> &nbsp; Durant une periode</a></li>
    
                                </ul>
                            </li> -->
                        <li class="bord"><a href="recherecu.php"><i class="icon-magnifier"></i> &nbsp; <span class="nav-item-text">Rechercher un reçu</span></a></li>
                        <!-- <li class="bord"><a href="#"><i class="icon-plus"></i> &nbsp; <span class="nav-item-text">Enregistrer transactions SNPSF </span></a></li>-->
                        <li>
                            <a data-toggle="collapse" href="#collapseMenu2" role="button" aria-expanded="false" aria-controls="collapseMenu2"><i class="icon-eye"></i> &nbsp; <span class="nav-item-text">Visualiser</span></a>
                            <ul class="menu-dd collapse" id="collapseMenu2">
                                <li><a href="situationJ.php"><i class="icon-doc"></i> &nbsp; Situation journalière </a></li>
                                <li><a href="situationP.php"><i class="icon-doc"></i> &nbsp; Situation dans une periode</a></li>
                            </ul>
                        </li>
<?php }
?>
  
 