<template id="shoppingcart-template">
  <!-- Button trigger modal -->
  <div class="row">
    <div class="modal-body" v-if="this.cartdata.items.length > 0 || this.cartdata.bundles.length > 0 ">
      <table class="table">
        <thead>
          <tr>
            <th>Product Name</th><th>Size</th><th>Quantity</th><th>Cost</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="items in this.cartdata.items">
            <td>{{ items.name }}</td><td>{{ items.size }}</td><td>{{ items.quantity }}</td><td>${{ (items.quantity * items.price).toFixed(2) }}</td>
          </tr>
          <tr v-for="items in this.cartdata.bundles">
            <td>{{ items.name }}</td><td>Bundle</td><td>{{ items.quantity }}</td><td>${{ (items.quantity * items.price).toFixed(2) }}</td>
          </tr>
          <tr>
            <td colspan=2><b>Total</b></td><td><b>{{ this.cartdata.totalquantity }}</b></td><td><b>${{ this.cartdata.totalprice.toFixed(2) }}</b></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="modal-body" v-else>
      <h3>Your cart is empty</h3>
    </div>
  </div>
</template>

<script>
  export default {
    template: '#shoppingcart-template',
    props: {
      cartdata: {
        type: Object,
        default: function () {
          return  JSON.parse( localStorage.getItem("shoppingCart"))|| JSON.parse('{"items": [], "bundles": []}');
        }
      },      
    },
  }
</script>
