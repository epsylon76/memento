<?php

echo 'Dernières sauvegardes (La derniere sauvegarde est en bas): <br><br>';
$now=date('Y-m-d');

if ($handle = opendir('./backups/')) {
    

   while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && $entry != "index.php" && $entry != ".htaccess") {
			
			$nomfichier=$entry;
			$rest = substr($entry, 4, 10);
			echo $nomfichier.'&nbsp;';
			//si la sauvegarde date de plus de 7 jours
			if( strtotime($rest) <= strtotime('-1 week') ) {
			echo 'à suppr :'.$nomfichier;
			echo ((dirname(__FILE__)). "/backups/" . $nomfichier);
			unlink ((dirname(__FILE__)). "/backups/" . $nomfichier);
			}
			
			echo '<br>';
        }
    }


    closedir($handle);
	
}


?>
<br><br><br><a href="sauver.php">SAUVEGARDER MANUELLEMENT</a>
