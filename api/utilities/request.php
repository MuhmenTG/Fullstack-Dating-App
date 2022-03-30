<?php

class Request
{

  private $data;
  private $method;
  
  public function __construct(){
    $this->method = $_SERVER['REQUEST_METHOD'];  
    $this->data = json_decode(
      file_get_contents("php://input"), true,  JSON_THROW_ON_ERROR);
  }

  public function has(string $key): bool
  {
    return array_key_exists($key, $this->data);
  }

	public function get(string $key)
  {
    return $this->data[$key] || null;
  }

	/*public static function get(string $key): mixed
  {
    $data = json_decode(file_get_contents('php://input'), true);
    return $data[$key];
  }*/

}