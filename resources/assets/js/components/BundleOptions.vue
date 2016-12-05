<template id="bundleoptions-template">
  <div>
    
    <div class="form-horizontal" v-for="product in this.newProductArray">
      <div class="form-group">
        <label class="col-md-3 control-label" >Name:</label>
        <p class="col-md-9 form-control-static" >{{ product.name }}</p>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label" >Size:</label>
        <div class="col-md-9">
          <select class="form-control" v-bind:id="'selectProductId' + product.bundleId" v-bind:name="'selectProductId' + product.bundleId" v-model="productAttribute" v-on:change="onChange(productAttribute)" >
            <option v-for="item in product.dropdown"
              v-bind:value="item.value">
              {{ item.size }}
            </option>
          </select>       
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
      let newProductArray = [];
      //Filter to get productIds
      let products = this.bundleitems.map((item) => (item.productId)).filter((item, i, ar) => (ar.indexOf(item) === i));

      //go through bundle items and massage data to return new object for the template to read for product
      products.forEach((product) => {
        let name = '';
        let dropdown=[];
        this.bundleitems.forEach((items) => {
          if(items.productId == product){
            dropdown.push({
              "size": items.size,
              "value": {
                "productId": items.productId,
                "attributeId": items.attributeId
                }
            });
            name = items.name;
          }
        });
        newProductArray.push({
          "name": name,
          "dropdown": dropdown,
          "bundleId": product
        });
      });
      return ({
        selected: '',
        value: 0,
        price: '',
        newProductArray: newProductArray,
        selectedProductAttribute: [] //used to store the dropdown selections which will be used to push into local storage
      });
    },

    methods: {
      onChange: function(productAttribute) {
        let updated = false;
        //whenever dropdowns are changed we store the updated value into a temp array. 
        //If product exists in temp cart then update the selected value for size else push it into temp array
        this.selectedProductAttribute.forEach((product) => {
          if(product.productId == productAttribute.productId) {
            product.attributeId = productAttribute.attributeId;
            updated = true;
            return;
          }
        });
        if(!updated) {
          this.selectedProductAttribute.push(productAttribute);
        }
      },

      onAddToCart: function() {
        //check to see if all product's size in bundle are selected
        if(this.selectedProductAttribute.length !== this.newProductArray.length) {
          return toastr.warning('Please select all product options before adding to cart.');
        }

        //formulate item to push to localstorage cart
        let shoppingcart = JSON.parse( localStorage.getItem("shoppingCart")) || JSON.parse('{"items": [],"bundles": []}');

        //separate data so we can push the current bundle to bundle section
        let shoppingcartitem = shoppingcart.items;
        let shoppingcartbundle = shoppingcart.bundles;
        let totalquantity = 1;
        let totalprice = parseFloat(this.bundle.price);

        //summing up quantity and price of product
        for (let key in shoppingcartitem) {            
          totalquantity += shoppingcartitem[key].quantity;
          totalprice += parseFloat(shoppingcartitem[key].price * shoppingcartitem[key].quantity);
        }

        //sum up quantity and price to include bundles
        for(let key in shoppingcartbundle) {
          totalquantity += shoppingcartbundle[key].quantity;
          totalprice += parseFloat(shoppingcartbundle[key].price * shoppingcartbundle[key].quantity);
        }

        shoppingcart.bundles.push({
          "bundleId": this.bundle.bundleId,
          "price": this.bundle.price,
          "name": this.bundle.name,
          "products": this.selectedProductAttribute,
          "quantity": 1
        });

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
