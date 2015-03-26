<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Gilles Van Den Ven + Matthias Brodelet">
    <meta name="description" content="Komen_Goochelen">
    <meta name="keywords" content="devine Major IV">
    <link href="css/screen.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="scripts/modernizr.custom.92176.js"></script>
	<title>Komen_Goochelen - Major IV</title>

</head>
<body>

<header>    
    <?php
        if (!empty($_SESSION['user'])) {
    ?>
        
    <?php
    }
    ?>
<div class="dummy"></div>    
</header>    

<?php echo $content; ?>

<script src="bower_components/bean/bean.min.js"></script>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="js/script.dist.js"></script>
</body>
</html>