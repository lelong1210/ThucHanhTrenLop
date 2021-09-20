<?php
class functionSupportView extends connectDB{
    function ShowTable($colum_Name,$row_Content){
        echo "<table class='table' style='width: 1000px;'><tr>";
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
    function GetColumNameOfTable($table){
        $arr = [] ;
        $sql = "DESCRIBE ".$table;
        $query = $this->conn->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $arr_child = array_values($row);
            $arr[] = $arr_child[0];
        }
        return json_encode($arr);
    }
}
?>