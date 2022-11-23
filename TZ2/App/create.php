<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/TZ2/src/UserRepository.php';

try {
    $userRepository = new UserRepository();
    $userRepository->create($_POST['login'], $_POST['password'], $_POST['email'], $_POST['name']);

    echo json_encode([
        'status' => true,
        'message' => '',
    ]);

} catch(Exception $exception) {
  
    echo json_encode([
        'status' => false,
        'message' => $exception->getMessage()
    ]);
}
