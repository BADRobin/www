<?php

class SiteController
{

        public function actionIndex()
    {
        $categories = Category::getCategoriesList();
        $authors = Author::getAuthorsList();

        $latestBooks = Book::getLatestBooks(6);

        $sliderBooks = Book::getRecommendedBooks();

        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    public function actionContact()
    {

        $userEmail = false;
        $userText = false;
        $result = false;

        if (isset($_POST['submit'])) {
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            $errors = false;

            if (!User::checkLogin($userEmail)) {
                $errors[] = 'Неправильный login';
            }

            if ($errors == false) {
                $adminEmail = 'book.library@gmail.ru';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }

        require_once(ROOT . '/views/site/contact.php');
        return true;
    }
    
    public function actionAbout()
    {
        require_once(ROOT . '/views/site/about.php');
        return true;
    }

}
