<?php

require_once('Db.php');
Db::connect("89.203.192.60", "data", "root", "PaspalLetiDoVesmiruXD95");
$data = Db::queryAll('
    SELECT *
    FROM satelit
    ORDER BY id_zaznamu DESC
    LIMIT 1
');

foreach ($data as $d)
{
    teplota($d['teplota']);
    vyska($d['vyska']);
    rychlost($d['rychlost']);
}

function vyska($vyska)
{
    $cont = $vyska . " metrů";
    $var=fopen("vyska.txt","w");
    fwrite($var, $cont);
    fclose($var);
}
function teplota($teplota)
{
    $cont = $teplota . " °C";
    $var=fopen("teplota.txt","w");
    fwrite($var, $cont);
    fclose($var);
}
function rychlost($rychlost)
{
    $cont = $rychlost . " m/s";
    $var=fopen("rychlost.txt","w");
    fwrite($var, $cont);
    fclose($var);
}