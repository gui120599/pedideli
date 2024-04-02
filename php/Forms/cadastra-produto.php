<h2 style="text-align: center;">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box2" viewBox="0 0 16 16">
        <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3L2.95.4ZM7.5 1H3.75L1.5 4h6V1Zm1 0v3h6l-2.25-3H8.5ZM15 5H1v10h14V5Z" />
    </svg> Cadastro de Produtos
</h2>
<form class="row g-2" id="form-produto">
    <div class="col-md-8">
        <div class="input-group mb-2">
            <span class="input-group-text" id="basic-addon1">Cod.</span>
            <input type="text" class="form-control" name="cod_produto" id="cod_produto">
        </div>
    </div>
    <div class="col-md-8">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Descrição</span>
            <input type="text" class="form-control" placeholder="Descrição do Produto" name="descricao_produto" id="descricao_produto">
        </div>
    </div>
    <div class="col-md-5">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Preço de custo R$</span>
            <input type="text" class="form-control" autocomplete="off" placeholder="00000,00" name="preco_custo_produto" id="preco_custo_produto">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Preço de venda R$</span>
            <input type="text" class="form-control" autocomplete="off" placeholder="00000,00" name="preco_venda_produto" id="preco_venda_produto">
        </div>
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Categoria</span>
            <select  class="form-select" name="categoria" id="categoria">
            </select>
        </div>
        <div class="col-md-5">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Status</span>
            <select  class="form-select" name="ativo">
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
        </div>
    </div>
    </div>
    <div class="col-12">
        <button type="button" class="btn btn-primary" onclick="Salvar_Produto()">Salvar</button>
    </div>
</form>