<?php
// https://code.mu/ru/php/book/oop/class/Interval/
// Реализуем класс Interval для определения разницы между датами

require_once 'date.php';

class Interval
{
	private $date1;
	private $date2;

	public function __construct(Date $date1, Date $date2)
	{
		$this->date1 = $date1;
		$this->date2 = $date2;
	}
	
	public function toDays()
	{
		// вернет разницу в днях
		//return round(abs(strtotime($this->date1->__toString()) - strtotime($this->date2->__toString())) / (24 * 60 * 60));
		$datetime1 = date_create($this->date1->__toString());
		$datetime2 = date_create($this->date2->__toString());
		$interval = date_diff($datetime1, $datetime2);
		echo $interval->format('%R%a дней');
	}
	
	public function toMonths()
	{
		// вернет разницу в месяцах
		//return round(abs(strtotime($this->date1->__toString()) - strtotime($this->date2->__toString())) / (30 * 24 * 60 * 60));
		$datetime1 = date_create($this->date1->__toString());
		$datetime2 = date_create($this->date2->__toString());
		$interval = date_diff($datetime1, $datetime2);
		$months = $interval->format('%R%y') * 12 + $interval->format('%R%m');
		echo $months . ' месяцев';
		//echo $interval->format('%R%m месяцев');
	}
	
	public function toYears()
	{
		// вернет разницу в годах
		//return round(abs(strtotime($this->date1->__toString()) - strtotime($this->date2->__toString())) / (365 * 24 * 60 * 60));
		$datetime1 = date_create($this->date1->__toString());
		$datetime2 = date_create($this->date2->__toString());
		$interval = date_diff($datetime1, $datetime2);
		echo $interval->format('%R%y лет');
	}
}