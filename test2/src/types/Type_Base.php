<?php

class Type_Base {

    /**
     * @param string $column
     * @param string $value
     * @return mixed
     */
	private function validate($column, $value)
	{
		if (($column[0] === '#') && strpos($value, ' ')) {
            return $column." should not contain any space";
        } else if ((substr($column, -1) === '*') && ($value === '')) {
            return "Missing value in  ".$column;
        }
        return;
    }

     /**
     * @param array $myColumnOrder
     * @param array $sheetData
     * @return boolean
     */
    private function validateColumn($myColumnOrder, $sheetData)
    {
        $sanitizedColumn = [];
        foreach ($sheetData as $key => $value) {
            if ($value !== NULL) $sanitizedColumn[] = $value;
        }
        if ($myColumnOrder !== $sanitizedColumn) return false;
        return true;
    }

    /**
     * @param array $myColumnOrder
     * @param array $sheetData
     * @return string
     */
    protected function check($myColumnOrder, $sheetData)
    { 
        
        if (!$this->validateColumn($myColumnOrder, $sheetData[1])) {
            return 'Invalid columns, please make sure your rules is valid';
        }
        
        $table = '<tr><td>Row</td><td>Errors</td></tr>';
        foreach ($sheetData as $key1 => $arrData) {
            if ($key1 === 1) continue;
            $table .= '<tr>';
            $errors = [];
            foreach ($arrData as $key2 => $value) {
                $column = $sheetData[1][$key2];
                $valueStr = strval($value);
                $error = $this->validate($column, $valueStr);

                if ($error) array_push($errors, $error);
            }

            if (count($errors)) {
                $stringErrors = implode(',', $errors);
                $table .= '<td>'.$key1.'</td>';
                $table .= '<td>'.$stringErrors.'</td></tr>';
            }
            
        }

        return '<table border=1>'.$table.'</table';
    }

}