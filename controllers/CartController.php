<?php

class CartController
{

    public function actionAdd($id)
    {
        Cart::addBook($id);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    public function actionAddAjax($id)
    {
        echo Cart::addBook($id);
        return true;
    }
    
    public function actionDelete($id)
    {
        Cart::deleteBook($id);

        header("Location: /cart");
    }

    public function actionIndex()
    {
        $categories = Category::getCategoriesList();
        $authors = Author::getAuthorsList();

        $booksInCart = Cart::getBooks();

        if ($booksInCart) {
            $booksIds = array_keys($booksInCart);

            $books = Book::getBooksByIds($booksIds);

            $totalPrice = Cart::getTotalPrice($books);
        }

        require_once(ROOT . '/views/cart/index.php');
        return true;
    }

    public function actionCheckout()
    {
        $booksInCart = Cart::getBooks();

        if ($booksInCart == false) {
            header("Location: /");
        }

        $categories = Category::getCategoriesList();
        $authors = Author::getAuthorsList();

        $booksIds = array_keys($booksInCart);
        $books = Book::getBooksByIds($booksIds);
        $totalPrice = Cart::getTotalPrice($books);

        $totalQuantity = Cart::countItems();

        $userName = false;
        $userPhone = false;
        $userComment = false;

        $result = false;

        if (!User::isGuest()) {
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
        } else {
            $userId = false;
        }

        if (isset($_POST['submit'])) {
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            $errors = false;

            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }


            if ($errors == false) {
                $result = Order::save($userName, $userPhone, $userComment, $userId, $booksInCart);

                if ($result) {
                    $adminEmail = 'book.library@gmail.ru';
                    $message = '<a href="http://books-library.com/admin/orders">Список заказов</a>';
                    $subject = 'Новый заказ!';
                    mail($adminEmail, $subject, $message);

                    Cart::clear();
                }
            }
        }

        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }

}
