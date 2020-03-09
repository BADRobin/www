<?php
class Author
{

    public static function getAuthorsList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT id, name FROM author ORDER BY id ASC');

        $i = 0;
        $authorList = array();
        while ($row = $result->fetch()) {
            $authorList[$i]['id'] = $row['id'];
            $authorList[$i]['name'] = $row['name'];
            $i++;
        }
        return $authorList;
    }
    public static function getAuthorsListAdmin()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT id, name FROM author ORDER BY id asc');

        $authorList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $authorList[$i]['id'] = $row['id'];
            $authorList[$i]['name'] = $row['name'];
            $i++;
        }
        return $authorList;
    }

    public static function deleteAuthorById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM author WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateAuthorById($id, $name)
    {
        $db = Db::getConnection();

        $sql = "UPDATE author
            SET 
                name = :name 

            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        return $result->execute();
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

    public static function createAuthor($name)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO author (name) '
            . 'VALUES (:name)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        return $result->execute();
    }

}
