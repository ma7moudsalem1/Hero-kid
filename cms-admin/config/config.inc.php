<?php
if(isset($_GET['page'])){
                if(!empty($_GET['page'])){
                    $pageName = $_GET['page'];
                    $fileName = $pages. $pageName .'.php';
                    if(file_exists($fileName)){
                        require $fileName;
                    }
                    else{
                       redirctErrorUrl('?page=index', 'Page Requested Not Found', 4);
                    }
                }
                else{
                    redirctErrorUrl('?page=index', 'Undefine Page', 4);  // if url equal ?page=
                }
            }
            else{
                header("Location: ?page=index"); // if there isn't page
                exit();
            }

?>