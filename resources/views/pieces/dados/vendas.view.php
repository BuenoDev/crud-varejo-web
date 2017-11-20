<div class="produtos">
<table>
    <tr>
        <th>Nome</th>
        <th>Codigo</th>
        <th>Valor</th>
        <th>Quantidade</th>
    </tr>
    <?php foreach($data['info'] as $sale):  ?>
    <tr>
        <td><?=$sale['name']?></td>
        <td><?=$sale['code']?></td>
        <td><?=$sale['price']?></td>
        <td><?=$sale['amount']?></td>
    </tr>
    <?php endforeach ; ?>

</table>
</div>