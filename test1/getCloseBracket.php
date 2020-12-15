<?php

function getCloseBracket($string, $index) {
  if ($string[$index] !== '(') {
    return -1;
  }

  $arr = [];
  for ($i = $index; $i < strlen($string); $i++) { 
    
    if ($string[$i] === '(') {
      array_push($arr, $string[$i]);
    } else if ($string[$i] === ')') {
      array_pop($arr);
      if (count($arr) === 0) {
        return $i;
      }
    }
  }

  return -1;
}

$testStr = "a (b c (d e (f) g) h) i (j k)";

echo getCloseBracket($testStr, 12);