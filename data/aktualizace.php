<?php

header('X-Frame-Options: SAMEORIGIN');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

require_once('Db.php');
Db::connect("sql.endora.cz:3310", "mcserver", "mcserver", "9R1KhAbalienzmHH");
$data = Db::queryAll('
    SELECT *
    FROM zaznamy
    ORDER BY id_zaznamu DESC
    LIMIT 1
');

function vyska($vyska)
{
    $cont = $vyska . " metru";
    $var=fopen("vyska.txt","w") or die("Unable to open file!");
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
    $cont = $tlak . " hPa";
    $var=fopen("tlak.txt","w");
    fwrite($var, $cont);
    fclose($var);
}
function mq4($mq4)
{
    $cont = $mq4 . " ppb";
    $var=fopen("mq4.txt","w");
    fwrite($var, $cont);
    fclose($var);
}
function oxid($oxid)
{
    $cont = $oxid . " ppm";
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

function vlhkost($vlhkost)
{
    $cont = $vlhkost;
    $var=fopen("vlhkost.txt","w");
    fwrite($var, $cont);
    fclose($var);
}

function battery($battery)
{
    $cont = $battery;
    $var=fopen("battery.txt","w");
    fwrite($var, $cont);
    fclose($var);
}

foreach ($data as $d)
{
    teplota($d['teplota']);
    vyska($d['vyska']);
    gps_zs($d['gps_zs']);
    gps_zd($d['gps_zd']);
    oxid($d['oxid']);
    mq4($d['mq4']);
    tlak($d['tlak']);
    zaznam($d['datum']);
    vlhkost($d['vlhkost']);
    battery($d['battery']);
}

echo("ok");