<?php
require './class/Creneau.php';

$creneau = new Creneau(8, 10);
/*
$creneau->debut = 9;
$creneau->fin = 12;
*/
$creneau2 = new Creneau(7, 9);
$creneau->intersect($creneau2);
echo $creneau->toHTML();
