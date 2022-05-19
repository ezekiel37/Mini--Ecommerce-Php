$(document).ready(function() {
    //handles product changes
    $(".Book, .Furniture").hide()
    $("#productType").on("change", function() {

        $(".Dvd, .Furniture, .Book").hide()
        $("." + $(this).val()).show()
    });
    //////////////////////////////////
    $("input").click(function() {
        $("small").hide();
    });

    //cancel button 
    $('#cancel').on("click", function() {

        location.href = "./"
    })
    //submit function
    $('#product_form').on("submit", function(e) {

        e.preventDefault();
        
        var flag = true;
        var skuflag = $('#skuflag').text();
        // validations
        if ($('#sku').val() == "") {
            $('#skuValid').text("please enter sku");
            flag = false
            $("#skuValid").show();
        } else {
            $("#skuvalid").hide();
        }
        // check sku uniqueness and save product


        var Data = {
            sku: $('#sku').val()
        }
        $.ajax({
                type: "POST",
                url: '/id',
                data: Data,
            })
            .done(function(response) {
                if (response == 1) {
                    $('#skuValid').text("sku must be unique");
                    $("#skuValid").show();
                } else {
                saveProduct();
                }

            })
            .fail(function() {


            });
        // end sku uniqueness

        //name validation
        if (!$('#name').val()) {
            $('#nameValid').text("please enter  name");
            $("#nameValid").show();
            flag = false
        } else {
            $('#nameValid').hide();
        }
        //end name validation

        function checkerror(product) {

            if ($('#' + product).is(':visible') && $('#' + product).val() == '') {
                $('#' + product + 'Valid').text("please enter" + ' ' + product);
                $('#' + product + 'Valid').show();
                flag = false
            } else if ($('#' + product).is(':visible') && !parseFloat($("#" + product).val())) {
                $('#' + product + 'Valid').text("please enter an amount in $");
                $('#' + product + 'Valid').show();
                flag = false
            } else {
                $('#' + product + 'Valid').hide();
            }

        }
        arr = ['price', 'size', 'height', 'width', 'length', 'weight'];
        $(arr).each(function(index) {

            checkerror(arr[index]);
        });
        ////////////////////////////////

        function saveProduct() {
            if (flag) {

                $.ajax({
                        type: "POST",
                        url: '/addproduct',
                        data: $('#product_form').serialize(),
                    })
                    .done(function(success) {
                        location.href = "./"

                    })
                    .fail(function() {

                    });
            }
        }
    });
    //end submit function

});