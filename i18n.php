<?php
// example constant to use for message files
define('APP_BASE', dirname(__FILE__).DIRECTORY_SEPARATOR);

class i18n {
	
	protected $path = "i18n_strings";
	protected $lang = "en";
	protected $dir;
	protected $_phrases = array();
	

	/**
	 * Constructor
	 * @param String $lang language file to load (en=messages_en.txt, etc)
	 * @param String $dir directory to the language files
	 */
	public function __construct($lang="en", $dir = APP_BASE)
	{
		$this->setLang($lang);
		$this->setDir($dir.$this->path.DIRECTORY_SEPARATOR);
		$this->loadPhrases();
	}
	
	protected function setLang($lang)
	{
		$this->lang = $lang;
	}
	protected function setDir($dir)
	{
		$this->dir = $dir;
	}	
	
	protected function loadPhrases()
	{
		$filename = $this->dir."messages_".$this->lang.".txt";
		if(!file_exists($filename)) {
			return false;
		}
		$f = file($file);
		foreach($f as $line){
			list($key,$value) = explode("=",$line);
			$this->_phrases[$key] = $value;
		}
	}
	
	/**
	 * 
	 * Call this with the phrase you're looking for, 
	 * plus any extra parameters
	 * 
	 * the messages files have key/value pairs like this:
	 * value.greaterthan=The value {0} has to be greater than {1}
	 * 
	 * $i->getPhrase("value.greaterthan",50,77);
	 * 
	 * would return
	 * The value 50 has to be greater than 77
	 * 
	 * @return String (or null if phrase isn't found)
	 */
	public function getPhrase($phrase)
	{
		$args = func_get_args();
		array_shift($args);
		if(!array_key_exists($string, $this->_phrases))
		{
			return null;
		}
		$text = $this->_phrases[$string];
		foreach($args as $key=>$arg)
		{
			$text = str_replace("{".$key."}", $arg, $text);
		}
		return $text;
	}

}

$i = new i18n("en");
echo $i->getPhrase("invalid.creditCard","8123987213");
echo $i->getPhrase("blank","Home");

