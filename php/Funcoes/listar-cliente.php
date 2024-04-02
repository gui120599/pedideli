<div class="col-md-12">
    <div class="col-md-12 mt-3">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Pesquisar Cliente" name="campoPesquisa" id="campoPesquisa" onkeyup="Pesquisar_Cliente()" autocomplete="off">
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once("../../conexao/conexao.php");
            $sql = "SELECT * FROM cliente ";
            $resultado = mysqli_query($conn, $sql);
            while ($row_resultado = mysqli_fetch_assoc($resultado)) {
                echo '<tr class="cliente-row" style="cursor: pointer" onclick="Selecionar_Cliente(' . $row_resultado['cod_cliente'] . ')" data-bs-dismiss="modal">'
                    . '<td scope="row"><button type="button" class="btn btn-outline-primary" value=' . $row_resultado['cod_cliente'] . ' onclick="Selecionar_Cliente(this.value)" data-bs-dismiss="modal">Selecionar</button></td>'
                    . '<td scope="row" class="cliente-descricao">' . $row_resultado['nome_cliente'] . '<td><tr>';
            }
            ?>
        </tbody>
    </table>
</div>