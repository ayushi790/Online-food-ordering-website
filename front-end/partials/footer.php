<!-- footer section starts  -->

<section id="footer" class="container-fluid">

    <div class="row align-items-center">
    
    <div class="col-md-4 brand">
    
    <a href="#" class="logo"><img src="<?php echo SITEURL;?>symbol.png" alt=""></a>
    
    <div class="icons">
        <a href="https://www.facebook.com" class="fab fa-facebook-square"></a>
        <a href="https://twitter.com" class="fab fa-twitter-square"></a>
        <a href="https://www.youtube.com/" class="fab fa-youtube"></a>
        <a href="https://in.pinterest.com" class="fab fa-pinterest-square"></a>
    </div>
    
    </div>
    
    <div class="col-md-4 footer-links">
    <h3>links:</h3>
    <a href="<?php echo SITEURL;?>">home</a>
    <a href="<?php echo SITEURL;?>#dishes">dishes</a>
    <a href="<?php echo SITEURL;?>#about">about</a>
    <a href="<?php echo SITEURL;?>#category">Categories</a>
    <a href="<?php echo SITEURL;?>#contact">contact</a>
    </div>
    
    <div class="col-md-4 text-center text-md-left letter">
    <h2>newsletter</h2>
    <input type="text"><br>
    <input type="submit" value="subscribe">
    </div>
    
    </div>
    
    <h1><span>Copyright © 2021 Ayushi Gupta.</span> All Rights Reserved.</h1>
    
    </section>
    
    <!-- footer section ends  -->

    <!-- script part starts  -->

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

            $('.dot1').click(function () {
                $('.vid1').css('display', 'block');
                $('.vid2').css('display', 'none');
                $('.vid3').css('display', 'none');
            });

            $('.dot2').click(function () {
                $('.vid2').css('display', 'block');
                $('.vid1').css('display', 'none');
                $('.vid3').css('display', 'none');
            });

            $('.dot3').click(function () {
                $('.vid3').css('display', 'block');
                $('.vid1').css('display', 'none');
                $('.vid2').css('display', 'none');
            });

            $(window).on('scroll load', function () {
                if ($(window).scrollTop() > 10) {
                    $('#header').addClass('header-active');
                } else {
                    $('#header').removeClass('header-active');
                }
            });

        });

    </script>

</body>

</html>