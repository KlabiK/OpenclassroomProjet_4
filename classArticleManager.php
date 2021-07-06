<?php
class ArticleManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function add(Article $article)
    {

    }

    public function delete(Article $article)
    {

    }

    public function get($id)
    {

    }

    public function getList()
    {

    }

    public function update (Article $article)
    {

    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}