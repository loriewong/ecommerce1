<html>
<head></head>
<body>
  <div class="container" id="bodycomponent">
    <h1>{{$title}}</h1>

    <h3>Order details:</h3>
    <h5>Name: {{ $order->firstname }} {{ $order->lastname }}</h5>
    <h5>Email: {{ $order->email }}</h5>
    <h1>Order Details</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Size</th>
          <th>Quantity</th>
          <th>Cost</th>
        </tr>
      </thead>
      <tbody>
        @foreach(json_decode($order->cartdata)->items as $items)
        <tr>
          <td>{{ $items->name }}</td>
          <td>{{ $items->size }}</td>
          <td>{{ $items->quantity }}</td>
          <td>${{ number_format(($items->quantity * $items->price), 2, '.', '') }}</td>
        </tr>
            @endforeach
        @foreach(json_decode($order->cartdata)->bundles as $items)
        <tr>
          <td>{{ $items->name }}</td>
          <td>Bundle</td>
          <td>{{ $items->quantity }}</td>
          <td>${{ number_format(($items->quantity * $items->price), 2, '.', '') }}</td>
        </tr>
        @endforeach
        <tr>
          <td colspan=2><b>Total</b></td>
          <td><b>{{ $orderquantity }}</b></td>
          <td><b>${{ $subtotal }}</b></td>
        </tr>
      </tbody>
    </table>
    <br/>
    <br/>
    <h1>Item Shipping Details</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Size</th>
          <th>Quantity</th>
        </tr>
      </thead>
      <tbody>
        @foreach($shippinglist as $items)
        <tr>
          <td>{{ $items->name }}</td>
          <td>{{ $items->size }}</td>
          <td>{{ $items->quantity }}</td>
        </tr>
        @endforeach
        <tr>
          <td colspan=2><b>Total Quantity</b></td>
          <td><b>{{ $shipquantity }}</b></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>