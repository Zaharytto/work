<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/templates/header.php';
?>

<body>
<h1><?=headerOutput ($mainMenu, 'http://localhost' . $_SERVER['REQUEST_URI'])?></h1>
</body>

<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/templates/footer.php';
?>
    