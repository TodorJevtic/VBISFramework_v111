<?php

namespace app\models;

use app\core\DbModel;

class CategoryModel extends DbModel
{
    public $id;
    public $active;
    public $name;

    public function tableName()
    {
        return "categories";
    }

    public function attributes(): array
    {
        return [
            "active",
            "name"
        ];
    }
}