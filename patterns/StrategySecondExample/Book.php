<?php namespace Pattern\StrategySecondExample;

class Book
{
    private $author;
    private $title;

    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getAuthorAndTitle()
    {
        return $this->getAuthor() . ' ' . $this->getTitle();
    }
}