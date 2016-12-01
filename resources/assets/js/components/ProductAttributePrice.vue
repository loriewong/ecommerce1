<template id="product-template">
  <div>
    <div class="form-horizontal">
      <div class="form-group">
        <label class="col-sm-3 control-label">Size:</label>
        <div class="col-sm-9">
          <select class="form-control" v-model="selected" v-on:change="onChange" >
            <option v-for="productattribute in productattributes"
              v-bind:value="productattribute.attributeId">
              {{ productattribute.size }}
            </option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Price:</label>
        <p class="col-md-9 form-control-static" v-text="price"></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 btn-toolbar">
        <button type="button" class="col-md-5 btn btn-primary" v-on:click="onAddToCart">Add to cart</button>
        <a class="col-md-5 btn btn-primary" href="/checkout">Checkout</a>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      template: '#product-template',
      props: {
        productattributes: Array,
        product: Object
      },

      data: function() {
        return ({
          selected: '',
          value: 0,
          price: ''
        });
      },

      methods: {
        onChange: function() {
          let selectedproduct = this.productattributes.filter(item => item.attributeId == this.selected);
          this.price = '$' + selectedproduct[0].price;
        },

        onAddToCart: function() {
          let shoppingcart = JSON.parse( sessionStorage.getItem("shoppingCart")) || JSON.parse('{"items": [],"bundles":[]}');
          let selectedproduct = this.productattributes.filter(item => item.attributeId == this.selected)[0];
          selectedproduct.quantity = 1;
          selectedproduct.name = this.product.name;

          let shoppingcartitem = shoppingcart.items;
          let itemExists = 0;

          for (var key in shoppingcartitem) {
            if (shoppingcartitem[key].productId === selectedproduct.productId
              && shoppingcartitem[key].attributeId === selectedproduct.attributeId) {
              shoppingcartitem[key].quantity += 1;
              itemExists = 1;
            }
          }

          if(!itemExists) {
            shoppingcartitem.push(selectedproduct);
          }
          var newshoppingcart = {
            "items":shoppingcartitem,
            "bundles":shoppingcart.bundles
          }

          sessionStorage.setItem( "shoppingCart", JSON.stringify(newshoppingcart) );
          toastr.info('Added to cart successfully');
        }
      }
    }
</script>
