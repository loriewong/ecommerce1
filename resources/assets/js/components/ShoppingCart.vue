<template id="shoppingcart-template">
  <!-- Button trigger modal -->
  <div class="row">
    <div>
      <a data-toggle="modal" id="checkouticon" data-target="#checkoutModal" v-on:click="refresh()">
        <span class="glyphicon glyphicon-shopping-cart header-cart-icon" aria-hidden="true"></span>
      </a>
      <!-- Modal -->
      <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Shopping Cart</h4>
            </div>
            <div class="modal-body">
              <shoppingcartsummary :cartdata="this.refreshcartdata"></shoppingcartsummary>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a class="btn btn-primary" id="checkout" href="/checkout">Checkout</a>
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
      if(!localStorage.getItem("shoppingCart")) {
        console.log("here");
        localStorage.setItem("shoppingCart",'{"items": [], "bundles": []}');
      }
      return ({
        refreshcartdata: JSON.parse('{"items": [], "bundles": []}')
      });
    },

    methods: {
      refresh: function() {
        this.refreshcartdata = JSON.parse( localStorage.getItem("shoppingCart")) || JSON.parse('{"items": [], "bundles": []}');
      }
    }
  }
</script>
