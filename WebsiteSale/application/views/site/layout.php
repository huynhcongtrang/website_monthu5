<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include 'head.php';?>
</head>

<body>
    <header id="header" class="header">
        <?php include 'header.php';?>
    </header>
    <main id="wrapper-content">
        <?php include $data['path']?>
    </main>
    <footer id="footer" class="footer">
        <?php include 'footer.php';?>
    </footer>
    <div id="back-to-top"><span class="circle"></span><span class="circle"></span><span class="circle"></span><span class="circle"></span><i class="icon fas fa-angle-double-up"></i></div>
    <?php include 'foot.php';?>
</body>

</html>