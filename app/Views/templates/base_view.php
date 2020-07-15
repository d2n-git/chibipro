<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chibipro</title>
    <?php echo view('templates/head');?>
</head>
<body>
    <?php echo view('templates/menu');?>
    <?php echo view($viewchild);?>
    <?php echo view('templates/footer');?>
    <?php echo view('templates/footerscript');?>
</body>
</html>