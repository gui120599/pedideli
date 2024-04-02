<style>
    #body-cliente{
        zoom: 0.75;
    }
</style>
<div id="body-cliente">
    <!--<h2 style="text-align: center;">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-video2" viewBox="0 0 16 16">
            <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
            <path d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2ZM1 3a1 1 0 0 1 1-1h2v2H1V3Zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3H5Zm-4-2h3v2H2a1 1 0 0 1-1-1v-1Zm3-1H1V8h3v2Zm0-3H1V5h3v2Z" />
        </svg> Cadastro de Clientes
    </h2>-->
    <form class="row g-3" id="form-cliente">
        <div class="col-md-1">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Cod</span>
                <input type="text" class="form-control" autocomplete="off" placeholder="Nome do Cliente" name="cod_cliente" id="cod_cliente">
            </div>
        </div>
        <div class="col-md-8">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nome</span>
                <input type="text" class="form-control" autocomplete="off" placeholder="Nome do Cliente" name="nome_cliente" id="nome_cliente" require autofocus>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Data de Nascimento</span>
                <input type="text" class="form-control" autocomplete="off" placeholder="01/01/1990" name="data_nascimento" id="data_nascimento">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Sexo</span>
                <select type="text" class="form-select" name="sexo_cliente" id="sexo_cliente">
                    <option>Masculino</option>
                    <option>Feminino</option>
                    <option selected>Não se aplica</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">CPF</span>
                <input type="text" class="form-control" autocomplete="off" placeholder="000.000.000-00" name="cpf_cliente" id="cpf_cliente">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">RG</span>
                <input type="text" class="form-control" autocomplete="off" placeholder="0000000" name="rg_cliente" id="rg_cliente">
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Celular</span>
                <input type="tel" class="form-control" autocomplete="off" placeholder="(DDD)9 0000-0000" name="celular_cliente" id="celular_cliente">
            </div>
        </div>
        <div class="col-md-2">
            <div class="input-group mb-3">
                <div class="form-check">
                    <label class="form-check-label" for="whatsapp_cliente">WhatsApp</label>
                    <input class="form-check-input" type="checkbox" value="Sim" name="whatsapp_cliente" id="whatsapp_cliente">
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="input-group mb-3">
                <div class="form-check">
                    <label class="form-check-label" for="cliente_mesa">Mesa</label>
                    <input class="form-check-input" type="checkbox" value="Sim" name="cliente_mesa" id="cliente_mesa">
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Email</span>
                <input type="email" class="form-control" autocomplete="off" placeholder="exemplo@exemplo.com" name="email_cliente" id="email_cliente">
            </div>
        </div>
        <h5>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg> Endereço do Cliente
        </h5>
        <div class="col-md-2">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">CEP</span>
                <input type="text" class="form-control" autocomplete="off" placeholder="00000-000" name="cep_cliente" id="cep_cliente">
            </div>
        </div>
        <div class="col-md-5">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Estado</span>
                <input type="text" class="form-control" autocomplete="on" name="uf_cliente" id="uf_cliente">
            </div>
        </div>
        <div class="col-md-5">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Cidade</span>
                <input type="text" class="form-control" autocomplete="on" name="cidade_cliente" id="cidade_cliente">
            </div>
        </div>
        <div class="col-md-5">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rua</span>
                <input type="text" class="form-control" autocomplete="off" name="rua_cliente" id="rua_cliente">
            </div>
        </div>
        <div class="col-md-5">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Complemento</span>
                <input type="text" class="form-control" autocomplete="off" name="complemento_cliente" id="complemento_cliente">
            </div>
        </div>
        <div class="col-md-2">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nº</span>
                <input type="text" class="form-control" autocomplete="off" name="num_ende_cliente" id="num_ende_cliente">
            </div>
        </div>
        <div class="col-12">
            <button type="button" class="btn btn-primary" onclick="Salvar_Cliente()">Salvar</button>
        </div>
    </form>
</div>