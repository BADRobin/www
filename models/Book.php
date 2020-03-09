<?php
class Book
{

    const SHOW_BY_DEFAULT = 6;

    public static function getLatestBooks($count = self::SHOW_BY_DEFAULT)
    {
        $db = Db::getConnection();

        $sql = 'SELECT id, name, price, is_new FROM book '
                . 'WHERE status = "1" ORDER BY id DESC '
                . 'LIMIT :count';

        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $result->execute();

        $i = 0;
        $booksList = array();
        while ($row = $result->fetch()) {
            $booksList[$i]['id'] = $row['id'];
            $booksList[$i]['name'] = $row['name'];
            $booksList[$i]['price'] = $row['price'];
            $booksList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $booksList;
    }

    public static function getBooksListByCategory($categoryId, $page = 1)
    {
        $limit = Book::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        $sql = 'SELECT id, name, price, is_new FROM book '
                . 'WHERE status = 1 AND category_id = :category_id '
                . 'ORDER BY id ASC LIMIT :limit OFFSET :offset';

        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        $result->execute();

        $i = 0;
        $books = array();
        while ($row = $result->fetch()) {
            $books[$i]['id'] = $row['id'];
            $books[$i]['name'] = $row['name'];
            $books[$i]['price'] = $row['price'];
            $books[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $books;
    }
    public static function getBooksListByAuthor($authorId, $page = 1)
    {
        $limit = Book::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        $sql = 'SELECT id, name, price, is_new FROM book '
            . 'WHERE status = 1 AND author = :author '
            . 'ORDER BY id ASC LIMIT :limit OFFSET :offset';

        $result = $db->prepare($sql);
        $result->bindParam(':author', $authorId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        $result->execute();

        $i = 0;
        $books = array();
        while ($row = $result->fetch()) {
            $books[$i]['id'] = $row['id'];
            $books[$i]['name'] = $row['name'];
            $books[$i]['price'] = $row['price'];
            $books[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $books;
    }

    public static function getBookById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM book WHERE book.id = :id';
//        $sql = 'SELECT book.id, book.price, book.name, book.availability, book.author, book.is_new, book.description, author.name FROM book, author WHERE book.author = author.name ';


        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }

    public static function getAuthorById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM author WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }

    public static function getTotalBooksInCategory($categoryId)
    {
        $db = Db::getConnection();

        $sql = 'SELECT count(id) AS count FROM book WHERE status="1" AND category_id = :category_id';

        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);

        $result->execute();

        $row = $result->fetch();
        return $row['count'];
    }
    public static function getTotalBooksInAuthor($authorId)
    {
        $db = Db::getConnection();

        $sql = 'SELECT count(id) AS count FROM book WHERE status="1" AND author = :author';

        $result = $db->prepare($sql);
        $result->bindParam(':author', $authorId, PDO::PARAM_INT);

        $result->execute();

        $row = $result->fetch();
        return $row['count'];
    }

    public static function getBooksByIds($idsArray)
    {
        $db = Db::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM book WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        $books = array();
        while ($row = $result->fetch()) {
            $books[$i]['id'] = $row['id'];
            $books[$i]['name'] = $row['name'];
            $books[$i]['price'] = $row['price'];
            $i++;
        }
        return $books;
    }

    public static function getRecommendedBooks()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT id, name, price, is_new FROM book '
                . 'WHERE status = "1" AND is_recommended = "1" '
                . 'ORDER BY id DESC');
        $i = 0;
        $booksList = array();
        while ($row = $result->fetch()) {
            $booksList[$i]['id'] = $row['id'];
            $booksList[$i]['name'] = $row['name'];
            $booksList[$i]['price'] = $row['price'];
            $booksList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $booksList;
    }

    public static function getBooksList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT id, name, price FROM book ORDER BY id ASC');
        $booksList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $booksList[$i]['id'] = $row['id'];
            $booksList[$i]['name'] = $row['name'];
            $booksList[$i]['price'] = $row['price'];
            $i++;
        }
        return $booksList;
    }

    public static function deleteBookById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM book WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateBookById($id, $options)
    {
        $db = Db::getConnection();

        $sql = "UPDATE book
            SET 
                name = :name, 
                price = :price, 
                category_id = :category_id, 
                author = :author, 
                availability = :availability, 
                description = :description, 
                is_new = :is_new, 
                is_recommended = :is_recommended, 
                status = :status
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':author', $options['author'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    public static function createBook($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO book '
                . '(name, price, category_id, author, availability,'
                . 'description, is_new, is_recommended, status)'
                . 'VALUES '
                . '(:name, :price, :category_id, :author, :availability,'
                . ':description, :is_new, :is_recommended, :status)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':author', $options['author'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function getAvailabilityText($availability)
    {
        switch ($availability) {
            case '1':
                return 'В наличии';
                break;
            case '0':
                return 'Под заказ';
                break;
        }
    }

    public static function getImage($id)
    {
        $noImage = 'no-image.jpg';

        $path = '/upload/images/books/';

        $pathToBookImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToBookImage)) {
            return $pathToBookImage;
        }

        return $path . $noImage;
    }

}
