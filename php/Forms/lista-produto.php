<h2 style="text-align: center;">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box2" viewBox="0 0 16 16">
        <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3L2.95.4ZM7.5 1H3.75L1.5 4h6V1Zm1 0v3h6l-2.25-3H8.5ZM15 5H1v10h14V5Z" />
    </svg> Cadastro de Produtos
</h2>
<div class="col-md-12">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-buscar-produto" style="width: 100%;  " onclick="Form_Produto()">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>Novo Produto
    </button>
</div><br>
<div class="col-md-12">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Pesquisar Produto" name="campoPesquisa" id="campoPesquisa" onkeyup="Pesquisar_Produto()">
    </div>
</div>
<div class="col-md-12" id="tabela-produto">
    
</div>

<!-- Modal buscar produto -->
<div class="modal fade" id="modal-buscar-produto" tabindex="-1" aria-labelledby="modal-buscar-produtoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-buscar-produtoLabel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-video2" viewBox="0 0 16 16">
                        <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                        <path d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2ZM1 3a1 1 0 0 1 1-1h2v2H1V3Zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3H5Zm-4-2h3v2H2a1 1 0 0 1-1-1v-1Zm3-1H1V8h3v2Zm0-3H1V5h3v2Z" />
                    </svg> Cadastro de Novo produto
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-produto">
                ...
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                <button type="button" class="btn btn-primary">Salvar</button>-->
            </div>
        </div>
    </div>
</div>