<h2 style="text-align: center;">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box2" viewBox="0 0 16 16">
        <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3L2.95.4ZM7.5 1H3.75L1.5 4h6V1Zm1 0v3h6l-2.25-3H8.5ZM15 5H1v10h14V5Z" />
    </svg> Confirmar Pedido?
</h2>
<form class="row g-3" id="form-confirmar-pedido">
    <div class="col-md-2">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Cod.</span>
            <input type="text" class="form-control" name="cod_pedido" id="cod_pedido" disabled>
        </div>
    </div>
    <div class="col-md-7">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Valor Total Pedido</span>
            <input type="text" class="form-control" name="valor_total_pedido" id="valor_total_pedido" disabled>
        </div>
    </div>
    <div class="col-12">
        <button type="button" class="btn btn-primary" onclick="Salvar_Pedido_Venda()">Salvar</button>
    </div>
</form>