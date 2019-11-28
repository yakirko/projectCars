$('.alert').delay(3000).slideUp();



$('.add-to-cart').on('click',function(){

        
    //  console.log($(this).data('id'));

    $.ajax({
        url: BASE_URL+'shop/add-to-cart',
        type: 'GET',
        dataType: 'html',
        data: {
            pid: $(this).data('id')
        },
        success: function(res){
                 window.location.reload();
        }
    });
    

});