<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('elements/head.php')  ;?>
</head>
<body class="loaded">
    <div class="page-wrapper">
        <header class="header">
            <?php 
                require_once('elements/menu-top.php') ; 
                require_once('elements/menu-middle.php') ; 
                require_once('elements/menu.php') ;      
            ?>
        </header>
        <main class="main">
            <?php
                require_once('html/contact.php') ;

            ?>                               
        </main><!-- End .main -->
        <footer class="footer">
                <?php require_once('elements/footer.php') ;?>
        </footer>

    </div>

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <?php require_once('elements/mobile.php') ;?>
    <?php require_once('elements/newsletter.php') ;?>

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <?php require_once('elements/script.php') ; ?>
</body>
</html>