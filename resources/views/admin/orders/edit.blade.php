@extends("app")

@section("content")

    <div class="conteiner" style="margin: 20px">
        <h1>Editar Pedido</h1>

        @include("errors.template")

        <h4><b>Código do Pedido:</b> {{ $order->id }}</h4>
        <h4><b>Cliente:</b> {{ $order->client->user->name }}</h4>
        <h4><b>Data:</b> {{ $order->date }}</h4>
        <h4><b>Total:</b> {{ $order->total }}</h4>

        <br>
        <p>
            <b>Entregar em:</b>
        <h4>{{ $order->client->address }}, {{ $order->client->city }} - {{ $order->client->state }}</h4>
        </p>
        <br>

        {!! Form::open(['route' => ['admin.orders.update', $order->id]]) !!}

        <div class="form-group">
            {!! Form::label('status', 'Status do Pedido:') !!}
            {!! Form::select('status', $statuses, $order->status, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('deliveryman', 'Entregador do Pedido:') !!}
            {!! Form::select('deliveryman_id', $deliverymen, $order->deliveryman_id, ['class' => 'form-control', 'placeholder' => 'Nenhum']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar Pedido', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection