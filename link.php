<?
// https://code.mu/ru/php/book/oop/class/Link/
// Реализация класса Link

require_once 'tag.php';

class Link extends Tag
{
	public function __construct()
	{
		parent::__construct('a');
		$this->setAttr('href', '#');
	}

	public function __toString()
	{
		return parent::show();
	}

	public function open()
	{
		$this->activateSelf();
		return parent::open();
	}

	private function activateSelf()
	{
		if ($this->getAttr('href') === $_SERVER['REQUEST_URI']) {
			$this->addClass('active');
		} else {
			$this->addClass('not active');
		}
	}
}