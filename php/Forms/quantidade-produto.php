<style>
    #body-quantidade-produto {
        zoom: 0.75;
    }
</style>
<div id="body-quantidade-produto">
    <form class="row g-3" id="form-alterar-produto-pedido">
        <div class="col-md-1">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">#</span>
                <input type="text" class="form-control" name="cod_produto" id="cod_produto" disabled>
            </div>
        </div>
        <div class="col-md-5">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Descrição do Produto</span>
                <input type="text" class="form-control" name="descricao_produto" id="descricao_produto" disabled>
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Preço de venda R$</span>
                <input type="text" class="form-control" autocomplete="off" placeholder="00000,00" name="preco_venda_produto" id="preco_venda_produto" disabled>
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Valor Total R$</span>
                <input type="text" class="form-control" autocomplete="off" placeholder="00000,00" name="valor_total_produto" id="valor_total_produto" disabled>
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Quantidade</span>
                <input type="number" class="form-control" name="quantidade_produto" id="quantidade_produto" onkeyup="Somar_Total_Produto()" onchange="Somar_Total_Produto()">
            </div>
        </div>
        <div class="col-md-12">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Observação</span>
                <textarea type="text" class="form-control" rows="3" name="observacao_produto" id="observacao_produto"></textarea>
            </div>
        </div>
        <div class="col-12">
            <button type="button" class="btn btn-primary" onclick="Salvar_Produto_Pedido()">Salvar</button>
        </div>
    </form>
</div>