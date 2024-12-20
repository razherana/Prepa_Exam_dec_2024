<?php

namespace app\models\queries;

use Flight;
use PDO;

class QueryExecutor
{
  private $terms = [
    "insert into",
    "update",
    "delete",
    "truncate"
  ];

  private function __construct() {}

  /**
   * Execute a query
   * @param string $q
   * @param array<array<int, mixed>> $params 
   * @return bool|array<array<string, mixed>>
   */
  public static function execute($q, $params = [])
  {
    /**
     * @var PDO $pdo
     */
    $pdo = Flight::app()->db();

    $prepared = $pdo->prepare($q);
    $i = 1;
    foreach (($params ?? []) as $param)
      $prepared->bindParam($i++, array_values($param)[0], array_keys($param)[0]);
    $res = $prepared->execute();

    $execute_only = false;

    foreach ((new static())->terms as $term)
      if (stripos($q, $term) !== false) {
        $execute_only = true;
        break;
      }

    if ($execute_only) return $res;

    return $prepared->fetchAll(PDO::FETCH_ASSOC);
  }
}
