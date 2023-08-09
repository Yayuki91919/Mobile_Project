<?php
include_once __DIR__ . '/../controller/brandsController.php';
include_once __DIR__ . '/../controller/modelsController.php';
include_once __DIR__ . '/../controller/firmwaresController.php';

// var_dump($id);
$id = $_POST['id'];
$brandController = new brandsController();
$delete = $brandController->deleteBrand($id);

$models_controller = new modelsController();
$delete = $models_controller->deleteModel($id);

$firmware_controller = new firmwaresController();
$delete = $firmware_controller->deletefirm($id);
