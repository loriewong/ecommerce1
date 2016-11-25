<template id="product-template">
  <div>
{{ productattributes }}
    Size:
    <select>
        <option  v-for="productattribute in productattributes" v-bind:value="productattribute.price">{{ productattribute.price }}</option>
    </select>
</div>
</template>

<script>
    export default {
      
      template: '#product-template',
      props: ['productattributes'],
      created() {
        //this.productattributes = JSON.parse(this.productattributes);
        console.log(this.productattributes);
      }

    }
</script>
