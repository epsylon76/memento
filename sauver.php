<?php
//ENTER THE RELEVANT INFO BELOW
$time=date('Y-m-d-H\h-i\m');
$mysqlDatabaseName ='';
$mysqlUserName ='';
$mysqlPassword ='';
$mysqlHostName ='';
$mysqlExportPath ='backups/sauv'.$time.'.sql';

//DO NOT EDIT BELOW THIS LINE
//Export the database and output the status to the page
$command='mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ./' .$mysqlExportPath;
exec($command,$output=array(),$worked);
switch($worked){
case 0:
echo 'BDD <b>' .$mysqlDatabaseName .'</b> sauvegardée superbement par jojo içi : <b>/' .$mysqlExportPath .'</b>';
break;
case 1:
echo 'Problème de sauvegarde, au secours jojo ! <b>' .$mysqlDatabaseName .'</b> to <b>/' .$mysqlExportPath .'</b>';
break;
case 2:
echo ' Problème de sauvegarde, au secours jojo :<br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>MySQL User Name:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
break;
}
echo '<br/><br/><br/><br><br><br><a href="sauvegarder.php">RETOUR LISTE</a>';
?>
