<?php

namespace app\models;

use app\models\queries\QueryExecutor;
use ArgumentCountError;
use Closure;
use Exception;
use PDO;

abstract class BaseModel
{
  protected $table = "";
  protected $columns = [];
  private $data = [];
  protected $eager_load = [];
  private $joins = [];

  /**
   * @param string $otherModel
   * @param Closure $closureJoin
   * @param string $relation_name
   */
  private function hasManyMethod($otherModel, $closureJoin, $relation_name)
  {
    $others = $otherModel::all();
    if (!isset($mainModel->joins[$relation_name]))
      $this->joins[$relation_name] = [];
    foreach ($others as $other)
      if ($closureJoin($this, $other))
        $this->joins[$relation_name][] = $other;
  }

  public function hasMany($otherModel, $closureJoin, $relation_name)
  {
    return ["hasMany", $otherModel, $closureJoin, $relation_name];
  }

  public function belongsTo($otherModel, $closureJoin, $relation_name)
  {
    return ["belongsTo", $otherModel, $closureJoin, $relation_name];
  }


  /**
   * @param BaseModel[] $models
   * @param string $otherModel
   * @param Closure $closureJoin
   * @param string $relation_name
   */
  private static function hasManyStatic($models, $otherModel, $closureJoin, $relation_name)
  {
    $others = $otherModel::all();
    foreach ($models as $currModel) {
      if (!isset($mainModel->joins[$relation_name]))
        $currModel->joins[$relation_name] = [];
      foreach ($others as $other)
        if ($closureJoin($currModel, $other))
          $currModel->joins[$relation_name][] = $other;
    }
  }

  /**
   * @param string $otherModel
   * @param Closure $closureJoin
   * @param string $relation_name
   */
  private function belongsToMethod($otherModel, $closureJoin, $relation_name)
  {
    $others = $otherModel::all();
    foreach ($others as $other)
      if ($closureJoin($this, $other)) {
        $this->joins[$relation_name] = $other;
        break;
      }
  }

  /**
   * @param BaseModel[] $models
   * @param string $otherModel
   * @param Closure $closureJoin
   * @param string $relation_name
   */
  private static function belongsToStatic($models, $otherModel, $closureJoin, $relation_name)
  {
    $others = $otherModel::all();
    foreach ($models as $currModel) {
      foreach ($others as $other) {
        if ($closureJoin($currModel, $other)) {
          $currModel->joins[$relation_name] = $other;
          break;
        }
      }
    }
  }

  private static function applyAllEagerLoad($models, $options)
  {
    $example = new static();
    foreach($options as $k => $v)
      $example->{$k} = $v;
    $eager_load = $example->eager_load;
    foreach ($eager_load as $e) {
      $rel = $example->{$e}();
      call_user_func_array([self::class, $rel[0] . "Static"], array_merge([$models], array_slice($rel, 1)));
    }
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
    if (isset($this->joins[$name])) {
      return $this->joins[$name];
    } else if (method_exists($this, $name)) {
      $rel = $this->{$name}();
      call_user_func([$this, $rel[0] . "Method"], ...array_slice($rel, 1));
      return $this->joins[$name];
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

  public static function all($options = [])
  {
    $arr = [];
    $example = new static();
    $q = "SELECT * FROM " . $example->table;
    $res = QueryExecutor::execute($q);
    foreach ($res as $line) {
      $el = new static();
      foreach($options as $k => $v)
        $el->{$k} = $v;
      $el->init($line);
      $arr[] = $el;
    }
    self::applyAllEagerLoad($arr, $options);
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