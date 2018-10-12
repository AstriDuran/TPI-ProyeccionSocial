<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mightAlsoLike = Product::mightAlsoLike()->get();

        return view('store.cart')->with('mightAlsoLike', $mightAlsoLike);

        //return view('cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', '¡El artículo ya está en su carrito!');
        }
        
        Cart::add($request->id, $request->name, 1, $request->price)
            ->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message', '¡El artículo fue agregado a su carrito!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,15'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', collect(['La cantidad debe estar entre 1 y 15.']));
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', '¡La cantidad se actualizó con éxito!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', '¡El artículo ha sido removido!');
    }

    /**
     * Switch item for shopping cart to Save for Later.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', '¡El artículo ya está guardado para más tarde!');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message', '¡El artículo se ha guardado para más tarde!');
    }
}
