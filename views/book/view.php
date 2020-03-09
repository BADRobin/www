<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id']; ?>">
                                            <?php echo $categoryItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <h2>Авторы</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($authors as $authorItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/author/<?php echo $authorItem['id']; ?>">
                                            <?php echo $authorItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">

                                <img src="<?php echo Book::getImage($book['id']); ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->

                                <?php if ($book['is_new']): ?>
                                    <img src="/template/images/product-details/new.jpg" class="newarrival" alt="" />
                                <?php endif; ?>

                                <h2><?php echo $book['name']; ?></h2>
                                <span>
                                    <span>US $<?php echo $book['price']; ?></span>
                                    <a href="#" data-id="<?php echo $book['id']; ?>"
                                       class="btn btn-default add-to-cart">

                                        <i class="fa fa-shopping-cart"></i>В корзину
                                    </a>
                                </span>
                                <p><b>Наличие:</b> <?php echo Book::getAvailabilityText($book['availability']); ?></p>
                                <b>Автор:</b><a href="/author/<?php echo $authorItem['id']; ?>"> <?php echo $authorItem['name']; ?></a></p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">                                
                        <div class="col-sm-12">
                            <br/>
                            <h5>Описание товара</h5>
                            <?php echo $book['description']; ?>
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>