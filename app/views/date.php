<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <link href="/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/welcome.css">

    <script src="/bs3/js/jquery.min.js"></script>
    <script src="/bs3/js/bootstrap.min.js"></script>

</head>

<body>

    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Title</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Liste des dates</a></li>
                <li><a href="#">Link</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    <header class="col-md-2">
        <?php foreach ($annees as $annee_) { ?>
            <a href="/dates/<?= $annee_ ?>"><?= $annee_ ?></a>
        <?php } ?>
        <?php if (!in_array($annee__ = date("Y"), $annees)) { ?>
            <a href="/dates/<?= $annee__ ?>"><?= $annee__ ?></a>
        <?php } ?>
    </header>
    <section class="col-md-10 col-md-offset-2">
        <h1 class="title">Les Jours ouvrables de l'annee 2001</h1>
        <div class="headJour">
            <button class="col-md-1" onclick="getJour(100)">Janvier</button>
            <button class="col-md-1" onclick="getJour(200)">Fevrier</button>
            <button class="col-md-1" onclick="getJour(300)">Mars</button>
            <button class="col-md-1" onclick="getJour(400)">Avril</button>
            <button class="col-md-1" onclick="getJour(500)">Mai</button>
            <button class="col-md-1" onclick="getJour(600)">Juin</button>
            <button class="col-md-1" onclick="getJour(700)">Juillet</button>
            <button class="col-md-1" onclick="getJour(800)">Aout</button>
            <button class="col-md-1" onclick="getJour(900)">Septembre</button>
            <button class="col-md-1" onclick="getJour(1000)">Octobre</button>
            <button class="col-md-1" onclick="getJour(1100)">Novembre</button>
            <button class="col-md-1" onclick="getJour(1200)">Decembre</button>
        </div>
        <div id="jour" class="row">
            <?php for ($i = 1; $i <= 12; $i++) { ?>
                <div>
                    <?php foreach ($dates[$i] ?? [] as $jour) { ?>
                        <div class="col-md-1">
                            <a href="/jour/<?= $annee ?>-<?= str_pad($i, 2, "0", STR_PAD_LEFT) ?>-<?= str_pad($jour, 2, "0", STR_PAD_LEFT) ?>"
                                class="itemDate">
                                <p><?= $jour ?></p>
                            </a>
                        </div>
                </div>
        <?php }
                } ?>
        </div>
    </section>

</body>
<script src="/assets/js/date.js"></script>

</html>