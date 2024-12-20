<?php

namespace app\models;

use app\models\queries\QueryExecutor;
use Closure;
use Exception;
use PDO;

abstract class BaseModel
{
  protected $table = "";
  protected $columns = [];
  private $data = [];
  // protected $eager_load = [];
  // protected $relation = [];
  private $joins = [];

  /**
   * @param string $otherModel
   * @param Closure $closureJoin
   * @param string $relation_name
   */
  public function hasMany($otherModel, $closureJoin, $relation_name)
  {
    $closureJoin->bindTo($this, $this::class);
    $others = $otherModel::all();
    if (!isset($mainModel->joins[$relation_name]))
      $this->joins[$relation_name] = [];
    foreach ($others as $other)
      if ($closureJoin($other))
        $this->joins[$relation_name][] = $other;
  }

  /**
   * @param string $otherModel
   * @param Closure $closureJoin
   * @param string $relation_name
   */
  public function belongsTo($otherModel, $closureJoin, $relation_name)
  {
    $closureJoin->bindTo($this, $this::class);
    $others = $otherModel::all();
    if (!isset($mainModel->joins[$relation_name]))
      $this->joins[$relation_name] = [];
    foreach ($others as $other)
      if ($closureJoin($other))
        $this->joins[$relation_name] = $other;
  }

  public function __construct($data = null)
  {
    if ($data !== null && is_array($data))
      $this->init($data);
  }

  /**
   * @param array<string, mixed> $data
   */
  private function init($data)
  {
    $data = array_filter($data, function ($k) {
      return in_array($k, $this->columns);
    }, ARRAY_FILTER_USE_KEY);
    $this->data = $data;
  }

  public function __get($name)
  {
    if (isset($this->join[$name]))
      return $this->join[$name];
    else if (method_exists($this, $name)) {
      $this->{$name}();
      return $this->join[$name];
    }

    if (in_array($name, $this->columns))
      return $this->data[$name] ?? null;
    else
      throw new Exception("No column $name");
  }

  public function __set($name, $value)
  {
    if (in_array($name, $this->columns))
      $this->data[$name] = $value;
    else
      throw new Exception("No column $name");
  }

  public static function all()
  {
    $arr = [];
    $example = new static();
    $q = "SELECT * FROM " . $example->table;
    $res = QueryExecutor::execute($q);
    foreach ($res as $line) {
      $el = new static();
      $el->init($line);
      $arr[] = $el;
    }
    return $arr;
  }

  public function insert()
  {
    $q = "INSERT INTO " . $this->table . " (" . implode(",", $this->columns) . ") VALUES (" . implode(",", array_fill(0, count($this->columns), "?")) . ")";
    $params = [];
    foreach ($this->columns as $col) {
      $value = $this->data[$col] ?? null;
      $type = PDO::PARAM_STR;
      if (is_int($value))
        $type = PDO::PARAM_INT;
      else if (is_null($value))
        $type = PDO::PARAM_NULL;
      else if (is_double($value))
        $type = PDO::PARAM_STR;
      $params[] = [$type => $value];
    }
    QueryExecutor::execute($q, $params);
  }
}
