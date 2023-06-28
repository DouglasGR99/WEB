function enviarDados() {
    var enunciado = document.getElementById('enunciado').value;
    var opca = document.getElementById('opca').value;
    var opcb = document.getElementById('opcb').value;
    var opcc = document.getElementById('opcc').value;
    var opcd = document.getElementById('opcd').value;
    var gabarito = document.getElementById('gabarito').value;
    var dados = {
        enunciado: enunciado,
        opca: opca,
        opcb: opcb,
        opcc: opcc,
        opcd: opcd,
        gabarito: gabarito
    };

    var jsonData = JSON.stringify(dados); // Converte o array de dados em JSON

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            // Ação a ser executada após a inserção no banco de dados
            console.log(this.responseText);
            location.reload(); // Atualiza a página após a inserção
        }
    };
    xhttp.open('POST', 'funcoes.php', true);
    xhttp.setRequestHeader('Content-type', 'application/json'); // Informa o tipo de conteúdo
    xhttp.send(jsonData); // Envia o JSON em si
}

function excluirRegistro(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            // Ação a ser executada após a exclusão no banco de dados
            console.log(this.responseText);
            location.reload(); // Atualiza a página após a exclusão
        }
    };
    xhttp.open('GET', 'funcoes.php?delete_id=' + id, true); // Envia o ID a ser excluído
    xhttp.send();
}