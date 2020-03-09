<?php

class CatalogController
{
    public function actionIndex()
    {
        $categories = Category::getCategoriesList();
        $authors = Author::getAuthorsList();

        $latestBooks = Book::getLatestBooks(12);

        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }

    public function actionCategory($categoryId,  $page = 1)
    {
        $categories = Category::getCategoriesList();
        $authors = Author::getAuthorsList();
        $categoryBooks = Book::getBooksListByCategory($categoryId, $page);
        $total = Book::getTotalBooksInCategory($categoryId);

        $pagination = new Pagination($total, $page, Book::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/category.php');
        return true;
    }
    public function actionAuthor( $authorId, $page = 1)
    {
        $authors = Author::getAuthorsList();
        $categories = Category::getCategoriesList();
        $authorBooks = Book::getBooksListByAuthor($authorId, $page);
        $total = Book::getTotalBooksInAuthor($authorId);

        $pagination = new Pagination($total, $page, Book::SHOW_BY_DEFAULT, 'page-');
       require_once(ROOT . '/views/catalog/author.php');
        return true;
    }

}
