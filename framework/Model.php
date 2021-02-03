<?php

namespace Framework;

abstract class Model
{
    public function getById($id)
    {
        return $this->getWhere([$this->getIdField() => $id]);
    }
    public abstract function getWhere($condition);

    public function all()
    {
        return $this->getWhere([]);
    }

    public function deleteById($id)
    {
        return $this->getWhere([$this->getIdField() => $id]);
    }
    public abstract function deleteWhere($condition);

    public function updateById($id)
    {
        return $this->updateWhere([$this->getIdField() => $id]);
    }
    public abstract function updateWhere($condition);

    public abstract function create($fields);

    protected function getIdField()
    {
        return "id";
    }
}
