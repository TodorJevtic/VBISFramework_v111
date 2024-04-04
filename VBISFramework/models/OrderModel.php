<?php

namespace app\models;

use app\core\DbModel;


class OrderModel extends DbModel
{
    public $id;
    public $ukupna_cena;
    public $datum;

    public function tableName()
    {
        return "porudzbenica";
    }

    public function attributes(): array
    {
        return [
            "ukupna_cena",
            "datum"
        ];
    }
    public function orders(){

        $db = $this->db->con();
        $sqlString = "SELECT datum, sum(ukupna_cena) FROM porudzbenica WHERE datum BETWEEN (NOW() - INTERVAL 1 MONTH) AND NOW() group by datum";
        $dataResult = $db->query($sqlString) or die();

        $resultArray = [];

        while($result = $dataResult->fetch_assoc()){
            $resultArray[] = $result;
        }
        echo json_encode($resultArray);

    }
}