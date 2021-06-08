<!DOCTYPE html>
<html lang="cs-CZ">
<head>
    <meta charset="UTF-8">
    <title>LIVE DASHBOARD | PASPAL.SPACE</title>
    <meta name="description" content="Náš živý náhled k datům ze satelitu.">
    <meta name="keywords" content="live, paspal, data, živý, náhled">
    <meta name="autor" content="Jonáš Židek (Johno95CZ)">
    <!-- Styly -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- JavaScript -->
    <script src="main.js"></script>
    <!-- Statistiky (google) -->
</head>
<body onload="startTime()">
    <header>
        <h1>Živý náhled - Čas: <span id="time"></span></h1>
    </header>
    <article>
        <iframe src="https://paspal.grafana.net/d-solo/tJzw0M6Mk/main?orgId=1&from=1623153016103&to=1623174616104&theme=dark&panelId=12" width="850" height="400" frameborder="0"></iframe>
    </article>
</body>
</html>
