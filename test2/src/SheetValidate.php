<?php
namespace Src;
use \PhpOffice\PhpSpreadsheet\IOFactory;

class SheetValidate {
    public static function load($excelFile)
    {
        try {
            $explodeFileName = explode('/', $excelFile);
            $className = explode('.', array_pop($explodeFileName))[0];

            $load = IOFactory::load($excelFile);
            $sheetData = $load->getActiveSheet()->toArray(null, true, true, true);
            
            $typeClass = new $className;
            return $typeClass->checkSheet($sheetData);
            
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}