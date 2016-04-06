<?php
include "db.php";

if ($_GET['eventid']){ // Get event
   echo get_event($_GET['eventid']);
   exit;
}
if ($_GET['machines']) { // Get all machines
   echo get_all_machines();
   exit;
}

if (isset($_POST)) { // Add new event
   $data = json_decode(file_get_contents('php://input'), true);
   print_r($data);
}