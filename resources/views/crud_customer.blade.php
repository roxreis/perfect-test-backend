@extends('layout')

@section('content')
    <h1>Cadastrar cliente</h1>
    <div class='card'>
        <div class='card-body'>
            <form name="formSale" action="/cliente/cadastrar" method="POST">
                @CSRF
                @if(session("created"))
                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                    <strong>{{session("created")}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session("error"))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session("error")}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                <h5>Informações do cliente</h5>
                <div class="form-group">
                    <label for="name">Nome do cliente</label>
                    <input name="name" type="text" class="form-control " id="name" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="text" class="form-control" id="email" >
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input name="cpf" type="text" class="form-control" id="cpf" placeholder="99999999999"  >
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection

<!-- validacao javascript do formulario -->


