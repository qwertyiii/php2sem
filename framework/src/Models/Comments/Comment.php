<?php

namespace src\Models\Comments;

use src\Models\ActiveRecordEntity;
use src\Models\Users\User;
use src\Models\Articles\Article ;

    class Comment extends ActiveRecordEntity{
            protected $text;
            protected $authorId;
            protected $articleId;

        public function getAuthorId(): User
        {
            return User::getById($this->authorId);
        }
        public function getArticleId()
        {
            return $this->articleId;
        }
        public function getText()
        {
            return $this->text;
        }

        public function setText(string $text){
            $this->text = $text;
        }
        public function setAuthorId(int $authorId){
            $this->authorId = $authorId;
        }
        public function setArticleId(int $articleId){
            $this->articleId = $articleId;
        }
        protected static function getTableName(){
            return 'comments';
        }
    }

    


