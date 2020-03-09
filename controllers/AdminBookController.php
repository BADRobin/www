<?php

class AdminBookController extends AdminBase
{

    public function actionIndex()
    {
        self::checkAdmin();

        $booksList = Book::getBooksList();

        require_once(ROOT . '/views/admin_book/index.php');
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();

        $categoriesList = Category::getCategoriesListAdmin();

        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['author'] = $_POST['author'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            $errors = false;

            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                $id = Book::createBook($options);

                if ($id) {
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/books/{$id}.jpg");
                    }
                };

                header("Location: /admin/book");
            }
        }

        require_once(ROOT . '/views/admin_book/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();

        $categoriesList = Category::getCategoriesListAdmin();

        $book = Book::getBookById($id);


        if (isset($_POST['submit'])) {

            $options['name'] = $_POST['name'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['author'] = $_POST['author'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            if (Book::updateBookById($id, $options)) {

                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                   move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/books/{$id}.jpg");
                }
            }

            header("Location: /admin/book");
        }

        require_once(ROOT . '/views/admin_book/update.php');
        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            Book::deleteBookById($id);

            header("Location: /admin/book");
        }

        require_once(ROOT . '/views/admin_book/delete.php');
        return true;
    }

}
