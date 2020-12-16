<?php

class Type_B extends Type_Base implements Type_Interface {
    private $myColumnOrder = [
        'Field_A*',
        '#Field_B',
    ];

    /**
     * @param array $sheetData
     * @return string
     */
    public function checkSheet($sheetData)
    {
        $check = $this->check($this->myColumnOrder, $sheetData);
        return $check;
    }
}