<?php
/**
 * SiteController
 */

class SiteController
{
    public function actionIndex()
    {
        $abiturientDG = new AbiturientDataGateway();
        $abiturientsList = $abiturientDG->selectByQuery();
        if (isset($_SESSION["id"])) {
            $user = $abiturientDG->selectById($_SESSION["id"]);
        }
        $pageName = "Главная";
        require_once ROOT . "/views/list.php";
    }
    
    public function actionRegister()
    {
        $abiturient = new Abiturient;
        $abiturientDataGateway = new AbiturientDataGateway;
        if (isset($_POST["submit"])) {
            $_POST["sex"] = $_POST["sex"] == "Женский" ? "0" : "1";
            $_POST["hostel"] = isset($_POST["hostel"]) ? "1" : "0";
            $abiturient->setAttributes($_POST);
            $abiturientDataGateway->insert($abiturient);
            header("Location: /login");
        }
        $pageName = "Регистрация";
        require_once ROOT . "/views/register.php";
    }

    public function actionLogin()
    {
        $abiturientDG = new AbiturientDataGateway;
        $pageName = "Авторизация";
        if (isset($_POST["submit"])) {
            $abiturientId = $abiturientDG->auth($_POST["email"], $_POST["password"]);
            $_SESSION["id"] = $abiturientId;
            header("Location: /cabinet");
        } else {
            require_once ROOT . "/views/login.php";
        }
    }

    public function actionLogout()
    {
        unset($_SESSION["id"]);
        header("Location: /");
    }

    public function actionCabinet()
    {
        $abiturientDG = new AbiturientDataGateway;
        $pageName = "Личный кабинет пользователя";
        if (isset($_SESSION["id"])) {
            $user = $abiturientDG->selectById($_SESSION["id"]);
            require_once ROOT . "/views/cabinet.php";
        } else {
            header("Location: /login");
        }
    }

    public function actionEdit()
    {
        $pageName = "Изменение данных пользователя";
        if (isset($_SESSION["id"])) {
            $abiturient = new Abiturient();
            $abiturientDG = new AbiturientDataGateway();
            $user = $abiturientDG->selectById($_SESSION["id"]);
            $abiturient->setAttributes($user);
            if (isset($_POST["submit"])) {
                $_POST["sex"] = $_POST["sex"] == "Женский" ? "0" : "1";
                $_POST["hostel"] = isset($_POST["hostel"]) ? "1" : "0";
                $abiturient->setAttributes($_POST);
                var_dump($_POST);
                $abiturientDG->update($abiturient);
            }
            require_once ROOT . "/views/edit.php";
        } else {
            header("Location: /login");
        }
    }
}
