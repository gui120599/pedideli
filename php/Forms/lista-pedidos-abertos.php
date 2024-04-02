<style>
    #tabela-pedidos-abertos{
        zoom: 0.55;
    }
    #tabela-pedidos-abertos::-webkit-scrollbar {
        width: 10px;
        padding: 5px;
    }

    #tabela-pedidos-abertos::-webkit-scrollbar-thumb {
        background-color: #6c757d;
        border-radius: 5px;
    }
    .table th {
        position: sticky;
        top: 0;
        background-color: white;
        text-align: center;
    }
    .table td{
        text-align: center;
    }
</style>
<div class="col-md-12" id="tabela-pedidos-abertos">
    
</div>

<!-- Modal buscar pedidos abertos -->
<div class="modal fade" id="modal-pedidos-abertos" tabindex="-1" aria-labelledby="modal-pedidos-abertos" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titulo-pedidos-abertos">
                     Pedidos Abertos
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-fechar-modal-pedido-abertos"></button>
            </div>
            <div class="modal-body" id="body-pedidos-abertos">
                ...
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>-->
        </div>
    </div>
</div>