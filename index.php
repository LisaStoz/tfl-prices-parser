<?php

    require('../spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
    require('../spreadsheet-reader-master/SpreadsheetReader.php');

    $Reader = new SpreadsheetReader('../resources/1.xls');
    $Sheets = $Reader -> Sheets();
    
    $fp = fopen('../resources/prices.sql', 'w');

         
    
    $Reader -> ChangeSheet(0);       
    $counter = 0;
    foreach ($Reader as $row) {
        $counter++;
        if ($counter > 1) { 
            
            $fields = [
                'value'=>'',
                'pay_type'=>'',
                'conditional_discount'=>'',                               
                'transport_mean'=>$row[0],
                'price_group'=>$row[1],                
                'zone1'=>$row[2],
                'zone2'=>$row[3],
                'euston'=>$row[4],
                'watford_junction'=>$row[5],               
                'theobalds_grove'=>$row[6],
                'waltham_cross'=>$row[7],
                'cheshunt'=>$row[8],
                'broxbourne'=>$row[9],
                'brentwood'=>$row[10],
                'shenfield'=>$row[11],               
                'ockendon'=>$row[12],
                'chefford'=>$row[13],
                'purfleet'=>$row[14],
                'grays'=>$row[15]
            ];
            
            for ($i = 17; $i <= 25; $i++) {
                $fields['value'] = $row[$i];
                if ( ($fields['value'] != '') and ($fields['value'] != '0') ) {
                    
                    $fields['pay_type'] = '2'; // payg
                    $row['conditional_discount'] = '0';
                    if ($i == 18) {
                        $fields['conditional_discount'] = '1';
                    }
                    else if ($i == 19) {
                        $fields['conditional_discount'] = '2';
                    }                    
                    if ($i == 20) {                        
                        $fields['conditional_discount'] = '3';                       
                    }
                    else if ($i == 21) {
                        $fields['pay_type'] ='4'; 
                        $fields['conditional_discount'] = '0';                       
                    }
                    else if ($i == 22) {
                        $fields['pay_type'] ='4';
                        $fields['conditional_discount'] = '4';                       
                        
                    }
                    else if ($i == 23) {
                        $fields['pay_type'] ='6';
                        $fields['conditional_discount'] = '0';            
                        if ($row[0] == 5) {
                            // bus fixme
                            $fields['pay_type'] ='9';
                            $fields['conditional_discount'] = '0';                         
                        }
                            
                        
                    }
                    else if ($i == 24) {
                        $fields['pay_type'] ='7';
                        $fields['conditional_discount'] = '0';                       
                        if ($row[0] == 5) {
                            // bus fixme
                            $fields['pay_type'] ='10';
                            $fields['conditional_discount'] = '0';                         
                        }
                    }
                    else if ($i == 25) { 
                        $fields['pay_type'] ='8';
                        $fields['conditional_discount'] = '0';                       
                        if ($row[0] == 5) {
                            // bus fixme
                            $fields['pay_type'] ='11';
                            $fields['conditional_discount'] = '0';                         
                        }
                    }
                }
                
                
                if ( ($fields['value'] != 0) and ($fields['value'] != '') and ($fields['value'] != '-') ) {
                    $columns = [];
                    $values = [];
                    foreach ($fields as $k=>$v) {
                        if ( ($v != 0) and ($v != '') and ($v != '-') ) {
                            array_push($columns, $k);
                            array_push($values, $v);
                        }

                    }

                    $insert = "INSERT INTO prices (".implode(",", $columns).") VALUES ('".implode("','", $values)."');   
    ";                             
                    fwrite($fp, $insert);
                }
                
            }

            
        }           
    }
    
    
    fclose($fp);
    echo 'done';

?>