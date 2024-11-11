<?php
namespace src\Controllers;

use ReflectionObject;
use src\Models\Comments\Comment;
use src\Views\View;

class CommentController{
    public $view;
    public $db;
    public function __construct(){
        $this->view = new View(__DIR__.'/../../templates/');
    }

    public function store(){
        $comment = new Comment;
        $comment->setText($_POST['text']);
        $comment->setAuthorId($_POST['authorId']);
        $comment->setArticleId($_POST['articleId']);
        $comment->save();
        header('Location:framework/www/articles');
    }
    
    public function delete(int $id){
        $comment = Comment::getById($id);
        $comment->delete();
        header('Location:framework/www/articles');
    }


}