#!/bin/bash

##################################################
# Ce script effectue une sauvegarde du dossier des sites
##################################################


#Dossier à sauvergarder (dossier dans lequel les sites sont placés)
DIRSITES="/var/www/"


##############################################
#
##############################################
GZIP="$(which gzip)"
TAR="$(which tar)"
DATE_FORMAT=`date +%Y-%m-%d`

find /home/epsy/backsites/* -mtime +5 -type f -delete

echo "Création de l'archive des sites"
`$TAR --exclude='/var/www/html/tr' --exclude='/var/www/html/pub' -cvzf /home/epsy/backsites/www-$DATE_FORMAT.tar.gz $DIRSITES `
