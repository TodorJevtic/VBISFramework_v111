<?php

namespace app\core;
use app\core\Application;

abstract class Controller
{
    public Router $router;
    public function __construct()
    {
        $this->router = new Router();
        $this->checkRoles();
    }

    abstract public function authorize();

    public function view($view, $layout, $params)
    {
        return $this->router->view($view, $layout, $params);
    }

    public function checkRoles()
    {
        $roles = $this->authorize();

        if ($roles === null) return;

        $access = false;
        $email = Application::$app->session->get(Application::$app->session->USER_SESSION);
        $userRoles = $this->getRoles();

        if ($email !== false) {
            foreach ($roles as $role) {
                foreach ($userRoles as $userRole)
                {
                    if ($role === $userRole)
                    {
                        $access = true;
                    }
                }
            }

            if (!$access) {
                header("location:" . "/noValidUser");
            }
            return;
        }
        header("location:" . "/login");

    }

    public function getRoles() : array
    {
        $connection = new DbConnection();
        $email =  Application::$app->session->get(Application::$app->session->USER_SESSION);

        $resultFromDb = $connection->con()->query("
        select r.name from korisnik u
        inner join korisnik_roles ur on u.korisnik_id = ur.id_user
        inner join roles r on ur.id_role = r.id
        where u.email = '$email' and r.active = true;
    ");
        $resultArray = [];

        while ($result = $resultFromDb->fetch_assoc()) {
            $resultArray[] = $result["name"];
        }

        return $resultArray;
    }
}