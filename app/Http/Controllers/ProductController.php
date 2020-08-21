<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $products = Product::all();
    //     return redirect('/')->with(['products'=>$products]);

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNewProduct()
    {
        return view('crud_products');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProduct(Request $request)
    {
        if($request->isMethod('GET')){
            return view('/crud_products');
        } 

        $product = new Product();
        //armazanendo valor do input price em variável para usar na função abaixo
        $get_value = $request->input('price');

        function replacePoint($get_value) {
            //função para alterar a virgula nos valores que vem do formulario para ponto
            $source = array('.', ',');
            $replace = array('', '.');
            $value = str_replace($source, $replace, $get_value); //remove os pontos e substitui a virgula pelo ponto
            return $value; //retorna o valor formatado para gravar no banco
        }

        $finalValue = replacePoint($get_value);

        $product->nameProduct = $request->input('name');
        $product->descriptionProduct = $request->input('description');
        $product->priceProduct = $finalValue;

        $result = $product->save();

        if($result){
            return redirect("/produto/cadastrar")->with('created',"Produto cadastrado com sucesso!");
        }else{
            return redirect("/produto/cadastrar")->with('error',"Ops! Falha ao salvar as informações");
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function editProduct(Product $product, $id=0)
    {
        $products = Product::find($id);
            return view('edit_products', compact('products',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, $id=0)
    {
        $product = Product::find($id);
        //armazanendo valor do input price em variável para usar na função abaixo
        $get_value = $request->input('price');

        function replacePoint($get_value) {
            //função para alterar a virgula nos valores que vem do formulario para ponto
            $source = array('.', ',');
            $replace = array('', '.');
            $value = str_replace($source, $replace, $get_value); //remove os pontos e substitui a virgula pelo ponto
            return $value; //retorna o valor formatado para gravar no banco
        }

        $finalValue = replacePoint($get_value);

        $product->nameProduct = $request->input('name');
        $product->descriptionProduct = $request->input('description');
        $product->priceProduct = $finalValue;

        $result = $product->save();

        if($result){
            return redirect("/dashboard")->with('created',"Produto atualizado com sucesso!");
        }else{
            return redirect("/dashboard")->with('error',"Ops! Falha ao atualizar as informações");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
