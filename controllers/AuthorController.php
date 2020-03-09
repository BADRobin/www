<?php


class AuthorController
{

    public function actionView($authorId)
    {
        $categories = Category::getCategoriesList();
        $authors = Author::getAuthorsList();


        $author= Author::getAuthorById($authorId);

        require_once(ROOT . '/views/book/view.php');
        return true;
    }

}