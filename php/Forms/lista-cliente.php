<h2 style="text-align: center;">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
    </svg> Clientes
</h2>
<div class="col-md-12">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-buscar-cliente" style="width: 100%;  " onclick="Form_Cliente()">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>Novo Cliente
    </button>
</div>
<div class="col-md-12 mt-3">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Pesquisar Cliente" name="campoPesquisa" id="campoPesquisa" onkeyup="Pesquisar_Cliente()">
    </div>
</div>
<div class="col-md-12">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Cód.</th>
                <th scope="col-span-1">Nome</th>
                <th scope="col" class="d-none d-sm-table-cell">Mesa</th>
                <th scope="col" class="d-none d-sm-table-cell">Celular</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="corpo-tabela" id="corpo-tabela">
        </tbody>
    </table>
</div>

<!-- Modal buscar cliente -->
<div class="modal fade" id="modal-buscar-cliente" tabindex="-1" aria-labelledby="modal-buscar-clienteLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-buscar-clienteLabel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-video2" viewBox="0 0 16 16">
                        <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                        <path d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2ZM1 3a1 1 0 0 1 1-1h2v2H1V3Zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3H5Zm-4-2h3v2H2a1 1 0 0 1-1-1v-1Zm3-1H1V8h3v2Zm0-3H1V5h3v2Z" />
                    </svg> Cadastro de Novo Cliente
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-body">
                ...
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>-->
        </div>
    </div>
</div>