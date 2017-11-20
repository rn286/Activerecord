<?php

class buildTable{
    public static function buildTableFromFullArray($arr){
        $tableBuild = '<table border="3" cellpadding="3" cellspacing="1">';
        foreach($arr as $row => $innerArray){
            $tableBuild .= '<tr>';
            foreach($innerArray as $innerRow => $value){
                $tableBuild .= '<td>' . $value . '</td>';
            }
            $tableBuild .= '</tr>';
        }
        $tableBuild .= '</table><hr>';
        return $tableBuild;
    }
    public static function buildTableFromOneRecord($innerArray){
        $tableBuild = '<table border="3" cellpadding="3" cellspacing="1"><tr>';
            foreach($innerArray as $value){
                $tableBuild .= '<td>' . $value . '</td>';
            }

        $tableBuild .= '</tr></table><hr>';
        return $tableBuild;
    }
}

?>