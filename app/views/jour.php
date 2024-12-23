<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <link href="/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/jour.css">

    <script src="/bs3/js/jquery.min.js"></script>
    <script src="/bs3/js/bootstrap.min.js"></script>
    <script src="/assets/js/chart.umd.min.js"></script>
    <script src="/assets/js/chart.umd.js.map"></script>

</head>

<body>
    <div class="back">
        <img src="/assets/image/background.gif" alt="">
    </div>
    <header>
        <button>Listes des voitures</button>
        <button>Listes des chaffeurs</button>
    </header>
    <section>
        <?php if (empty($trajets)) { ?>
        <h1 style="color : white;">Pas de trajet pendant cette date.</h1>
        <?php } else { 
            foreach($trajets as $trajet) { ?>
        <div class="col-md-6">
            <div class="menuContain">
                <a href="#" class="imageLogo">
                    <img src="/assets/image/bus.png" alt="">
                    <p><?= $trajet->trajet_vehicule ?></p>
                </a>
                <div class="menuItem">
                    <div>
                        <h2><?= $trajet->chauffeur->chauffeur_nom ?></h2>
                        <p><?= $trajet->chauffeur->chauffeur_prenom ?></p>
                    </div>
                    <div>
                        <h2>Benefice</h2>
                        <p><?= $trajet->trajet_montant - $trajet->trajet_carburant * $prix_carburant ?>Ar</p>
                    </div>
                    <div>
                        <h2>Depart</h2>
                        <p><?= (new DateTime($trajet->trajet_debut))->format("d/m/Y H:i:s") ?></p>
                    </div>
                    <div>
                        <h2>Arrivée</h2>
                        <p><?= (new DateTime($trajet->trajet_fin))->format("d/m/Y H:i:s") ?></p>
                    </div>
                    <div>
                        <h2>Recette</h2>
                        <p><?= $trajet->trajet_montant ?>Ar</p>
                    </div>
                    <div>
                        <h2>Carburant</h2>
                        <p><?= $trajet->trajet_carburant * $prix_carburant ?>Ar</p>
                    </div>
                </div>
            </div>
        </div>
        <?php }} ?>
    </section>
</body>
<script src="/assets/js/jour.js"></script>


</html>