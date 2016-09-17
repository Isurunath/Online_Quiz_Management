<!DOCTYPE html>
<html>

<body>

<!-- banner -->
<div class="banner">
    <div class="container">
        <script src="<?php echo base_url(); ?>js/responsiveslides.min.js"></script>
        <script>
            // You can also use "$(window).load(function() {"
            $(function () {
                // Slideshow 4
                $("#slider3").responsiveSlides({
                    auto: true,
                    pager: true,
                    nav: false,
                    speed: 500,
                    namespace: "callbacks",
                    before: function () {
                        $('.events').append("<li>before event fired.</li>");
                    },
                    after: function () {
                        $('.events').append("<li>after event fired.</li>");
                    }
                });
            });
        </script>

        <div  id="top" class="callbacks_container">
            <ul class="rslides" id="slider3">
                <li>
                    <div class="banner-info">
                        <h3>You can download your assignments here</h3>
                    </div>
                </li>
                <li>
                    <div class="banner-info">
                        <h3>Please submit your completed assignments on or before the relevant date</h3>
                    </div>
                </li>
                <li>
                    <div class="banner-info">
                        <h3>You can download your assignments here</h3>
                    </div>
                </li>
                <li>
                    <div class="banner-info">
                        <h3><b>Please submit your completed assignments on or before the relevant date</b></h3>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="banner-bottom">
    <h2 class="tittle">WELCOME TO Tryit</h2>
</div>

</body>
</html>
