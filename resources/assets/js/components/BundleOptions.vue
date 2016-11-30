<template id="bundleoptions-template">
  <div>
    <div v-for="product in this.newarray">
      <label class="col-sm-3 control-label" >Name:</label>
      <label class="col-sm-9 control-label" >{{ product.name }}</label>
      <div class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-3 control-label" >Size:</label>
          <div class="col-sm-9">
            <select class="form-control" v-model="productAttribute" v-on:change="onChange(productAttribute)" >
              <option v-for="item in product.dropdown"
                v-bind:value="item.value">
                {{ item.size }}
              </option>
            </select>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12 btn-toolbar">
        <button type="button" class="col-md-5 btn btn-primary" v-on:click="onClick">Add to cart</button>
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

        onClick: function() {
          let shoppingcart = JSON.parse( sessionStorage.getItem("shoppingCart")) || JSON.parse('{"items": [],"bundles": []}');
          let currentItem = {};
          currentItem.bundleId = this.bundle.bundleId;
          currentItem.price = this.bundle.price;
          currentItem.name = this.bundle.name;
          currentItem.products = this.tempcartbundle;
          currentItem.quantity = 1;

          console.log(currentItem);

          //for now just always push a new item to cart
          //let shoppingcartbundle = shoppingcart.bundles;
          let itemExists = false;
console.log(shoppingcart)
/*          for (var key in shoppingcartitem) {
            console.log(shoppingcartitem[key].products);
            console.log(shoppingcartitem[key].products);
            if (shoppingcartitem[key].bundleId === currentItem.bundleId
              && shoppingcartitem[key].products === currentItem.products) {
              shoppingcartitem[key].quantity += 1;
              itemExists = true;
            }
          }*/

          if(!itemExists) {
            shoppingcart.bundles.push(currentItem);
          }
          console.log(shoppingcart);

          sessionStorage.setItem( "shoppingCart", JSON.stringify(shoppingcart) );
          toastr.info('Added to cart successfully');
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
