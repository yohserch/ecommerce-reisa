
{!! Form::open(['route' => [$product->url(), $product->id], 'method' => $product->method()]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Título del producto') !!}
        {!! Form::text('title', $product->title, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('short_name', 'Nombre corto') !!}
        {!! Form::text('short_name', $product->short_name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">

        {!! Form::label('description', 'Descripción del producto') !!}

        {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('price', 'Precio del producto') !!}
        {!! Form::number('price', $product->price, ['class' => 'form-control', 'min' => '0']) !!}
    </div>


    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}


{!! Form::close() !!}
