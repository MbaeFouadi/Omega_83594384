<?php
//session_start();
if (isset($_SESSION['login']) and $_SESSION['cat'] == "6") { ?>
    <ul class="nav-items">
        <li><a href="userInterface.php"><i class="icon-grid"></i> &nbsp; <span class="nav-item-text">Tableau de bord</span></a></li>
        <li>
            <a data-toggle="collapse" href="#collapseMenu1" role="button" aria-expanded="false" aria-controls="collapseMenu1"><i class="icon-pencil"></i> &nbsp; <span class="nav-item-text">Pr&eacute;inscription</span></a>
            <ul class="menu-dd collapse" id="collapseMenu1">
                <li><a href="preInsCompta.php?id_type=1"><i class="icon-note"></i> &nbsp; 1er année</a></li>
                <li><a href="preInsCompta.php?id_type=2"><i class="icon-note"></i> &nbsp; 2<sup>ème</sup>année</a></li>
                <li><a href="preInsCompta.php?id_type=3"><i class="icon-note"></i> &nbsp; 3<sup>ème</sup> année</a></li>
                <li><a href="preInsCompta.php?id_type=6"><i class="icon-note"></i> &nbsp; Master1</a></li>
                <li><a href="preInsCompta.php?id_type=7"><i class="icon-note"></i> &nbsp; Master2</a></li>
                <!-- <li><a href="enregistFiche.php?id_type=4"><i class="icon-note"></i> &nbsp;Transfert</a></li> -->
                <!-- liste de préincription -->
                <li>
                    <a data-toggle="collapse" href="#collapseMenu14" role="button" aria-expanded="false" aria-controls="collapseMenu14"><i class="icon-note"></i> &nbsp; <span class="nav-item-text">Transfert</span></a>
                    <ul class="menu-dd collapse" id="collapseMenu14">
                        <li><a href="enregistFiche.php?id_type=41"><i class="icon-note"></i> &nbsp; 1er année</a></li>
                        <li><a href="enregistFiche.php?id_type=42"><i class="icon-note"></i> &nbsp; 2<sup>ème</sup>année</a></li>
                        <li><a href="enregistFiche.php?id_type=43"><i class="icon-note"></i> &nbsp; 3<sup>ème</sup> année</a></li>
                    </ul>
                </li>
                <li>
                    <a data-toggle="collapse" href="#collapseMenu20" role="button" aria-expanded="false" aria-controls="collapseMenu20"><i class="icon-note"></i> &nbsp; <span class="nav-item-text">Reprise</span></a>
                    <ul class="menu-dd collapse" id="collapseMenu20">
                        <li><a href="enregistReprise.php?id_type=51"><i class="icon-note"></i> &nbsp; 1er année</a></li>
                        <li><a href="enregistReprise.php?id_type=52"><i class="icon-note"></i> &nbsp; 2<sup>ème</sup>année</a></li>
                        <li><a href="enregistReprise.php?id_type=53"><i class="icon-note"></i> &nbsp; 3<sup>ème</sup> année</a></li>
                        <li><a href="enregistReprise.php?id_type=56"><i class="icon-note"></i> &nbsp; Master 1</a></li>
                        <li><a href="enregistReprise.php?id_type=57"><i class="icon-note"></i> &nbsp; Master 2</a></li>
                    </ul>
                </li>
               
                
                <!-- <li><a href="enregistReprise.php?id_type=5"><i class="icon-note"></i> &nbsp; Reprise</a></li> -->
            </ul>

        </li>
        <li>
            <a data-toggle="collapse" href="#collapseMenu8" role="button" aria-expanded="false" aria-controls="collapseMenu8"><i class="icon-pencil"></i> &nbsp; <span class="nav-item-text">Inscription</span></a>
            <ul class="menu-dd collapse" id="collapseMenu8">
                <!--<li><a href="periode_preinscri.php">Autorisation de paie</a></li>-->
                <!--<li><a href="verif_fiche.php">Autorisation de paie</a></li>-->

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
        <li>
            <a data-toggle="collapse" href="#collapseMenu9" role="button" aria-expanded="false" aria-controls="collapseMenu9"><i class="icon-magnifier"></i> &nbsp; <span class="nav-item-text">Rechercher</span></a>
            <ul class="menu-dd collapse" id="collapseMenu9">
                <li><a href="recherecu.php">Reçu</a></li>
                <!--<li><a href="recherche_ins.php">Fiche d'inscription</a></li>
                                    <li><a href="recherche_aut.php">Autorisation de paie</a></li>-->

                <li><a href="recherche_quit.php">Quitus</a></li>

            </ul>

        </li>
        <li>
            <a data-toggle="collapse" href="#collapseMenu2" role="button" aria-expanded="false" aria-controls="collapseMenu2"><i class=""></i> &nbsp; <span class="nav-item-text">Situation Préinscription </span></a>
            <ul class="menu-dd collapse" id="collapseMenu2">
                <li><a href="situationJ.php"><i class="icon-doc"></i> &nbsp; Situation journalière </a></li>
                <li><a href="situationP.php"><i class="icon-doc"></i> &nbsp; Situation dans une periode</a></li>
            </ul>
        </li>
        <li>

            <a data-toggle="collapse" href="#collapseMenu14" role="button" aria-expanded="false" aria-controls="collapseMenu14"><i class=""></i> &nbsp; <span class="nav-item-text">Situation Inscription</span></a>
            <ul class="menu-dd collapse" id="collapseMenu14">
                <li><a href="situationJ_ins.php"><i class="icon-doc"></i> &nbsp; Situation journalière </a></li>
                <!-- <li><a href="situationP.php"><i class="icon-doc"></i> &nbsp; Situation dans une periode</a></li> -->
            </ul>
        </li>



    <?php }
    ?>