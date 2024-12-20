<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/welcome.css">

    <script src="bs3/js/jquery.min.js"></script>
    <script src="bs3/js/bootstrap.min.js"></script>

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
        <a href="">2001</a>
        <a href="">2001</a>
        <a href="">2001</a>
        <a href="">2001</a>
        <a href="">2001</a>
    </header>
    <section class="col-md-10 col-md-offset-2">
        <h1 class="title">Les Jours ouvrables</h1>
        <div class="headJour">
            <button class="col-md-1" onclick="getJour(0)">Janvier</button>
            <button class="col-md-1" onclick="getJour(100)">Fevrier</button>
            <button class="col-md-1" onclick="getJour(200)">Mars</button>
            <button class="col-md-1" onclick="getJour(300)">Avril</button>
            <button class="col-md-1" onclick="getJour(400)">Mai</button>
            <button class="col-md-1" onclick="getJour(500)">Juin</button>
            <button class="col-md-1" onclick="getJour(600)">Juillet</button>
            <button class="col-md-1" onclick="getJour(700)">Aout</button>
            <button class="col-md-1" onclick="getJour(800)">Septembre</button>
            <button class="col-md-1" onclick="getJour(900)">Ocktobre</button>
            <button class="col-md-1" onclick="getJour(1000)">Novembre</button>
            <button class="col-md-1" onclick="getJour(1100)">Decembre</button>
        </div>
        <div id="jour" class="row">
            <div>
                <div class="col-md-1">
                    <a href="#" class="itemDate">
                        <p>1</p>
                    </a>
                </div>
                <div class="col-md-1">
                    <a href="#" class="itemDate">
                        <p>1</p>
                    </a>
                </div>
                <div class="col-md-1">
                    <a href="#" class="itemDate">
                        <p>1</p>
                    </a>
                </div>
            </div>
            <div>
                <div class="col-md-1">
                    <a href="#" class="itemDate">
                        <p>1</p>
                    </a>
                </div>
                <div class="col-md-1">
                    <a href="#" class="itemDate">
                        <p>1</p>
                    </a>
                </div>
                <div class="col-md-1">
                    <a href="#" class="itemDate">
                        <p>1</p>
                    </a>
                </div>
            </div>
            <div>
                <div class="col-md-1">
                    <a href="#" class="itemDate">
                        <p>1</p>
                    </a>
                </div>
                <div class="col-md-1">
                    <a href="#" class="itemDate">
                        <p>1</p>
                    </a>
                </div>
                <div class="col-md-1">
                    <a href="#" class="itemDate">
                        <p>1</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

</body>
<script src="assets/js/date.js"></script>

</html>