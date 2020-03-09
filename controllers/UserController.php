<?php
class UserController
{

    public function actionLogin()
    {
        $login = false;
        $password = false;

        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkLogin($login)) {
                $errors[] = 'Неправильный login';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            $userId = User::checkUserData($login, $password);

            if ($userId == false) {
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                User::auth($userId);

                header("Location: /cabinet");
            }
        }

        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    public function actionLogout()
    {
        session_start();

        unset($_SESSION["user"]);

        header("Location: /");
    }

}
