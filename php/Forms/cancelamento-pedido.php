<style>
    #body-quantidade-produto {
        zoom: 0.75;
    }
</style>
<div id="body-quantidade-produto">
    <form class="row g-3" id="form-cancelamento-pedido">
        <div class="col-md-1">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">#</span>
                <input type="text" class="form-control" name="cod_pedido" id="cod_pedido" disabled>
            </div>
        </div>
        <div class="col-md-12">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Observação</span>
                <textarea type="text" class="form-control" rows="3" name="observacao_cancelamento" id="observacao_cancelamento"></textarea>
            </div>
        </div>
        <div class="col-12">
            <button type="button" class="btn btn-primary" onclick="Salvar_Cancelar_Pedido()">Salvar</button>
        </div>
    </form>
</div>