@extends('layout')

@section('content')
    <h1>Adicionar / Editar Venda</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="/venda/atualiza/{{$sales->id}}" method="POST" name="formEditSale">
            @CSRF
            @method('PUT')
                <h5>Informações do cliente</h5>
                <div class="form-group">
                    <label for="name">Nome do cliente</label>
                    <input value="{{$sales->nameCustomer}}" readonly="readonly" name="name" type="text" class="form-control " id="name" style="color:#bdbdbd;" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="{{$sales->emailCustomer}}" name="email" type="text" class="form-control" id="email" >
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input value="{{$sales->cpfCustomer}}" readonly="readonly" name="cpf" type="text" class="form-control" id="cpf" placeholder="99999999999" style="color:#bdbdbd;" >
                </div>
                <h5 class='mt-5'>Informações da venda</h5>
                <div class="form-group">
                    <label for="product">Produto</label>
                    <select name="product" id="product" class="form-control">
                        <option >Escolha...</option>

                        @foreach($products as $product)
                            <option selected>{{$product->nameProduct}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input value="{{$sales->date_sale}}" readonly="readonly" name="date" type="text" class="form-control" id="date" style="color:#bdbdbd;" >
                </div>
                <div class="form-group">
                    <label for="quantity">Quantidade</label>
                    <input  value="{{$sales->quantSale}}" name="quantity" type="text" class="form-control" id="quantity" placeholder="1 a 10" >
                </div>
                <div class="form-group">
                    <label for="discount">Desconto</label>
                    <input value="{{$sales->deductionSale}}" name="discount" type="text" class="form-control" id="discount" placeholder="100,00 ou menor" >
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select  name="status" id="status" class="form-control">
                        <option selected >Escolha...</option>
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