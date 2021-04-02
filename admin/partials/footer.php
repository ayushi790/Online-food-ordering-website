<!-- footer section starts -->
<section id="footer" class="container-fluid">
    <div class="row align-items-center">

        <div class="col-md-4 brand">

            <a href="#" class="logo"><img src="../images/symbol.png" alt=""></a>

            <div class="icons">
                <a href="#" class="fab fa-facebook-square"></a>
                <a href="#" class="fab fa-twitter-square"></a>
                <a href="#" class="fab fa-youtube"></a>
                <a href="#" class="fab fa-pinterest-square"></a>
            </div>

        </div>

        <div class="col-md-4 text-center text-md-left">
            <h1><span>Thanks for visiting!!</span></h1>
        </div>

        <div class="col-md-4 text-center text-md-left letter">
            <h2>newsletter</h2>
            <input type="text">
            <input type="submit" value="subscribe">
        </div>
    </div>
</section>


<!-- footer section ends -->

<script>

    $(document).ready(function () {

        $('.fa-hamburger').click(function () {
        $(this).toggleClass('fa-times');
        $('nav').toggleClass('nav-toggle');
    });

    $('nav ul li a').click(function () {
        $('.fa-hamburger').removeClass('fa-times');
        $('nav').removeClass('nav-toggle');
        });
    });
</script>

</body>
</html>
