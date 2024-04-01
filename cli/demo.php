 <?php
    /*
ECRITURE
__DIR__ chemin absolu
DIRECTORY_SEPARATOR separator 
file_put_contents ecritutr de fichier 
FILE_APPEND metre a jour le fichier
file_get_contents lecture de fichier
*/
    /*
ECRITURE
    $ficher = __DIR__ . DIRECTORY_SEPARATOR . 'demo.txt';
    file_put_contents($ficher, 'COMMENT CA VA', FILE_APPEND);
*/
    //LECTURE
    $ficher = __DIR__ . DIRECTORY_SEPARATOR . 'exo.csv';
    echo   file_get_contents($ficher);
