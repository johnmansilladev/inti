<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orden {{  $order->nro_order }}</title>
</head>
<body>
    <div>
        <div>
            <p>Hola, quiero comprar el artículo (s) a continuación:</p>
            <p><b>Nro Orden:</b> {{  $order->nro_order }}</p>
            <p><b>Datos de Contacto:</b></p>
            <p><b>Nombre de Contacto:</b> {{ $order->contact_name }}</p>
            <p><b>Email:</b> {{ $order->email }}</p>
            <p><b>Medio de Contacto:</b> {{ $order->contact_medium . ' - ' . $order->contact_information }}</p><br>

            @foreach ($order->orderDetails as $item)
            <p><b>{{ strtoupper($item->stockKeepingUnit->product->name) }}</b></p>
            <p><b>Versión:</b> {{ strtoupper($item->stockKeepingUnit->name) }}</p>
            <p><b>Servicio:</b> {{ strtoupper($item->service->name) }}</p>
            <p><b>Cantidad:</b> {{ $item->qty }}</p>
            @if ($item->dcto > 0)
            <p><b>Precio Normal: S/.</b> {{ number_format($item->price_base,2) }}</p>
            <p><b>Precio Oferta: S/.</b> {{ number_format($item->price_sale,2) }}</p>
            @else
            <p><b>Precio: S/.</b> {{ number_format($item->price_sale,2) }}</p>
            @endif

            <p><b>Url:</b> <a href="{{ route('product.index',['product'=>$item->stockKeepingUnit->product->slug,'version'=>$item->stockKeepingUnit->slug]) }}">{{ route('product.index',['product'=>$item->stockKeepingUnit->product->slug,'version'=>$item->stockKeepingUnit->slug]) }}</a></p><br>
            @endforeach

            <p><b>Precio Total: S/.</b> {{ number_format($total,2) }}</p>
        </div>
    </div>
</body>
</html>