<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление товарами</li>
                </ol>
            </div>

            <a href="/admin/book/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>
            
            <h4>Список товаров</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID товара</th>
                    <th>Название книги</th>
                    <th>Цена</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($booksList as $book): ?>
                    <tr>
                        <td><?php echo $book['id']; ?></td>
                        <td><?php echo $book['name']; ?></td>
                        <td><?php echo $book['price']; ?></td>
                        <td><a href="/admin/book/update/<?php echo $book['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/book/delete/<?php echo $book['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

