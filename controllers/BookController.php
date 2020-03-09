<?php

class BookController
{

    public function actionView($bookId)
    {
        $categories = Category::getCategoriesList();
        $authors = Author::getAuthorsList();


        $book = Book::getBookById($bookId);

        require_once(ROOT . '/views/book/view.php');
        return true;
    }

}
