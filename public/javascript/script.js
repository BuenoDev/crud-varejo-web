var tempdata = [];
var controle = 0;
var backup;
var update=true;
var max;
var num=0;

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
        if(controle){
            if(update){
                tempdata.splice(num, 1);z
            }else{
                tempdata.splice(num,1,backup);
            }
            controle=false;
        }
    });
    $('.amout_vendas').submit(function(){
        event.preventDefault();
        let temptable;
        let tabletd;
        let table= $('.resumo_tabela'); 
        let val=$('.amout').val();
        let total= 0;
            $(this).parents('.modal').slideUp();
            if(val){
                console.log(num)
                tempdata[num].amount=val; 
            }
               for(var x=0;x<tempdata.length;x++){
                    temptable += '<tr class="add_cart" data-id='+ tempdata[x].id +'>' +
                    '<td>'+ tempdata[x].name +'</td>' +
                    '<td>'+ tempdata[x].amount +'</td>'+
                    '<td>'+ 'R$'+ tempdata[x].price * tempdata[x].amount +'</td>'+
                    '</tr>';
                    total += (tempdata[x].price * tempdata[x].amount);
                }
            $('.val_total').text("R$: "+total)
            
            
            table.html(temptable);
        
        
    });

    $('.limpar').click(function(){
        tempdata=[];
        $('.val_total').text("R$ 00.00");
        $('.resumo_tabela').html('');
    });

    $('.finalize').click(function(){
        if(tempdata.length>0){
            for(var z=0;z<tempdata.length;z++){
                var data={id: tempdata[z].id, name:tempdata[z].name, price:tempdata[z].price, amount: tempdata[z].amount, code:tempdata[z].code}
                $.ajax({
                    url: '/sale',
                    data: data,
                    type: 'POST',
                    success: function(){
                        location.href = "/sell";
                    }
                });
            }
            tempdata=[];
            temptable=[];
        }
         
    });

});

$(document).on('click', '.add_cart', 
    function(){
        $('.modal').slideDown(); 
        var e = $(this);
        var data = {id: e.data('id')}
        
        $.ajax({
            url: '/product/listbyid',
            data: data,
            type: 'POST',
            dataType: 'json',
            success: function(response){
                update=true;
                $('.amout').attr('max',response[0].amount);
                console.log($('.amout').attr('max'));
                        for(var x=0;x<tempdata.length;x++){
                            if(tempdata[x].id==response[0].id){
                                update=false;
                                num=x;
                                break;
                            }else{
                                num=tempdata.length;
                            }
                        }
                    if(update){
                        backup = tempdata.push(response[0]);
                        console.log('novo elemento');
                    }
                    controle=true;
            }
        });
 });


