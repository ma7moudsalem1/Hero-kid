<?php
function redirctErrorUrl($url, $errorMsg, $seconds){
    echo "<div class='alert alert-danger'>$errorMsg</div>";
    header("refresh:$seconds;url=$url");
    exit();
}

// select db
//get all data 
function getData($table, $order, $method){
     global $conn;
        $stmt  = $conn->prepare("SELECT * FROM $table ORDER BY $order $method");
        $stmt->execute();
        $row   = $stmt->fetchAll();
        if($row){
            return $row;
        } else{
            return false;
        }
}
function getLimitData($table, $order, $method, $limit){
     global $conn;
        $stmt  = $conn->prepare("SELECT * FROM $table ORDER BY $order $method LIMIT $limit");
        $stmt->execute();
        $row   = $stmt->fetch();
        if($row){
            return $row;
        } else{
            return false;
        }
}

//get all data 
function getRandData($table, $limit){
     global $conn;
        $stmt  = $conn->prepare("SELECT * FROM $table ORDER BY Rand() Limit $limit");
        $stmt->execute();
        $row   = $stmt->fetch();
        if($row){
            return $row;
        } else{
            return false;
        }
}


//to get all rows by id [used]
function getRowById($table ,$rowID, $ID, $Limit){
    global $conn;
    if(is_numeric($ID)){
        $stmt  = $conn->prepare("SELECT * FROM ". $table ." WHERE ". $rowID ." = ? LIMIT ".$Limit);
        $stmt->execute(array($ID));
        $row   = $stmt->fetch();
        if($row){
           return $row;
        }
        else{
            return false;
        }
    } else{
        return false;
    }
}
//to get all rows by id [used]
function getAllRowById($table ,$rowID, $ID, $Limit){
    global $conn;
    if(is_numeric($ID)){
        $stmt  = $conn->prepare("SELECT * FROM ". $table ." WHERE ". $rowID ." = ? LIMIT ".$Limit);
        $stmt->execute(array($ID));
        $row   = $stmt->fetchAll();
        if($row){
           return $row;
        }
        else{
            return false;
        }
    } else{
        return false;
    }
}

//to get all rows by id [used]
function getRow2ById($table ,$rowID, $ID, $rowID2, $ID2, $Limit){
    global $conn;
    if(is_numeric($ID)){
        $stmt  = $conn->prepare("SELECT * FROM ". $table ." WHERE ". $rowID ." = ? AND ". $rowID2 ." = ? LIMIT ".$Limit);
        $stmt->execute(array($ID, $ID2));
        $row   = $stmt->fetch();
        if($row){
           return $row;
        }
        else{
            return false;
        }
    } else{
        return false;
    }
}
//get count  [used]
function getCount($field, $table){
    global $conn;
    $stmt  = $conn->prepare("SELECT COUNT($field) FROM $table");
    $stmt->execute();
    return $stmt->fetchColumn();
}