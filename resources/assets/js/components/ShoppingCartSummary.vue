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
            <td>{{ items.name }}</td><td>{{ items.size }}</td><td>{{ items.quantity }}</td><td>$ {{ (items.quantity * items.price).toFixed(2) }}</td>
          </tr>
          <tr v-for="items in this.cartdata.bundles">
            <td>{{ items.name }}</td><td>Bundle</td><td>{{ items.quantity }}</td><td>$ {{ (items.quantity * items.price).toFixed(2) }}</td>
          </tr>
          <tr>
            <td colspan=2><b>Sub-Total</b></td><td><b>{{ this.quantityTotal }}</b></td><td><b>$ {{ this.subTotal.toFixed(2) }}</b></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="modal-body" v-else>
      <h4>Your cart is empty</h4>
    </div>
  </div>
</template>

<script>
    export default {
      template: '#shoppingcart-template',
      props: {
        cartdata: Object
      },

      data: function() {

        if(this.cartdata === undefined){
          this.cartdata = JSON.parse( sessionStorage.getItem("shoppingCart")) || JSON.parse('{"items": [], "bundles": []}')
        }

        var sub = 0;
        var total = 0;
        for (var key in this.cartdata.items) {
          sub += this.cartdata.items[key].quantity * this.cartdata.items[key].price;
          total += this.cartdata.items[key].quantity;
        }

        for (var key in this.cartdata.bundles) {
          sub += this.cartdata.bundles[key].quantity * this.cartdata.bundles[key].price;
          total += this.cartdata.bundles[key].quantity;
        }

        return ({
          subTotal: sub,
          quantityTotal: total
        });
      }
    }
</script>
