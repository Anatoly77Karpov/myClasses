<?
// https://code.mu/ru/php/book/oop/class/HtmlList/
// Реализация класса HtmlList

require_once 'tag.php';

class ListItem extends Tag
{
	public function __construct()
	{
		parent::__construct('li');
	}
}

class HtmlList extends Tag
{
	private $items = [];
	
	public function addItem(ListItem $li)
	{
		$this->items[] = $li;
		return $this;
	}
	
	public function show()
	{
		$result = $this->open();
		
		foreach ($this->items as $item) {
			$result .= $item->show();
		}
		
		$result .= $this->close();
		
		return $result;
	}
}