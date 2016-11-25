<template id="product-template">

<div>

    <div class="col-md-2">
      Size:
      <select v-model="selected" v-on:change="onChange" >
          <option v-for="productattribute in productattributes"
            v-bind:value="productattribute.attributeId">
            {{ productattribute.size }}
          </option>
      </select>
    </div>
    <div class="col-md-2">
      Price: <span v-text="price"></span>
    </div>
    <button type="button" class="btn btn-primary" v-on:click="onClick">Add to cart</button>
</div>
</template>

<script>
    export default {
      template: '#product-template',
      props: {
        productattributes: Array
      },

      data: function() {
        return ({
          selected: '',
          value: 0,
          price: '',
          cookie: 'testcookie'
        });
      },

      methods: {
        onChange: function() {
          let selectedproduct = this.productattributes.filter(item => item.attributeId == this.selected);
          this.price = selectedproduct[0].price;
        },
        onClick: function() {
          //this.$cookie.set('test', 'helloworld!',1);
          this.checkCookie();
          console.log(document.cookie);
        },

        setCookie: function (cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        },

        getCookie: function (cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        },

        checkCookie: function () {
            var user = this.getCookie("username");
            if (user != "") {
                alert("Welcome again " + user);
            } else {
                user = prompt("Please enter your name:", "");
                if (user != "" && user != null) {
                    this.setCookie("username", user, 365);
                }
            }
        }
      }

    }
</script>
