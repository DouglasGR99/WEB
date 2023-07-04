function enviarDados() {
    var CPF = document.getElementById('CPF').value;
    var nome = document.getElementById('nome').value;
    var cod_sala = document.getElementById('cod_sala').value;

    var dados = {
        CPF: CPF,
        nome: nome,
        cod_sala: cod_sala
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