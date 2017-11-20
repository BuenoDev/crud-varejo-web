$(function(){

    $('.search_product').keyup(function(){
        var e = $(this);
        var data = {name: e.val()}
        $.ajax({
            url: '/product/list',
            data: data,
            type: 'POST',
            dataType: 'json',
            beforeSend: function(){
                $('.add_loader').show();
            }, 
            success: function(response){
                
                let tbody = $('.row_table');
                let result = '';
                for(var i = 0; i < response.length; i++){
                    result += '<tr class="add_cart" data-id="'+ response[i].id +'">' +
                    '<td>'+ response[i].name +'</td>' +
                    '<td>'+ response[i].code +'</td>'+
                    '<td>'+ response[i].amount +'</td>'+
                    '<td>'+ response[i].price +'</td>'+
                    '</tr>';
                }
                if(response){
                    tbody.html(result);                    
                }else{
                    tbody.html('');    
                }
                $('.add_loader').hide();
            }
        });
    });

    $('.modal-close').click(function(){
        $(this).parents('.modal').slideUp();
    });
});


function add_cart(){
   $('.modal').slideDown(); 
}


$(document).on('click', '.add_cart', add_cart);