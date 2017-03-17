$( document ).ready(function() {

    var cart = [];
    $( '.submitToCart' ).click(function() {
        var productId = $( this ).attr('data');
        var productAmount = $('#'+productId).val();
        var productName = $( this ).attr('name');
        var productPriceinkM = $( this ).attr('price_ink_moms');
        var productPrice = $( this ).attr('price');
        var productVat = $( this ).attr('vat');
        var productMomsSum = $( this ).attr('moms');
        var product = 
            {
                id: productId, 
                Name: productName, 
                Amount: productAmount, 
                Price: productPriceinkM, 
                Priceexklmoms: productPrice, 
                Vat: productVat,
                Vatsum: productMomsSum
            };
            cart = product;
            var addToSessions = addToSession(cart, productId);
            showCart();
    });

    $( '.bigcart' ).click(function() {
        showBigCart();
    });
    $( '.remove' ).click(function() {
        var productId = $( this ).attr('code');
        console.log(productId);
        $.ajax({
            url: "http://localhost:8000/remove/" + productId,
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {data : productId},
            success:function(data){
                console.log(data);
                $( "clearfix" ).addClass( "open" );
            },error:function(){ 
                console.log("Error");
            }
        }); 
        showBigCart();
    });
    $( '.removeone' ).click(function() {
        var productId = $( this ).attr('code');
        console.log(productId);
        $.ajax({
            url: "http://localhost:8000/update/" + productId,
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {update : 'removeone'},
            success:function(data){
                console.log(data);
                $( "clearfix" ).addClass( "open" );
            },error:function(){ 
                console.log("Error");
            }
        }); 
    });
    $( '.addone' ).click(function() {
        var productId = $( this ).attr('code');
        console.log(productId);
        $.ajax({
            url: "http://localhost:8000/update/" + productId,
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {update : 'addone'},
            success:function(data){
                console.log(data);
                $( "clearfix" ).addClass( "open" );
            },error:function(){ 
                console.log("Error");
            }
        }); 
    });
    function addToSession(products, id){
        var url = $(this).attr("data-link");
        $.ajax({
            url: "http://localhost:8000/store",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {data : products, id : id},
            success:function(data){
                console.log(data);
                $( "clearfix" ).addClass( "open" );
            },error:function(){ 
                console.log("Error");
            }
        }); 
    }
    function showCart(){
        $(".carten").load('/cartwidget');
    };
    function showBigCart(){
        $(".modal-body").load('/cart');
    };
});  

