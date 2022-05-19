<?php
session_start();
require_once 'db/dbconnection.inc.php';
require_once 'model/models.inc.php';
require_once 'service/skillservice.inc.php';

// DB-Connection erzeugen
$conn = db_connection();

// Objekt der Klasse SkillService erzeugen
$skillService = new SkillService($conn);
?>