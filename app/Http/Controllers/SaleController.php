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

        
        function calculateDeduction() {

            $product = new Product();
            $sales = new Sale();
            $value = $product->priceProduct - $sales->deductionSale;

            return $value;
        }
        

        $finalPrice = calculateDeduction();

        

        $sales = new Sale();
        $sales->nameCustomer = $request->input('name');
        $sales->emailCustomer = $request->input('email');
        $sales->cpfCustomer = $request->input('cpf');
        $sales->name_product_sold = $request->input('product');
        $sales->date_sale = $formatDate;
        $sales->quantSale = $request->input('quantity');
        $sales->deductionSale = $finalValue;
        $sales->statusSale = $request->input('status');
        $sales->priceSale = $finalPrice;
        
        $product = Product::where('nameProduct', $request->input('product'))->first();
        $sales->product_id = $product->id;
        
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
     
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function editSale(Request $request, $id=0)
    {   
        $sales = Sale::find($id);
        $formatDateSale = $sales->date_sale = date('d/m/Y');
        $products = Product::all();
            return view('edit_sales', compact('sales', 'products', 'formatDateSale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function updateSale(Request $request, $id)
    {
        $sales = Sale::find($id);

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
        $sales->date_sale = $formatDate;
        $sales->quantSale = $request->input('quantity');
        $sales->deductionSale = $finalValue;
        $sales->statusSale = $request->input('status');
        $sales->name_product_sold = $request->input('product');
        // $sales['user_id'] = Auth::user()->id;
        // $sales['user_name'] = Auth::user()->name;
        $result = $sales->save();

        if($result) {
            
            // Passando um parâmetro via session no redirect na view verifico a session para exibir a mensagem de sucesso)
            return redirect("/dashboardr")->with('created',"Venda atualizada com sucesso!");
           }else{
            return redirect("/dashboardr")->with('error',"Ops! Falha ao atualizar as informações");
        }
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
