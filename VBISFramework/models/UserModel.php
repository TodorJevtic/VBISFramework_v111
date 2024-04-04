<?php

namespace app\models;

use app\core\DbModel;

class UserModel extends DbModel
{
    public string $korisnik_id;
    public string $username;
    public string $email;
    public string $password;
    public $role_names;

    public function rules(): array
    {
        return [];
    }

    public function tableName()
    {
        return "korisnik";
    }

    public function attributes(): array
    {
        return [
            "username",
            "email",
            "password",
        ];
    }
}