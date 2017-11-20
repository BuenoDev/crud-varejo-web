<div class="container">
    <form class="form-default" action="<?= !@$data['info'] ? '/product/create' : '/product/update/' .  @$data['info'][0]['id']; ?>" method="POST">
        <div class="input-group">
            <input type="text" class="input-control" name="name" value="<?= @$data['info'][0]['name']; ?>" placeholder="Nome do produto">
        </div>
        <div class="input-group">
            <input type="text" class="input-control" name="code" value="<?= @$data['info'][0]['code'] ?? generate_code()?>" placeholder="Código" readonly="true">
        </div>
        <div class="input-group">
            <input type="text" class="input-control" name="price" value="<?= @$data['info'][0]['price']; ?>" placeholder="Preço">
        </div>
        <div class="input-group">
            <input type="number" class="input-control" name="amount" value="<?= @$data['info'][0]['amount']; ?>" placeholder="Quantidade">
        </div>
        <div class="input-group text-align">
            <button class="btn-green btn-big"><?= !@$data['info'] ? 'Cadastrar' : 'Atualizar'; ?></button>
        </div>
    </form>
</div>