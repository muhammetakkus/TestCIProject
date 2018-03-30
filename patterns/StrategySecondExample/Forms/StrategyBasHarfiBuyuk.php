<?php namespace Pattern\StrategySecondExample\Forms;

use Pattern\StrategySecondExample\StoreInterface;

class StrategyBasHarfiBuyuk implements StoreInterface
{
    public function showTitle($book)
    {
        $title = $book->getTitle();
        return ucwords(strtolower($title));
    }
}