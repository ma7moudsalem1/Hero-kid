<?php
if(isset($_GET['url'])){
                if(!empty($_GET['url'])){
                    if($_GET['url'] != 'cms-admin'){
                    $pageName = $_GET['url'];
                    $fileName = $pages. $pageName .'.php';
                    if(file_exists($fileName)){
                        require $fileName;
                    }
                    else{
                       header("Location: error&t=1");
                       exit();
                    }
                  }else{
                        header("Location: cms-admin/index.php"); // if there isn't page
                        exit();
                    }
                }
                else{
                   header("Location: error&t=2");
                       exit();  // if url equal ?page=
                }
            }
            else{
                header("Location: index"); // if there isn't page
                exit();
            }

?>