<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <?php include 'head.php'; ?>
    </head>

    <body>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3&appId=589255011511006&autoLogAppEvents=1"></script>
        <header id="header" class="header">
            <?php include 'header.php'; ?>
        </header>
        <main id="wrapper-content">
            <?php include $data['path'] ?>
        </main>
        <footer id="footer" class="footer">
            <?php include 'footer.php'; ?>
        </footer>
        <div id="back-to-top"><span class="circle"></span><span class="circle"></span><span class="circle"></span><span class="circle"></span><i class="icon fas fa-angle-double-up"></i></div>
                <?php include 'foot.php'; ?>
    </body>

</html>