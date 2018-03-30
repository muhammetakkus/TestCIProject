<?php namespace Pattern\StrategySecondExample\Forms;

use Pattern\StrategySecondExample\StoreInterface;

class StrategyBuyukHarf implements StoreInterface
{
    public function showTitle($book)
    {
        // $book = (new \Pattern\StrategySecondExample\Book('PHP for Cats', 'Larry Truett'))
        $title = $book->getTitle();
        return strtoupper($title);
    }
}