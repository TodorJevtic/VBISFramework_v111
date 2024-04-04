<?php

namespace app\models;

use app\core\DbModel;

class ProductModel extends DbModel
{
    public $id;
    public string $naziv;
    public int $cena;
    public string $vrsta;
    public string $slika;
    public $category_id;
    public $categories;
    public $category;


    public function rules(): array
    {
       return [];
    }

    public function tableName()
    {
        return "proizvod";
    }

    public function attributes(): array
    {
        return [
            "naziv",
            "cena",
            "vrsta",
            "slika",
            "category_id"
        ];
    }
}