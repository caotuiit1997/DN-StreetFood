<link rel="stylesheet" href="Webroot/css/form.css">
<script src="Webroot/js/TMForm.js"></script>

<div class="content contact">
  <div class="container_12">
      <div class="grid_8">
        <h3 class="head3">Register</h3>
          <form id="form">                     
            <div class="success_wrapper">
                <div class="success-message">Register successfully</div>
            </div>

          <label class="name">
            <input type="text" placeholder="Name:" data-constraints="@Required @JustLetters" />
            <span class="empty-message">*This field is required.</span>
            <span class="error-message">*This is not a valid name.</span>
          </label>
        
          <label class="dob">
            <input type="text" placeholder="Dob:" data-constraints="@Required" />
            <span class="empty-message">*This field is required.</span>
            <span class="error-message">*This is not a valid date of birth.</span>
          </label>

           <label class="phone">
              <input type="text" placeholder="Phone:" data-constraints="@Required @JustNumbers"/>
              <span class="empty-message">*This field is required.</span>
              <span class="error-message">*This is not a valid phone.</span>
            </label>

            <label class="message">
              <input type="text" placeholder="E-mail:" data-constraints="@Required @Email" />
              <span class="empty-message">*This field is required.</span>
              <span class="error-message">*This is not a valid email.</span>
            </label>

            <label class="message">
              <input type="password" placeholder="Password:" data-constraints='@Required @Length(min=6,max=20)'></input>
              <span class="empty-message">*This field is required.</span>
              <span class="error-message">*Password must be from 6 to 20 characters.</span>
            </label>

            <label class="message">
              <input type="password" placeholder="Confirm Password:" data-constraints='@Required'></input>
              <span class="empty-message">*This field is required.</span>
            </label>

            <label class="message">
              <input type="text" placeholder="Address:" data-constraints='@Required'></input>
              <span class="empty-message">*This field is required.</span>
            </label>
          <div>
            <div class="clear"></div>
            <div class="btns">
            <a style="padding: 10px;border: 1px solid red;border-radius: 5px;" href="#" data-type="reset" class="btn">Clear</a>
            <a style="padding: 10px;border: 1px solid green;border-radius: 5px;" href="#" data-type="submit" class="btn">Register</a></div>
          </div>
        </form>
      </div>
      <div class="grid_4">
        <h3 class="head3">Ads</h3>
           
      </div>
  </div>
</div>
