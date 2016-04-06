<?php
$out = array();

 for($i=1; $i<=15; $i++){   //from day 01 to day 15
    $data = date('Y-m-d', strtotime("+".$i." days"));
    for($j=1; $j<=5;$j++) {
      $out[] = array(
          'id' => $i.$j,
          'title' => 'Hotdog '.$i.'-'.$j . "Reserved",
          'url' => $i,
          'class' => 'event-important',
          'start' => strtotime($data).'000',
          'end' => strtotime($data).'000'
      );
      $out[] = array(
          'id' => $i.$j,
          'title' => 'Hotdog '.$i.'-'.$j,
          'url' => $i,
          'class' => 'event-success',
          'start' => strtotime($data).'000',
          'end' => strtotime($data).'000'
      );
    }

}

echo json_encode(array('success' => 1, 'result' => $out));
exit;
?>
