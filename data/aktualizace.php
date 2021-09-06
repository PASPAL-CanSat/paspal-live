<?php

header('X-Frame-Options: SAMEORIGIN');

require_once('Db.php');
Db::connect("sql.endora.cz:3310", "mcserver", "mcserver", "9R1KhAbalienzmHH");
$data = Db::queryAll('
    SELECT *
    FROM zaznamy
    ORDER BY id_zaznamu DESC
    LIMIT 1
');

foreach ($data as $d)
{
    teplota($d['teplota']);
    vyska($d['vyska']);
    rychlost($d['rychlost']);
    gps_zs($d['gps_zs']);
    gps_zd($d['gps_zd']);
    oxid($d['oxid']);
    oxid($d['mq4']);
    tlak($d['tlak']);
    zaznam($d['datum']);
}

function vyska($vyska)
{
    $cont = $vyska . " metru";
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
function gps_zs($gps_zs)
{
    $cont = $gps_zs;
    $var=fopen("gps_zs.txt","w");
    fwrite($var, $cont);
    fclose($var);
}
function gps_zd($gps_zd)
{
    $cont = $gps_zd;
    $var=fopen("gps_zd.txt","w");
    fwrite($var, $cont);
    fclose($var);
}
function tlak($tlak)
{
    $cont = $tlak . " Pa";
    $var=fopen("tlak.txt","w");
    fwrite($var, $cont);
    fclose($var);
}
function mq4($mq4)
{
    $cont = $mq4 . " %";
    $var=fopen("mq4.txt","w");
    fwrite($var, $cont);
    fclose($var);
}
function oxid($oxid)
{
    $cont = $oxid . " %";
    $var=fopen("oxid.txt","w");
    fwrite($var, $cont);
    fclose($var);
}
function zaznam($zaznam)
{
    $cont = $zaznam;
    $var=fopen("zaznam.txt","w");
    fwrite($var, $cont);
    fclose($var);
}