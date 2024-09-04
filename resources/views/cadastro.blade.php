<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>Cadastro de Usuários</title>
</head>
<body>
<div id="app">
    <div class="container mt-5">
        <div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded border">
            <form class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nome</label>
                    <input v-model="nome" type="text" class="form-control" placeholder="DIGITE SEU NOME">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Gênero</label>
                    <select v-model="genero" class="form-select">
                        <option value="">Selecione</option>
                        <option v-for="genero in listaGenero" :key="genero.id" :value="genero.id">
                            @{{ genero.nome }}
                        </option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Nascimento</label>
                    <input v-model="nascimento" type="date" class="form-control">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Idade</label>
                    <input v-model="idade" type="number" class="form-control" placeholder="DIGITE SUA IDADE">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Estado</label>
                    <select v-model="estado" @change="onEstadoChange" class="form-select">
                        <option value="">Selecione</option>
                        <option v-for="estado in listaEstado" :key="estado.id" :value="estado.id">
                            @{{ estado.nome }} - @{{ estado.sigla }}
                        </option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Cidade</label>
                    <select v-model="cidade" :disabled="!estado" class="form-select">
                        <option :value="''">
                            @{{ estado ? 'Selecione uma cidade...' : 'Selecione um estado...' }}
                        </option>
                        <option v-for="cidade in listaCidade" :key="cidade.id" :value="cidade.id">
                            @{{ cidade.nome }}
                        </option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Cargo</label>
                    <select v-model="cargo" class="form-select">
                        <option value="">Selecione</option>
                        <option v-for="cargo in listaCargo" :key="cargo.id" :value="cargo.id">
                            @{{ cargo.nome }} - @{{ cargo.sigla }}
                        </option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Lotação</label>
                    <select v-model="lotacao" class="form-select">
                        <option value="">Selecione</option>
                        <option v-for="lotacao in listaLotacao" :key="lotacao.id" :value="lotacao.id">
                            @{{ lotacao.nome }}
                        </option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <div class="d-flex flex-row-reverse">
                        <div class="btn-toolbar">
                            <div class="btn-group me-2">
                                <a href="{{route('lista_usuarios')}}" type="button" class="btn btn-primary">LISTAR USUÁRIOS</a>
                            </div>
                            <div class="btn-group me-2" role="group" aria-label="Second group">
                                <button @click.prevent="salvarDados" type="button" class="btn btn-warning">CADASTRAR</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    new Vue({
        el: '#app',
        data: {
            nome: '',
            genero: '',
            nascimento: '',
            idade: '',
            estado: '',
            cidade: '',
            cargo: '',
            lotacao: '',
            listaGenero: [],
            listaEstado: [],
            listaCidade: [],
            listaCargo: [],
            listaLotacao: [],
        },
        mounted() {
            this.getGenero();
            this.getEstados();
            this.getCargos();
            this.getLotacoes();
        },
        methods: {
            getCargos() {
                axios.get('http://localhost:8001/cargos')
                    .then(response => {
                        this.listaCargo = response.data;
                    });
            },
            getLotacoes() {
                axios.get('http://localhost:8001/lotacao')
                    .then(response => {
                        this.listaLotacao = response.data;
                    });
            },
            getGenero() {
                axios.get('http://localhost:8001/genero')
                    .then(response => {
                        this.listaGenero = response.data;
                    });
            },
            getEstados() {
                axios.get('http://localhost:8001/estado')
                    .then(response => {
                        this.listaEstado = response.data;
                    });
            },
            getCidades(stateId) {
                axios.get('http://localhost:8001/cidade', {
                    params: { estado_id: stateId }
                })
                    .then(response => {
                        this.listaCidade = response.data;
                    });
            },
            onEstadoChange() {
                if (this.estado) {
                    this.getCidades(this.estado);
                } else {
                    this.listaCidade = [];
                    this.cidade = '';
                }
            },
            salvarDados() {
                const dados = {
                    nome: this.nome,
                    idade: this.idade,
                    nascimento: this.nascimento,
                    genero_id: this.genero,
                    cargo_id: this.cargo,
                    lotacao_id: this.lotacao,
                    estado_id: this.estado,
                    cidade_id: this.cidade,
                };
                axios.post('http://localhost:8001/salvar-dados', dados)
                    .then(response => {
                        console.log('Dados salvos com sucesso:', response.data);
                        alert('DADOS SALVOS COM SUCESSO');
                    })
                    .catch(error => {
                        console.error('Erro ao salvar os dados:', error);
                    });
            }
        }
    });
</script>
</body>
</html>
