<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div id="app">
        <div class="container mt-5 shadow-lg p-3 mb-5 bg-body-dark rounded border">

            <div class="d-flex justify-content-end mb-3 ">
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-2" role="group" aria-label="First group">
                        <button class="btn btn-dark" @click="getListaUsuarios">Recarregar tabela</button>
                    </div>
                    <div class="btn-group me-2" role="group" aria-label="Second group">
                        <a href="{{ url('/usuario/matheus/cadastro')  }}" class="btn btn-success">CRIAR USUARIO</a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Nascimento</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Genero</th>
                    <th scope="col">estado</th>
                    <th scope="col">cidade</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Lotação</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="usuario in usuarios">
                    <td>@{{ usuario.nome_usuario }}</td>
                    <td>@{{ usuario.nascimento  }}</td>
                    <td>@{{ usuario.idade  }}</td>
                    <td>@{{ usuario.genero  }}</td>
                    <td>@{{ usuario.estado  }}</td>
                    <td>@{{ usuario.cidade  }}</td>
                    <td>@{{ usuario.cargo  }}</td>
                    <td>@{{ usuario.lotacao  }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
<script>
    new Vue({
        el: '#app',
        data: {
            usuarios: []
        },
        methods: {
            getListaUsuarios() {
                axios.get('http://localhost:8001/usuario/listar')
                    .then(response => {
                        this.usuarios = response.data;
                })
            }
        },
        mounted() {
            this.getListaUsuarios();
        }
    });

</script>

</body>
</html>
