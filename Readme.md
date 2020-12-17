# Avana Test

## Test 2
Creating PSR-4 package. This package support `xlsx` & `xls`

### How to:
- `cd test2`
- run `composer install`
- If you want to try this package, you can open `test.php` or create new file.

```php
<?php
require  './vendor/autoload.php';
$inputFileName  =  'Type_A.xlsx';
$testSheet  =  \Src\SheetValidate::load($inputFileName);

// will return html string
echo $testSheet;
```
- You can test on terminal using this command `php test.php`
- Run this script if you want to test on browser `php -S localhost:8000 -t .` 
- Open your browser http://localhost:8000/test.php

### How to support other Type_*.xlsx?
For now, this package only support file `Type_A.xlsx` and `Type_B.xlsx` , but you can support other files like
`Type_C`,`Type_D`,`Type_F` ...

Let's say we want to support this file `Type_C.xlsx`

- First, create file `Type_C.php` in directory `src/types`
- Create class `Type_C` in `Type_C.php`
```php
<?php

class  Type_C  extends  Type_Base  implements  Type_Interface  {

	// define your column here
	private $myColumnOrder  =  [
		'Field_A*',
		'#Field_B',
		'Field_C'
	];

	/**
	* @param  array $sheetData
	* @return  string
	*/
	public  function  checkSheet($sheetData)
	{
		$check  =  $this->check($this->myColumnOrder,  $sheetData);
		return  $check;
	}
}
```
- Last steps, run `composer dump-autoload`
