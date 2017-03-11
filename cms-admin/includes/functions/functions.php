<?php



/* Get Title => function that get title of the pages */
function getTitle(){
    global $pageTitle;
    if(isset($pageTitle)){
        echo $pageTitle;
    }
    else{
        echo 'Admin pagel';
    }
}

function redirctErrorUrl($url, $errorMsg, $seconds){
    echo "<div class='alert alert-danger'>$errorMsg</div>";
    header("refresh:$seconds;url=$url");
    exit();
}

function redirctSuccessUrl($url, $Msg, $seconds){
    echo "<div class='alert alert-success'>$Msg</div>";
    header("refresh:$seconds;url=$url");
    exit();
}

function redirctGosUrl($url, $Msg, $seconds){
    echo "<div class='alert alert-warning'>$Msg</div>";
    header("refresh:$seconds;url=$url");
    exit();
}
function checkLen($var, $len, $msg){
    if($var < $len){
        return $msg;
    }
}

function checkErrorImgType($img){
    $allowed    =  array('gif','png' ,'jpg', 'jpeg');
    $img_type   =  pathinfo($img, PATHINFO_EXTENSION);
    if(!in_array($img_type,$allowed)){
        return true;
    }else{
        return false;
    }
}

/*  database functions  */

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
// get all data from param table except [used]
function getDataExcept($table, $tableID, $ex){
        global $conn;
        $stmt  = $conn->prepare("SELECT * FROM $table WHERE $tableID != $ex");
        $stmt->execute();
        $row   = $stmt->fetchAll();
        if($row){
            return $row;
        } else{
            return false;
        }
}

// to get some data from any wanted row [used]
function checkRow($table, $rowID, $ID ,$Limit){
    global $conn;
    if(is_numeric($ID)){
        $stmt  = $conn->prepare("SELECT * FROM ". $table ." WHERE ". $rowID ." = ? LIMIT ".$Limit);
        $stmt->execute(array($ID));
        $row   = $stmt->fetch();
        $count = $stmt->rowCount();
        if($count > 0){
           return true;
        }
        else{
            return false;
        }
    } else{
        return false;
    }
}

function checkUni($table, $field, $value, $rowID, $ID){
    global $conn;
    if(is_numeric($ID)){
        $stmt  = $conn->prepare("SELECT * FROM ". $table ." WHERE $field = ? AND ". $rowID ." != ?");
        $stmt->execute(array($value,$ID));
        $count = $stmt->rowCount();
        if($count > 0){
           return $count;
        }
        else{
            return 0;
        }
    } else{
        return false;
    }
}

//to get all rows by id [used]
function getRowById($table ,$rowID, $ID,$Limit){
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

//get count  [used]
function getCount($field, $table){
    global $conn;
    $stmt  = $conn->prepare("SELECT COUNT($field) FROM $table");
    $stmt->execute();
        echo $stmt->fetchColumn();
}
// get count with condetion [used]
function getCountCon($field, $table, $value){
    global $conn;
    $stmt  = $conn->prepare("SELECT COUNT($field) FROM $table WHERE $field = ?");
    $stmt->execute(array($value));
    return $stmt->fetchColumn(); 
}

/* insert function   [used] */ 

function Insert4Rows($R1, $R2, $R3, $R4, $rowName1, $rowName2, $rowName3, $rowName4, $table){
    global $conn;
    $stmt  = $conn->prepare("INSERT INTO $table($R1, $R2, $R3, $R4) VALUES(:One, :Two, :Three, :Four) ");
    $stmt->execute(array(
        'One'  => $rowName1,
        'Two'  => $rowName2,
        'Three' => $rowName3,
        'Four' => $rowName4
    ));
    $count = $stmt->rowCount();
    if($count > 0){
        echo '<div class="alert alert-success">Added Successfully</div>';
    }else{
        echo '<div class="alert alert-danger">You Have Nothing Added</div>';
    }
}

function Insert5Rows($R1, $R2, $R3, $R4, $R5, $rowName1, $rowName2, $rowName3, $rowName4, $rowName5, $table){
    global $conn;
    $stmt  = $conn->prepare("INSERT INTO $table($R1, $R2, $R3, $R4, $R5) VALUES(:One, :Two, :Three, :Four, :Five) ");
    $stmt->execute(array(
        'One'  => $rowName1,
        'Two'  => $rowName2,
        'Three' => $rowName3,
        'Four' => $rowName4,
        'Five' => $rowName5
    ));
    $count = $stmt->rowCount();
    if($count > 0){
        echo '<div class="alert alert-success">Added Successfully</div>';
    }else{
        echo '<div class="alert alert-danger">You Have Nothing Added</div>';
    }
}

function InsertOne($R1, $table, $rowName){
    global $conn;
    $stmt  = $conn->prepare("INSERT INTO $table($R1) VALUES(:One) ");
    $stmt->execute(array(
        'One'  => $rowName
    ));
    $count = $stmt->rowCount();
    if($count > 0){
        echo '<div class="alert alert-success">Added Successfully</div>';
    }else{
        echo '<div class="alert alert-danger">You Have Nothing Added</div>';
    }
}

/* update functions   [used] */
function update1Record($R1, $rowName1, $table, $cond, $conKey){
    global $conn;
    $stmt  = $conn->prepare("UPDATE $table SET $R1 = ? WHERE $cond = ?");
    $stmt->execute(array($rowName1, $conKey));
    $count = $stmt->rowCount();
    if($count > 0){
        echo '<div class="alert alert-success">Updated Successfully</div>';
    }else{
        echo '<div class="alert alert-danger">You Have Nothing Upated</div>';
    }
}

function update3Record($R1, $R2, $R3, $rowName1, $rowName2, $rowName3, $table, $cond, $conKey){
    global $conn;
    $stmt  = $conn->prepare("UPDATE $table SET $R1 = ?, $R2 = ?, $R3 = ? WHERE $cond = ?");
    $stmt->execute(array($rowName1, $rowName2, $rowName3, $conKey));
    $count = $stmt->rowCount();
    if($count > 0){
        echo '<div class="alert alert-success">Updated Successfully</div>';
    }else{
        echo '<div class="alert alert-danger">You Have Nothing Upated</div>';
    }
}
// update by 4 param [used]
function update4Record($R1, $R2, $R3, $R4, $rowName1, $rowName2, $rowName3, $rowName4, $table, $cond, $conKey){
    global $conn;
    $stmt  = $conn->prepare("UPDATE $table SET $R1 = ?, $R2 = ?, $R3 = ?, $R4 = ? WHERE $cond = ?");
    $stmt->execute(array($rowName1, $rowName2, $rowName3, $rowName4, $conKey));
    $count = $stmt->rowCount();
    if($count > 0){
        echo '<div class="alert alert-success">Updated Successfully</div>';
    }else{
        echo '<div class="alert alert-danger">You Have Nothing Upated</div>';
    }
}

// update by 4 param [used]
function update5Record($R1, $R2, $R3, $R4, $R5, $rowName1, $rowName2, $rowName3, $rowName4, $rowName5, $table, $cond, $conKey){
    global $conn;
    $stmt  = $conn->prepare("UPDATE $table SET $R1 = ?, $R2 = ?, $R3 = ?, $R4 = ?, $R5 = ? WHERE $cond = ?");
    $stmt->execute(array($rowName1, $rowName2, $rowName3, $rowName4, $rowName5, $conKey));
    $count = $stmt->rowCount();
    if($count > 0){
        echo '<div class="alert alert-success">Updated Successfully</div>';
    }else{
        echo '<div class="alert alert-danger">You Have Nothing Upated</div>';
    }
}


/* delete function [used]  */
function deleteById($table, $rowId, $id, $Limit){
    global $conn;
    if(checkRow($table, $rowId, $id ,$Limit)){
        $stmt  = $conn->prepare("DELETE FROM $table WHERE $rowId = :Cond");
        $stmt->bindParam(":Cond", $id);
        $stmt->execute();
        return true;
    }else{
        return false;
    }
}









