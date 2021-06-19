<!DOCTYPE html>
<html lang="cs-cz">
	<head>
        <!-- Hlavička -->
		<meta charset="UTF-8" />
		<title>PASPAL LIVE | Panel</title>
		<meta name="description" content="Živý přístup k datům z našeho satelitu." />
		<meta name="keywords" content="paspal, live, space, satelit, živě, data" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</head>
    <script>
        window.setInterval(function() {
            reloadIFrame()
        }, 3000);

        function reloadIFrame() {
            console.log('reloading..');
            document.getElementById('iframe').contentWindow.location.reload();
            document.getElementById('iframe2').contentWindow.location.reload();
            document.getElementById('iframe3').contentWindow.location.reload();
            document.getElementById('iframe4').contentWindow.location.reload();
            document.getElementById('iframe5').contentWindow.location.reload();
        }

        setInterval(function() {
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    console.log(request.responseText);
                }
            }
            request.open('GET', 'http://localhost/data/aktualizace.php', true);
            request.send();

        }, 3000);
    </script>
	<body class="bg-dark text-white">
    <?php
    $zs = file_get_contents('./data/gps_zs.txt', true);;
    $zd = file_get_contents('./data/gps_zd.txt', true);;
    ?>
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
                                    <iframe id="iframe" src="/data/vyska.txt" width="100%" height="42px"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" id="panel-card">
                                <div class="card-header" id="panel-card-header">
                                    <h3>Aktuální rychlost</h3>
                                </div>
                                <div class="card-body">
                                    <iframe id="iframe2" src="/data/rychlost.txt" width="100%" height="42px"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" id="panel-card">
                                <div class="card-header" id="panel-card-header">
                                    <h3>Aktuální teplota</h3>
                                </div>
                                <div class="card-body">
                                    <iframe id="iframe3" src="/data/teplota.txt" width="100%" height="42px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-dark mezera-top">
                        <div class="col">
                            <div class="card" id="panel-card">
                                <div class="card-header" id="panel-card-header">
                                    <h3>Aktuální vlhkost</h3>
                                </div>
                                <div class="card-body">
                                    <iframe id="iframe4" src="/data/vlhkost.txt" width="100%" height="42px"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" id="panel-card">
                                <div class="card-header" id="panel-card-header">
                                    <h3>Naměřený metan</h3>
                                </div>
                                <div class="card-body">
                                    <iframe id="iframe5" src="/data/metan.txt" width="100%" height="42px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-dark mezera-top">
                        <div class="col">
                            <div class="card" id="panel-card">
                                <div class="card-header" id="panel-card-header">
                                    <h3>Mapa</h3>
                                </div>
                                <div class="card-body">
                                    <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?= $zd ?>,<?= $zs ?>+(Satelit)&amp;t=k&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
        </section>
        <footer>
            <p>&copy; PASPAL.SPACE <?= date('Y') ?></p>
        </footer>
    </div>
	</body>
</html>