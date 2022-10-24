<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/templates/header.php';

$pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');
$sth = $pdo -> prepare("SELECT full_name, login, phone, email, groups.name from users
left join group_user on users.id = group_user.user_id
left join `groups` on groups.id = group_user.group_id where login = ?");
$sth -> execute([$_COOKIE['login']]);
$result = $sth -> fetch();


?>

<body>
    <h1><?=headerOutput ($mainMenu, 'http://localhost' . $_SERVER['REQUEST_URI'])?></h1>

    <div>
        <ul>
            <li><?php print $result[0]; ?></li>
            <li><?php print $result[3]; ?></li>
            <li><?php print $result[2]; ?></li>
            <li><?php print $result[4]; ?></li>
        </ul>
    </div>

</body>

<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/templates/footer.php';
?>
    