<?
require_once 'tag.php';

class Image extends Tag
{
	public function __construct()
	{
		parent::__construct('img');
		$this->setAttr('src', '')->setAttr('alt', '');
	}

	public function __toString()
	{
		return parent::open();
	}
}