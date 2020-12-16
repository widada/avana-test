<?php

require './vendor/autoload.php';

$inputFileName = 'Type_B.xlsx';

$testSheet = \Src\SheetValidate::load($inputFileName);

echo print_r($testSheet,1);