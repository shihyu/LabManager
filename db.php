<?php
$db    = new PDO('mysql:host=localhost;dbname=labmanager;charset=utf8', 'root', '123456');
// $sql   = sprintf('SELECT * FROM events WHERE `datetime` BETWEEN %s and %s',
//     $db->quote(date('Y-m-d', $start)), $db->quote(date('Y-m-d', $end)));


function get_all_events() {
  global $db;
  $sql   = sprintf('SELECT * FROM events');
  $out = array();
  foreach($db->query($sql) as $row) {
      $out[] = array(
          'id' => $row['id'],
          'title' => $row['title'],
          'url' => "bs.php?eventid=". $row['id'],
          'class' => 'event-success',
          'start' => strtotime($row['date_start']) . '000',
          'end' => strtotime($row['date_end']) .'000'
      );
  }
  return json_encode(array('success' => 1, 'result' => $out));
}

function get_event($id) {
    global $db;
  $sql   = sprintf('SELECT * FROM events WHERE id = '. $id);
  $out = array();
  foreach($db->query($sql) as $row) {
      $out[] = array(
          'id' => $row['id'],
          'title' => $row['title'],
          'url' => "bs.php?eventid=". $row['id'],
          'class' => 'event-success',
          'start' => strtotime($row['date_start']) . '000',
          'end' => strtotime($row['date_end']) .'000'
      );
  }
  return json_encode(array('success' => 1, 'result' => $out));
}

function add_event($data) {
  global $db;
  //INSERT INTO `events` (`id`, `title`, `date_start`, `date_end`, `machind_id`, `user_id`) VALUES (NULL, 'snowfox', '20160419', '20160421', '4', '1');
  $sql   = sprintf('INSERT INTO `events` (`id`, `title`, `date_start`, `date_end`, `machind_id`, `machine_name`, `user_name`, `user_mail`, `notify_mail`, `description`) VALUES (NULL, "%s", "%s", "%s","%s","%s","%s","%s","%s","%s")', 
      $data['machine_name'], $data["date_start"], $data["date_end"], $data["machine_id"], $data['machine_name'], $data['user_name'],
      $data['user_mail'], $data['notify_mail'], $data['description']);
  echo $sql;
  $db->query($sql);

  return json_encode(array('success' => 1));
}

function get_all_machines() {
    global $db;
  $sql   = sprintf('SELECT * FROM machines');
  $out = array();
  foreach($db->query($sql) as $row) {
      $out[] = array(
          'mid' => $row['mid'],
          'name' => $row['mname'],
          'owner_id' => $row['owner_name'],
          'owner_mail' => $row['owner_mail'],
          'notify_mail' => $row['notify_mail'],
      );
  }
  return json_encode(array('success' => 1, 'result' => $out));
}