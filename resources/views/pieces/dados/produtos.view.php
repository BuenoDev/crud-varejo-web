<?php if(isset($_SESSION['insert'])): ?>
    <div class="container">
        <div class="alert alert-success"><?=$_SESSION['insert']?></div>
    </div>
<?php unset($_SESSION['insert']); endif;?>
    
<div class="produtos">
    <table>
        <tr>
            <th>Nome</th>
            <th>Codigo</th>
            <th>Valor</th>
            <th>Quantidade</th>
            <th colspan="2">Ação</th>
        </tr>
        <?php foreach($data['info'] as $product):  ?>
        <tr>
            <td><?=$product['name']?></td>
            <td><?=$product['code']?></td>
            <td><?=$product['price']?></td>
            <td><?=$product['amount']?></td>
            <td class="text-align">
                <a href="/product/edit/<?=$product['id']?>"><i class="fa fa-edit"></i></a></td>
            <td class="text-align">
                <form action="/product/delete/<?=$product['id']?>" method="POST">    
                    <button class="btn-fa"><i class="fa fa-trash"></i></button>
                </form>  
            </td>
        </tr>
        <?php endforeach ; ?>

    </table>
</div>