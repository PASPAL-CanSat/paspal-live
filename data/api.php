<?php
if ($_GET['key'] == "sfdIUKebZzak")
{
    require_once('Db.php');
    Db::connect("sql.endora.cz:3310", "mcserver", "mcserver", "9R1KhAbalienzmHH");

    $data = array(
        'teplota' => $_GET['teplota'],
        'tlak' => $_GET['tlak'],
        'oxid' => $_GET['oxid'],
        'mq4' => $_GET['mq4'],
        'gps_zd' => $_GET['qps_zd'],
        'gps_zs' => $_GET['gps_zs']
    );

    $data = Db::insert('zaznamy', $data);
}
else
{
    echo('Klíč není správný');
}
