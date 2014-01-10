#!/usr/bin/php
<?php

namespace rrb;

define('rrb\DATE', date('d.m.Y - H:i'));
define('rrb\ROOT', realpath(__DIR__ . '/../'));

$out = ROOT . '/dist';

if (!is_dir($out) && @!mkdir($out, 0777))
  exit("konnte ordner $out nicht anlegen");

test_out_dir();

/* ------------------------------------ */
/* rrb4.css */

ob_start();
include ROOT . '/src/rrvb4.css';
$style = ob_get_clean();

file_put_contents("$out/rrvb4-dist.css", $style);

/* ------------------------------------ */
/* stylish */

ob_start();
include ROOT . '/src/stylish.css';
$style = ob_get_clean();

file_put_contents("$out/rrvb4-stylish-dist.css", $style);

/* ------------------------------------ */

function test_out_dir() {
  global $out;
  $path = "$out/test.dat";
  
  if (@!($fp = fopen($path, 'w+')))
    exit("keine schreibreche in ordner $out");
  
  fclose($fp);
  unlink($path);
}
