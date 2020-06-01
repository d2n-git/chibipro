<?php 

    //set time zone VN
     date_default_timezone_set('Asia/Ho_Chi_Minh');
   
    if(!isset($_SESSION['id'])){
      $_SESSION['id']=0;
    }
        require_once "recaptchalib.php";
            // your secret key
         $secret = "6LdOdSkTAAAAACj5HPBmrbshGjNDd3NAw6lSkOcK";
             
            // empty response
            $response = null;
             
            // check secret key
            $reCaptcha = new ReCaptcha($secret);
    ?>

            <?php  
        // if submitted check response
        if ($_POST["g-recaptcha-response"]) {
            $response = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
            );
        }
        ?>


<?php
if ($response != null && $response->success) {  // if recaptcha ok
  
    
      //Khai bao thu muc
       $rid='../resources/user_info/';
       
        $s='/';
             // Desired folder structure
           
      
       $date_style=date("Y-m-d");
        
        $create= $rid.$date_style;
        
          
           
              if (!file_exists($create)) {
                 $create= $rid.$date_style;
                 $directory = $rid.$date_style.$s;
                  mkdir($create, 0777, true);
                    
                 session_destroy();
                }
               
           
             else{
                  
                            if(isset($_SESSION['id'])){
                              $_SESSION['id'] = $_SESSION['id']+1;
                            }
                            
                            $i = $_SESSION['id'];
                          
                            $id="ID";
                           $create= $rid.$date_style.$id.$i;
                            $directory = $rid.$date_style.$id.$i.$s;
                                  mkdir($create, 0777, true);  //create folder
                            $target_dir = "$directory";
                  }


           $target_dir = "$directory";  // folder store image
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        ?>
        <?php
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
               
                     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                     if($check !== false) {?>

                         <?php
                        $uploadOk = 1;
                     } else {
                     //  header('location: ../index.php?case=error');;
                        $uploadOk = 0;
                     }
            }

            // Allow certain file formats
             if($imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
             && $imageFileType != "GIF" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
             && $imageFileType != "gif" ) {
                         $email=$_POST['email'];
                          $email=urlencode($email);
                          header("location: ../index.php?email=$email");
                            $uploadOk = 0;
                            rmdir($directory); // delete folder if error
                 }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                       $email=$_POST['email'];
                       $email=urlencode($email);
                       header("location: ../index.php?email=$email");
                       rmdir($directory);
             
            // if everything is ok, try to upload file
          } else {
                          // if moved image ok
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                   
                               // creatr file text and save email here
                          $content = $_POST["email"];
                          $fp = fopen("$directory Email.txt","w") or die("Unable to open file!");
                          fwrite($fp,$content);
                          fclose($fp);
                          

                          //printf("<script>location.href='../index.php?case=a'</script>");
                          header('location: ../index.php?case=ok');?>
                       





<?php


            //rename image after uppload
              //  $oldname= basename( $_FILES["fileToUpload"]["name"]);
              //  rename("../resources/images/$oldname", "../resources/images/$newname.$imageFileType");
             
                   
                    // To create the nested structure, the $recursive parameter 
                    // to mkdir() must be specified.
                   // if (!is_dir ($directory)) { 
           
              //}
                    
                  }  else {


                     $email=$_POST['email'];
                $email=urlencode($email);
                 header("location: ../index.php?email=$email");
                  rmdir($directory);
                    
                   
     
                          }
                  }
        
 } 


 else  // not recapcha success


  {
  $email=$_POST['email'];
  $email=urlencode($email);
   
  
   header("location: ../index.php?email=$email");
   rmdir($directory);
  



  }
 
 ?>