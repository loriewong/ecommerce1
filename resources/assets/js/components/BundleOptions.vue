<template id="bundleoptions-template">
  <div>
    
    <div class="form-horizontal" v-for="product in this.newarray">
      <div class="form-group">
        <label class="col-md-3 control-label" >Name:</label>
        <p class="col-md-9 form-control-static" >{{ product.name }}</p>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label" >Size:</label>
        <div class="col-md-9">
<form>
          <select class="form-control" v-bind:id="'selectProductId' + product.bundleId" v-bind:name="'selectProductId' + product.bundleId" v-model="productAttribute" v-on:change="onChange(productAttribute)" >
            <option v-for="item in product.dropdown"
              v-bind:value="item.value">
              {{ item.size }}
            </option>
          </select>
  </form>          
        </div>
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
      template: '#bundleoptions-template',
      props: {
        bundleitems: Array,
        bundle: Object
      },

      data: function() {
        var newarray = [];
        var result = this.bundleitems.map((a) => (a.productId));
        var products = result.filter((item, i, ar) => (ar.indexOf(item) === i));
        products.forEach((product) => {
          var parenttemp = {};

          var name = '';
          var temp=[];
          this.bundleitems.forEach((items) => {
            if(items.productId == product){
              var tempobj = {};
              var valobj = {};
              valobj.productId = items.productId;
              valobj.attributeId = items.attributeId;
              tempobj.size = items.size;
              tempobj.value = valobj;
              temp.push(tempobj);
              name = items.name;
            }
          });
          parenttemp.name = name;
          parenttemp.dropdown = temp;
          parenttemp.bundleId = product;
          newarray.push(parenttemp);
        });
        return ({
          selected: '',
          value: 0,
          price: '',
          newarray: newarray,
          tempcartbundle: []
        });
      },

      methods: {
        onChange: function(productAttribute) {
          var updated = false;
          //if item exists in temp cart then update the selected value
          this.tempcartbundle.forEach((product) => {
            if(product.productId == productAttribute.productId) {
              product.attributeId = productAttribute.attributeId;
              updated = true;
              return;
            }
          });
          if(!updated) {
            this.tempcartbundle.push(productAttribute);
          }
          console.log(this.tempcartbundle);
        },

        onAddToCart: function() {

          if(this.tempcartbundle.length !== this.newarray.length) {
            return toastr.warning('Please select all product options before adding to cart.');
          }

          let shoppingcart = JSON.parse( localStorage.getItem("shoppingCart")) || JSON.parse('{"items": [],"bundles": []}');
          let currentItem = {};
          currentItem.bundleId = this.bundle.bundleId;
          currentItem.price = this.bundle.price;
          currentItem.name = this.bundle.name;
          currentItem.products = this.tempcartbundle;
          currentItem.quantity = 1;

          //for now just always push a new item to cart
          let itemExists = false;

          let shoppingcartitem = shoppingcart.items;
          let shoppingcartbundle = shoppingcart.bundles;
          let totalquantity = 1;
          let totalprice = parseFloat(this.bundle.price);

          for (var key in shoppingcartitem) {            
            totalquantity += shoppingcartitem[key].quantity;
            totalprice += parseFloat(shoppingcartitem[key].price * shoppingcartitem[key].quantity);
          }

          //sum up quantity and price to include bundles
          for(var key in shoppingcartbundle) {
            totalquantity += shoppingcartbundle[key].quantity;
            totalprice += parseFloat(shoppingcartbundle[key].price * shoppingcartbundle[key].quantity);
          }

          if(!itemExists) {
            shoppingcart.bundles.push(currentItem);
          }

          var newshoppingcart = {
            "items": shoppingcartitem,
            "bundles": shoppingcart.bundles,
            "totalquantity": totalquantity,
            "totalprice": totalprice
          }

          localStorage.setItem( "shoppingCart", JSON.stringify(newshoppingcart) );
          toastr.info('Added to cart successfully');
        }

      }
    }
</script>
