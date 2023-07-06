<?
// https://code.mu/ru/php/book/oop/class/File/
// Реализуем класс File для работы с файлами

interface iFile
{
	public function __construct($filePath);
	
	public function getPath(); // путь к файлу
	public function getDir();  // папка файла
	public function getName(); // имя файла
	public function getExt();  // расширение файла
	public function getSize(); // размер файла
	
	public function getText();          // получает текст файла
	public function setText($text);     // устанавливает текст файла
	public function appendText($text);  // добавляет текст в конец файла
	
	public function copy($copyPath);    // копирует файл
	public function delete();           // удаляет файл
	public function rename($newName);   // переименовывает файл
	public function replace($newPath);  // перемещает файл
}

class File implements iFile
{
	private $path;

	public function __construct($filePath)
	{
		$this->path = $filePath;
	}
	public function getPath() // путь к файлу
	{
		return $this->path;
	}
	public function getDir() // папка файла
	{
		return $_SERVER['DOCUMENT_ROOT'];
	}
	public function getName() // имя файла
	{
		preg_match('#([^/]+)$#su', $this->path, $name);
		return $name[0];
	}
	public function getExt()  // расширение файла
	{
		preg_match('#([^.]+)$#su', $this->path, $ext);
		return $ext[0];
	}
	public function getSize() // размер файла
	{
		return filesize($this->path);
	}
	public function getText()          // получает текст файла
	{
		return file_get_contents($this->path);
	}
	public function setText($text)     // устанавливает текст файла
	{
		file_put_contents($this->path, $text);
	}
	public function appendText($text)  // добавляет текст в конец файла
	{
		$fileText = file_get_contents($this->path);
		file_put_contents($this->path, $fileText . $text);
	}
	public function copy($copyPath)    // копирует файл
	{
		copy($this->path, $copyPath);
	}
	public function delete()           // удаляет файл
	{
		unlink($this->path);
	}
	public function rename($newName)   // переименовывает файл
	{
		rename($this->path, $newName);
	}
	public function replace($newPath)  // перемещает файл
	{
		rename($this->path, $newPath);
	}
}