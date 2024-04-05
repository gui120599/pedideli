//Seção Cliente
function Form_Cliente() {
    $.ajax({
        url: "/php/Forms/cadastra-cliente.php",
        success: function (result) {
            $("#modal-body").html(result);
            $("#data_nascimento").mask("99/99/9999");
            $("#celular_cliente").mask("(999)9 9999-9999");
            $("#cpf_cliente").mask("999.999.999-99");
            $("#rg_cliente").mask("9999999");
            $("#cep_cliente").mask("99999-999");
            ComboboxCargo();
        }
    })
}

function Listar_Clientes() {
    $("#close-offcanvas").trigger('click'); //Fecha offcanvas
    $.ajax({
        url: "/php/Forms/lista-cliente.php",
        success: function (result) {
            $("#logo").html(result);
            Tabela_Clientes();
        },
        error: function () {
            $("#logo").html('Error cliente');
        }
    })
}

function Tabela_Clientes() {
    var corpo_tabela = '';
    $.ajax({
        url: "/php/Funcoes/listar-cliente-json.php",
        method: "POST",
        data: { cod_cliente: null },
        dataType: "JSON",
        success: function (result) {
            result.forEach(function (elemento) {
                corpo_tabela += `
                 <tr class="cliente-row">
                    <th scope="row">` + elemento['cod_cliente'] + `</th>
                    <td class="cliente-descricao">` + elemento['nome_cliente'] + `</td>
                    <td class="d-none d-sm-table-cell">` + elemento['cliente_mesa'] + `</td>
                    <td class="d-none d-sm-table-cell">` + elemento['celular_cliente'] + `</td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-buscar-cliente" style="width: 100%;  " value="` + elemento['cod_cliente'] + `" onclick="Selecionar_Cliente_Editar(this.value)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>Editar
                        </button>
                    </td>
                </tr>`;
            })
            $('#corpo-tabela').html(corpo_tabela);
            Pesquisar_Cliente();
        },
        error: function () {
            $("#corpo-tabela").html("Error");
        }
    })
}

function Pesquisar_Cliente() {
    var termoPesquisa = $("#campoPesquisa").val().toLowerCase();

    $(".cliente-row").each(function () {
        var descricaoCliente = $(this).find(".cliente-descricao").text().toLowerCase();

        if (descricaoCliente.includes(termoPesquisa)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

function Salvar_Cliente() {
    var st = $('#form-cliente').serialize();
    $.ajax({
        url: "/php/Funcoes/salvar-cliente.php",
        method: "POST",
        data: $('#form-cliente').serialize(),
        success: function (result) {
            $("#form-cliente").html(result);
            Tabela_Clientes();
        },
        error: function () {
            $("#form-cliente").html("Error de JavaScript!");
        }
    })
}

function Selecionar_Cliente_Editar(cod_cliente) {
    $("#modal-body").html(`
    <div class="col-md-2">
            <img src="../../pedideli/img/carregando.gif">
    </div>
    `);
    $.ajax({
        url: "/php/Funcoes/listar-cliente-json.php",
        method: "POST",
        data: { cod_cliente: cod_cliente },
        dataType: "JSON",
        success: function (result) {
            result.forEach(function (elemento) {
                Form_Cliente();
                setTimeout(function () {
                    $("#cod_cliente").val(elemento["cod_cliente"]);
                    $("#nome_cliente").val(elemento["nome_cliente"]);
                    $("#data_nascimento").val(elemento["data_nascimento"]);
                    $("#cpf_cliente").val(elemento["cpf_cliente"]);
                    $("#rg_cliente").val(elemento["rg_cliente"]);
                    // $("#sexo_cliente").val(elemento["sexo_cliente"]);
                    $("#celular_cliente").val(elemento["celular_cliente"]);
                    $("#email_cliente").val(elemento["email_cliente"]);
                    $("#cep_cliente").val(elemento["cep_cliente"]);
                    $("#uf_cliente").val(elemento["uf_cliente"]);
                    $("#cidade_cliente").val(elemento["cidade_cliente"]);
                    $("#rua_cliente").val(elemento["rua_cliente"]);
                    $("#complemento_cliente").val(elemento["complemento_cliente"]);
                    $("#num_ende_cliente").val(elemento["num_ende_cliente"]);
                }, 800)

            })
        },
        error: function () {
            $("#form-cliente").html("Error Selecionar");
        }
    })
}

//Seção Categoria de Produto
function Form_Categoria() {
    $.ajax({
        url: "/php/Forms/cadastra-categoria.php",
        success: function (result) {
            $("#modal-categoria").html(result);
        },
        error: function () {
            $("#modal-categoria").html("Error");
        }

    })
}

function Listar_Categorias() {
    $("#close-offcanvas").trigger('click'); //Fecha offcanvas
    $.ajax({
        url: "/php/Forms/lista-categoria.php",
        success: function (result) {
            $("#logo").html(result);
            Tabela_Categorias();
        },
        error: function () {
            $("#logo").html("Error");
        }

    })
}

function Tabela_Categorias() {
    $.ajax({
        url: "/php/Funcoes/listar-categoria-json.php",
        method: "POST",
        data: { cod_categoria: null },
        dataType: "JSON",
        success: function (result) {
            result.forEach(function (elemento) {
                $('#corpo-tabela').append(`
                 <tr>
                    <th scope="row">` + elemento['cod_categoria'] + `</th>
                    <td>` + elemento['descricao_categoria'] + `</td>
                    <td>` + elemento['ativo'] + `</td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-buscar-categoria" style="width: 100%;  " value="` + elemento['cod_categoria'] + `" onclick="Selecionar_Categoria_Editar(this.value)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>Editar
                        </button>
                    </td>
                </tr>`);
            })
        },
        error: function () {
            $("#corpo-tabela").html("Error");
        }
    })
}

function Selecionar_Categoria_Editar(cod_categoria) {
    Form_Categoria();
    $.ajax({
        url: "/php/Funcoes/listar-categoria-json.php",
        method: "POST",
        data: { cod_categoria: cod_categoria },
        dataType: "JSON",
        success: function (result) {
            result.forEach(function (elemento) {
                $("#descricao_categoria").val(elemento["descricao_categoria"]);
            })
        },
        error: function () {
            $("#form-categoria").html("Error Selecionar");
        }
    })

}

function Salvar_Categoria() {
    var st = $('#form-categoria').serialize();
    $.ajax({
        url: "/php/Funcoes/salvar-categoria.php",
        method: "POST",
        data: $('#form-categoria').serialize(),
        success: function (result) {
            $("#form-categoria").html(result);
        },
        error: function () {
            $("#form-categoria").html("Error ao Salvar categoria pelo Ajax!");
        }
    })
}

//Seção Produto
function Form_Produto() {
    $.ajax({
        url: "/php/Forms/cadastra-produto.php",
        success: function (result) {
            $("#modal-produto").html(result);
            $("#preco_custo_produto").mask("000000000000.00", { reverse: true });
            $("#preco_venda_produto").mask("000000000000.00", { reverse: true });
            Combobox_Categoria_Produtos();
        },
        error: function () {
            $("#modal-produto").html("Erro ao carregar fomrulário de Produtos");
        }
    })
}

function Listar_Produtos() {
    $("#close-offcanvas").trigger('click'); //Fecha offcanvas
    $.ajax({
        url: "/php/Forms/lista-produto.php",
        success: function (result) {
            $("#logo").html(result);
            Tabela_Produtos();
        },
        error: function () {
            $("#logo").html("Error ao carregar Lista de produtos pelo Ajax!");
        }

    })
}

function Tabela_Produtos() {
    $.ajax({
        url: "/php/Funcoes/listar-produto-json.php",
        method: "POST",
        data: { cod_produto: null },
        dataType: "JSON",
        success: function (result) {
            $('#tabela-produto').html(`
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Cód.</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Preço Custo</th>
                        <th scope="col">Preço Venda</th>
                        <th scope="col" class="d-none d-sm-table-cell">Categoria</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="corpo-tabela" id="corpo-tabela">
                `);
            result.forEach(function (elemento) {
                $('#corpo-tabela').append(`
                 <tr class="produto-row">
                    <th scope="row">` + elemento['cod_produto'] + `</th>
                    <td class="produto-descricao">` + elemento['descricao_produto'] + `</td>
                    <td>` + elemento['preco_custo'] + `</td>
                    <td>` + elemento['preco_venda'] + `</td>
                    <td class="categoria-produto d-none d-sm-table-cell">` + elemento['descricao_categoria'] + `</td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-buscar-produto" style="width: 100%;  " value="` + elemento['cod_produto'] + `" onclick="Selecionar_Produto_Editar(this.value)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>Editar
                        </button>
                    </td>
                </tr>`);
            })
            $('#tabela-produto').append(`
                </tbody>
            </table>
            `);
            if ($("#campoPesquisa").val() != "" || $("#campoPesquisa").val() != null) {
                Pesquisar_Produto();
            } else {
                console.log($("#campoPesquisa").val());
            }

        },
        error: function () {
            $("#corpo-tabela").html("Error ao listar produtos pelo Ajax!");
        }
    })
}

function Pesquisar_Produto() {
    var termoPesquisa = $("#campoPesquisa").val().toLowerCase();

    $(".produto-row").each(function () {
        var descricaoProduto = $(this).find(".produto-descricao").text().toLowerCase();

        if (descricaoProduto.includes(termoPesquisa)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

function Pesquisar_Produto_Card() {
    var termoPesquisa = $("#campoPesquisa").val().toLowerCase();

    $(".produto-card").each(function () {
        var descricaoProduto = $(this).find(".produto-descricao").text().toLowerCase();

        if (descricaoProduto.includes(termoPesquisa)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

function Selecionar_Produto_Editar(cod_produto) {
    Form_Produto();
    $.ajax({
        url: "/php/Funcoes/listar-produto-json.php",
        method: "POST",
        data: { cod_produto: cod_produto },
        dataType: "JSON",
        success: function (result) {
            result.forEach(function (elemento) {
                setTimeout(function () {
                    $("#cod_produto").val(elemento["cod_produto"]);
                    $("#descricao_produto").val(elemento["descricao_produto"]);
                    $("#preco_custo_produto").val(elemento["preco_custo"]);
                    $("#preco_venda_produto").val(elemento["preco_venda"]);

                    $("#categoria").val(elemento["cod_categoria"]);
                }, 800)
            })


        },
        error: function () {
            $("#form-categoria").html("Error Selecionar");
        }
    })

}

function Salvar_Produto() {
    $.ajax({
        url: "/php/Funcoes/salvar-produto.php",
        method: "POST",
        data: $('#form-produto').serialize(),
        success: function (result) {
            $("#form-produto").html(result);
            Tabela_Produtos();
        },
        error: function () {
            $("#form-produto").html("Error ao Salvar produto pelo Ajax!");
        }
    })
}

function Combobox_Categoria_Produtos() {
    $.ajax({
        url: "/php/Funcoes/listar-categoria-json.php",
        method: "POST",
        data: { cod_categoria: null },
        dataType: "JSON",
        success: function (result) {
            result.forEach(function (elemento) {
                $('#categoria').append(`
                <option value="` + elemento['cod_categoria'] + `">` + elemento['descricao_categoria'] + `</option>`);
            })
        },
        error: function () {
            $("#form-produto").html("Error ao Listar categorias pelo Ajax!");
            console.log('erro');
        }
    })
}

//Seção Opções de Entrega
function Form_Opcoes_Entrega() {
    $.ajax({
        url: "/php/Forms/cadastra-opcoes-entrega.php",
        success: function (result) {
            $("#modal-opcao-entrega").html(result);
        },
        error: function () {
            console.log("Erro ao carregar formulário de Opção de Entrega pelo Ajax!");
        }
    })
}

function Listar_Opcoes_Entrega() {
    $("#close-offcanvas").trigger('click'); //Fecha offcanvas
    $.ajax({
        url: "/php/Forms/lista-opcoes-entrega.php",
        success: function (result) {
            $("#logo").html(result);
            Tabela_Opcoes_Entrega();
        },
        error: function () {
            console.log("Erro ao carregar fomrulário listar opções de entrega pelo Ajax!");
        }
    })
}

function Tabela_Opcoes_Entrega() {
    $.ajax({
        url: "/php/Funcoes/listar-opcoes-entrega-json.php",
        method: "POST",
        data: { cod_opcao_entrega: null },
        dataType: "JSON",
        success: function (result) {
            $('#tabela-opcoes-entrega').html(`
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Cód.</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="corpo-tabela-opcoes-entrega">`);

            result.forEach(function (elemento) {
                $('#corpo-tabela-opcoes-entrega').append(`
                        <tr>
                            <td>` + elemento['cod_opcao_entrega'] + `</td>
                            <td>` + elemento['descricao_opcao_entrega'] + `</td>
                            <td>` + elemento['ativo'] + `</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-buscar-entrega" style="width: 100%;"  onclick="Selecionar_Opcao_Entrega_Editar(` + elemento['cod_opcao_entrega'] + `)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>Editar
                        </button></td>
                        </tr>`);
            })
            $('#tabela-opcoes-entrega').append(`
                    </tbody>
                </table>`);
        },
        error: function () {
            console.log("Erro ao listar opções de entrega pelo Ajax!");
        }
    })
}

function Salvar_Opcao_Entrega() {
    $.ajax({
        url: "/php/Funcoes/salvar-opcao-entrega.php",
        method: "POST",
        data: $("#form-opcoes-entrega").serialize(),
        success: function (result) {
            $("#modal-opcao-entrega").html(result);
            Tabela_Opcoes_Entrega();
        },
        error: function () {
            console.log("Error ao salvar opção de entrega pelo Ajax!");
        }
    })
}

function Selecionar_Opcao_Entrega_Editar(cod_opcao_entrega) {
    Form_Opcoes_Entrega();
    $.ajax({
        url: "/php/Funcoes/listar-opcoes-entrega-json.php",
        method: "POST",
        data: { cod_opcao_entrega: cod_opcao_entrega },
        dataType: "JSON",
        success: function (result) {
            result.forEach(function (elemento) {
                $("#descricao_opcao_entrega").val(elemento["descricao_opcao_entrega"]);
                setTimeout(function () {
                    $("#ativo").val(elemento["ativo"]);
                }, 100)
            })
        },
        error: function () {
            console.log("Error Selecionar");
        }
    })
}

//Seção Opções de Pagamentos
function Form_Opcoes_Pagamento() {
    $.ajax({
        url: "/php/Forms/cadastra-opcoes-pagamento.php",
        success: function (result) {
            $("#modal-opcao-pagamento").html(result);
        },
        error: function () {
            console.log("Erro ao carregar formulário de Opção de Pagamento pelo Ajax!");
        }
    })
}

function Listar_Opcoes_Pagamento() {
    $("#close-offcanvas").trigger('click'); //Fecha offcanvas
    $.ajax({
        url: "/php/Forms/lista-opcoes-pagamento.php",
        success: function (result) {
            $("#logo").html(result);
            Tabela_Opcoes_Pagamento();
        },
        error: function () {
            console.log("Erro ao carregar formulário listar opções de pagamentos pelo Ajax!");
        }
    })
}

function Tabela_Opcoes_Pagamento() {
    $.ajax({
        url: "/php/Funcoes/listar-opcoes-pagamento-json.php",
        method: "POST",
        data: { cod_opcao_pagamento: null },
        dataType: "JSON",
        success: function (result) {
            $('#tabela-opcoes-pagamento').html(`
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Cód.</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="corpo-tabela-opcoes-pagamento">`);

            result.forEach(function (elemento) {
                $('#corpo-tabela-opcoes-pagamento').append(`
                        <tr>
                            <td>` + elemento['cod_opcao_pagamento'] + `</td>
                            <td>` + elemento['descricao_opcao_pagamento'] + `</td>
                            <td>` + elemento['ativo'] + `</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-buscar-pagamento" style="width: 100%;"  onclick="Selecionar_Opcao_Pagamento_Editar(` + elemento['cod_opcao_pagamento'] + `)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>Editar
                        </button></td>
                        </tr>`);
            })
            $('#tabela-opcoes-pagamento').append(`
                    </tbody>
                </table>`);
        },
        error: function () {
            console.log("Erro ao listar opções de pagamento pelo Ajax!");
        }
    })
}

function Salvar_Opcao_Pagamento() {
    $.ajax({
        url: "/php/Funcoes/salvar-opcao-pagamento.php",
        method: "POST",
        data: $("#form-opcoes-pagamento").serialize(),
        success: function (result) {
            $("#modal-opcao-pagamento").html(result);
            Tabela_Opcoes_Pagamento();
        },
        error: function () {
            console.log("Error ao salvar opção de entrega pelo Ajax!");
        }
    })
}

function Selecionar_Opcao_Pagamento_Editar(cod_opcao_pagamento) {
    Form_Opcoes_Pagamento();
    $.ajax({
        url: "/php/Funcoes/listar-opcoes-pagamento-json.php",
        method: "POST",
        data: { cod_opcao_pagamento: cod_opcao_pagamento },
        dataType: "JSON",
        success: function (result) {
            result.forEach(function (elemento) {
                $("#descricao_opcao_pagamento").val(elemento["descricao_opcao_pagamento"]);
                setTimeout(function () {
                    $("#ativo").val(elemento["ativo"]);
                }, 100)
            })
        },
        error: function () {
            console.log("Error Selecionar");
        }
    })
}

//Seção Pedido
function Form_Pedido() {
    $("#close-offcanvas").trigger('click'); //Fecha offcanvas
    $.ajax({
        url: "/php/Forms/novo-pedido.php",
        success: function (result) {
            $("#logo").html(result);
            $("#valor_desconto").mask("000000000000.00", { reverse: true });
            Abrir_Pedido();
            Radios_Opçoes_Entrega();
            Check_Opçoes_Pagamento();
        }
    })
}

function Abrir_Pedido() {
    Listar_Clientes_Modal();
    Listar_Produto_Selecionar();
    $.ajax({
        url: "/php/Funcoes/abrir-pedido-json.php",
        dataType: "JSON",
        success: function (result) {

            result.forEach(function (elemento) {
                $('#cod_pedido').val(elemento['cod_pedido']);
            })
        },
        error: function () {
            console.log("Error ao abrir pedido pelo Ajax!");
        }
    })
}

function Radios_Opçoes_Entrega() {
    $.ajax({
        url: "/php/Funcoes/listar-opcoes-entrega-json.php",
        method: "POST",
        data: { cod_opcao_entrega: null },
        dataType: "JSON",
        success: function (result) {
            result.forEach(function (elemento) {
                $('#opcao-entrega').append(`
                    <input type="radio" class="btn-check" name="btnradio-opcao-entrega" id="` + elemento['cod_opcao_entrega'] + `" value="` + elemento['cod_opcao_entrega'] + `" autocomplete="off" onclick="Input_Local('` + elemento['descricao_opcao_entrega'] + `')">
                    <label class="btn btn-outline-primary" for="` + elemento['cod_opcao_entrega'] + `">` + elemento['descricao_opcao_entrega'] + `</label>
                `);
            })
        },
        error: function () {
            console.log('Erro carregar opçoes de entregas pelo Ajax!');
        }
    })
}

function Check_Opçoes_Pagamento() {
    $.ajax({
        url: "/php/Funcoes/listar-opcoes-pagamento-json.php",
        method: "POST",
        data: { cod_opcao_pagamento: null },
        dataType: "JSON",
        success: function (result) {
            result.forEach(function (elemento) {
                $('#opcao-pagamento').append(`
                    <input type="checkbox" class="btn-check" name="btncheck-opcao-pagamento[]" id="` + elemento['descricao_opcao_pagamento'] + `" value="` + elemento['descricao_opcao_pagamento'] + `" autocomplete="off"/>
                    <label class="btn btn-outline-primary" for="` + elemento['descricao_opcao_pagamento'] + `">` + elemento['descricao_opcao_pagamento'] + `</label>
                `);
            })
        },
        error: function () {
            console.log('Erro carregar opçoes de pagamento pelo Ajax!');
        }
    })
}

function Input_Local(desc_opcao_entrega) {
    if (desc_opcao_entrega == "Entregar") {
        $("#local-pedido").removeClass('d-none');
    } else {
        $("#local-pedido").addClass('d-none');
    }
}

function Listar_Clientes_Modal() {
    $.ajax({
        url: "/php/Funcoes/listar-cliente.php",
        success: function (result) {
            $('#modal-cliente').html(result);
            setTimeout(() => {
              $('#campoPesquisa').focus();  
            }, 800);
        },
        error: function () {
            $("#modal-cliente").html("Error");
        }
    })
}

function Selecionar_Cliente(cod_cliente) {
    $.ajax({
        url: "/php/Funcoes/listar-cliente-json.php",
        method: "POST",
        data: { cod_cliente: cod_cliente },
        dataType: "JSON",
        success: function (result) {

            result.forEach(function (elemento) {
                $('#cod_cliente').val(elemento['cod_cliente']);
                $('#nome_cliente').val(elemento['nome_cliente']);
            })

        },
        error: function () {
            $("#modal-cliente").html("Error");
        }
    })
}

function Listar_Produto_Selecionar() {
    $.ajax({
        url: "/php/Funcoes/listar-produto-json.php",
        method: "POST",
        data: { cod_produto: null },
        dataType: "JSON",
        success: function (result) {
            result.forEach(function (elemento) {
                $('#lista-produtos').append(`
                <div class="col-sm-3 produto-card" onclick="Form_Quantidade_Produto(` + elemento['cod_produto'] + `)">
                    <div class="card" role="button">
                        <div class="card-body">
                            <h5 class="card-title produto-descricao">` + elemento['descricao_produto'] + `</h5>
                            <p class="card-text">R$` + elemento['preco_venda'] + `</p>
                        </div>
                    </div>
                </div>
                `);
            })
        },
        error: function () {
            $("#corpo-tabela").html("Error ao listar produtos pelo Ajax!");
        }
    })
}

function Listar_Produto_Modal() {
    $.ajax({
        url: "/php/Funcoes/listar-produto-json.php",
        method: "POST",
        data: { cod_produto: null },
        dataType: "JSON",
        success: function (result) {
            $('#modal-produto').html(`
                <div class="col-md-12">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Pesquisar Produto" name="pesquisar_produto" id="campoPesquisa" onkeyup="Pesquisar_Produto_Selecionar()">
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Descrição Produto</th>
                            <th scope="col">Valor Unt.</th>
                        </tr>
                    </thead>
                    <tbody id="corpo-tabela-seleciona">`);
            result.forEach(function (elemento) {
                $('#corpo-tabela-seleciona').append(`
                        <tr class="produto-row">
                            <td>
                                <button type="button" class="btn btn-outline-primary" value="` + elemento['cod_produto'] + `" onclick="Form_Quantidade_Produto(this.value)">Selecionar</button></td>
                            <td class="produto-descricao">` + elemento['descricao_produto'] + `</td>
                            <td>` + elemento['preco_venda'] + `</td>
                        </tr>`);
            })
            $('#modal-produto').append(`
                    </tbody>
                </table>`);
        },
        error: function () {
            $("#corpo-tabela").html("Error ao listar produtos pelo Ajax!");
        }
    })
}

function Pesquisar_Produto_Selecionar() {
    var termoPesquisa = $("#campoPesquisa").val().toLowerCase();

    $(".produto-row").each(function () {
        var descricaoProduto = $(this).find(".produto-descricao").text().toLowerCase();

        if (descricaoProduto.includes(termoPesquisa)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

function Limpar_Tabela_Produto() {
    $('#corpo-tabela-seleciona').html('');
}

function Form_Quantidade_Produto(cod_produto) {
    $("#btn-adicionar-produto-pedido").click();
    $.ajax({
        url: "/php/Forms/quantidade-produto.php",
        success: function (result) {
            $('#modal-produto').html(
                `<div class="col-12">
                    <button type="button" class="btn btn-outline-secondary"  onclick="Listar_Produto_Modal()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg> Voltar
                    </button>
                </div><br>` + result);
            $.ajax({
                url: "/php/Funcoes/listar-produto-json.php",
                method: "POST",
                data: { cod_produto: cod_produto },
                dataType: "JSON",
                success: function (result) {

                    result.forEach(function (elemento) {
                        $('#cod_produto').val(elemento['cod_produto']);
                        $('#descricao_produto').val(elemento['descricao_produto']);
                        $('#preco_venda_produto').val(elemento['preco_venda']);
                        $('#quantidade_produto').val('1');
                        Somar_Total_Produto();
                    })

                },
                error: function () {
                    $("#modal-produto").html("Error aqui");
                }
            })
        },
        error: function () {
            $("#modal-produto").html("Error aqui2");
        }
    })
}

function Somar_Total_Produto() {
    var quanti = $('#quantidade_produto').val();
    var preco = $('#preco_venda_produto').val()
    $('#valor_total_produto').val(quanti * preco);
}

function Salvar_Produto_Pedido() {
    var cod_pedido = $("#cod_pedido").val();
    var cod_produto = $("#cod_produto").val();
    var quantidade_produto = $("#quantidade_produto").val();
    var valor_total_produto = $("#valor_total_produto").val();
    var observacao_produto = $("#observacao_produto").val();
    cod_pedido
    $.ajax({
        url: "/php/Funcoes/salvar-produto-pedido.php",
        method: "POST",
        data: {
            cod_produto: cod_produto,
            cod_pedido: cod_pedido,
            quantidade_produto: quantidade_produto,
            valor_total_produto: valor_total_produto,
            observacao_produto: observacao_produto
        },
        success: function (result) {
            $("#rodape-modal-produto").html(result);
            Listar_Produtos_Pedido();
            Atualizar_Valores_Pedido();
            $('#fechar-modal-qtd-produto').click();
        },
        error: function () {
            console.log("Error ao inserir produto no pedido pelo Ajax!");
        }
    })
}

function Atualizar_Valores_Pedido() {
    var cod_pedido = $("#cod_pedido").val();
    $.ajax({
        url: "/php/Funcoes/valor-produtos-pedido-json.php",
        method: "POST",
        data: { cod_pedido: cod_pedido },
        dataType: "JSON",
        success: function (result) {
            result.forEach(function (elemento) {
                $("#valor_produtos").val(elemento['valor_total_produtos']);
            })
            $("#valor_total").val($("#valor_produtos").val() - $("#valor_desconto").val());
            Atualizar_Desconto();
        },
        error: function () {
            console.log('Erro ao atualizar valores do pedido pelo Ajax!');
        }
    })
}

function Atualizar_Desconto() {
    $("#valor_total").val($("#valor_produtos").val() - $("#valor_desconto").val());
}

function Listar_Produtos_Pedido() {
    var cod_pedido = $("#cod_pedido").val();
    $.ajax({
        url: "/php/Funcoes/listar-produto-pedido-json.php",
        method: "POST",
        data: { cod_pedido: cod_pedido },
        dataType: "JSON",
        success: function (result) {
            $('#corpo-tabela-produtos-pedido').html('');
            result.forEach(function (elemento) {
                $('#corpo-tabela-produtos-pedido').append(`
                        <tr>
                            <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modal-buscar-produto" onclick="Form_Alterar_Produto_Pedido(` + elemento['cod_produto_pedido'] + `)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                          </svg></button>
                            <button type="button" class="btn btn-outline-danger" onclick="Remover_Produto_Pedido(` + elemento['cod_produto_pedido'] + `)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                          </svg></button></td>
                            <td>` + elemento['descricao_produto'] + `</td>
                            <td>` + elemento['quantidade_produto'] + `</td>
                            <td>` + elemento['preco_venda'] + `</td>
                            <td>` + elemento['valor_total_produto'] + `</td>
                            <td>` + elemento['observacao_produto_pedido'] + `</td>
                        </tr>`);
            })
        },
        error: function () {
            console.log("Error ao listar produtos no pedido pelo Ajax!");
        }
    })
}

function Form_Alterar_Produto_Pedido(cod_produto_pedido) {
    $.ajax({
        url: "/php/Forms/alterar-produto-pedido.php",
        success: function (result) {
            $('#modal-produto').html(result);
            $.ajax({
                url: "/php/Funcoes/buscar-produto-pedido-json.php",
                method: "POST",
                data: { cod_produto_pedido: cod_produto_pedido },
                dataType: "JSON",
                success: function (result) {

                    result.forEach(function (elemento) {
                        $('#cod_produto_pedido').val(elemento['cod_produto_pedido']);
                        $('#cod_produto').val(elemento['cod_produto']);
                        $('#descricao_produto').val(elemento['descricao_produto']);
                        $('#preco_venda_produto').val(elemento['preco_venda']);
                        $('#quantidade_produto').val(elemento['quantidade_produto']);
                        $('#observacao_produto').val(elemento['observacao_produto_pedido']);
                        Somar_Total_Produto();

                    })

                },
                error: function () {
                    console.log("Error tentar buscar produto para alterar pelo Ajax!");
                }
            })
        },
        error: function () {
            console.log("Error tentar abrir produto para alterar pelo Ajax!");
        }
    })
}

function Alterar_Produto_Pedido() {
    var cod_produto_pedido = $("#cod_produto_pedido").val();
    var quantidade_produto = $("#quantidade_produto").val();
    var valor_total_produto = $("#valor_total_produto").val();
    var observacao_produto = $("#observacao_produto").val();
    $.ajax({
        url: "/php/Funcoes/alterar-produto-pedido.php",
        data: {
            cod_produto_pedido: cod_produto_pedido,
            quantidade_produto: quantidade_produto,
            valor_total_produto: valor_total_produto,
            observacao_produto: observacao_produto
        },
        method: "POST",
        success: function (result) {
            $("#rodape-modal-produto").html('');
            $("#modal-produto").html(result);
            Listar_Produtos_Pedido();
            Atualizar_Valores_Pedido();
            $('#fechar-modal-qtd-produto').click();
        },
        error: function () {
            console.log('Erro ao alterar produto do pedido pelo Ajax!');
        }
    })
}

function Remover_Produto_Pedido(cod_produto_pedido) {
    var cod_pedido = $("#cod_pedido").val();
    $.ajax({
        url: "/php/Funcoes/remover-produto-pedido.php",
        data: { cod_pedido: cod_pedido, cod_produto_pedido: cod_produto_pedido },
        method: "POST",
        success: function (result) {
            Listar_Produtos_Pedido();
            Atualizar_Valores_Pedido()
        },
        error: function () {
            console.log('Erro ao remover produto do pedido pelo Ajax!');
        }
    })
}

function Salvar_Novo_Pedido() {
    var cod_pedido = $("#cod_pedido").val();
    var cod_cliente = $("#cod_cliente").val();
    var cod_opcao_entrega = $("input[type='radio'][name='btnradio-opcao-entrega']:checked").val();
    var descricao_pagamento = $("#descricao_pagamento").val();
    var descricao_endereco_entrega = $("#descricao_endereco_entrega").val();
    var observacao_pagamento = $("#observacao_pagamento").val();
    var valor_produtos = $("#valor_produtos").val();
    var valor_desconto = $("#valor_desconto").val();
    var valor_total = $("#valor_total").val();
    var cod_usuario = $("#cod_usuario").val();

    if (cod_cliente == '') {
        $("#btn-modal-alerta").trigger('click');
        $("#corpo-modal-alerta").html("<h4>Selecione o cliente para salvar o Pedido!</h4>");
    } else if (cod_usuario == '') {
        $("#btn-modal-alerta").trigger('click');
        $("#corpo-modal-alerta").html("<h4>Selecione o usuario para salvar o Pedido!</h4>");
    } else if (valor_produtos == '') {
        $("#btn-modal-alerta").trigger('click');
        $("#corpo-modal-alerta").html("<h4>Selecione no mínimo 1 produto!</h4>");
        $("#btn-adicionar-produto-pedido").focus();
    } else if (descricao_pagamento == '') {
        $("#btn-modal-alerta").trigger('click');
        $("#corpo-modal-alerta").html("<h4>Selecione a forma de pagamento!</h4>");
    } else if (cod_opcao_entrega == null) {
        $("#btn-modal-alerta").trigger('click');
        $("#corpo-modal-alerta").html("<h4>Selecione uma opção de entrega!</h4>");
    } else if (cod_opcao_entrega == 2) {
        if (descricao_endereco_entrega == '') {
            $("#btn-modal-alerta").trigger('click');
            $("#corpo-modal-alerta").html("<h4>Descreva o endereço de entrega!</h4>");
            $("#descricao_endereco_entrega").focus();
        } else {
            $.ajax({
                url: "/php/Funcoes/salvar-novo-pedido.php",
                method: "POST",
                data: {
                    cod_pedido: cod_pedido,
                    cod_cliente: cod_cliente,
                    cod_opcao_entrega: cod_opcao_entrega,
                    descricao_endereco_entrega: descricao_endereco_entrega,
                    descricao_pagamento: descricao_pagamento,
                    observacao_pagamento: observacao_pagamento,
                    valor_produtos: valor_produtos,
                    valor_desconto: valor_desconto,
                    valor_total: valor_total,
                    cod_usuario: cod_usuario
                },
                success: function (result) {
                    $("#btn-modal-alerta").trigger('click');
                    $("#topo-modal-alerta").css("background-color", "#198754");
                    $("#titulo-modal-alerta").html('<h1><span>Sucesso!</span></h1>');
                    $("#corpo-modal-alerta").html(result);
                    $("#rodape-modal-alerta").html("");
                    Imprimir_Pedido_Aberto(cod_pedido);
                    setTimeout(function () {
                        $("#btn-fechar-modal-alerta").trigger('click');
                    }, 3000)
                    setTimeout(function () {
                        location.href = "inicio.php"
                    }, 3300)

                },
                error: function () {
                    console.log("Erro ao Salvar novo pedido pelo Ajax!");
                }
            })
        }
    } else {
        $.ajax({
            url: "/php/Funcoes/salvar-novo-pedido.php",
            method: "POST",
            data: {
                cod_pedido: cod_pedido,
                cod_cliente: cod_cliente,
                cod_opcao_entrega: cod_opcao_entrega,
                descricao_endereco_entrega: null,
                descricao_pagamento: descricao_pagamento,
                observacao_pagamento: observacao_pagamento,
                valor_produtos: valor_produtos,
                valor_desconto: valor_desconto,
                valor_total: valor_total,
                cod_usuario: cod_usuario
            },
            success: function (result) {
                $("#btn-modal-alerta").trigger('click');
                $("#topo-modal-alerta").css("background-color", "#198754");
                $("#titulo-modal-alerta").html('<h1><span>Sucesso!</span></h1>');
                $("#corpo-modal-alerta").html(result);
                $("#rodape-modal-alerta").html("");
                Imprimir_Pedido_Aberto(cod_pedido);
                setTimeout(function () {
                    $("#btn-fechar-modal-alerta").trigger('click');
                }, 3000)
                setTimeout(function () {
                    location.href = "inicio.php"
                }, 3300)

            },
            error: function () {
                console.log("Erro ao Salvar novo pedido pelo Ajax!");
            }
        })
    }
}

//Seção de Listagem de Pedidos Abertos
function Form_Alterar_Pedido_Aberto(cod_pedido) {
    $.ajax({
        url: "/php/Forms/alterar-pedido-aberto.php",
        success: function (result) {
            $("#body-pedidos-abertos").html(result);
            $("#valor_desconto").mask("000000000000.00", { reverse: true });
            Radios_Opçoes_Entrega();
            Check_Opçoes_Pagamento();
            $.ajax({
                url: "/php/Funcoes/listar-pedido-aberto-json.php",
                dataType: "JSON",
                data: { cod_pedido: cod_pedido },
                method: "POST",
                success: function (result) {
                    result.forEach(function (elemento) {
                        $("#cod_pedido").val(elemento['cod_pedido']);
                        $("#cod_cliente").val(elemento['cod_cliente']);
                        $("#nome_cliente").val(elemento['nome_cliente']);
                        var pag = elemento['descricao_pagamento'];
                        setTimeout(function () {
                            switch (pag) {
                                case 'Dinheiro':
                                    $("#Dinheiro").trigger('click');
                                    break;
                                case 'Pix':
                                    $("#Pix").trigger('click');
                                    break;
                                case 'Cartão Débito':
                                    $("#Cartão Débito").trigger('click');
                                    break;
                                case 'Cartão Crédito':
                                    $("#Cartão Crédito").trigger('click');
                                    break;
                                case 'Dinheiro + Pix':
                                    $("#Pix").trigger('click');
                                    $("#Dinheiro").trigger('click');
                                    break;
                                case 'Dinheiro + Cartão Débito':
                                    $("#Dinheiro").trigger('click');
                                    $("#Cartão Débito").trigger('click');
                                    break;
                                case 'Dinheiro + Cartão Crédito':
                                    $("#Dinheiro").trigger('click');
                                    $("#Cartão Crédito").trigger('click');
                                    break;
                                case 'Dinheiro + Pix + Cartão Débito':
                                    $("#Dinheiro").trigger('click');
                                    $("#Pix").trigger('click');
                                    $("#Cartão Débito").trigger('click');
                                    break;
                                case 'Dinheiro + Pix + Cartão Crédito':
                                    $("#Dinheiro").trigger('click');
                                    $("#Pix").trigger('click');
                                    $("#Cartão Crédito").trigger('click');
                                    break;
                                case 'Dinheiro + Pix + Cartão Débito + Cartão Crédito':
                                    $("#Dinheiro").trigger('click');
                                    $("#Pix").trigger('click');
                                    $("#Cartão Débito").trigger('click');
                                    $("#Cartão Crédito").trigger('click');
                                    break;
                                case 'Pix + Cartão Débito':
                                    $("#Pix").trigger('click');
                                    $("#Cartão Débito").trigger('click');
                                    break;
                                case 'Pix + Cartão Crédito':
                                    $("#Pix").trigger('click');
                                    $("#Cartão Crédito").trigger('click');
                                    break;
                                case 'Pix + Cartão Débito + Cartão Crédito':
                                    $("#Pix").trigger('click');
                                    $("#Cartão Débito").trigger('click');
                                    $("#Cartão Crédito").trigger('click');
                                    break;
                                case 'Cartão Débito + Cartão Crédito':
                                    $("#Cartão Débito").trigger('click');
                                    $("#Cartão Crédito").trigger('click');
                                    break;
                                default:
                                    console.log('Erro no switch case forma de pagamento!');
                            }
                        }, 200)
                        $("#observacao_pagamento").val(elemento['observacao_pagamento']);
                        op_entre = elemento['cod_opcao_entrega'];
                        setTimeout(function () {
                            if (op_entre == 1) {
                                $("#1").trigger('click');
                            }
                            else if (op_entre == 2) {
                                $("#2").trigger('click');
                                $("#descricao_endereco_entrega").val(elemento['descricao_endereco_entrega']);
                            }
                            else if (op_entre == 3) {
                                $("#3").trigger('click');
                            } else {
                                console.log('Erro no switch case opção de entrega!');
                            }
                        }, 200)
                        $("#valor_produtos").val(elemento['valor_produtos']);
                        $("#valor_desconto").val(elemento['valor_desconto']);
                        $("#valor_total").val(elemento['valor_total']);

                    })
                },
                error: function () {
                    console.log("Error ao listar produtos no pedido pelo Ajax!");
                }
            })
        }
    })
}

function Salvar_Alteracao_Pedido_Aberto() {
    var cod_pedido = $("#cod_pedido").val();
    var descricao_pagamento = $("#descricao_pagamento").val();
    var observacao_pagamento = $("#observacao_pagamento").val();
    var cod_opcao_entrega = $("input[type='radio'][name='btnradio-opcao-entrega']:checked").val();
    var descricao_endereco_entrega = $("#descricao_endereco_entrega").val();
    var valor_produtos = $("#valor_produtos").val();
    var valor_desconto = $("#valor_desconto").val();
    var valor_total = $("#valor_total").val();

    if (descricao_pagamento == '') {
        $("#btn-modal-alerta").trigger('click');
        $("#corpo-modal-alerta").html("<h4>Selecione a forma de pagamento!</h4>");
    } else if (cod_opcao_entrega == null) {
        $("#btn-modal-alerta").trigger('click');
        $("#corpo-modal-alerta").html("<h4>Selecione uma opção de entrega!</h4>");
    } else if (cod_opcao_entrega == 2) {
        if (descricao_endereco_entrega == '') {
            $("#btn-modal-alerta").trigger('click');
            $("#corpo-modal-alerta").html("<h4>Descreva o endereço de entrega!</h4>");
            $("#descricao_endereco_entrega").focus();
        } else {
            $.ajax({
                url: "/php/Funcoes/salvar-alteracao-pedido-aberto.php",
                method: "POST",
                data: {
                    cod_pedido: cod_pedido,
                    cod_opcao_entrega: cod_opcao_entrega,
                    descricao_endereco_entrega: descricao_endereco_entrega,
                    descricao_pagamento: descricao_pagamento,
                    observacao_pagamento: observacao_pagamento,
                    valor_produtos: valor_produtos,
                    valor_desconto: valor_desconto,
                    valor_total: valor_total
                },
                success: function (result) {
                    $("#modal-header").css("background-color", "#198754");
                    $("#titulo-pedidos-abertos").html('<h1><span>Alteração feita Sucesso!</span></h1>');
                    $("#body-pedidos-abertos").html(result);
                    setTimeout(function () {
                        $("#btn-fechar-modal-pedido-abertos").trigger('click');
                    }, 3000)
                    setTimeout(function () {
                        location.href = "inicio.php"
                    }, 3300)

                },
                error: function () {
                    console.log("Erro ao Salvar novo pedido pelo Ajax!");
                }
            })
        }
    } else {
        $.ajax({
            url: "/php/Funcoes/salvar-alteracao-pedido-aberto.php",
            method: "POST",
            data: {
                cod_pedido: cod_pedido,
                cod_opcao_entrega: cod_opcao_entrega,
                descricao_endereco_entrega: null,
                descricao_pagamento: descricao_pagamento,
                observacao_pagamento: observacao_pagamento,
                valor_produtos: valor_produtos,
                valor_desconto: valor_desconto,
                valor_total: valor_total
            },
            success: function (result) {
                $("#modal-header").css("background-color", "#198754");
                $("#titulo-pedidos-abertos").html('<h1><span>Alteração feita Sucesso!</span></h1>');
                $("#body-pedidos-abertos").html(result);
                setTimeout(function () {
                    $("#btn-fechar-modal-pedido-abertos").trigger('click');
                }, 3000)
                setTimeout(function () {
                    location.href = "inicio.php"
                }, 3300)

            },
            error: function () {
                console.log("Erro ao Salvar novo pedido pelo Ajax!");
            }
        })
    }
}

function Salvar_Preparando_Pedido(cod_pedido) {
    $.ajax({
        url: "/php/Funcoes/salvar-preparando-pedido.php",
        method: "POST",
        data: { cod_pedido: cod_pedido },
        success: function (result) {
            console.log(result);
            Tabela_Pedidos_Abertos()
        },
        error: function () {
            console.log('Erro ao passar pedido para preparando pelo Ajax!');
        }
    })
}

function Form_Cancelar_Pedido(cod_pedido) {
    $.ajax({
        url: "/php/Forms/cancelamento-pedido.php",
        success: function (result1) {
            $("#body-pedidos-abertos").html(result1);
            $("#cod_pedido").val(cod_pedido);
            $("#titulo-pedidos-abertos").html("Cancelamento de Pedido!");
        },
        error: function () {
            console.log("Erro ao abrir modal cancelar pedido pelo Ajax!");
        }
    })
}

function Salvar_Cancelar_Pedido() {
    var cod_pedido = $("#cod_pedido").val();
    var observacao_cancelamento = $("#observacao_cancelamento").val()
    if (observacao_cancelamento == '') {
        $("#body-pedidos-abertos").append("Campo de Observação é Obrigatório!");
        $("#observacao_cancelamento").focus();
    } else {
        $.ajax({
            url: "/php/Funcoes/salvar-cancelar-pedido.php",
            method: "POST",
            data: {
                cod_pedido: cod_pedido,
                observacao_cancelamento: observacao_cancelamento
            },
            success: function (result) {
                $("#body-pedidos-abertos").html(result);
                Tabela_Pedidos_Abertos();
            },
            error: function () {
                console.log('Erro ao passar pedido para finalizado pelo Ajax!');
            }
        })
    }

}

function Tabela_Pedidos_Abertos() {
    $('#tabela-pedidos-abertos').html(`
        <div class="col-md-12" style="text-align:center">
            <img src="../../pedideli/img/carregando.gif">
        </div>`
    );
    $.ajax({
        url: "/php/Funcoes/listar-pedidos-abertos-json.php",
        dataType: "JSON",
        success: function (result) {
            $('#tabela-pedidos-abertos').html(`
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Impressão</th>
                            <th scope="col">Opções</th>
                            <th scope="col">Cod.Pedido</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Valor Total</th>
                            <th scope="col">Data/Hora Abertura</th>
                            <th scope="col">Status do Pedido</th>
                            <th scope="col">Entrega</th>
                            <th scope="col">Endereço</th>
                            
                        </tr>
                    </thead>
                    <tbody id="corpo-tabela-pedidos-abertos">`);

            result.forEach(function (elemento) {
                $('#corpo-tabela-pedidos-abertos').append(`
                        <tr>
                            <div id="botoes"><td><button type="button" class="btn btn-primary" onclick="Imprimir_Pedido_Aberto(` + elemento['cod_pedido'] + `)">Imprimir</button></td>
                            <td><!--<button type="button" class="btn btn-secondary" onclick="Salvar_Preparando_Pedido(` + elemento['cod_pedido'] + `)">Preparando</button>-->
                            <button type="button" class="btn btn-success" onclick="Salvar_Finalizar_Pedido(` + elemento['cod_pedido'] + `)">Finalizar</button>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-pedidos-abertos" onclick="Form_Alterar_Pedido_Aberto(` + elemento['cod_pedido'] + `)">Alterar</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-pedidos-abertos" onclick="Form_Cancelar_Pedido(` + elemento['cod_pedido'] + `)">Cancelar</button></td></div>
                            <td>` + elemento['cod_pedido'] + `</td>
                            <td>` + elemento['nome_cliente'] + `</td>
                            <td>` + elemento['valor_total'] + `</td>
                            <td>` + elemento['data_hora_abertura'] + `</td>
                            <td>` + elemento['status_pedido'] + `</td>
                            <td>` + elemento['descricao_opcao_entrega'] + `</td>
                            <td>` + elemento['descricao_endereco_entrega'] + `</td>
                            
                        </tr>`);
            })
            $('#tabela-pedidos-abertos').append(`
                    </tbody>
                </table>`);
        },
        error: function () {
            console.log("Error ao listar produtos no pedido pelo Ajax!");
        }
    })
}

function Listar_Pedidos_Abertos() {
    $("#close-offcanvas").trigger('click'); //Fecha offcanvas
    $.ajax({
        url: "/php/Forms/lista-pedidos-abertos.php",
        success: function (result) {
            $("#logo").html(result);
            Tabela_Pedidos_Abertos();
        }
    })
}

//Seção Vendas
function Form_Nova_Venda() {
    $("#close-offcanvas").trigger('click'); //Fecha offcanvas
    $.ajax({
        url: "/php/Forms/nova-venda.php",
        success: function (result) {
            $("#logo").html(result);
            $("#valor_desconto").mask("000000000000.00", { reverse: true });
            Abrir_Venda();
            Check_Opçoes_Pagamento();
        }
    })
}

function Abrir_Venda() {
    $.ajax({
        url: "/php/Funcoes/abrir-venda-json.php",
        dataType: "JSON",
        success: function (result) {
            result.forEach(function (elemento) {
                $('#cod_venda').val(elemento['cod_venda']);
            })
        },
        error: function () {
            console.log("Error ao abrir venda pelo Ajax!");
        }
    })
}

function Listar_Pedidos_Abertos_Modal() {
    $.ajax({
        url: "/php/Funcoes/listar-pedidos-abertos-json.php",
        dataType: "JSON",
        success: function (result) {
            $('#body-modal-pedidos').html(`
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Cod.Pedido</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Valor Total</th>
                            <th scope="col">Data/Hora Abertura</th>
                            <th scope="col">Status do Pedido</th>
                            <th scope="col">Entrega</th>
                            <th scope="col">Endereço</th>
                            <th scope="col"></th>
                            
                        </tr>
                    </thead>
                    <tbody id="corpo-tabela-pedidos-venda-modal">`);

            result.forEach(function (elemento) {
                $('#corpo-tabela-pedidos-venda-modal').append(`
                        <tr>
                            <td>` + elemento['cod_pedido'] + `</td>
                            <td>` + elemento['nome_cliente'] + `</td>
                            <td>` + elemento['valor_total'] + `</td>
                            <td>` + elemento['data_hora_abertura'] + `</td>
                            <td>` + elemento['status_pedido'] + `</td>
                            <td>` + elemento['descricao_opcao_entrega'] + `</td>
                            <td>` + elemento['descricao_endereco_entrega'] + `</td>
                            <td><button type="button" class="btn btn-outline-primary" onclick="Form_Selecao_Pedido(` + elemento['cod_pedido'] + `)">Selecionar</button></td>
                            
                        </tr>`);
            })
            $('#tabela-pedidos-venda').append(`
                    </tbody>
                </table>`);
        },
        error: function () {
            console.log("Error ao listar pedidos na venda pelo Ajax!");
        }
    })
}

function Form_Selecao_Pedido(cod_pedido) {
    $.ajax({
        url: "/php/Forms/confirma-selecao-pedido.php",
        success: function (result) {
            $('#body-modal-pedidos').html(
                `<div class="col-12">
                <button type="button" class="btn btn-outline-secondary"  onclick="Listar_Pedidos_Abertos_Modal()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg> Voltar
                </button>
            </div><br>` + result);
            $.ajax({
                url: "/php/Funcoes/listar-pedido-aberto-json.php",
                method: "POST",
                data: { cod_pedido: cod_pedido },
                dataType: "JSON",
                success: function (result) {
                    result.forEach(function (elemento) {
                        $('#cod_pedido').val(elemento['cod_pedido']);
                        $('#valor_total_pedido').val(elemento['valor_total']);
                    })

                },
                error: function () {
                    console.log("Error aqui");
                }
            })
        },
        error: function () {
            console.log("Error aqui2");
        }
    })
}

function Salvar_Pedido_Venda() {
    var cod_pedido = $("#cod_pedido").val();
    var cod_venda = $("#cod_venda").val();
    var valor_total_pedido = $("#valor_total_pedido").val();
    cod_pedido
    $.ajax({
        url: "/php/Funcoes/salvar-pedido-venda.php",
        method: "POST",
        data: {
            cod_pedido: cod_pedido,
            cod_venda: cod_venda,
            valor_total_pedido: valor_total_pedido
        },
        success: function (result) {
            $("#rodape-modal-pedidos").html(result);
            Listar_Pedidos_Venda();
            Listar_Pedidos_Abertos_Modal();
            Atualizar_Valores_Venda();
        },
        error: function () {
            console.log("Error ao inserir pedido na venda pelo Ajax!");
        }
    })
}

function Listar_Pedidos_Venda() {
    var cod_venda = $("#cod_venda").val();
    $.ajax({
        url: "/php/Funcoes/listar-pedido-venda-json.php",
        method: "POST",
        data: { cod_venda: cod_venda },
        dataType: "JSON",
        success: function (result) {
            $('#tabela-pedidos-venda').html(`
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Opções</th>
                            <th scope="col">Cod. Pedido</th>
                            <th scope="col">Valor Pedido</th>
                            <th scope="col">Entrega</th>
                            <th scope="col">Cliente</th>
                        </tr>
                    </thead>
                    <tbody id="corpo-tabela-pedidos-venda">`);

            result.forEach(function (elemento) {
                $('#corpo-tabela-pedidos-venda').append(`
                        <tr>
                            <td><button type="button" class="btn btn-outline-danger" onclick="Remover_Pedido_Venda(` + elemento['cod_pedido'] + `)">Remover</button></td>
                            <td>` + elemento['cod_pedido'] + `</td>
                            <td>` + elemento['valor_total_pedido'] + `</td>
                            <td>` + elemento['descricao_opcao_entrega'] + `</td>
                            <td>` + elemento['nome_cliente'] + `</td>
                        </tr>`);
                $("#cod_cliente").val(elemento['cod_cliente']);
                $("#nome_cliente").val(elemento['nome_cliente']);
            })
            $('#tabela-pedidos-venda').append(`
                    </tbody>
                </table>`);
        },
        error: function () {
            console.log("Error ao listar produtos no pedido pelo Ajax!");
        }
    })
}

function Atualizar_Desconto_Venda() {
    $("#valor_total").val($("#valor_pedidos").val() - $("#valor_desconto").val());
}

function Atualizar_Valores_Venda() {
    var cod_venda = $("#cod_venda").val();
    $.ajax({
        url: "/php/Funcoes/valor-pedidos-venda-json.php",
        method: "POST",
        data: { cod_venda: cod_venda },
        dataType: "JSON",
        success: function (result) {
            result.forEach(function (elemento) {
                $("#valor_pedidos").val(elemento['valor_total_pedidos']);
            })
            $("#valor_total").val($("#valor_pedidos").val() - $("#valor_desconto").val());
            Atualizar_Desconto_Venda();
        },
        error: function () {
            console.log('Erro ao atualizar valores da venda pelo Ajax!');
        }
    })
}

function Remover_Pedido_Venda(cod_pedido) {
    var cod_venda = $("#cod_venda").val();
    $.ajax({
        url: "/php/Funcoes/remover-pedido-venda.php",
        data: { cod_pedido: cod_pedido, cod_venda: cod_venda },
        method: "POST",
        success: function (result) {
            Listar_Pedidos_Venda();
            Atualizar_Valores_Venda();
        },
        error: function () {
            console.log('Erro ao remover pedido da venda pelo Ajax!');
        }
    })
}

function Salvar_Finalizar_Pedido(cod_venda) {
    $.ajax({
        url: "/php/Funcoes/salvar-finalizar-pedido.php",
        method: "POST",
        data: { cod_venda: cod_venda },
        success: function (result) {
            console.log(result);
        },
        error: function () {
            console.log('Erro ao passar pedido para finalizado pelo Ajax!');
        }
    })
}

function Salvar_Nova_Venda_venda() {
    var cod_venda = $("#cod_venda").val();
    var cod_cliente = $("#cod_cliente").val();
    var descricao_pagamento = $("#descricao_pagamento").val();
    var valor_dinheiro = $("#valor_dinheiro").val();
    var valor_pix = $("#valor_pix").val();
    valor_cartao_debito = $("#valor_cartao_debito").val();
    valor_cartao_credito = $("#valor_cartao_credito").val();

    var valor_troco = $("#valor_troco").val();
    var valor_pedidos = $("#valor_pedidos").val();
    var valor_desconto = $("#valor_desconto").val();
    var valor_total = $("#valor_total").val();
    var valor_pagamento = $("#valor_pagamento").val();
    if (valor_dinheiro === undefined) {
        valor_dinheiro = 0;
    } if (valor_pix === undefined) {
        valor_pix = 0;
    } if (valor_cartao_debito === undefined) {
        valor_cartao_debito = 0;
    } if (valor_cartao_credito === undefined) {
        valor_cartao_credito = 0;
    } else {
        console.log("saiu");
    }
    if (cod_cliente == '') {
        $("#btn-modal-alerta").trigger('click');
        $("#corpo-modal-alerta").html("<h4>Selecione o cliente para salvar o Pedido!</h4>");
    } else if (valor_pedidos == '') {
        $("#btn-modal-alerta").trigger('click');
        $("#corpo-modal-alerta").html("<h4>Selecione no mínimo 1 pedido!</h4>");
        $("#btn-adicionar-produto-pedido").focus();
    } else if (descricao_pagamento == '') {
        $("#btn-modal-alerta").trigger('click');
        $("#corpo-modal-alerta").html("<h4>Selecione a forma de pagamento!</h4>");
    } else if (valor_pagamento == '') {
        $("#btn-modal-alerta").trigger('click');
        $("#corpo-modal-alerta").html("<h4>Insira o valor de pagamento!</h4>");
    } else if (valor_pagamento < valor_total) {
        $("#btn-modal-alerta").trigger('click');
        $("#corpo-modal-alerta").html("<h4>Valor(es) de pagamento(s) está(ão) incorreto(s)!</h4>");
    } else {
        $.ajax({
            url: "/php/Funcoes/salvar-nova-venda.php",
            method: "POST",
            data: {
                cod_venda: cod_venda,
                cod_cliente: cod_cliente,
                descricao_pagamento: descricao_pagamento,
                valor_dinheiro: valor_dinheiro,
                valor_pix: valor_pix,
                valor_cartao_debito: valor_cartao_debito,
                valor_cartao_credito: valor_cartao_credito,
                valor_troco: valor_troco,
                valor_pedidos: valor_pedidos,
                valor_desconto: valor_desconto,
                valor_total: valor_total
            },
            success: function (result) {
                Salvar_Finalizar_Pedido(cod_venda);
                $("#btn-modal-alerta").trigger('click');
                $("#topo-modal-alerta").css("background-color", "#198754");
                $("#titulo-modal-alerta").html('<h1><span>Sucesso!</span></h1>');
                $("#corpo-modal-alerta").html(result);
                $("#rodape-modal-alerta").html("");
                setTimeout(function () {
                    $("#btn-fechar-modal-alerta").trigger('click');
                }, 3000)
                setTimeout(function () {
                    location.href = "inicio.php"
                }, 3300)

            },
            error: function () {
                console.log("Erro ao Salvar novo pedido pelo Ajax!");
            }
        })
    }
}

function Listar_Vendas_Data() {
    $("#close-offcanvas").trigger('click'); //Fecha offcanvas
    $.ajax({
        url: "/php/Forms/lista-vendas-data.php",
        success: function (result) {
            $("#logo").html(result);

            const d = new Date();
            hora = d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();
            const meses = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
            mes = meses[d.getMonth()];
            data = d.getFullYear() + '-' + mes + '-' + d.getDate();


            $("#data").html(`
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Data</span>
                <input type="date" class="form-control" autocomplete="off" name="data_venda" id="data_venda" value="`+ data + `" onchange="Tabela_Vendas_Data()">
            </div>
            `);
            Tabela_Vendas_Data();
        }
    })
}

function Tabela_Vendas_Data() {
    data_venda = $("#data_venda").val();

    $.ajax({
        url: "/php/Funcoes/listar-vendas-data-json.php",
        method: "POST",
        data: { data_venda: data_venda },
        dataType: "JSON",
        success: function (result2) {
            console.log(data_venda);
            $('#tabela-vendas-data').html(`
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Impressão</th>
                            <th scope="col">Cod.Venda</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Pagamento</th>
                            <th scope="col">Valor Dinheiro</th>
                            <th scope="col">Valor Pix</th>
                            <th scope="col">Valor Cartão Débito</th>
                            <th scope="col">Valor Cartão Crédito</th>
                            <th scope="col">Valor Pedidos</th>
                            <th scope="col">Valor Desconto</th>
                            <th scope="col">Valor Total</th>
                            <th scope="col">Data</th>
                            <th scope="col">Hora</th>
                            
                        </tr>
                    </thead>
                    <tbody id="corpo-tabela-vendas-data">`);

            result2.forEach(function (elemento2) {

                $('#corpo-tabela-vendas-data').append(`
                        <tr>
                            <td><button type="button" class="btn btn-primary" onclick="Imprimir_Venda(` + elemento2['cod_venda'] + `)">Imprimir</button></td>
                            <td>` + elemento2['cod_venda'] + `</td>
                            <td>` + elemento2['nome_cliente'] + `</td>
                            <td>` + elemento2['descricao_pagamento'] + `</td>
                            <td>` + elemento2['valor_pagamento_dinheiro'] + `</td>
                            <td>` + elemento2['valor_pagamento_pix'] + `</td>
                            <td>` + elemento2['valor_pagamento_cartao_debito'] + `</td>
                            <td>` + elemento2['valor_pagamento_cartao_credito'] + `</td>
                            <td>` + elemento2['valor_pedidos'] + `</td>
                            <td>` + elemento2['valor_desconto'] + `</td>
                            <td>` + elemento2['valor_total_venda'] + `</td>
                            <td>` + elemento2['data_venda'] + `</td>
                            <td>` + elemento2['hora_venda'] + `</td>
                        </tr>`
                );



            })

            $('#tabela-vendas-data').append(`
                    </tbody>
                </table>`);
            $.ajax({
                url: "/php/Funcoes/listar-valores-vendas-data-json.php",
                method: "POST",
                data: { data_venda: data_venda },
                dataType: "JSON",
                success: function (result) {
                    result.forEach(function (elemento) {
                        if (elemento['total_vendas'] == null) {
                            $("#valores").html(``);
                            console.log("tsette");
                        } else {
                            $("#valores").html(`
                            <label> Dinheiro <span class="badge rounded-pill bg-success"> R$`+ elemento['dinheiro'] + ` </span></label>
                            <label> Troco <span class="badge rounded-pill bg-success"> R$`+ elemento['troco'] + ` </span></label>
                            <label> Total Dinheiro <span class="badge rounded-pill bg-success"> R$`+ elemento['total_dinheiro'] + ` </span></label>
                            <label> Pix <span class="badge rounded-pill bg-success"> R$`+ elemento['pix'] + ` </span></label>
                            <label> Cartão Débito <span class="badge rounded-pill bg-success"> R$`+ elemento['cartao_debito'] + ` </span></label>
                            <label> Cartão Crédito <span class="badge rounded-pill bg-success"> R$`+ elemento['cartao_credito'] + ` </span></label>
                            <label> Total Desconto <span class="badge rounded-pill bg-warning"> R$`+ elemento['desconto'] + ` </span></label>
                            <label> Total Vendas <span class="badge rounded-pill bg-success"> R$`+ elemento['total_vendas'] + ` </span></label>
                            <h3> Qtd Pedidos <span class="badge rounded-pill bg-success"> `+ elemento['qtd_pedidos'] + ` </span>
                             Qtd Vendas <span class="badge rounded-pill bg-success"> `+ elemento['qtd_vendas'] + ` </span></h3>
                        `);
                        }

                    })
                }, error: function () {
                    console.log("Erro ao listar valores das vendas pelo Ajax!");
                }
            })

        },
        error: function () {
            console.log("Error ao listar Vendas pelo Ajax!");
        }
    })
}

//Seção de Impressão
function Imprimir_Pedido_Aberto(cod_pedido) {
    // CRIA UM OBJETO WINDOW
    var win = window.open('', '', 'height=720,width=1080');
    win.document.write('<html><head>');
    win.document.write(`<style>
        body {
            display: flex;
            justify-content: center;
            margin: 0;
            font-family: 'Courier New', Courier, monospace;
        }

        #conteudo {
            text-align: center;
            padding: 1px;
        }

        #dados-cliente{
            text-align: left;
        }

        #texto-cabecalho {
            margin-top: 2px;
            margin-bottom: 0;
        }

        #nao-fiscal {
            margin: 0;
        }

        #dados-empresa {
            font-size: 11px;
        }

        #dados-cliente {
            font-size: 11px;
        }

        div #valores,
        #dados-valores {
            font-size: 12px;
            width: 120px;
            height: 40px;
            display: inline-block;
        }
        #valores{
            text-align: left;
        }

        #dados-valores {
            text-align: right;
            font-weight: bold;
        }

        #obs-valores {
            text-align: left;
            font-weight: bold;
            margin-bottom: 50px;
        }

        .text-center{
            text-align: center;
        }
        .text-left{
            text-align: left;
        }</style>`);
    win.document.write('<title>Impressão de Pedido</title>'); // <title> CABEÇALHO DO PDF.
    win.document.write('</head>');
    win.document.write('<body>');
    $.ajax({
        url: "/php/Funcoes/listar-pedido-aberto-json.php",
        dataType: "JSON",
        data: { cod_pedido: cod_pedido },
        method: "POST",
        success: function (result) {
            result.forEach(function (elemento) {
                data = elemento['data_hora_abertura'];
                ano = data.substring(0, 4);
                mes = data.substring(5, 7);
                dia = data.substring(8, 10)
                hora = data.substring(11);
                win.document.write(`<div id="conteudo">
    <div id="cabecalho">
        <img src="https://emporiodapizzago.com.br/pedideli/img/Logo Pizzaria login.png" alt="" width="150" height="82"><br>
        <div id="dados-empresa">
            <label>AV. DAS PALMEIRAS INDIARA-GO</label><br>
            <label>CNPJ:23.077.901/0001-87</label><br>
            <label>WhatsApp:(64)9 8145-3615</label><br>
            <label>www.emporiodapizzago.com.br</label>
            <h3 id="nao-fiscal">*****COMPROVANTE NÃO FISCAL*****</h3>
        </div>
        <h2 id="texto-cabecalho">Pedido:  ` + elemento['cod_pedido'] + `</h2>
        <h3 id="texto-cabecalho">Atendente:  ` + elemento['nome_usuario'] + `</h3>
        <div id="data-hora">` + dia + `/` + mes + `/` + ano + ` ` + hora + `</div>
        <label>` + elemento['descricao_opcao_entrega'] + `</label><br>
        <label style="font-weight: bold;">` + elemento['descricao_endereco_entrega'] + `</label>
    </div>
    <div id="dados-cliente">
        <label>--------------------------------------</label><br>
        <label style="font-weight: bold;">DADOS CLIENTE</label><br>
        <label>NOME.: ` + elemento['nome_cliente'] + `</label><br>
        <label>FONE.: ` + elemento['celular_cliente'] + `</label><br>
        <label>END..: ` + elemento['rua_cliente'] + ` ` + elemento['complemento_cliente'] + ` ` + elemento['num_ende_cliente'] + `</label><br>
        <label>--------------------------------------</label>
    </div>
    <div id="Tabela">
        <table>
            <thead>
                <tr>
                    <th>QTD</th>
                    <th>PRODUTO</th>
                    <th>VALOR</th>
                </tr>
            </thead>
            <tbody>`);
                $.ajax({
                    url: "/php/Funcoes/listar-produto-pedido-json.php",
                    method: "POST",
                    data: { cod_pedido: cod_pedido },
                    dataType: "JSON",
                    success: function (result2) {
                        result2.forEach(function (elemento2) {
                            if (elemento2['observacao_produto_pedido'] == '') {
                                if (elemento2['quantidade_produto'] == 0.5) {
                                    win.document.write(`<tr>
                                    <td style="font-size: 17px;font-weight: bold;">Meia</td>
                                    <td>` + elemento2['descricao_produto'] + `</td>
                                    <td style="font-size: 11px;font-weight: bold;">R$` + elemento2['valor_total_produto'] + `</td>
                                </tr>
                                <tr>
                                    <td><label style="font-size: 11px;">------</label></td>
                                    <td><label style="font-size: 11px;">-----------------------</label></td>
                                    <td><label style="font-size: 11px;">-------</label></td>
                                </tr>
                                `);
                                } else {
                                    win.document.write(`<tr>
                                    <td class="text-center" style="font-size: 17px;font-weight: bold;">` + elemento2['quantidade_produto'] + `</td>
                                    <td>` + elemento2['descricao_produto'] + `</td>
                                    <td class="text-center" style="font-size: 11px;font-weight: bold;">R$` + elemento2['valor_total_produto'] + `</td>
                                </tr>
                                <tr>
                                    <td><label style="font-size: 11px;">------</label></td>
                                    <td><label style="font-size: 11px;">-----------------------</label></td>
                                    <td><label style="font-size: 11px;">-------</label></td>
                                </tr>
                                `);
                                }
                            } else {
                                if (elemento2['quantidade_produto'] == 0.5) {
                                    win.document.write(`<tr>
                                    <td style="font-size:17px;font-weight: bold;">Meia</td>
                                    <td>` + elemento2['descricao_produto'] + `</td>
                                    <td style="font-size: 11px;font-weight: bold;">R$` + elemento2['valor_total_produto'] + `</td>
                                    <tr><th>Obs:</th><td>` + elemento2['observacao_produto_pedido'] + `</td></tr>
                                </tr>
                                <tr>
                                    <td><label style="font-size: 11px;">------</label></td>
                                    <td><label style="font-size: 11px;">-----------------------</label></td>
                                    <td><label style="font-size: 11px;">-------</label></td>
                                </tr>
                                `);
                                } else {
                                    win.document.write(`<tr>
                                    <td style="font-size:17px;font-weight: bold;">` + elemento2['quantidade_produto'] + `</td>
                                    <td>` + elemento2['descricao_produto'] + `</td>
                                    <td style="font-size: 11px;font-weight: bold;">R$` + elemento2['valor_total_produto'] + `</td>
                                    <tr><th>Obs:</th><td>` + elemento2['observacao_produto_pedido'] + `</td></tr>
                                </tr>
                                <tr>
                                    <td><label style="font-size: 11px;">------</label></td>
                                    <td><label style="font-size: 11px;">-----------------------</label></td>
                                    <td><label style="font-size: 11px;">-------</label></td>
                                </tr>
                                `);
                                }
                            }
                        })
                    }
                });
                setTimeout(function () {
                    win.document.write(`</tbody>
                </table>
            </div>
            <!--<label style="font-size: 11px;">----------------------------------------</label><br>-->
            <div id="valores">
                <label>Qtd. Itens</label><br>
                <label style="font-size: 11px;">Valor Produtos R$</label><br>
                <label>Desconto R$</label><br>
                <label>Valor Total R$</label><br>
                <label>Forma Pagamento</label><br>
            </div>
            <div id="dados-valores">
                <label>` + elemento['qtd_total_produtos'] + `</label><br>
                <label>` + elemento['valor_produtos'] + `</label><br>
                <label>` + elemento['valor_desconto'] + `</label><br>
                <label>` + elemento['valor_total'] + `</label><br>
                <label>` + elemento['descricao_pagamento'] + `</label><br>
            </div>
            <div id="obs-valores">
                <label>Obs. de pagamento: </label><br>
                <label>` + elemento['observacao_pagamento'] + `</label>
            </div>
        </div>`);
                }, 2000)
            })
        },
        error: function () {
            console.log("Erro ao listar pedidos abertos para imprimir!");
        }
    });

    win.document.write('</body></html>');
    setTimeout(function () {
        win.print(); // IMPRIME O CONTEUDO
        win.document.close(); // FECHA A JANELA
    }, 4000)
}

//Seção de Cargos
function Form_Cargo() {
    $("#close-offcanvas").trigger('click'); //Fecha offcanvas
    $.ajax({
        url: "/php/Forms/cadastra-cargo.php",
        success: function (result) {
            $("#logo").html(result);
        }
    })
}

function Salvar_Cargo() {
    $.ajax({
        url: "/php/Funcoes/salvar-cargo.php",
        method: "POST",
        data: $('#Form1').serialize(),
        success: function (result) {
            $("#modal-body").html(result);
        },
        error: function () {
            $("#modal-body").html("Erro na função Java Script!");
        }
    })
}

//Seção Usuário
function Form_Usuario() {
    ComboboxCargo();
    $.ajax({
        url: "/php/Forms/cadastra-usuario.php",
        success: function (result) {
            $("#modal-body").html(result);
            ComboboxCargo();
        }
    })
}

function Listar_Usuario() {
    $("#close-offcanvas").trigger('click'); //Fecha offcanvas
    $.ajax({
        url: "/php/Forms/lista-usuario.php",
        success: function (result) {
            $("#logo").html(result);
        }
    })
}

function ComboboxCargo() {
    $.ajax({
        url: "/php/Funcoes/listar-cargo.php",
        success: function (result) {
            $("#Resul-cargo").html(result);
        },
        error: function () {
            $("#Resul-cargo").html("Error");
        }
    });
}

function Salvar_Usuario() {
    $.ajax({
        url: "/php/Funcoes/salvar-usuario.php",
        method: "POST",
        data: $('#Form1').serialize(),
        success: function (result) {
            $("#modal-body").html(result);
        },
        error: function () {
            $("#modal-body").html("Erro na função Java Script!");
        }
    })
}