<?php
class functionSuppor{
    function ShowTable($colum_Name,$row_Content){
        echo "<table class='table'><tr>";
        foreach($colum_Name as $col_name){
            echo "<th>$col_name</th>";            
        }
        echo "</tr>";
        foreach($row_Content as $row){
            echo "<tr>";
            foreach($row as $row_child){
                echo "<td>$row_child</td>";
            }
            echo"</tr>";            
        }
        echo "</table>";
    }
}
?>