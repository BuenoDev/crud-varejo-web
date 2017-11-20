<div class="vender">
    <div class="produto-venda">
        <div class="produtos">
        <table>
        <tr>
            <th>Nome</th>
            <th>Codigo</th>
            <th>Qtd</th> 
            <th>Valor</th>           
        </tr>
        <tbody class="row_table">
            <?php foreach($data['info'] as $product):  ?>
                <tr class="add_cart" data-id="<?=$product['id']?>">
                    <td><?=$product['name']?></td>
                    <td><?=$product['code']?></td>
                    <td><?=$product['amount']?></td>
                    <td><?=$product['price']?></td>
                </tr>
            <?php endforeach ; ?>
        </tbody>
        

    </table>
        </div>
        <div class="input-venda">
            <input class="search_product" type="text" name='produto' placeholder='informe o nome do produto'>
            <span class="add_loader"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></span>              
        </div>
    </div>   
    <div class="resumo-venda">
        <span><i class='fa fa-opencart'></i> Resumo Vendas</span>
        <div class="tabela">
            <tbody class="vendas">
            <table class="resumo_tabela">
                    
            </table>
            </tbody>
            
        </div>   
        <div class="total">
            <span class="val_total">R$ 00.00</span>
        </div>
        <div class="buttons">
            <button class="btn-red limpar">Limpar</button>
            <button class="btn-green finalize">Finalizar</button>
        </div>
    </div>

</div>

<div class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="modal-close"><i class="fa fa-close"></i></span>
            <h2>Quantidade</h2>
        </div>
        <div class="modal-body add_amount">
           <form class='amout_vendas'>
                <input type="number" name="amount" class="amout" min="1">
                <button class="btn-blue">adicionar</button>
           </form>
                
            
        </div>
    </div>
</div>