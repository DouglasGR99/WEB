// scripts.js
document.getElementById('perguntaForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var form = event.target;
    var formData = new FormData(form);

    fetch('api.php', {
        method: 'POST',
        body: formData
    })
        .then(function(response) {
            if (response.ok) {
                form.reset();
                getPerguntas();
            }
        })
        .catch(function(error) {
            console.error('Erro ao enviar a requisição:', error);
        });
});

function getPerguntas() {
    fetch('api.php')
        .then(function(response) {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Erro ao obter as perguntas.');
            }
        })
        .then(function(data) {
            var tableBody = document.querySelector('#perguntaTable tbody');
            tableBody.innerHTML = '';

            data.forEach(function(pergunta) {
                var row = document.createElement('tr');

                row.innerHTML = `
                <td>${pergunta.id}</td>
                <td>${pergunta.enunciado}</td>
                <td>${pergunta.a}</td>
                <td>${pergunta.b}</td>
                <td>${pergunta.c}</td>
                <td>${pergunta.d}</td>
                <td>(${pergunta.gabarito})</td>
                <td>
                    <a onclick="return confirm('Tem certeza que deseja editar?')" class="btn btn-warning" href="editaOPT.php?edit_id=${pergunta.id}">Editar</a>
                    <br>
                    <a onclick="return confirm('Tem certeza que deseja deletar?')" class="btn btn-danger" href="?delete_id=${pergunta.id}">Delete</a>
                </td>
            `;

                tableBody.appendChild(row);
            });
        })
        .catch(function(error) {
            console.error('Erro ao obter as perguntas:', error);
        });
}

document.addEventListener('DOMContentLoaded', function() {
    getPerguntas();
});
