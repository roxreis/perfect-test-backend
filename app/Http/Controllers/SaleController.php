<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $sales = Sale::all();
    //     return redirect('/')->with(['sales'=>$sales]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNewSale()
    {
        $products = Product::all();
        return view('crud_sales')->with(['products'=>$products]);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSale(Request $request)
    {
        $sales = new Sale();

        //armazanendo valor do input price em variável para usar na função abaixo
        $get_value = $request->input('discount');

        function replacePoint($get_value) {
            //função para alterar a virgula nos valores que vem do formulario para ponto
            $source = array('.', ',');
            $replace = array('', '.');
            $value = str_replace($source, $replace, $get_value); //remove os pontos e substitui a virgula pelo ponto
            return $value; //retorna o valor formatado para gravar no banco
        }

        $finalValue = replacePoint($get_value);
        
        //pegando o valor do input data e colocando em variável para formatar conforme padrão do banco de dados
        $formatDate = $request->input('date');
        $formatDate = date('Y-m-d H:i:s');

        $sales->nameCustomer = $request->input('name');
        $sales->emailCustomer = $request->input('email');
        $sales->cpfCustomer = $request->input('cpf');
        $sales->product_name = $request->input('product');
        $sales->date_sale = $formatDate;
        $sales->quantSale = $request->input('quantity');
        $sales->deductionSale = $finalValue;
        $sales->statustSale = $request->input('status');
        // $sales['user_id'] = Auth::user()->id;
        // $sales['user_name'] = Auth::user()->name;
        $result = $sales->save();

        if($result) {
            
            // Passando um parâmetro via session no redirect na view verifico a session para exibir a mensagem de sucesso)
            return redirect("/venda/nova")->with('created',"Venda cadastrado com sucesso!");
           }else{
            return redirect("/venda/nova")->with('error',"Ops! Falha ao salvar as informações");
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function updateSale(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
