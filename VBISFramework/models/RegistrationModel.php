<?php
namespace app\models;
use app\core\DbModel;

class RegistrationModel extends DbModel
{
    public string $email;
    public string $username;
    public string $password;

    public function rules(): array
    {
        return [
            'email' => [self::RULE_EMAIL, self::RULE_EMAIL_UNIQUE],
            'username' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED],
            ];
    }

    public function registration()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->create();

        $user = new UserModel();
        $role = new RoleModel();
        $userRoles = new UserRolesModel();

        $user->mapData($user->one("email = '$this->email'"));
        $role->mapData($role->one("name = 'Korisnik'"));

        $userRoles->id_user = $user->korisnik_id;
        $userRoles->id_role = $role->id;
        $userRoles->create();
    }
    public function tableName()
    {
        return "korisnik";
    }

    public function attributes(): array
    {
        return [
            "email",
            "username",
            "password"
        ];
    }
}