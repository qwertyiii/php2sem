<?php
namespace src\Controllers;

use ReflectionObject;
use src\Models\Articles\Article;
use src\Views\View;
use src\Models\Comments\Comment;

class ArticleController{
    public $view;
    public $db;
    public function __construct(){
        $this->view = new View(__DIR__.'/../../templates/');
    }

    public function index(){
        $articles = Article::findAll();
        $this->view->renderHtml('/articles/index',['articles'=>$articles]);
    }

    public function show(int $id){
        $article = Article::getById($id);
        $articleId = $article->getId();
        $comments = Comment::findAllComments($articleId);
        if($article === []){
            $this->view->renderHtml('errors/error',[],404);
            return;
        }
        $this->view->renderHtml('articles/show', ['article'=>$article, 'comments'=> $comments]);
    }

    public function create()
    {
        $this->view->renderHtml('articles/create');
    }
    public function store(){
        $article = new Article;
        $article->setTitle($_POST['title']);
        $article->setText($_POST['text']);
        $article->setAuthorId($_POST['authorId']);
        $article->save();
        header('Location:framework/www/articles');
    }
    public function edit(int $id){
        $article = Article::getById($id);
        $this->view->renderHtml('articles/edit',['article'=>$article]);
    }
    public function update(int $id){
        $article = Article::getById($id);
        $article->setTitle($_POST['title']);
        $article->setText($_POST['text']);
        $article->save();
        header('Location:framework/www/article/'.$article->getId());
    }
    public function delete(int $id){
        $article = Article::getById($id);
        $article->delete();
        header('Location:framework/www/articles');
    }

}