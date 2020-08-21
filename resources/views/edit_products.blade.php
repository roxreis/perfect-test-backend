@extends('layout')

@section('content')
    <h1>Adicionar / Editar Produto</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="/produto/atualizar/{{$products->id}}" method="POST">
                @CSRF
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nome do produto</label>
                    <input name="name" value="{{$products->nameProduct}}" type="text" class="form-control " id="name">
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea name="description" value="{{$products->descriptionProduct}}" type="text" rows='5' class="form-control" id="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input name="price" type="text" value="{{$products->priceProduct}}" class="form-control" id="price" placeholder="100,00 ou maior">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
