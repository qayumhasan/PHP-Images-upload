<?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                       
                       
                        $permit = array('jpg','jpeg','png');


                        $file_name = $_FILES['images']['name'];
                        $file_size = $_FILES['images']['size'];
                        $file_temp = $_FILES['images']['tmp_name'];


                        $div = explode('.',$file_name);
                        $ext = end($div);
                        $uniqename = substr(md5(time()),0,10);
                        $uniqename = $uniqename.'.'.$ext;

                        if ($file_name=='') {
                          echo "<span style='color: red;font-size: 20px;'>Fild must not be empty!!</span> ";
                        }elseif ($file_size > 100000000) {
                          echo "<span style='color: red;font-size: 20px;'>file must be less than 1kb!!</span> ";
                        }elseif (in_array($ext,$permit)===false) {
                          echo "<span style='color: red;font-size: 20px;'>You can only uploads:".implode(',',$permit)."</span> ";
                        }



                        else{
                          
                          $upload_path ="uploads/banner/".$$uniqename;


                          move_uploaded_file($file_temp, $upload_path);
                          $query = "INSERT INTO tbl_banner(images) VALUES ('$upload_path')";
                          $result =$db->insert($query);
                      }
                    }
                            
                ?>