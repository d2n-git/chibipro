<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:url"           content="http://chibipro.top/" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="ChibiPro Upload Image" />
    <meta property="og:description"   content="Upload image of you" />
    <title>Chibipro</title>
    <?php echo view('templates/head');?>
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="fEZTlEDb"></script>
    <?php echo view('templates/menu');?>
    <?php echo view($viewchild);?>
    <?php echo view('templates/footer');?>
    <?php echo view('templates/footerscript');?>
</body>
</html>