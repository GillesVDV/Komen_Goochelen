<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Gilles Van Den Ven + Matthias Brodelet">
    <meta name="description" content="Komen_Goochelen">
    <meta name="keywords" content="devine Major IV">
      <meta name="viewport" content="width=device-width">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,700italic,800italic,300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href="css/src/screen.css" rel="stylesheet" type="text/css"/>
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


</body>
</html>