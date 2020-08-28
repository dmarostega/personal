<?php
namespace DMarostega\MVC\Interfaces;

use DMarostega\MVC\Model;
use DMarostega\Database\DBService as DB;

interface IModel{
    public function __construct($args=array());
	public function insert();
	public function update($id);
	public function delete($id);
}