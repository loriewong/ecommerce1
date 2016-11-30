<template id="shoppingcart-template">
  <!-- Button trigger modal -->
  <div class="row">
    <div class="btn-toolbar">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" v-on:click="refresh()">
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
              <shoppingcartsummary></shoppingcartsummary>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a class="btn btn-primary" href="/checkout">Checkout</a>
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

        });
      },

      methods: {
        refresh: function() {

        }
      }
    }
</script>
