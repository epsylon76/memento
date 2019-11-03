#!/bin/bash

##################################################
# Ce script effectue une sauvegarde des bases de
# données et du dossier des sites 
##################################################

##############################################
# Variables à modifier
##############################################

#Utilisateur MySQL
MUSER="epsy"
#pass MySQL
MPASS="alpha"
#hote MySQL
MHOST="localhost"

##############################################
# dossiers temporaires crées (laissez comme ça, ou pas)
##############################################

#Dossier de sauvegarde temporaire des dumps sql
DIRSAVESQL="/var/www/html/config/backup/"


##############################################
#
##############################################
MYSQL="$(which mysql)"
MYSQLDUMP="$(which mysqldump)"
GZIP="$(which gzip)"
TAR="$(which tar)"
DATE_FORMAT=`date +%Y-%m-%d`


if [ ! -d $DIRSAVESQL ]; then
  mkdir -p $DIRSAVESQL
else
 :
fi

#FAIRE CES DEUX LIGNES POUR CHAQUE DATABASE
FILE=$DIRSAVESQL/RSG-$DATE_FORMAT.gz
`$MYSQLDUMP -u $MUSER -h $MHOST -p$MPASS 'RSG' | $GZIP -9 > $FILE`

find $DIRSAVESQL/* -mtime +10 -type f -delete

