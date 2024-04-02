<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function() {
        $("#opcao-pagamento").change(function() {
            var pagamento = null;
            var checkeds = new Array();
            $("input[name='btncheck-opcao-pagamento[]']:checked").each(function() {
                checkeds.push($(this).val());
            });
            i = 0;
            checkeds.forEach(function(e) {
                if (i == 0) {
                    pagamento = e;
                }
                if (i >= 1) {
                    pagamento = pagamento + ' + ' + e;
                }
                i++;
            })
            $("#descricao_pagamento").val(pagamento);
            console.log(pagamento);
        });
    });
</script>
<style>
    #tabela-produtos-pedido {
        height: 60vh;
        overflow-x: auto;
        background-color: #6c757d;
        border-radius: 10px;
    }

    #tabela-produtos-pedido::-webkit-scrollbar {
        width: 6px;
        padding: 5px;
    }

    #tabela-produtos-pedido::-webkit-scrollbar-thumb {
        background-color: #6c757d;
        border-radius: 5px;
    }

    .table th {
        position: sticky;
        top: 0;
        background-color: white;
    }
</style>
<h2 style="text-align: center;">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
        <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
        <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
    </svg> Novo Pedido
</h2>

<form class="row" id="form-novo-pedido">
    <div class="col-12 col-md-6">
        <div class="row">
            <div class="col-md-3">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Cod.</span>
                    <input type="text" class="form-control" name="cod_pedido" id="cod_pedido" disabled="true">
                </div>
            </div>
            <div class="col-md-3 d-none">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Cod. Cliente</span>
                    <input type="text" class="form-control" name="cod_cliente" id="cod_cliente" disabled="true">
                </div>
            </div>
            <div class="col-md-9">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Nome Cliente</span>
                    <input type="text" class="form-control" name="nome_cliente" id="nome_cliente" disabled="true">
                    <!-- Button modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-buscar-cliente" id="btn-buscar-cliente" onclick="Listar_Clientes_Modal()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg> Buscar Cliente
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="opcao-pagamento" class="form-label w-100">Forma de pagamento:</label>
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" id="opcao-pagamento">

                </div>
            </div>

            <div class="col-md-12 d-none">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">Pagamento</span>
                    <input type="text" class="form-control" autocomplete="off" name="descricao_pagamento" id="descricao_pagamento" disabled="true">
                </div>
            </div>

            <div class="col-md-12">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Observação de Pagamento</span>
                    <input type="text" class="form-control" name="observacao_pagamento" id="observacao_pagamento">
                </div>
            </div>

            <div class="col-md-12">
                <label for="exampleInputEmail1" class="form-label">Opções de entrega:</label><br>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="opcao-entrega">

                </div>
            </div>

            <div class="col-md-10">
                <div id="local-pedido">

                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">Valor Produtos R$</span>
                    <input type="text" class="form-control" autocomplete="off" placeholder="00000,00" name="valor_produtos" id="valor_produtos" disabled="true">
                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">Desconto R$</span>
                    <input type="text" class="form-control" autocomplete="off" placeholder="00000,00" name="valor_desconto" id="valor_desconto" onkeyup="Atualizar_Desconto()">
                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">Valor Total R$</span>
                    <input type="text" class="form-control" autocomplete="off" placeholder="00000,00" name="valor_total" id="valor_total" disabled="true">
                </div>
            </div>
        </div>
        <div class="col-12">
            <button type="button" class="btn btn-primary" class="btn btn-primary" onclick="Salvar_Novo_Pedido()">Salvar Novo Pedido</button>
            <button type="button" style="display: none;" class="btn btn-primary" id="btn-modal-alerta" data-bs-toggle="modal" data-bs-target="#modal-alerta">Abrir Modal Alerta</button>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary" id="btn-adicionar-produto-pedido" data-bs-toggle="modal" data-bs-target="#modal-buscar-produto" style="width: 100%; " onclick="Listar_Produto_Modal()">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg> Adicionar Produtos
            </button>
        </div><br>
        <h4>Itens adicionados ao pedido</h4>
        <div class="col-md-12" id="tabela-produtos-pedido">

        </div>
    </div>
</form>
<!-- Modal buscar cliente -->
<div class="modal fade" id="modal-buscar-cliente" tabindex="-1" aria-labelledby="modal-buscar-clienteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-buscar-clienteLabel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-video2" viewBox="0 0 16 16">
                        <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                        <path d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2ZM1 3a1 1 0 0 1 1-1h2v2H1V3Zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3H5Zm-4-2h3v2H2a1 1 0 0 1-1-1v-1Zm3-1H1V8h3v2Zm0-3H1V5h3v2Z" />
                    </svg> Buscar Clientes
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-cliente">
                ...
            </div>
            <!--<div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                    <button type="button" class="btn btn-primary">Salvar</button>
                </div>-->
        </div>
    </div>
</div>
<!-- Modal buscar Produto -->
<div class="modal fade" id="modal-buscar-produto" tabindex="-1" aria-labelledby="modal-buscar-produtoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-buscar-produtoLabel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                    </svg> Buscar Produtos
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="Limpar_Tabela_Produto()"></button>
            </div>
            <div class="modal-body" id="modal-produto">

            </div>
            <div class="modal-footer" id="rodape-modal-produto">

            </div>
        </div>
    </div>
</div>
<!-- Modal Alerta -->
<div class="modal fade" id="modal-alerta" tabindex="-1" aria-labelledby="modal-alerta" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" id="topo-modal-alerta">
                <h5 class="modal-title" id="titulo-modal-alerta">Alerta</h5>
                <button type="button" class="btn-close" id="btn-fechar-modal-alerta" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="corpo-modal-alerta">

            </div>
            <div class="modal-footer" id="rodape-modal-alerta">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>