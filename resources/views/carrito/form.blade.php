{!! Form::open(['url' => route('carrito.store'), 'class' => 'add-to-cart']) !!}

{!! Form::hidden('product_id', $card->id, []) !!}

<button type="submit" class="waves-effect waves-light btn grey-text text-lighten-5" style="float: right;"><i class="mdi-action-shopping-cart"></i></button>

{!! Form::close() !!}