<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>

    <div class="content-wrapper">
        <div class="container">

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-9">
                        <h1 class="page-header">YOUR CART</h1>
                        <div class="box box-solid">
                            <div class="box-body">
                                <table id="table" class="table table-bordered">
                                    <thead>
                                        <th></th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th width="20%">Quantity</th>
                                        <th>Subtotal</th>
                                    </thead>
                                    <tbody id="tbody">
                                        <!-- Cart items will be loaded here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       <!-- WhatsApp Inquiry Button -->
<button id='whatsappInquiry' class='btn btn-primary'>
    <i class="fa fa-whatsapp"></i> Inquire via WhatsApp
</button>

                        </div>
                    <div class="col-sm-3">
                        <?php include 'includes/sidebar.php'; ?>
                    </div>
                </div>
            </section>

        </div>
    </div>
    <?php $pdo->close(); ?>
    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
    $( document ).ready(function() {
        var table = document.getElementById('table');
    
});
   
var total = 0;
var cartItems = [];

$(function(){
    $(document).on('click', '.cart_delete', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: 'cart_delete.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                if(!response.error){
                    getDetails();
                    getCart();
                    getTotal();
                }
            }
        });
    });

    $(document).on('click', '.minus', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var qty = $('#qty_'+id).val();
        if(qty>1){
            qty--;
        }
        $('#qty_'+id).val(qty);
        $.ajax({
            type: 'POST',
            url: 'cart_update.php',
            data: {
                id: id,
                qty: qty,
            },
            dataType: 'json',
            success: function(response){
                if(!response.error){
                    getDetails();
                    getCart();
                    getTotal();
                }
            }
        });
    });

    $(document).on('click', '.add', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var qty = $('#qty_'+id).val();
        qty++;
        $('#qty_'+id).val(qty);
        $.ajax({
            type: 'POST',
            url: 'cart_update.php',
            data: {
                id: id,
                qty: qty,
            },
            dataType: 'json',
            success: function(response){
                if(!response.error){
                    getDetails();
                    getCart();
                    getTotal();
                }
            }
        });
    });

    getDetails();
    getTotal();

  // WhatsApp Inquiry Button Click Event
$('#whatsappInquiry').click(function (e) {
    e.preventDefault();

    var self = $(this);
    var div1 = self.parent();
    var div2 = div1.children('div.box.box-solid');
    var div3 = div2.children('div.box-body');
    var table = div3.children('table#table');

    var span = $('#item1 span').text();

    
    console.log(span);
    
    // Check if the cart is empty
    console.log(cartItems.length)
    if (span < 1) {
        alert("Your cart is empty.");
        return;
    }

    var message = "Hello! I have an inquiry about my cart items:\n";

    cartItems.forEach(function (item) {
        message += `- ${item.name}, Price: $${item.price}, Quantity: ${item.qty}, Subtotal: $${item.subtotal}\n`;
    });

    var encodedMessage = encodeURIComponent(message);
    var whatsappURL = "https://wa.me/+254795926709?text=" + encodedMessage;
    window.open(whatsappURL, "_blank");
});

});

function getDetails(){
    $.ajax({
        type: 'POST',
        url: 'cart_details.php',
        dataType: 'json',
        success: function(response){
            $('#tbody').html(response);
            getCart();
        }
    });
}

function getTotal(){
    $.ajax({
        type: 'POST',
        url: 'cart_total.php',
        dataType: 'json',
        success:function(response){
            total = response;
        }
    });
}
</script>
</body>
</html>
