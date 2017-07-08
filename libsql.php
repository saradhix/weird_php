<?php
function generate_insert_sql($table, $fields)
{
    $sql="insert into $table ";
    $fields_sql=array();
    $values_sql=array();
    $i=0;
    foreach($fields as $field)
    {
        $value=$field[2];
        if($field[1]!="int")
        {
            $value="'".mysql_real_escape_string($value)."'";
        }
        $fields_sql[]=$field[0];
        $values_sql[]=$value;
        $i++;
    }
    //print_r($valuess_sql);
    $sql .="(".implode(', ', $fields_sql).") values (".implode(', ',$values_sql).")";
    return $sql;
}


function generate_update_sql($table, $fields, $where_field, $where_value)
{
    $sql="update $table set ";
    $fragments=array();
    $i=0;
    foreach($fields as $field)
    {
        $value=$field[2];
        if($field[1]!="int")
        {
            $value="'".mysql_real_escape_string($value)."'";
        }
        $fragments[] = " {$field[0]} = $value ";
        $i++;
    }
    //print_r($fragments);
    $sql .= implode(",", $fragments);
    $sql .=" where $where_field = $where_value ";
    return $sql;
}

function generate_delete_sql($table, $idcol, $idval)
{
    return "delete from $table where $idcol=$idval limit 1";
}
