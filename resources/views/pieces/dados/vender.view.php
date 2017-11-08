<div class="vender">
    <div class="produto-venda">
        <div class="produtos">
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Codigo</th>
                    <th>Valor</th>
                </tr>
               <?php for( $x=0;$x<10;$x++): ?> 
                <tr>
                    <td>pao</td>
                    <td>ceu</td>
                    <td>R$ 0</td>
                </tr>
                <?php endfor; ?>
            </table>
        </div>
        <div class="input-venda">
            <form action="" method="POST">
                <input type="text" name='produto' placeholder='informe o nome do produto'>
                <button class="btn-blue">Adicionar</button>               
            </form>
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