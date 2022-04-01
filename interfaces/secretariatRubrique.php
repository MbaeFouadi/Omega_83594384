<?php
//session_start();
    if(isset($_SESSION['login']) and $_SESSION['cat']=="9"){?>
        <ul class="nav-items">
                     <li><a href="userInterface.php"><i class="icon-grid"></i> &nbsp; <span class="nav-item-text">Tableau de bord</span></a></li>
                 
                    <li>
                        <a data-toggle="collapse" href="#collapseMenu8" role="button" aria-expanded="false" aria-controls="collapseMenu8"><i class="icon-pencil"></i> &nbsp; <span class="nav-item-text">Inscription</span></a>
                            <ul class="menu-dd collapse" id="collapseMenu8">
                                <!--<li><a href="periode_preinscri.php">Autorisation de paie</a></li>-->
                                <!--<li><a href="verif_fiche.php">Autorisation de paie</a></li>-->
                                
                                <li><a href="recherche_secretariat.php">Certificat de scolarite</a></li>
                               
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
                            <!-- <li>
                            <a data-toggle="collapse" href="#collapseMenu9" role="button" aria-expanded="false" aria-controls="collapseMenu9"><i class="icon-magnifier"></i> &nbsp; <span class="nav-item-text">Rechercher</span></a>
                                <ul class="menu-dd collapse" id="collapseMenu9">
                                    <li><a href="recherecu.php">Reçu</a></li>
                                    <li><a href="recherche_ins.php">Fiche d'inscription</a></li>
                                    <li><a href="recherche_aut.php">Autorisation de paie</a></li>
                                    
                                    <li><a href="recherche_quit.php">Quitus</a></li>
                                   
                                </ul> -->
    
                        </li>
                       
                        <li>
                      
                            <a data-toggle="collapse" href="#collapseMenu14" role="button" aria-expanded="false" aria-controls="collapseMenu14"><i class=""></i> &nbsp; <span class="nav-item-text">Situation Inscription</span></a>
                            <ul class="menu-dd collapse" id="collapseMenu14">
                                <li><a href=""><i class="icon-doc"></i> &nbsp; Situation journalière </a></li>
                                <li><a href=""><i class="icon-doc"></i> &nbsp; Situation dans une periode</a></li>
                            </ul>
                        </li>


                       
<?php }
?>
  
 