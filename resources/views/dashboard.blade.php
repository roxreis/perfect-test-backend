@extends('layout')

@section('content')
    <h1>Dashboard de vendas</h1>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Tabela de vendas
                <a href='/venda/nova' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>Nova venda</a></h5>
            <form>
                <div class="form-row align-items-center">
                    <div class="col-sm-5 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Clientes</div>
                            </div>
                            <select class="form-control" id="inlineFormInputName">
                                <option>Clientes</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 my-1">
                        <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Período</div>
                            </div>
                            <input type="text" class="form-control date_range" id="inlineFormInputGroupUsername" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-sm-1 my-1">
                        <button type="submit" class="btn btn-primary" style='padding: 14.5px 16px;'>
                            <i class='fa fa-search'></i></button>
                    </div>
                </div>
            </form>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Produto
                    </th>
                    <th scope="col">
                        Data
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>
                @foreach($sales as $sale) 
                    <tr>
                        <td>
                            {{$sale->name_product_sold}}
                        </td>
                        
                        <td>
                            {{$formatDateSale}}
                        </td>
                        
                        <td>
                        
                            {{$sale->priceSale}}
                        
                        </td>
                        
                        <td>
                            <a href="/venda/editar/{{$sale->id}}" class='btn btn-primary'>Editar</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Resultado de vendas</h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Status
                    </th>
                    <th scope="col">
                        Quantidade
                    </th>
                    <th scope="col">
                        Valor Total
                    </th>
                </tr>
                @foreach($sales as $sale) 
                    
                    <tr>
                        <td>
                            {{$sale->statusSale}}
                        </td>
                        <td>
                            {{$sale->quantSale}}
                        </td>
                        <td>
                            {{$sale->priceSale}}
                        </td>
                    </tr>
                @endforeach 
            </table>
        </div>
    </div>

    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Produtos
                <a href='produto/novo' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Novo produto</a></h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Nome
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>
                            {{$product->nameProduct}}
                        </td>
                        <td>
                            {{$product->priceProduct}}
                        </td>
                        <td>
                            <a href='' class='btn btn-primary'>Editar</a>
                        </td>
                @endforeach
                    </tr>
             </table>
        </div>
    </div>
@endsection
