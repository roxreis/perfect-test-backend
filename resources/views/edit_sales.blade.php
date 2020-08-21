@extends('layout')

@section('content')
    <h1>Adicionar / Editar Venda</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="venda/atualizar" method="POST" name="formEditSale">
            @CSRF
            @method('PUT')
             <!-- input hidden com o id do admin em Users -->
             <input type="text" hidden value="{{ $sales->id }}">

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
                    <input value="{{$sales->nameCustomer}}"name="name" type="text" class="form-control " id="name" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="{{$sales->emailCustomer}}" name="email" type="text" class="form-control" id="email" >
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input value="{{$sales->cpfCustomer}}" disabled="" name="cpf" type="text" class="form-control" id="cpf" placeholder="99999999999" style="color:#bdbdbd;" >
                </div>
                <h5 class='mt-5'>Informações da venda</h5>
                <div class="form-group">
                    <label for="product">Produto</label>
                    <select name="product" id="product" class="form-control">
                        <option selected >Escolha...</option>

                        @foreach($products as $product)
                            <option>{{$product->nameProduct}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input value="{{$sales->date_sale}}" name="date" type="text" class="form-control single_date_picker" id="date" >
                </div>
                <div class="form-group">
                    <label for="quantity">Quantidade</label>
                    <input  name="quantity" type="text" class="form-control" id="quantity" placeholder="1 a 10" >
                </div>
                <div class="form-group">
                    <label for="discount">Desconto</label>
                    <input value="{{$sales->deductionSale}}" name="discount" type="text" class="form-control" id="discount" placeholder="100,00 ou menor" >
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option  selected>Escolha...</option>
                        <option>Aprovado</option>
                        <option>Cancelado</option>
                        <option>Devolvido</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection