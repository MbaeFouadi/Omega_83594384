<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaires - Université des Comores</title>
    <link rel="shortcut icon" href="./assets/img/udc.png">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./node_modules/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
    <section class="main-wrapper">
        <aside class="left-aside">
            <div class="img-rd">
                <img src="./assets/img/udc.png" alt="profile image">
            </div>
            <h6 class="m-3 text-center"><strong>Université des Comores</strong></h6>
            <hr>
            <nav class="nav-aside">
                <ul class="nav-items">
                    <li><a href="#"><i class="icon-grid"></i> &nbsp; <span class="nav-item-text">Tableau de bord</span></a></li>
                    <li><a href="#"><i class="icon-settings"></i> &nbsp; <span class="nav-item-text">Gestion Admin</span></a></li>
                    <li><a href="#"><i class="icon-folder-alt"></i> &nbsp; <span class="nav-item-text">Resultats</span></a></li>
                    <li>
                        <a data-toggle="collapse" href="#collapseMenu1" role="button" aria-expanded="false" aria-controls="collapseMenu1"><i class="icon-direction"></i> &nbsp; <span class="nav-item-text">Admission</span></a>
                        <ul class="menu-dd collapse" id="collapseMenu1">
                            <li><a href=""><i class="icon-doc"></i> &nbsp; Ecole / Institut</a></li>
                            <li><a href=""><i class="icon-doc"></i> &nbsp; Faculté</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-notebook"></i> &nbsp; <span class="nav-item-text">Scolarité</span></a></li>
                    <li><a href="#"><i class="icon-info"></i> &nbsp; <span class="nav-item-text">Renseignements</span></a></li>
                    <li>
                        <a data-toggle="collapse" href="#collapseMenu2" role="button" aria-expanded="false" aria-controls="collapseMenu2"><i class="icon-graph"></i> &nbsp; <span class="nav-item-text">Statistiques</span></a>
                        <ul class="menu-dd collapse" id="collapseMenu2">
                            <li><a href=""><i class="icon-doc"></i> &nbsp; Nombre de préinscrits</a></li>
                            <li><a href=""><i class="icon-doc"></i> &nbsp; Nomre total des inscrits</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-logout"></i> &nbsp; <span class="nav-item-text">Déconnexion</span></a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <div class="text-center mb-5">
                <h1 class="soft-title-1">Information manquante</h1>
                <hr />
            </div>
            <div class="row">
                <div class="col-12">
                    <form>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Sexe</label>
                            <select id="inputState" class="form-control">
                                <option >Feminin</option>
                                <option selected>Masculin</option>
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            
                        </div>
<!-- 
                        <div class="form-group">
                            <label for="inputAddress">Pays</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Nationalite</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div> -->

                        <!-- <div class="form-group col-md-6">
                            <label for="inputPassword4">Pays</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Nationalite</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            
                        </div> -->
                        
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Telephone </label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Telephone</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            
                        </div>
                       

                        <div class="form-group">
                            <label for="inputAddress">Address Actuelle</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Pays</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        
                        
                       <div text-right>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                       </div>
                    </form>
                </div>
            </div>
        </main>
    </section>

    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
</body>
</html>