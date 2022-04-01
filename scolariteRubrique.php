<?php
session_start();
    if(isset($_SESSION['login']) and $_SESSION['cat']=="4"){?>
    
<ul class="nav-items">
            <li><a href="userInterface.php"><i class="icon-grid"></i> &nbsp; <span class="nav-item-text">Tableau de bord</span></a></li>
            <li class="bord"><a href="choix.php"><i class="icon-check"></i> &nbsp; <span class="nav-item-text">Valider une candidature</span></a></li>
            <li>
                <a data-toggle="collapse" href="#collapseMenu4" role="button" aria-expanded="false" aria-controls="collapseMenu4"><i class="icon-menu"></i> &nbsp; <span class="nav-item-text">Afficher les listes </span></a>
                <ul class="menu-dd collapse" id="collapseMenu4">
                     <li><a href="departement_liste.php?id_type=1"><i class="icon-list"></i> &nbsp; 1<sup>er</sup> année</a></li>
                     <li><a href="departement_liste.php?id_type=2"><i class="icon-list"></i> &nbsp; 2<sup>ème</sup> ou 3<sup>ème</sup> année</a></li>
                     <li><a href="departement_liste.php?id_type=5"><i class="icon-list"></i> &nbsp; Master</a></li>
                     <li><a href="departement_liste.php?id_type=3"><i class="icon-list"></i> &nbsp; Transfert</a></li> 
                     <li><a href="departement_liste.php?id_type=4"><i class="icon-list"></i> &nbsp; Reprise</a></li>
                </ul>
            </li>

<?php }
?>

