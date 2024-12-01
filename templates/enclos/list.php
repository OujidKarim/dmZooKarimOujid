<?php
foreach ($data['list'] as $enclos) {
	render('enclos/default', [
		'id' => $enclos->id,
		'nom' => $enclos->nom,
		'description' => $enclos->description,
		'created_at' => $enclos->created_at,
	], true);
}
