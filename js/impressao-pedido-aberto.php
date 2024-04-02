<style>
    #conteudo {
        width: 38%;
        margin-left: 31%;
        margin-right: 31%;
        font-family: 'Courier New', Courier, monospace;
    }

    #cabecalho {
        text-align: center;
    }

    #texto-cabecalho {
        margin-top: 2px;
        margin-bottom: 0;
    }

    #nao-fiscal {
        margin: 0;
    }

    #Tabela {
        text-align: center;
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
        width: 125px;
        height: 40px;
        display: inline-block;
    }

    #dados-valores {
        text-align: right;
        font-weight: bold;
    }

    #obs-valores {
        font-weight: bold;
    }
</style>
<div id="conteudo">
    <div id="cabecalho">
        <img src="../img/Logo Pizzaria login.png" alt="" width="100" height="55"><br>
        <div id="dados-empresa">
            <label>AV. DAS PALMEIRAS INDIARA-GO</label><br>
            <label>CNPJ:000000000/0001-03</label><br>
            <label>WhatsApp:(64)9 8130-8273</label><br>
            <label>www.emporiodapizzago.com.br</label>
            <h3 id="nao-fiscal">*****COMPROVANTE NÃO FISCAL*****</h3>
        </div>
        <h2 id="texto-cabecalho">Pedido: 142</h2>
        <div id="data-hora">22/05/2022 20:30:50</div>
        <label>Comer no local</label><br>
        <label style="font-weight: bold;">Av. C-107 Chácara Felicidade Nº4 Casa 1</label>
    </div>
    <div id="dados-cliente">
        <label>----------------------------------------</label><br>
        <label style="font-weight: bold;">DADOS CLIENTE</label><br>
        <label>NOME.: Guilherme Marins dos Santos</label><br>
        <label>FONE.: (64)9 8130-8273</label><br>
        <label>END..: Av. C-107 Chácara Felicidade Nº4 Casa 1</label><br>
        <label>----------------------------------------</label>
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
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Pizza Marguerita G</td>
                    <td>40,00</td>
                <tr>
                    <th>Obs:
                    <td>Sem cebola</td>
                    </th>
                </tr>
                </tr>
                <tr>
                    <td><label style="font-size: 11px;">-----</label></td>
                    <td><label style="font-size: 11px;">------------------------</label></td>
                    <td><label style="font-size: 11px;">-------</label></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!--<label style="font-size: 11px;">----------------------------------------</label><br>-->
    <div id="valores">
        <label>Qtd. Itens</label><br>
        <label>Valor Total R$</label><br>
        <label>Forma Pagamento</label><br>
    </div>
    <div id="dados-valores">
        <label>2</label><br>
        <label>49,99</label><br>
        <label>Cartão Crédito</label><br>
    </div>
    <div id="obs-valores">
        <label>Obs. de pagamento: </label><br>
        <label>Troco para 100</label>
    </div>
</div>