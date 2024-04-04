<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\CategoryModel;
use app\models\ProductModel;
use app\models\ListProductModel;
use mysqli;

class ProductController extends Controller
{

    public function rows()
    {
        $model = new ListProductModel();
        $model->mapData($this->router->request->all());

        echo $model->search();
    }

    public function createProduct()
    {
        $model = new ProductModel();
        $categoryModel = new CategoryModel();

        $categories = $categoryModel->all();
        $model->categories = $categories;

        return $this->view("createProduct", "auth", $model);


    }

    public function createProductProcess()
    {
        $model = new ProductModel();
        $categoryModel = new CategoryModel();

        $categories = $categoryModel->all();
        $model->categories = $categories;

        $model->mapData($this->router->request->all());
        $model->validate();

        if ($model->errors)
        {
            Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_ERROR, "Kreiranje proizvoda nije uspesno proslo!");
            return $this->view("createProduct", "auth", $model);
        }

        $model->create();
        Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_SUCCESS, "Uspesno kreirano!");

        return $this->view("createProduct", "auth", $model);
    }

    public function getAllProducts()
    {
        $mysql =  new mysqli('localhost','todor','root','todor') or die(mysqli_error($mysql));

        $dbResult =  $mysql -> query("select * from korisnik;") or die(mysqli_error($mysql));

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        echo json_encode($resultArray);
    }
        public function delete()
    {
        $model = new ProductModel();
        $model->mapData($this->router->request->all());

        $model->delete("id = $model->id");
    }
    public function authorize()
    {
        return [
            "Admin",
            "SuperAdmin"
        ];
    }
}