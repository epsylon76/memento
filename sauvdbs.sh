#!/bin/bash

##################################################
# Ce script effectue une sauvegarde des bases de
# données et du dossier des sites 
##################################################

##############################################
# Variables à modifier
##############################################

#Utilisateur MySQL
MUSER="root"   
#pass MySQL                                                 
MPASS="androm3deM31"
#hote MySQL                                           
MHOST="localhost"
#Dossier à sauvergarder (dossier dans lequel les sites sont placés)
DIRSITES="/var/www/"

##############################################
# dossiers temporaires crées (laissez comme ça, ou pas)
##############################################

#Dossier de sauvegarde temporaire des dumps sql
DIRSAVESQL="/var/www/html/backup/sql"


##############################################
#
##############################################
MYSQL="$(which mysql)"
MYSQLDUMP="$(which mysqldump)"
GZIP="$(which gzip)"
TAR="$(which tar)"
DBS="$(mysql -u $MUSER -h $MHOST -p$MPASS -Bse 'SHOW DATABASES')"
DATE_FORMAT=`date +%Y-%m-%d`  


if [ ! -d $DIRSAVESQL ]; then
  mkdir -p $DIRSAVESQL
else
 :
fi

echo "Sauvegarde des bases de données :"
for db in $DBS
do
    echo "Database : $db"
        FILE=$DIRSAVESQL/mysql-$db-$DATE_FORMAT.gz
        `$MYSQLDUMP -u $MUSER -h $MHOST -p$MPASS $db | $GZIP -9 > $FILE`
done

find $DIRSAVESQL/* -mtime +10 -type f -delete



