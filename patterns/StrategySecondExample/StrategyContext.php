<?php namespace Pattern\StrategySecondExample;

class StrategyContext
{
    private $strategy = NULL;

    public function __construct($strategy_form_id)
    {
        // by the way olayın bu kısmı factory'e mi giriyor?
        switch ($strategy_form_id) {
            case 'büyük':
                $this->strategy = new \Pattern\StrategySecondExample\Forms\StrategyBuyukHarf();
            break;
            case 'küçük':
                $this->strategy = new \Pattern\StrategySecondExample\Forms\StrategyKucukHarf();
            break;
            case 'ideal':
                $this->strategy = new \Pattern\StrategySecondExample\Forms\StrategyBasHarfiBuyuk();
            break;
            /* yeni bir görüntü formu ile genişletiyorum */
            case 'bibuyukbikucuk':
                $this->strategy = new \Pattern\StrategySecondExample\Forms\StrategyBirBuyukBirKucuk();
            break;
        }
    }

    public function showBookTitle($book)
    {
        return $this->strategy->showTitle($book);
    }
}