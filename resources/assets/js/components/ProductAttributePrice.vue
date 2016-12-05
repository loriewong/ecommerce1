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
          //update the price whenever attribute changes
          let selectedproduct = this.productattributes.filter(item => item.attributeId == this.selected);
          this.price = '$' + selectedproduct[0].price;
        },

        onAddToCart: function() {
          let selectedproduct = this.productattributes.filter(item => item.attributeId == this.selected)[0];

          //if no selected attribute throw warning
          if(!selectedproduct) {
            return toastr.warning('Please select product option before adding to cart.');
          }

          let shoppingcart = JSON.parse(localStorage.getItem("shoppingCart")) || JSON.parse('{"items": [],"bundles":[]}');
          selectedproduct.quantity = 1;
          selectedproduct.name = this.product.name;

          let shoppingcartitem = shoppingcart.items;
          let shoppingcartbundle = shoppingcart.bundles;
          let itemExists = 0;

          let totalquantity = 1;
          let totalprice = parseFloat(selectedproduct.price);

          //update existing item and to sum up quantity and price for products
          for (let key in shoppingcartitem) {
            if (shoppingcartitem[key].productId === selectedproduct.productId
              && shoppingcartitem[key].attributeId === selectedproduct.attributeId) {
              shoppingcartitem[key].quantity += 1;
              itemExists = 1;
            }
            totalquantity += shoppingcartitem[key].quantity;
            totalprice += parseFloat(shoppingcartitem[key].price * shoppingcartitem[key].quantity);
          }

          //sum up quantity and price to include bundles
          for(let key in shoppingcartbundle) {
            totalquantity += shoppingcartbundle[key].quantity;
            totalprice += parseFloat(shoppingcartbundle[key].price * shoppingcartbundle[key].quantity);

          }

          //if product is already in shopping cart then update qty
          if(!itemExists) {
            shoppingcartitem.push(selectedproduct);
          }
          
          localStorage.setItem("shoppingCart", JSON.stringify({
            "items": shoppingcartitem,
            "bundles": shoppingcart.bundles,
            "totalquantity": totalquantity,
            "totalprice": totalprice
          }));
          toastr.info('Added to cart successfully');
        }
      }
    }
</script>
