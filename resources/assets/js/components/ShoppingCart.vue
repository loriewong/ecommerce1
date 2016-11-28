<template id="shoppingcart-template">
  <!-- Button trigger modal -->
  <div class="row">
    <div class="col-md-12 btn-toolbar">
      <button type="button" class="col-md-5 btn btn-primary" data-toggle="modal" data-target="#myModal" v-on:click="onViewCart">
        View cart
      </button>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Shopping Cart</h4>
            </div>
            <div class="modal-body">
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
                  <tr>
                    <td colspan=2><b>Sub-Total</b></td><td><b>{{ this.quantityTotal }}</b></td><td><b>$ {{ this.subTotal.toFixed(2) }}</b></td>
                  </tr>                
                </tbody>
              </table>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Checkout</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      template: '#shoppingcart-template',
      props: {
      },

      data: function() {
        return ({
          cartdata: '',
          subTotal: 0,
          quantityTotal: 0
        });
      },

      methods: {
        onViewCart: function() {
          this.cartdata = JSON.parse( sessionStorage.getItem("shoppingCart")) || JSON.parse('{"items": []}');

          for (var key in this.cartdata.items) {
            this.subTotal += this.cartdata.items[key].quantity * this.cartdata.items[key].price;
            this.quantityTotal += this.cartdata.items[key].quantity;
          }
        }
      }

    }
</script>
