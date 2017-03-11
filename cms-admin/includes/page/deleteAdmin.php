<?php

if(isset($_GET['id'])){
    if(!empty($_GET['id'])){
        if(deleteById('admin', 'admin_id', $_GET['id'], 1)){
            redirctSuccessUrl('?page=admin', 'Deleted Succussfully.', 4);
        }
        else{
            redirctErrorUrl('?page=admin', 'Unable to delete.', 4);
        }
    }else{
        redirctErrorUrl('?page=admin', 'Not Valid ID.', 4);
    }
}else{
    redirctErrorUrl('?page=admin', 'There is Something wrong.', 4);
}