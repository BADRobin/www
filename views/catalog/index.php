<?php include ROOT . '/views/layouts/header.php'; ?>
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">

                                <h1><span>Book</span>-LIBRARY</h1>
                                <h2>Библиотека — дом радости и знаний</h2>
                                <p>Я не знаю человека кто хотя бы в жизни раз не пришел в библиотеку,
                                    Не порадовал бы нас. </p>

                                <div class="col-sm-6">
                                    <img src="/template/images/home/1.jpg" class="girl img-responsive" alt="" />
                                    <img src="/template/images/home/pricing.png"  class="pricing" alt="" />
                                </div>
                            </div>
                            <div class="item">

                                <h1><span>Book</span>-LIBRARY</h1>
                                <h2>Ходить в библиотеку — повысить свой статус!</h2>
                                <p>Читаь-это мудро
                                    Читать-это модно. </p>

                                <div class="col-sm-6">
                                    <img src="/template/images/home/2.jpg" class="girl img-responsive" alt="" />
                                    <img src="/template/images/home/pricing.png"  class="pricing" alt="" />
                                </div>
                            </div>

                            <div class="item">

                                <h1><span>Book</span>-LIBRARY</h1>
                                <h2>Брось мышку! Возьми книжку!</h2>
                                <p>Премьеры книг, обсуждения,
                                    Дискуссии, выставки. </p>

                                <div class="col-sm-6">
                                    <img src="/template/images/home/3.jpg" class="girl img-responsive" alt="" />
                                    <img src="/template/images/home/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->

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
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>
                    
                    <?php foreach ($latestBooks as $book): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <div class = "img-in">
                                        <img src="<?php echo Book::getImage($book['id']); ?>" alt="" />
                                        </div>
                                        <h2>$<?php echo $book['price'];?></h2>
                                        <p>
                                            <a href="/book/<?php echo $book['id'];?>">
                                                <?php echo $book['name'];?>
                                            </a>
                                        </p>
                                        
                                        <a href="#" data-id="<?php echo $book['id'];?>"
                                           class="btn btn-default add-to-cart">
                                        </a>
                                    </div>
                                    <?php if ($book['is_new']): ?>
                                        <img src="/template/images/home/new.png" class="new" alt="" />
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>                   

                </div><!--features_items-->


            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>