<?php
$x = 3;
$arr = [2,5,4,6,8];
$res = segments($x, $arr);
echo "resultado: $res\n";

function segments($x, $space) {
  $min = [];
  $i = 0;
  while (1) {
    if (($i + $x) <= (count($space))) {
      $sub = array_slice($space, $i, $x);
      $v = min($sub);
      array_push($min, $v);
      $i ++;
    }
    else
      break;
  }
  return max($min);
}
?>
