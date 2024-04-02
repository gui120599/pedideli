<h2 style="text-align: center;">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box2" viewBox="0 0 16 16">
        <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3L2.95.4ZM7.5 1H3.75L1.5 4h6V1Zm1 0v3h6l-2.25-3H8.5ZM15 5H1v10h14V5Z" />
    </svg> Cadastro de Usuários
</h2>
<form class="row g-3" id="Form1" enctype="multipart/form-data">
    <div class="col-md-5">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nome</span>
            <input type="text" class="form-control" name="nome_usuario" id="nome_usuario" require autofocus>
        </div>
    </div>
    <div class="col-md-7">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Sobrenome</span>
            <input type="text" class="form-control" name="sobrenome_usuario" id="sobrenome_usuario">
        </div>
    </div>
    <div class="col-md-12">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Email</span>
            <input type="email" class="form-control" name="email_usuario" id="email_usuario">
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Login</span>
            <input type="text" class="form-control" name="login_usuario" id="login_usuario">
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Senha</span>
            <input type="password" class="form-control" name="senha_usuario" id="senha_usuario">
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Cargo</span>
            <select id="Resul-cargo" class="form-select" name="cod_cargo">
                <!--Consulta feita no banco para preencher select com os cargos disoniveis-->
                <!--Aqui entrará a consulta função ComboCargo no master.js-->
            </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Status</span>
            <select  class="form-select" name="ativo" id="ativo">
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
        </div>
    </div>
    <div class="col-12">
        <button type="button" class="btn btn-primary" onclick="Salvar_Usuario()">Salvar</button>
    </div>
</form>