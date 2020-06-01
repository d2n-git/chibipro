<html>
<head>
  <title>Chibi me pro</title>
<meta charset="utf-8">
<link rel="stylesheet" href="resources\css\style.css">
<link rel="stylesheet" href="resources\css\reset.css">
<script src='https://www.google.com/recaptcha/api.js?hl=vi'></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
  <div class="wrapper">
    <div class="nav">
       <ul class="nav nav-tabs pull-right" role="tablist">
        <li><a href="#">Home</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">Infor</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">Login</a></li>
      </ul>
    </div>

   <div class="picture text-center">
<div id="myCarousel" class="carousel slide pull-right" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="resources/images/1.jpg" style="width:1500px" alt="1">
        <div class="carousel-caption">
          <h3></h3>
          <h4></h4>
          <p></p>
        </div>
      </div>

      <div class="item">
        <img src="resources/images/2.jpg" style="width:1500px" alt="2">
        <div class="carousel-caption">
          <h3></h3>
          <h4></h4>
        <p>  </p>
        </div>
      </div>
    
      <div class="item">
        <img src="resources/images/3.jpg" style="width:1500px" alt="3">
        <div class="carousel-caption">
          <h3></h3>
          <p></p>
        </div>
      </div>
      <div class="item">
        <img class="black" src="resources/images/2.jpg" style="width:1500px" alt="3">
        <div class="carousel-caption">
          <h3></h3>
          <p></p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div><!---end container-->

</div><!--end picture-->


    <div class="form-container">
    
      
    
      <div class="form text-center" style="position: relative; left: -50%; top: 10%">
      <form action="controllers/xacthuc.php" method="POST" enctype="multipart/form-data" id="s">
<!-- 
        Name:<input type="text" name="name" id="name">
        Email: <input type="text" name="email" id="email"> -->
        <label for="">
             <p  class="text-center">Custom Upload:</p>
        </label>

    <input accept="image/*" id="file" type="file" class="custom-file-input" name="fileToUpload" onclick="delete()" required>
     <div style="height:25px;color:red"> <label for="file" class="error" style="" > </label></div>

  
      <div class="form-group">
          <label for="email" class="pull-left" style="line-height:2">Your Email: </label><input id="mail" style="width:220px;  " class="form-control" id="email" type="email" name="email" value="<?php $_SESSION["email"] = (isset($_GET['email']) ? $_GET['email'] : null);  echo $_SESSION['email']; ?>" required>
      </div>
   

   <div style="height:25px;color:red"><label for="email" class="error" style="position:relative;top:-8px"> </label></div>
    <div class="g-recaptcha" data-sitekey="6LdOdSkTAAAAAI7G2SwiILJvEdDFSrYJl47o9TSz" > <!-- data-type co the thay bang audio --></div>
      <input type="submit" id="myBtn"  name="submit" class="btn btn-success">
     <?php 
     
    $me="";
      $me=(isset($_GET['case']) ? $_GET['case'] : null);
      if($me=="ok")
      {
        $me="File của bạn đang đc xu ly. Ket qua se duoc gui den email cua ban. Thank";
        ?>
      <div class="success" style="height:5px; position:relative; top:10px;color:#00dd00">
<!-- 
    <div class="alert alert-success fade in" style="margin-top:35px"> -->
        <strong>Success:</strong>
       <!--   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 -->

        <?php 
      
           echo "$me";?>
            


    </div> 
    <?php } ?>

<?php
$me2 = (isset($_GET['email']) ? $_GET['email'] : null);
// $email = $_POST["email"];
    // check if e-mail address is well-formed
 //   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //    $emailErr = "Invalid email format"; 
 //     echo $emailErr;
 //   }
      if($me2==" " || $me2 !=null)
      {
        $me="Bạn chưa xác nhận hoặc file ko hợp lệ!";?>
<div id="delete">
 <!--    <div class="alert alert-danger fade in" style="margin-top:40px"> -->
   <div class="err" style="height:5px; position:relative; top:10px;color:red">   <strong>Error</strong>
       <!--   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->

<?php
      echo "$me";?>

       </div> 

     </div>
      <?php
      }
?>

<?php
?>
      
    

      </form>


<script>
  $(document).ready(function(){
  

    $("#file").click(function(){

      $("#delete").hide();
    });


    $("#mail").click(function(){

      $("#delete").hide();
    });

    
  });


</script>

      <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>

      <script>
    $('#s').validate();
     jQuery.validator.addMethod("email", function(value, element) {
    return this.optional( element ) || ( /^[a-z0-9]+([-._][a-z0-9]+)*@([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,4}$/.test( value ) && /^(?=.{1,64}@.{4,64}$)(?=.{6,100}$).*/.test( value ) );
}, 'Please enter valid email address.');

     $.validator.messages.required = "Bạn không được bỏ trống!";
    </script>
      </div><!-- end div form -->
      

    </div> <!--end div new-->
 

  <!--end container-->
 <footer class="footer">
     
        <p class="text-muted text-center ">Cube-System IT</p>
   
    </footer>

</div><!--  end wrapper -->


<script>
// Get the modal
var modal = document.getElementById('myModal');
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//     modal.style.display = "none";
// }
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>