<?php

require './vendor/autoload.php';

$inputFileName = 'Type_A.xlsx';

$testSheet = \Src\SheetValidate::load($inputFileName);

echo $testSheet;