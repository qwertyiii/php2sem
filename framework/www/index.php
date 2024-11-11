<?php
    spl_autoload_register(function (string $className){
        require('../'.str_replace('\\', '/', $className).'.php');
    });

    $pageFound = false;
    $url = $_GET['route'] ?? "";
    $routes = require('../src/routes.php');
    foreach($routes as $pattern => $controllerAndAction){
        preg_match($pattern, $url, $matches);
        if (!empty($matches)){
            $pageFound = true;
            unset($matches[0]);
            $controller = new $controllerAndAction[0];
            $action = $controllerAndAction[1];
            $controller->$action(...$matches);
        }
    }
    if (!$pageFound) echo 'Страница не найдена';
    // $user = new src\Models\Users\User('ivan');
    // $article = new src\Models\Articles\Article('title', 'text', $user);
    // var_dump($article); 

    // if (isset($_GET['name']) && !empty($_GET['name'])){
    //     $controller->sayHello($_GET['name']);
    // }else $controller->main();

    // echo '<br>'.$_GET['route'];