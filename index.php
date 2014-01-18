<?php
	require('../spreadsheet-reader-master/php-excel-reader/excel_reader2.php');

    require('../spreadsheet-reader-master/SpreadsheetReader.php');

    $Reader = new SpreadsheetReader('../resources/tube.xls');
    $Sheets = $Reader -> Sheets();

    foreach ($Sheets as $Index => $Name)
    {
        echo 'Sheet #'.$Index.': '.$Name;

        $Reader -> ChangeSheet($Index);

        foreach ($Reader as $Row)
        {
            print_r($Row);
        }
    }
?>