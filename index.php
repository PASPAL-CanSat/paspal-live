<!DOCTYPE html>
<html lang="cs-cz">
	<head>
        <!-- Hlavička -->
		<meta charset="UTF-8" />
		<title>PASPAL LIVE | Panel</title>
		<meta name="description" content="Živý přístup k datům z našeho satelitu." />
		<meta name="keywords" content="paspal, live, space, satelit, živě, data" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-Frame-Options" content="sameorigin">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <!-- Script -->
        <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	</head>
    <script>
        window.setInterval(function() {
            aktualizaceMapy()
        }, 8000);

        function aktualizaceMapy() {
            console.log('Aktualizace mapy..');
            document.getElementById('iframe9').contentWindow.location.reload();
        }

        setInterval(function() {
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    console.log(request.responseText);
                }
            }
            request.open('GET', '/data/aktualizace.php', true);
            request.send();

        }, 3000);
    </script>
	<body class="bg-dark text-white">
    <div class="text-center">
        <header>
            <h1 class="display-1">PASPAL LIVE</h1>
        </header>
        <section>
            <div class="container">
                <center>
                    <div class="row text-dark">
                        <div class="col">
                            <div class="card" id="panel-card">
                                <div class="card-header" id="panel-card-header">
                                    <h3>Aktuální výška n. m.</h3>
                                </div>
                                <div class="card-body">
                                    <span id="vyska">Data nejsou k dispozici</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" id="panel-card">
                                <div class="card-header" id="panel-card-header">
                                    <h3>Aktuální rychlost</h3>
                                </div>
                                <div class="card-body">
                                    <span id="rychlost">Data nejsou k dispozici</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" id="panel-card">
                                <div class="card-header" id="panel-card-header">
                                    <h3>Aktuální teplota</h3>
                                </div>
                                <div class="card-body">
                                    <span id="teplota">Data nejsou k dispozici</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" id="panel-card">
                                <div class="card-header" id="panel-card-header">
                                    <h3>Poslední záznam</h3>
                                </div>
                                <div class="card-body">
                                    <span id="zaznam">Data nejsou k dispozici</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mezera"></div>
                    <div class="row text-dark">
                        <div class="col">
                            <div class="card" id="panel-card">
                                <div class="card-header" id="panel-card-header">
                                    <h3>Přírodní plyny</h3>
                                </div>
                                <div class="card-body">
                                    <span id="mq4">Data nejsou k dispozici</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" id="panel-card">
                                <div class="card-header" id="panel-card-header">
                                    <h3>Oxid uhličitý</h3>
                                </div>
                                <div class="card-body">
                                    <span id="oxid">Data nejsou k dispozici</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" id="panel-card">
                                <div class="card-header" id="panel-card-header">
                                    <h3>Atmosférický tlak</h3>
                                </div>
                                <div class="card-body">
                                    <span id="tlak">Data nejsou k dispozici</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mezera"></div>
                    <div class="row text-dark">
                        <div class="col">
                            <div class="card" id="panel-card">
                                <div class="card-header" id="panel-card-header">
                                    <h3>Mapa</h3>
                                </div>
                                <div class="card-body">
                                    <iframe id="iframe9" width="100%" height="400px" scrolling="no" frameborder="0" src="data/mapa.php"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
        </section>
        <footer>
            <p>&copy; PASPAL.SPACE <?= date('Y') ?>
                <script>
                    function getTeplota(letter) {
                        let div = $("#teplota");
                        let url = "https://live.paspal.space/data/teplota.txt";
                        $.get(url, function(data) {
                            div.html(data);
                        });
                    }
                    setInterval(getTeplota, 1000);

                    function getTlak(letter) {
                        let div = $("#tlak");
                        let url = "https://live.paspal.space/data/tlak.txt";
                        $.get(url, function(data) {
                            div.html(data);
                        });
                    }
                    setInterval(getTlak, 1000);

                    function getZaznam(letter) {
                        let div = $("#zaznam");
                        let url = "https://live.paspal.space/data/zaznam.txt";
                        $.get(url, function(data) {
                            div.html(data);
                        });
                    }
                    setInterval(getZaznam, 1000);

                    function getVyska(letter) {
                        let div = $("#vyska");
                        let url = "https://live.paspal.space/data/vyska.txt";
                        $.get(url, function(data) {
                            div.html(data);
                        });
                    }
                    setInterval(getVyska, 1000);

                    function getZaznam(letter) {
                        let div = $("#zaznam");
                        let url = "https://live.paspal.space/data/zaznam.txt";
                        $.get(url, function(data) {
                            div.html(data);
                        });
                    }
                    setInterval(getZaznam, 1000);

                    function getMq4(letter) {
                        let div = $("#mq4");
                        let url = "https://live.paspal.space/data/mq4.txt";
                        $.get(url, function(data) {
                            div.html(data);
                        });
                    }
                    setInterval(getMq4, 1000);
                </script>
        </footer>
    </div>
	</body>
</html>