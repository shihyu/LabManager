<?php
include "db.php";

if (!empty($_GET['eventid'])){ // Get event
   echo get_event($_GET['eventid']);
   exit;
}
if (!empty($_GET['machines'])) { // Get all machines
   echo get_all_machines();
   exit;
}

if (isset($_POST)) { // Add new event
   $content = file_get_contents('php://input');
   $data = json_decode($content, true);
   print_r($data);
   echo add_event($data);
   exit;
}