<?php


require_once ('..\..\achivetask.php');



use ;
/**
 * @author TERMEN
 * @version 1.0
 * @created 07-may.-2019 04:07:40 p. m.
 */
class Task
{

	private $id;
	private $name;
	private $badge;
	private $imgpath;
	private $points;
	private $maxdate;
	private $typetasks;
	private $descriptiontasks;
	private $calculatevalue1;
	private $calculatevalue2;
	private $calculatevalue3;
	public $m_achivetask;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	/**
	 * 
	 * @param id
	 */
	public function add(int $id)
	{
	}

	/**
	 * 
	 * @param id
	 */
	public function edit(int $id)
	{
	}

	/**
	 * 
	 * @param id
	 */
	public function delete(int $id)
	{
	}

}
?>