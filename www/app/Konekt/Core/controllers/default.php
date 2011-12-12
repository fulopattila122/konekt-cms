<?php

require_once("../../../Konekt.php");

error_reporting(E_ALL);
ini_set('log_errors', 'On');
$img = new Konekt_Image_Model_Image();

$prod = new Product();
$prod->Translation['hu']->Name = "Mókuskerék";
$prod->save();

$img->createAndAttachToEntity($_FILES["image"]["tmp_name"],
   $_FILES["image"]["name"], $prod, null, true);

Konekt::app()->smarty->assign('thimg', $img->getThumbnailFilename() );
Konekt::app()->smarty->assign('img', $img->getFilename() );
Konekt::app()->smarty->assign('name', 'Alvău Manó');
Konekt::app()->smarty->display('test.tpl');

?>
