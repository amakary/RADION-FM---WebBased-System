<?php

function formatDateAgo ($value) {
  $current = time();
  $time = strtotime($value);
  $d = new \DateTime($value);

  $weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
  $months = ['January', 'February', 'March', 'April', ' May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

  if ($time > strtotime('-2 minutes', $current)) {
    return 'few second ago';
  } elseif ($time > strtotime('-30 minutes', $current)) {
    return  floor(($current - $time) / 60) . ' min, Today';
  } elseif ($time > strtotime('today', $current)) {
    return $d->format('G:i');
  } elseif ($time > strtotime('yesterday', $current)) {
    return $d->format('G:i') . ', Yesterday';
  } elseif ($time > strtotime('this week', $current)) {
    return  $d->format('G:i') . ', ' . $weekDays[$d->format('N') - 1];
  } else {
    return  $d->format('G:i') . ', ' . $d->format('j') . ' ' . $months[$d->format('n') - 1];
  }
}

?>
