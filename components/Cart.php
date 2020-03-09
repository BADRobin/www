<?php

class Cart
{

    public static function addBook($id)
    {
        $id = intval($id);
        $booksInCart = array();

        if (isset($_SESSION['books'])) {
            $booksInCart = $_SESSION['books'];
        }
        if (array_key_exists($id, $booksInCart)) {
            $booksInCart[$id] ++;
        } else {
            $booksInCart[$id] = 1;
        }

        $_SESSION['books'] = $booksInCart;

        return self::countItems();
    }
    public static function countItems()
    {
        if (isset($_SESSION['books'])) {
            $count = 0;
            foreach ($_SESSION['books'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }
    public static function getBooks()
    {
        if (isset($_SESSION['books'])) {
            return $_SESSION['books'];
        }
        return false;
    }
    public static function getTotalPrice($books)
    {
        $booksInCart = self::getBooks();

        $total = 0;
        if ($booksInCart) {
            foreach ($books as $item) {
                $total += $item['price'] * $booksInCart[$item['id']];
            }
        }

        return $total;
    }

    /**
     * Очищает корзину
     */
    public static function clear()
    {
        if (isset($_SESSION['books'])) {
            unset($_SESSION['books']);
        }
    }

    public static function deleteBook($id)
    {
        $booksInCart = self::getBooks();

        unset($booksInCart[$id]);

        $_SESSION['books'] = $booksInCart;
    }

}
