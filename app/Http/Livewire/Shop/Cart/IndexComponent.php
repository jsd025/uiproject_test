<?php

namespace App\Http\Livewire\Shop\Cart;

use Livewire\Component;

class IndexComponent extends Component
{
    //Renderizar la vista
    public function render()
    {
        //Guardar el contenido del carrito

        $cart_items = \Cart::session(auth()->id())->getContent();

        //Enviamos a la vista livewire.shop.cart.index-component la variable 
        //cart_items
        return view('livewire.shop.cart.index-component', compact('cart_items'))
        ->extends('plantilla/welcome')
        ->section('content');
    }

    public function delete_item($item){
        \Cart::session(auth()->id())->remove($item);
    }

    public function delete_item_all(){
        \Cart::session(auth()->id())->clear();
    }
}
