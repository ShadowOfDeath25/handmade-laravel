<?php


namespace App\Database\Models;

use App\Database\Database;
use Exception;
use PDOException;

abstract class Model
{
    protected static $table;
    protected static $modelName;
    protected static $primaryKey = 'id';
    protected static $fillable = [];
    protected static $relations = [];
    protected $attributes = [];


    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    public static function getModelName()
    {
        return static::$modelName;
    }

    public static function getFillable()
    {
        return static::$fillable;
    }

    public static function getRelations()
    {
        return static::$relations;
    }


    public static function find($id)
    {
        try {
            $stmt = Database::query("SELECT * FROM " . static::$table . " WHERE " . static::$primaryKey . " = ?", [$id]);
            $result = $stmt->fetch();
            if ($result) {
                return new static($result);
            }
            return null;
        } catch (PDOException $e) {
            throw new Exception("Find Failed: " . $e->getMessage());
        }
    }

    public static function all()
    {
        try {
            $stmt = Database::query("SELECT * FROM " . static::$table);
            $results = $stmt->fetchAll();
            return array_map(function ($result) {
                return new static($result);
            }, $results);
        } catch (PDOException $e) {
            throw new Exception("Fetch All Failed: " . $e->getMessage());
        }
    }

    protected function insert()
    {
        try {
            $columns = array_keys($this->attributes);
            $values = array_values($this->attributes);
            $placeholders = array_fill(0, count($columns), '?');

            $sql = "INSERT INTO " . static::$table . " (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $placeholders) . ")";

            Database::execute($sql, $values);
            $this->attributes[static::$primaryKey] = Database::getConnection()->lastInsertId();
            return true;
        } catch (Exception $e) {
            throw new Exception("Insert Failed: " . $e->getMessage());
        }
    }

    public function save()
    {
        if (isset($this->attributes[static::$primaryKey])) {
            return $this->update();
        } else {
            return $this->insert();
        }
    }

    protected function update()
    {
        try {
            $id = $this->attributes[static::$primaryKey];
            $attributes = $this->attributes;
            unset($attributes[static::$primaryKey]);
            $fields = [];
            $values = [];
            foreach ($attributes as $key => $value) {
                $fields[] = "$key = ?";
                $values[] = $value;
            }
            $values[] = $id;
            $sql = "UPDATE " . static::$table . " SET " . implode(",", $fields) . " WHERE " . static::$primaryKey . " = ?";
            return Database::execute($sql, $values) > 0;
        } catch (Exception $e) {
            throw new Exception("Update Failed: " . $e->getMessage());
        }


    }

    public function delete()
    {
        try {
            if (!isset($this->attributes[static::$primaryKey])) {
                throw new Exception("Cannot delete model without primary key");
            }

            $sql = "DELETE FROM " . static::$table . " WHERE " . static::$primaryKey . " = ?";
            return Database::execute($sql, [$this->attributes[static::$primaryKey]]) > 0;
        } catch (Exception $e) {
            throw new Exception("Delete Failed: " . $e->getMessage());
        }
    }

    public static function where($column, $operator, $value)
    {
        try {
            $stmt = Database::query("
            SELECT * FROM " . static::$table . " WHERE " . $column . " " . $operator . " ?",
                [$value]);
            $results = $stmt->fetchAll();
            return array_map(function ($result) {
                return new static($result);
            }, $results);
        } catch (PDOException $e) {
            throw new Exception("Where Failed: " . $e->getMessage());

        }
    }

    public function belongsTo($relatedModel, $foreignKey = null)
    {
        $foreignKey = $foreignKey ?? static::$primaryKey;
        $relatedId = $this->attributes[$foreignKey] ?? null;

        if ($relatedId) {
            return $relatedModel::find($relatedId);
        }
        return null;
    }

    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($this->attributes[$name]);
    }

}

?>