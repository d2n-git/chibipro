<head><link rel="stylesheet" href="../resources/css/style.css"></head>
<?php
// session_start();

    //set time zone VN
     date_default_timezone_set('Asia/Ho_Chi_Minh');


    if(!isset($_SESSION['id'])){
      $_SESSION['id']=0;
    }
     
    require_once "recaptchalib.php";
            // your secret key
    $secret = "6LcQVCkTAAAAAM_dCKD3I1SaddnyQM8InzkZOkeC";
             
            // empty response
    $response = null;
             
            // check secret key
    $reCaptcha = new ReCaptcha($secret);



    if ($_POST["g-recaptcha-response"]) 
        {
                $response = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
                );
        }

  if(isset($_FILES["file"]["type"]) && $_POST['email'] != "" )
 

{

 if ($response != null && $response->success) 


      {  

          //Khai bao thu muc
        $rid='../resources/user_info/';
       
        $s='/';
             // Desired folder structure
           
      
        $date_style=date("Y-m-d").date("-h-i-sa");
        
        $create= $rid.$date_style;
        

           if (!file_exists($create)) 

                {
                     $create= $rid.$date_style;
                     $directory = $rid.$date_style.$s;
                     mkdir($create, 0777, true);
                        
                     session_destroy();
                }


            else

                {
                    if(isset($_SESSION['id']))

                        {
                              $_SESSION['id'] = $_SESSION['id']+1;
                            
                            
                            $i = $_SESSION['id'];
                          
                            $id="ID";
                           $create= $rid.$date_style.$id.$i;
                            $directory = $rid.$date_style.$id.$i.$s;
                                  mkdir($create, 0777, true);  //create folder
                            $target_dir = "$directory";

                        }

                }




                $target_dir = "$directory";  // folder store image
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
               

             //   if(isset($_POST["submit"])) 


               // {
               
                       $check = getimagesize($_FILES["file"]["tmp_name"]);
                       if($check !== false) 

                           {

                             
                                   $uploadOk = 1;
                           } 

                       else 

                           {
                                   //  header('location: ../index.php?case=error');;
                                      $uploadOk = 0;
                           }
             //   }

                if($imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
             && $imageFileType != "GIF" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
             && $imageFileType != "gif" ) 

                {
                      
                          $uploadOk = 0;
                      
                          



                            

                             
                        // rmdir($directory); // delete folder if error
                 }


                  if ($uploadOk == 0) 

                      {

                          
                           rmdir($directory);
                           echo "<span id='invalid'>***Invalid file Size or Type***<span>";
                           ?>

                            <script type="text/javascript">  <?php echo "grecaptcha.reset()"; ?> </script>
                           <?php
                 
                          
                       }
                   // if everything is ok, try to upload file

                  else

                      {

                            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) 

                                  {
                   
                                       // creatr file text and save email here
                                      $content = $_POST["email"];
                                      $fp = fopen("$directory Email.txt","w") or die("Unable to open file!");
                                      fwrite($fp,$content);
                                      fclose($fp);
                                      
                                   
                                      echo '<span id="success">  <div style="display: block;padding-right: 17px;     overflow: hidden;
                                        overflow-x: hidden;
                                        overflow-y: hidden;" class="modal fade in modal-openmodal-backdrop " id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog">
                                              <div class="modal-dialog">
                                              
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                  <div class="modal-header"  style=" color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6 "">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Success!!!</h4>
                                                  </div>
                                                  <div class="modal-body">
                                                    <p>Upload thành công trong resources/user_info...!!</p>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                                
                                              </div>
                                            </div> </span>';
                                                                      
                                                                          move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                                                                          ?>

                                                                <script type="text/javascript">  <?php echo "grecaptcha.reset()"; ?> 
                                                                    $("#uploadimage")[0].reset();

                                                                   

                            </script>


<?php
                                  }


                             
                                   

                                           

                                            
                           
                              
                      }

       }


       else  // not recapcha success


      {
         
        //  rmdir($directory);
      

        

        

  

 echo '<span id="invalid">  <div style="display: block;padding-right: 17px;     overflow: hidden;
    overflow-x: hidden;
    overflow-y: hidden;" class="modal fade in modal-openmodal-backdrop " id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header" style="  color:#fff;background-color:red;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Error!!!</h4>
              </div>
              <div class="modal-body">
                <p>Please confirm before submit!!!</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            
          </div>
        </div> </span>
      <style>

      </style>

        ';

                           

      }

}
?>