@auth
{!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id],
                'onsubmit' => 'return confirm("¿Está seguro que desea eliminar el producto?")', 'class' => 'd-inline']) !!}
    <input type="submit" value="Eliminar producto" class="btn btn-danger">
{!! Form::close() !!}
@endauth
