<?php namespace Solid\IoC\Item;

use Solid\IoC\SquareInterface;

class Kare implements SquareInterface
{
	public function draw()
	{
		return "kare çizildi..";
	}
}