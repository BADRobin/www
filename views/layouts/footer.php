<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>Book</span>-Library</h2>
                        <p>Это — Ваша библиотека!</p>
                    </div>
                </div>






                <div class="col-sm-3">
                    <div class="address">
                        <img src="/template/images/home/map.png" alt="" />
                        <p>Филиалы по всей планете!!! </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2020 Book-Library.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Bryl_Oleg</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="/template/js/jquery.js"></script>
<script src="/template/js/jquery.cycle2.min.js"></script>
<script src="/template/js/jquery.cycle2.carousel.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/price-range.js"></script>
<script src="/template/js/jquery.prettyPhoto.js"></script>
<script src="/template/js/main.js"></script>
<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>

</body>
</html>