<?php namespace Solid\IoC;

use Solid\IoC\SquareInterface;

class Run
{
	private $square;

	public function __construct(SquareInterface $square)
	{
		$this->square = $square;
	}

	public function run()
	{
		return $this->square->draw();
	}
}