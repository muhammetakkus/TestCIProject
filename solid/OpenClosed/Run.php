<?php namespace Solid\OpenClosed;

class Run
{
	private $square;

	/* item/ altındaki atomic classların bir interface'i olabilir ve bu classta o interface tipinde class alabilir
	   (öyle olasa daha iyi fakat basit tutmak için böyle bırakıyorum) */

	public function __construct($square)
	{
		$this->square = $square;
	}

	public function run()
	{
		return $this->square->draw();
	}
}