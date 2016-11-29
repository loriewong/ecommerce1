<template id="product-template">
  <div>
    <div class="row">
      <label class="col-md-3">Size:</label>
      <select class="col-md-3" v-model="selected" v-on:change="onChange" >
        <option v-for="productattribute in productattributes"
          v-bind:value="productattribute.attributeId">
          {{ productattribute.size }}
        </option>
      </select>
    </div>
    <div class="row">
      <label class="col-md-3">Price:</label>
      <label class="col-md-3" v-text="price"></label>
    </div>

    <div class="row">
      <div class="col-md-12 btn-toolbar">
        <button type="button" class="col-md-5 btn btn-primary" v-on:click="onClick">Add to cart</button>
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

        onClick: function() {
          let shoppingcart = JSON.parse( sessionStorage.getItem("shoppingCart")) || JSON.parse('{"items": []}');
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
            "items":shoppingcartitem
          }
          console.log(shoppingcartitem);

          sessionStorage.setItem( "shoppingCart", JSON.stringify(newshoppingcart) );
        },

        onCheckout: function() {
          //var router = new VueRouter();
          //router.go('/');
          console.log($router);
          //this.$router.push('/')
        }
      }
    }
</script>
