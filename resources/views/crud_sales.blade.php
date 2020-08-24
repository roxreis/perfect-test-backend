@extends('layout')

@section('content')
    <h1>Adicionar / Editar Venda</h1>
    <div class='card'>
        <div class='card-body'>
            <form name="formSale" action="/venda/cadastrada" method="POST">
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
                @foreach($customers as $customer)
                    <div class="form-group">
                        <label for="name">Nome do cliente</label>
                        <select name="name" type="text" class="form-control " id="name" >
                        <option selected>Escolha...</option>
                    
                            <option>{{$customer->name_customer}}</option>
                    
                    </div>
                    @if($customer->name_customer)
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input Value="{{$customer->email_customer}}" disable="" name="email" type="text" class="form-control" id="email" >
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input  Value="{{$customer->cpf_customer}}" disable="" name="cpf" type="text" class="form-control" id="cpf" placeholder="99999999999"  >
                        </div>
                    @endif
                @endforeach
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
                    <input name="date" type="text" class="form-control single_date_picker" id="date" >
                </div>
                <div class="form-group">
                    <label for="quantity">Quantidade</label>
                    <input  name="quantity" type="text" class="form-control" id="quantity" placeholder="1 a 10" >
                </div>
                <div class="form-group">
                    <label for="discount">Desconto</label>
                    <input name="discount" type="text" class="form-control" id="discount" placeholder="100,00 ou menor" >
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

<!-- validacao javascript do formulario -->
<script type="text/javascript">

    function validar_formSale() {
        var name = formSale.name.value;
        var email = formSale.email.value;
        var cpf = formSale.cpf.value;
        var product = formSale.product.value;
        var date = formSale.date.value;
        var quantity = formSale.quantity.value;
        var discount = formSale.discount.value;
        var status = formSale.status.value;

        if (name == "") {
            alert("Campo obrigatório.");
            formSale.name.focus();
            return false;
        }
        if (email == "") {
            alert(
                "Campo obrigatório."
            );
            formSale.email.focus();
            return false;
        }
    
        if (cpf == "" || cpf.length < 11) {
            alert("Campo obrigatório.");
            formSale.cpf.focus();
            return false;
        }
        if (product == "") {
            alert("Campo obrigatório.");
            formSale.product.focus();
            return false;
        }
        if (date == "") {
            alert("Campo obrigatório.");
            formSale.date.focus();
            return false;
        }
        if (quantity < 1 || quantity > 10) {
            alert("Campo obrigatório de 1 a 10.");
            formSale.quantity.focus();
            return false;
        }
        if (discount == "") {
            alert("Campo obrigatório.");
            formSale.discount.focus();
            return false;
        }
        if (status == "") {
            alert("Campo obrigatório.");
            formSale.status.focus()
            return false;
        }
    }

</script>

