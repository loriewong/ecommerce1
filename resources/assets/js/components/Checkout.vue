<template id="checkout-template">
  <div>
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group has-feedback">
              <input class="form-control" placeholder="First Name" required="required" data-bv-trigger="keyup" name="first_name" type="text" data-bv-field="first_name"><i class="form-control-feedback bv-no-label" data-bv-icon-for="first_name" style="display: none;"></i>
                  <span class="text-danger"></span>
              <small class="help-block" data-bv-validator="notEmpty" data-bv-for="first_name" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a value</small>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group has-feedback">
              <input class="form-control" placeholder="Last Name" required="required" data-bv-trigger="keyup" name="last_name" type="text" data-bv-field="last_name"><i class="form-control-feedback bv-no-label" data-bv-icon-for="last_name" style="display: none;"></i>
              <span class="text-danger"></span>
              <small class="help-block" data-bv-validator="notEmpty" data-bv-for="last_name" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a value</small>
            </div>
          </div>
        </div>
        <div class="form-group has-feedback">
          <input class="form-control" placeholder="Email" required="required" data-bv-trigger="keyup" data-bv-emailaddress="true" data-bv-emailaddress-message="Email address invalid" name="email" type="email" data-bv-field="email">
          <i class="form-control-feedback bv-no-label" data-bv-icon-for="email" style="display: none;"></i>
          <small class="help-block" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="NOT_VALIDATED" style="display: none;">Email address invalid</small>
          <small class="help-block" data-bv-validator="notEmpty" data-bv-for="email" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a value</small>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      template: '#product-template',
      props: {

      },

      data: function() {
        return ({

        });
      },

      methods: {
        onChange: function() {

        }
      }

    }
</script>
