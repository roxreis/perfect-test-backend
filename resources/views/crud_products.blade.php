@extends('layout')

@section('content')
    <h1>Adicionar / Editar Produto</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="produto/cadastrar" method="POST">
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
                <div class="form-group">
                    <label for="name">Nome do produto</label>
                    <input name="name" type="text" class="form-control " id="name">
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea name="description" type="text" rows='5' class="form-control" id="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input name="price" type="text" class="form-control" id="price" placeholder="100,00 ou maior">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
