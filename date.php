<?
// https://code.mu/ru/php/book/oop/class/Date/
// Реализуем класс Date для работы с датами

class Date
{
	private $date;

	public function __construct($date = null)
	{
		if ($date && $this->isDateCorrect($date)) {
			$this->date = $date;
		} else {
			// если дата не передана - пусть берется текущая
			$this->date = date('Y-m-d');
		}
	}
	
	public function getDay()
	{
		// возвращает день
		return substr($this->date, 8, 2);
	}
	
	public function getMonth($lang = null)
	{
		// возвращает месяц
		// $lang может принимать значение ru или en для названия месяца на заданном языке
		if (!$lang) {
			return substr($this->date, 5, 2);
		} elseif ($lang == 'en') {
			return date("F", mktime(0, 0, 0, substr($this->date, 5, 2), substr($this->date, 8, 2), substr($this->date, 0, 4)));
		} elseif ($lang =='ru') {
			$months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
			return $months[date("n", mktime(0, 0, 0, substr($this->date, 5, 2), substr($this->date, 8, 2), substr($this->date, 0, 4))) - 1];
		}
		

	}
	
	public function getYear()
	{
		// возвращает год
		return substr($this->date, 0, 4);
	}
	
	public function getWeekDay($lang = null)
	{
		// возвращает день недели
		// $lang может принимать значение ru или en для названия дня недели на соответствующем языке
		if (!$lang) {
			return date("w", mktime(0, 0, 0, substr($this->date, 5, 2), substr($this->date, 8, 2), substr($this->date, 0, 4)));
		} elseif ($lang == 'en') {
			return date("l", mktime(0, 0, 0, substr($this->date, 5, 2), substr($this->date, 8, 2), substr($this->date, 0, 4)));
		} elseif ($lang =='ru') {
			$months = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];
			return $months[date("w", mktime(0, 0, 0, substr($this->date, 5, 2), substr($this->date, 8, 2), substr($this->date, 0, 4))) - 1];
		}
	}
	
	public function addDay($value)
	{
		// добавляет значение $value к дню
		return date('Y-m-d', strtotime($this->date . '+ ' . $value . ' days'));
	}
	
	public function subDay($value)
	{
		// отнимает значение $value от дня
		return date('Y-m-d', strtotime($this->date . '- ' . $value . ' days'));
	}
	
	public function addMonth($value)
	{
		// добавляет значение $value к месяцу
		return date('Y-m-d', strtotime($this->date . '+ ' . $value . ' months'));
	}
	
	public function subMonth($value)
	{
		// отнимает значение $value от месяца
		return date('Y-m-d', strtotime($this->date . '- ' . $value . ' months'));
	}
	
	public function addYear($value)
	{
		// добавляет значение $value к году
		return date('Y-m-d', strtotime($this->date . '+ ' . $value . ' years'));
	}
	
	public function subYear($value)
	{
		// отнимает значение $value от года
		return date('Y-m-d', strtotime($this->date . '- ' . $value . ' years'));
	}
	
	public function format($format)
	{
		// выведет дату в указанном формате
		// формат пусть будет такой же, как в функции date
		return date($format, mktime(0, 0, 0, substr($this->date, 5, 2), substr($this->date, 8, 2), substr($this->date, 0, 4)));
	}
	
	public function __toString()
	{
		// выведет дату в формате 'год-месяц-день'
		return $this->date;
	}

	private function isDateCorrect($date)
	{
		$year = substr($date, 0, 4);
		$month = substr($date, 5, 2);
		$day = substr($date, 8, 2);
		return checkdate($month, $day, $year);
	}
}