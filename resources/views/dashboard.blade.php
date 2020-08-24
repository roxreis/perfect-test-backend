@extends('layout')

@section('content')
    <h1>Dashboard de vendas</h1>
    <div class='card mt-3'>

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
        <div class='card-body'>
            <div class="d-flex ml-5" >
                <h5 class="card-title mb-5">Tabela de vendas
               <a href='/cliente/novo' class='btn btn-secondary float-right btn-sm rounded-pill' style="margin:0 20px 0 368px ;" ><i class='fa fa-plus'></i>Novo cliente</a></h5>
               <h5> <a href='/venda/nova' class='btn btn-secondary float-right btn-sm rounded-pill ' ><i class='fa fa-plus'></i>Nova venda</a></h5>
                
            </div>
            <form>
                <div class="form-row align-items-center">
                    <div class="col-sm-5 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Clientes</div>
                            </div>
                            <select class="form-control" id="inlineFormInputName">
                                <option selected >Clientes</option>
                                @foreach($sales as $sale)
                                    <option>{{$sale->nameCustomer}}</option>
                                @endforeach
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
                            {{$sale->status_sale}}
                        </td>
                        <td>
                            {{$sale->quant_sale}}
                        </td>
                        <td> 
                                                                                
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
                        Imagem
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>
                            {{$product->name_product}}
                        </td>
                        <td>
                            {{$product->price_product}}
                        </td>
                        <td>
                            <img src="{{asset('storage/'.$product->image_product)}}" style="height:10vh;" alt="imagem do produto">
                        </td>
                        <td>
                            <a href="/produto/editar/{{$product->id}}" class='btn btn-primary'>Editar</a>
                        </td>
                @endforeach
                    </tr>
             </table>
        </div>
    </div>
@endsection
