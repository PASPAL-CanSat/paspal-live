<?php

require_once('Db.php');
Db::connect("sql.endora.cz:3310", "mcserver", "mcserver", "9R1KhAbalienzmHH");

$od = $_GET['od'];
$do = $_GET['do'];

function remove_($text)
{
    $text = str_replace("T", " ", $text);
    return $text;
}

$od = remove_($od);
$do = remove_($do);

$data = Db::queryAll('
    SELECT *
    FROM zaznamy
    WHERE datum >= ? AND datum <= ?
    GROUP BY datum
    ORDER BY id_zaznamu DESC
', $od, $do);



foreach ($data as $d)
{
    echo('<br>');
    echo('Datum: ' . $d['datum'] . '<br>');
    echo('Teplota: ' . $d['teplota']. '<br>');
    echo('Oxid: ' . $d['oxid']. '<br>');
    echo('MQ-4: ' . $d['mq4']. '<br>');
    echo('Tlak: ' . $d['tlak']. '<br>');
    echo('Baterka: ' . $d['battery']. '<br>');
}
