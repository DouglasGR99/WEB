function cria() {
    var id = document.getElementById("id").value;
    var pergunta = document.getElementById("pergunta").value;
    var resposta = document.getElementById("resposta").value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                alert("Discursiva criada com sucesso!");
            } else {
                alert("Erro ao criar Discursiva!");
            }
        }
    };
    xhr.open('POST', 'main.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('id=' + encodeURIComponent(id) + '&pergunta=' + encodeURIComponent(pergunta) + '&resposta=' + encodeURIComponent(resposta));
}

function atualiza() {

}

function deleta() {

}