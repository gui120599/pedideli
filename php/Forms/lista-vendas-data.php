<style>
    #tabela-vendas-data {
        zoom: 0.55;
    }

    #tabela-vendas-data::-webkit-scrollbar {
        width: 10px;
        padding: 5px;
    }

    #tabela-vendas-data::-webkit-scrollbar-thumb {
        background-color: #6c757d;
        border-radius: 5px;
    }

    .table th {
        position: sticky;
        top: 0;
        background-color: white;
        text-align: center;
    }

    .table td {
        text-align: center;
    }
    #valores label{
        font-size: 20px;
        margin: 5px;
    }
    #data{
        margin: 10px;
    }
</style>
<div class="col-md-12" id="tabela-vendas-data">

</div>
<div class="col-md-4" id="data">
    
</div>
<div class="col-md-12" id="valores">
    
</div>

<!-- Modal buscar pedidos abertos -->
<div class="modal fade" id="modal-vendas-data" tabindex="-1" aria-labelledby="modal-vendas-data" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titulo-vendas-data">
                    Pedidos Abertos
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-fechar-modal-pedido-abertos"></button>
            </div>
            <div class="modal-body" id="body-vendas-data">
                ...
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>-->
        </div>
    </div>
</div>