<html>
<head></head>
<body>
  <h1>{{$title}}</h1>

  <h3>Order details:</h3>
  <h5>First Name: {{ $order->firstname }}</h5>
  <h5>Last Name: {{ $order->lastname }}</h5>
  <table>
    <thead>
      <tr>
        <td>Product</td>
        <td>Attribute</td>
        <td>Quantity</td>
      </tr>
    </thead>
    <tbody>
      @foreach($items as $item)
      <tr>
          <td>{{$item->productId}}</td>
          <td>{{$item->attributeId}}</td>
          <td>{{$item->quantity}}</td>
      </tr>
    </tbody>
  @endforeach
  </table>
</body>
</html>