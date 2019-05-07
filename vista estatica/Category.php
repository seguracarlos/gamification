<?php


require_once ('..\..\achivecategory.php');
require_once ('Achievment.php');



use ;
use ;
/**
 * @author TERMEN
 * @version 1.0
 * @created 07-may.-2019 04:07:40 p. m.
 */
class Category
{

	private $id;
	private $name;
	private $badge;
	private $imgpath;
	private $points;
	public $m_achivecategory;
	public $m_Achievment;

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