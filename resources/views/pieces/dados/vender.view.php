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
            <table>
                    <?php for( $x=0;$x<100;$x++): ?> 
                        <tr>
                            <td>pao</td>
                            <td>R$ 0</td>
                            <td><a href=""><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php endfor; ?>
            </table>
        </div>   
        <div class="total">
            <span>TOTAL:</span>
            <span>R$ 00,00</span>
        </div>
        <div class="buttons">
            <button class="btn-red">Limpar</button>
            <button class="btn-green">Finalizar</button>
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
            <input type="number" name="amount">
            <button class="btn-blue">adicionar</button>
        </div>
    </div>
</div>