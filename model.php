<?php

class Students extends ObjectModel
{
	public $id_students;
	public $birth_date;
	public $is_in_educate;
	public $average_score;
	public $name;
	
	public static $definition = array(
	  'table' => 'students',
	  'primary' => 'id_students',
	  'multilang' => true,
	  'fields' => array(
		'birth_date'	=> array('type' => self::TYPE_DATE),
		'is_in_educate'	=> array('type' => self::TYPE_BOOL),
		'average_score'	=> array('type' => self::TYPE_FLOAT),
	 
		// Language fields
		'name' =>
			array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255)
	);
	
	/******************************************
	*	array getAll - получить всех студентов
	*	int id_lang	-	требуемый язык
	*******************************************/
	
	public function getAll($id_lang)
	{
		$id_lang=(int)$id_lang;
		$db = Db::getInstance();
		
		$studentsList = $db->ExecuteS('SELECT t1.*,t2.name FROM '._DB_PREFIX_.'students AS t1 INNER JOIN '._DB_PREFIX_.'students_lang as t2 t1.id_students=t2.id_students WHERE t2.lang_id='.$id_lang);
		return ($query);
	}
	
	/*********************************
	*	array getBestStudent - получить студента с высшим средним баллом
	*	int id_lang	-	требуемый язык
	*********************************/
	
	public function getBestStudent($id_lang)
	{
		$id_lang=(int)$id_lang;
		$db = Db::getInstance();
		
		$bestStudent = $db->ExecuteS('SELECT t1.*,t2.name FROM '._DB_PREFIX_.'students as t1 INNER JOIN '._DB_PREFIX_.'students_lang as t2 ON t1.id_students=t2.id_students WHERE t2.lang_id='.$id_lang.' SORT t1.average_score DESC LIMIT 0,1');
		return ($bestStudent);
	}
	
	/*****************************
	* array getHigestScore - получить высший средний балл
	******************************/
	
	public function getHigestScore()
	{
		$db = Db::getInstance();
		
		$highscore = $db->getValue('SELECT MAX(average_score) FROM '._DB_PREFIX_.'students');
		return ($highscore);
	}
	
}
?>
