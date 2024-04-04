<?php

namespace app\controllers;

use app\core\Controller;
use app\core\DbConnection;
use app\models\OrderModel;
use mysqli;

class HomeController  extends Controller
{
    public function index()
    {
        $this->view("home", "auth", null);
    }
    public function sanitarija()
    {
        $this->view("sanitarija", "auth", null);
    }
    public function alati()
    {
        $this->view("alati", "auth", null);
    }
    public function rasveta()
    {
        $this->view("rasveta", "auth", null);
    }
    public function info()
    {
        $this->view("info", "auth", null);
    }
    public function kontakt()
    {
        $this->view("kontakt", "auth", null);
    }
    public function korpa()
    {
        return $this->view("korpa", "auth", null);
    }
    public function porucivanje()
    {
        return $this->view("porucivanje", "auth", null);
    }
    public function addProduct(){
        return $this->view("addProduct", "auth", null);
    }
    public function productList(){
        return $this->view("productList", "auth", null);
    }
    public function admin(){
        return $this->view("admin", "auth", null);
    }
    public function orders(){

        $mysql =  new mysqli('localhost','todor','root','todor') or die(mysqli_error($mysql));
        $sqlString = "SELECT datum, sum(ukupna_cena) FROM porudzbenica WHERE datum BETWEEN (NOW() - INTERVAL 1 MONTH) AND NOW() group by datum";
        $dataResult = $mysql->query($sqlString) or die();

        $resultArray = [];

        while($result = $dataResult->fetch_assoc()){
            $resultArray[] = $result;
        }
        echo json_encode($resultArray);

    }

    public function authorize()
    {
        // TODO: Implement authorize() method.
    }
}