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
                <img src="banner1.png" class="d-block w-100" alt="Slider Image 1">
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

    <div class="content-wrapper">
        <div class="container">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="callout" id="callout" style="display:none">
                            <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
                            <span class="message"></span>
                        </div>

                        <!-- Product Listing -->
                        <div class="row">
                            <?php
                            $conn = $pdo->open();
                            try {
                                $stmt = $conn->prepare("SELECT * FROM products");
                                $stmt->execute();
                                foreach ($stmt as $row) {
                                    echo '<div class="col-sm-4">';
                                    echo '<div class="product">';
                                    echo '<img src="images/' . (!empty($row['photo']) ? $row['photo'] : 'noimage.jpg') . '" width="100%" class="zoom" data-magnify-src="images/large-' . $row['photo'] . '">';
                                    echo '<h3>' . $row['name'] . '</h3>';
                                    // echo '<p>Description: ' . $row['description'] . '</p>';
                                    echo '<p>Price: $' . $row['price'] . '</p>';
                                    echo '<a href="product.php?product=' . $row['slug'] . '" class="btn btn-primary btn-flat">View Details</a>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } catch (PDOException $e) {
                                echo "There is some problem in connection: " . $e->getMessage();
                            }
                            $pdo->close();
                            ?>
                        </div>
                        <!-- End Product Listing -->

                    </div>
                    <div class="col-sm-3">
                        <?php include 'includes/sidebar.php'; ?>
                    </div>
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
