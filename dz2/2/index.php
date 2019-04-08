<?php

function renderTemplate() {
	
	include 'layout.php';
	
	echo $doctype;
	echo $header;
	echo $menu;
	echo $body;
	echo $footer;
}

renderTemplate();


