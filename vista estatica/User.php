<?php


require_once ('Level.php');
require_once ('..\..\userachievement.php');
require_once ('..\..\usertask.php');



use ;
use ;
use ;
/**
 * @author TERMEN
 * @version 1.0
 * @created 07-may.-2019 04:07:40 p. m.
 */
class User
{

	private $id;
	private $name;
	private $id_levels;
	private $points;
	public $m_Level;
	public $m_userachievement;
	public $m_usertask;

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

	/**
	 * 
	 * @param id
	 */
	public function watchlevelsusers(int $id)
	{
	}

}
?>