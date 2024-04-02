<?php
/*
$date = '2004-01-01';
$date2 = '2024-04-01';
$date = new DateTime();
$date->modify('+1 month'); //modifier
var_dump($date);
echo $date->format('d/m/Y');
echo "\n";
$time = time();
$time = strtotime('+1 month', $time);
echo date('d/m/Y', $time);
$d = new DateTime($date);
$d2 = new DateTime($date2);
$diff = ($d->diff($d2, true));
echo "Il y a de {$diff->y} annee, {$diff->m} mois et {$diff->d} jours de difference";
echo "Il y a {$diff->days} jours de differnce";
echo "\n";
$time = strtotime($date);
$time2 = strtotime($date2);
$days = round(abs($time - $time2) / (24 * 60 * 60)); //floor->arrodiser, abs->absolut 
echo "Il y a $days jours de differnce";
*/
$date = new DateTime('2024-01-01');
$interval = new DateInterval('P1M1DT1M');
$date->add($interval);
var_dump($date);
