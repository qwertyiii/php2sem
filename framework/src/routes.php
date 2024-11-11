<?php
    return [
        '~^$~' => [src\Controllers\ArticleController::class, 'index'],
        '~hello/(.+)~' => [src\Controllers\MainController::class, 'sayHello'],
        '~article/create~'=>[src\Controllers\ArticleController::class, 'create'],
        '~articles~' => [src\Controllers\ArticleController::class, 'index'],
        '~article/store~'=>[src\Controllers\ArticleController::class, 'store'],
        '~article/(\d+)~'=>[src\Controllers\ArticleController::class, 'show'],
        '~article/edit/(\d+)~'=>[src\Controllers\ArticleController::class, 'edit'],
        '~article/update/(\d+)~'=>[src\Controllers\ArticleController::class, 'update'],
        '~article/delete/(\d+)~'=>[src\Controllers\ArticleController::class, 'delete'],
        '~article/comment/(\d+)~'=>[src\Controllers\CommentController::class, 'store'],
        '~comment/delete/(\d+)~'=>[src\Controllers\CommentController::class, 'delete']
    ];
    