<?php

function date_humain_unix($date_humain){
	//separation de la date par / ou -
	list ($jour , $mois , $an) = preg_split("[/]",$date_humain);
	//inverse la date

	return($an."-".$mois."-".$jour);
}

function date_unix_humain($date_unix){
	//separation de la date par / ou -
	list ($an , $mois , $jour) = preg_split("[-]",$date_unix);
	//inverse la date

	return($jour."/".$mois."/".$an);
}
function intervalle($datefincontrat)
{
	//date d'aujourd'hui
	$dateaujourdhui=new DateTime('now',new DateTimeZone('Europe/Paris'));
	//il faut regarder s'il y a une date de fin de contrat ou pas

	$datefincontrat=new DateTime($datefincontrat,new DateTimeZone('Europe/Paris'));


	$interval = $dateaujourdhui->diff($datefincontrat);
	$pos = $interval->format('%R'); //valeur positive ou négative
	$interval=$interval->format('%a'); //intervalle
	//maintenant on calcule et on décide de l'affichage de l'alerte
	if($pos){return $interval;}ELSE{return false;}
}
