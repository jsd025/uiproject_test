
<div>
    <!-- Vista del num de productos -->
    <a href="/cart" class="btn btn-primary" id="botonCarrito">
        <i class="fas fa-shopping-cart"></i>
    </a>

    {{\Cart::session(auth()->id())->getContent()->count()}}
</div>