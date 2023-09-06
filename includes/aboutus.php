<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="wrapper">
    <?php include 'includes/navbar.php'; ?>

    <!-- Add the slider container just below the navbar -->
    <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <!-- Add your slider items here -->
            <div class="carousel-item active">
                <img src="images/slider1.jpg" class="d-block w-100" alt="Slider Image 1">
            </div>
            <div class="carousel-item">
                <img src="images/slider2.jpg" class="d-block w-100" alt="Slider Image 2">
            </div>
            <div class="carousel-item">
                <img src="images/slider3.jpg" class="d-block w-100" alt="Slider Image 3">
            </div>
        </div>
        <!-- Add navigation buttons (optional) -->
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- About Us Section -->
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel dui eu arcu gravida viverra. Nulla facilisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In nec justo eu magna fermentum bibendum at non turpis.</p>
                    <p>Nunc euismod libero in neque bibendum, id tempor metus bibendum. Sed condimentum leo vitae dapibus. Sed id libero in lorem tincidunt suscipit vel sit amet sapien. Nam ac ultrices nisi. Proin nec purus a nulla fermentum ultrices.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Section -->

    <div class="content-wrapper">
        <div class="container">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- Rest of your content -->
                </div>
            </section>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
    $(function(){
        $('#add').click(function(e){
            e.preventDefault();
            var quantity = $('#quantity').val();
            quantity++;
            $('#quantity').val(quantity);
        });
        $('#minus').click(function(e){
            e.preventDefault();
            var quantity = $('#quantity').val();
            if(quantity > 1){
                quantity--;
            }
            $('#quantity').val(quantity);
        });
    });
</script>
</body>
</html>
