<?php namespace Solid\IoC\Item;

use Solid\IoC\SquareInterface;

class Ucgen implements SquareInterface
{
	public function draw()
	{
		return "Üçgen çizildi..";
	}
}