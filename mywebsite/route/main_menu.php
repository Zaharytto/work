<?php

$mainMenu = [
    [
        'title' => 'О нас', // Название пункта меню
        'path' => '/mywebsite/route/about/about.php', // Ссылка на страницу, куда ведет этот пункт меню
        'sort' => 4,  // Индекс сортировки
    ],
    
    [
        'title' => 'Статьи',
        'path' => '/mywebsite/route/articles/articles.php',
        'sort' => 1,
    ],
    
    [
        'title' => 'Главная',
        'path' => '/mywebsite/index.php',
        'sort' => 3,
    ],
    
    [
        'title' => 'Контакты',
        'path' => '/mywebsite/route/contacts/contacts.php',
        'sort' => 5,
    ],
    
    [
        'title' => 'Форум',
        'path' => '/mywebsite/route/forum/forum.php',
        'sort' => 2,
    ],

    [
        'title' => 'Галерея',
        'path' => '/mywebsite/route/gallery/gallery.php',
        'sort' => 6,
    ],

    [
        'title' => 'Профиль',
        'path' => '/mywebsite/route/profile/profile.php',
        'sort' => 7,
    ],
];
