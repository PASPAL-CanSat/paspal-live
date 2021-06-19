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
    vlhkost($d['vlhkost']);
    metan($d['metan']);
    gps_zs($d['gps_zs']);
    gps_zd($d['gps_zd']);
    oxid($d['oxid']);
    tlak($d['tlak']);
    zaznam($d['datum']);
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
function vlhkost($vlhkost)
{
    $cont = $vlhkost . " %";
    $var=fopen("vlhkost.txt","w");
    fwrite($var, $cont);
    fclose($var);
}
function metan($metan)
{
    $cont = $metan . " %";
    $var=fopen("metan.txt","w");
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