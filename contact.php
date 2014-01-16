<?php include'head.php'; ?>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <script type='text/javascript' src="js/forms.js"></script>
    </head>
    <body>
         <div id="pageContainer">
            <div id="pageOutlineContainer">
                

<?php include 'banner.php'; ?>
                <?php include 'navigation.php'; ?>
                
                    <div class='content' >
                        <div id='contact_info'>
                            <div class='contextHolder' ><span style='font-weight:800;text-decoration: underline;'>Affable IT Solutions</span> <br>
                            <span class='label'>Phone:</span> (813) 644-2080<br>
                            <span class='label'>Email:</span> info@affableitsolutions.com</div><br><div style='clear:both'></div> 
                            <div style='margin: 14px 0 0 19px; float:left;position:relative;padding:0;height: 256px;' class='contextHolder'><img src='images/affablelogo11-1.png'></div>
                        </div>
                        
<!--                    <p>We are extremely easy to get in touch with & strive for excellent customer service.</p>
                    <p>Making you, the customer happy is our number one priority so please, feel free to call us any time 24/7 for support regarding a service or product you have with us.</p>-->
                    

  
  
  <div class='contact_form_container' >
      <h2 style='margin-left:13px;'>Ask us ANYTHING! or send us some feedback. We'd love to hear what you think about Affable..</h2>
  <h4 style='text-align: center;'>Don't worry we won't redistribute or sell your email address.</h4>
  
      <div class="ErrContainer">
	<h4>There are some errors in your form, see below for details.</h4>
	<ol>
	</ol>
    </div>
  
      <form action="email_form.php" method='post' name='sendflag' id="contact_form" >
               <div class='input_container'><label for="name" class='contact_label'><span class='label'>Your Name</span><span class="required">* </span>:</label>&nbsp;
            <input id='name' title="Enter your first and/or last name." required type="text" data-type="input-textbox" name="name" autofocus size="20" value="" />
          <br></div> <div class='input_container'><label for="email" class='contact_label'><span class='label'>Your Email</span><span class="required">* </span>:</label>
            <input id='email' title="Enter a valid email address." required type="text" data-type="input-textbox" name="email" size="20" style='margin-left:14px' value="" />
          <br></div> <div class='input_container'><label for="phone" class='contact_label'><span class='label'>Your Phone</span> :</label>&nbsp;&nbsp;&nbsp;
            <input title="Enter a valid area code." type="text" data-type="input-textbox" name="area_code" id='area_code' style='margin-left:9px' size="2" value="" />&nbsp;&nbsp;-<input title="Please enter a valid phone number."  id='phone_number' type="text" data-type="input-textbox" style='margin-left:4px' name="phone_number" size="6" value="" /><span class="optional">&nbsp;&nbsp;(optional)</span><br> 
          </div><div style='clear:both'></div><div class='input_container'><label for="category" class='contact_label'><span class='label'>Interests</span> : (check what you're interested in)</label><br>
<input type='checkbox' name='interests[]' id='field_3_0' style='margin-top:14px;' value="Sales"   class='form_checkbox' ><label class='form_choice_text' > Sales</label><br />	
<input type='checkbox' name='interests[]' id='field_3_1'  value="Home Services"   class='form_checkbox' ><label class='form_choice_text' > Home Services</label><br />	
<input type='checkbox' name='interests[]' id='field_3_2'  value="Business Services"   class='form_checkbox' ><label class='form_choice_text'> Business Services</label><br />	
<input type='checkbox' name='interests[]' id='field_3_3'  value="Virus Removal"   class='form_checkbox' ><label class='form_choice_text' > Virus Removal</label><br />	
<input type='checkbox' name='interests[]' id='field_3_5'  value="PC Repair"   class='form_checkbox' ><label class='form_choice_text' > PC Repair</label><br />	
<input type='checkbox' name='interests[]' id='field_3_6'  value="Web Design"   class='form_checkbox' ><label class='form_choice_text' > Web Design</label><br />	

          </div> <div class='input_container'><span class='label'>Comment or Question</span><span class="required">* </span>:</label><textarea title="Enter a comment or question in the large text field." placeholder="I live in xxx, FL. Do you service my area?" type="text" name="text" cols="35" rows="4" class="select_category" id="gen_ques"></textarea>
          </div><div style='clear:both'></div> 
          <input type='reset' id='reset' class='reset_button' value='Reset' ><input type="submit" name="submit" value="Send" id='submit_button' class="submit_button" />
      </form>
  </div>
<div style='clear:both'></div> 
            
                    
                    
                </div>
          
                <?php include'footer.php' ?>