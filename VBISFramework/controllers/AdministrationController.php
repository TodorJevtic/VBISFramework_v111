<?php

namespace app\controllers;

use app\core\Controller;
use mysqli;

class AdministrationController  extends Controller
{
    public function users()
    {
        $this->view("users", "dashboard", null);
    }

    public function getAllUsers()
    {
        $mysql =  new mysqli('localhost','todor','root','todor') or die(mysqli_error($mysql));
        
        $dbResult =  $mysql -> query("select * from korisnik;") or die(mysqli_error($mysql));

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        echo json_encode($resultArray);
    }
    public function authorize()
    {
        return [
            "Admin",
            "SuperAdmin"
        ];
    }
}