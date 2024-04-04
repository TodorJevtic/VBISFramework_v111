<?php

namespace app\models;

use app\core\DbModel;

class ListProductModel extends DbModel
{
    public $products;
    public $pageIndex;
    public $rowNumbers;
    public $search = "";

    public function search()
    {
        $dbResult = $this->db->con()->query(
            "select p.id as 'id', p.naziv as 'naziv', p.cena as 'cena', p.slika as 'slika', c.id as 'category_id', c.name as 'category' from proizvod p
                    inner join categories c on p.category_id = c.id where p.naziv like '%$this->search%' or c.name like '%$this->search%';"
        );

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $product = new ProductModel();
            $product->mapData($result);
            $resultArray[] = $product;
        }
        $this->products = $resultArray;
        return json_encode($this);
    }

    public function searchData()
    {
        $dbResult = $this->db->con()->query(
            "select p.id as 'id', p.name as 'name', p.price as 'price', p.description as 'description', p.image_url as 'image_url', c.id as 'category_id', c.name as 'category' from products p
                    inner join categories c on p.category_id = c.id where p.name like '%$this->search%' or c.name like '%$this->search%';"
        );

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $product = new ProductModel();
            $product->mapData($result);
            $resultArray[] = $product;
        }
        $this->products = $resultArray;
        return $this;
    }

    public function tableName()
    {
       return "";
    }

    public function attributes(): array
    {
        return [];
    }
}