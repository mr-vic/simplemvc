<?php

namespace Framework;

use App\MysqlConnection;

class MysqlModel extends Model 
{
    protected $table;
    protected $connection;

    public function __construct()
    {
        $this->connection = MysqlConnection::getConnection();
    }

    public function getWhere($condition)
    {

    }

    public function deleteWhere($condition)
    {
        
    }

    public function updateWhere($condition)
    {
        
    }

    public function create($fields)
    {
        $keys_array = array_keys($fields);
        $keys = implode(", ", $keys_array);
        $placehoders = implode(", ", array_map(function($el){return ":$el";}, $keys_array));
        var_dump("INSERT INTO {$this->table} ($keys) VALUES ($placehoders)");
        //$this->connection->prepare("INSERT INTO {$this->table} ($keys) VALUES ($placehoders)")

    }

    public function all()
    {
        $query = $this->connection->query("SELECT * FROM `{$this->table}`");
        //$query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS);
        //return parent::all();
    }
}