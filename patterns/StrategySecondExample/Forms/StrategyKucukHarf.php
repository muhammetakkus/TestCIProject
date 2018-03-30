<?php namespace Pattern\StrategySecondExample\Forms;

use Pattern\StrategySecondExample\StoreInterface;

class StrategyKucukHarf implements StoreInterface
{
    public function showTitle($book)
    {
        $title = $book->getTitle();
        return strtolower($title);
    }
}