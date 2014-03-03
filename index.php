<?php
require_once('lib/functions.php');
require_once('lib/classes/listing_model.php');
require_once('lib/classes/listings_table.php');
require_once('lib/classes/listing_page.php');
include 'head.php';
?>
<style>

    .ui-tabs-vertical {
        background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
        border: medium none;
        margin: 3px;
        width: 55em;
    }
    .ui-tabs-vertical .ui-tabs-nav {
        background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
        border: medium none;
        float: left;
        padding: 0;
        width: 168px;
    }
    .ui-tabs-vertical .ui-tabs-nav li {
        background-color: #56B2C4;
        border: 1px solid #000000;
        clear: left;
        margin: 0 -1px 0.2em 0;
        width: 100%;
    }
    .ui-tabs-vertical .ui-tabs-nav li a {
        color: #000000;
        display: block;
        font-family: Belleza;
        font-weight: bold;
    }
    .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active {
        background-color: #BFCEE6;
        border-right-width: 1px;
        padding-bottom: 0;
        padding-right: 0.1em;
    }
    .ui-tabs-vertical .ui-tabs-panel {
        background-color: rgba(241, 254, 252, 0.7);
        border-left: 2px dotted #000000;
        float: right;
        margin-bottom: 122px;
        margin-left: 23px;
        min-height: 525px;
        padding: 0;
        width: 44.5em;
    }
    .ui-tabs-vertical #tabs-2 *{
        margin-left: 12px;
    }
    .ui-tabs-vertical .ui-tabs-panel #listings_table * {
        text-indent: 0;
    }

</style>
</head>
<body>
    <div id="pageContainer">
        <div id="pageOutlineContainer">
<?php include 'banner.php'; ?>

            <div class='content' >
                <div id="tabs"><div class="trans-background"></div>
                    <ul>
                        <li><a href="#tabs-1">Home </a></li>
                        <li><a href="#tabs-2">Mobile Service</a></li>
                        <li><a href="#tabs-3">Contact Us</a></li>
                        <li><a href="#tabs-4">Website Design</a></li>
                        <li><a href="lib/classes/products_page.php">Used Laptops</a></li>
                        <div style='float:left;' class='side_panel side_ad'></div>
                    </ul>
                    <div id="tabs-1">
                        <p style="margin: 17px;">Welcome to Affable IT Solutions, your one stop source for mobile computer services & repair, used laptop sales and web design services in the Tampa Bay area!</p>
                        <img src="images/friendlycharacter.png" style="float:left">
                        <p style="margin: 0 33px 20px;float:right;width:65%;">Founded in Tampa in 2013 and proudly serving Hillsborough, Pinellas, Polk & Pasco counties. <p>We offer a one of a kind mobile computer service wherein one of our friendly representatives can perform your repair in the comfort of your own home saving you time & money.</p></p>
                        <div style="clear:both"></div>


                        <div id='main_menu' class='content'>        
                            <br>           
                            <dl >
                                <dt><a class='header_link open-tab' href="lib/classes/products_page.php">Products</a></dt>
                                <dd class="promotional1">
                                    We have unbeatable prices on state-of-the-art refurbished laptops & desktop systems. Check out our <a class='open-tab' href="lib/view/products_page.php">products page</a> for current availability.
                                </dd>
                                <!--	<dt>
                                                RSS Feeds
                                        </dt>
                                        <dd class="promotional2">
                                                Keep track of new receipts are posted to your groups 
                                                instantly by subscribing to the groups RSS feed.
                                        </dd>-->
                            </dl>

                            <dl>
                                <dt><a class='header_link open-tab' href="#tabs-2">Services</a></dt>
                                <dd class="promotional3">
                                    We provide a variety of computer related services for the average consumer as well as for the small business owner. <br><a class='open-tab' href="#tabs-2">Click here to find out more.</a>
                                </dd>
                                <!--	<dt>Record Payments</dt>
                                        <dd class="promotional4">
                                                Payments allow you to record any exchanges of money between group members.	
                                        </dd>-->
                            </dl>
                            <dl>
                                <dt><a class='header_link open-tab' href="#tabs-4">Web Design</a></dt>
                                <dd class="promotional5">Want a website of your OWN?<br>
                                    Follow <a class='open-tab' href="#tabs-4">this link</a> for more information about the features <br>and benefits of having<br> your own website.

                                </dd>

                            </dl>
                            <dl>
                                <dt><a class='header_link open-tab' href='#tabs-3'>Contact</a></dt>
                                <dd class="promotional6">
                                    We are extremely easy to get in touch with. <a class=' open-tab' href='#tabs-3'>Contact Us</a>.<br>
                                    <span class='label'>Phone: </span> 813-644-2080<br>
                                    <span class='label'>Email: </span> info@affableitsolutions.com
                                </dd>
                            </dl>
                        </div>
                        <img style='margin:23px 0 12px 97px;box-shadow: 0 0 0 #00FF99 inset, 1px 1px 5px #999999;' src="images/callanytime.png"/>

                    </div>
                    <div id="tabs-2">
                        <h2>Computer Repair</h2>
                        <p>
                        <dt>We service all makes & models of Windows & Mac's </dt>
                        <dd>We at Affable know the dependability that most clients have in demand for their personal or business PC so we are committed to providing the most comprehensive and reliable service available in Tampa Bay.
                            <br><span class="indent" > Our extensive inventory of computer components allows for cost effective solutions to your ailments quickly.</span></dd>
                        </p>
                        <p>
                        <dt>What makes us different than the competition? </dt>
                        <dd>We offer a one of a kind mobile service wherein one of our techs will come to you and repair your pc while you watch in the comfort of your own home.</dd>
                        </p>
                        <p>
                        <dt>How much does it cost? </dt>
                        <dd>We offer our services at unbeatable prices. You don't pay a penny for the diagnostic. The only cost you're responsible for up front is a small trip fee of $19.95.
                        </dd>
                        </p>
                        <div class="small_call_banner"></div>

                    </div>
                    <div id="tabs-3">

                        <div class='contextHolder' ><span style='font-weight:800;text-decoration: underline;'>Affable IT Solutions</span> <br>
                            <span class='label'>Phone:</span> (813) 644-2080<br>
                            <span class='label'>Email:</span> info@affableitsolutions.com</div>

                        <div class='contact_form_container' >
                            <h3 style='margin:13px;'>Ask us ANYTHING! or send us some feedback. We'd love to hear what you think about us.</h3>
                            <h4 style='text-align: center;padding:10px'>Don't worry we won't redistribute or sell your email address and you will not receive any annoying emails from us either.</h4>
                            <div class="ErrContainer">
                                <h4>There are some errors in your form, see below for details.</h4>
                                <ol>
                                </ol>
                            </div>
                            <span class='required_dir'>Required fields marked with <span class='required'>*</span></span>
                            <form action="email_form.php" method='post' name='sendflag' id="contact_form" >
                                <div class='input_container'><label for="name" class='contact_label'><span class='label'>Your Name:</span></label>&nbsp;
                                    <input id='name'  type="text" data-type="input-textbox" name="name" autofocus size="20" value="" />
                                    <br></div> <div class='input_container'><label for="email" class='contact_label'><span class='label'>Your Email<span class="required">*</span>:</span></label>&nbsp;
                                    <input id='email' title="Enter a valid email address." required type="text" data-type="input-textbox" name="email" size="20" style='margin-left:10px' value="" />
                                    <br></div> <div class='input_container'><label for="phone" class='contact_label'><span class='label'>Your Phone:</span></label>&nbsp;&nbsp;
                                    <input title="Enter a valid area code." type="text" data-type="input-textbox" name="area_code" maxlength="3"  id='area_code' style='margin-left:9px' size="2" value="" />&nbsp;&nbsp;-<input title="Please enter a valid phone number." maxlength="7" id='phone_number' type="text" data-type="input-textbox" style='margin-left:4px' name="phone_number" size="6" value="" /><span class="optional">&nbsp;&nbsp;(optional)</span><br> 
                                </div><div style='clear:both'></div><div class='input_container'><label for="category" class='contact_label'><span class='label'>Interests</span> : (check what you're interested in)</label><br>
                                    <input type='checkbox' name='interests[]' id='field_3_0' style='margin-top:14px;' value="Sales"   class='form_checkbox' ><label class='form_choice_text' > Sales</label><br />	
                                    <input type='checkbox' name='interests[]' id='field_3_1'  value="Home Services"   class='form_checkbox' ><label class='form_choice_text' > Home Services</label><br />	
                                    <input type='checkbox' name='interests[]' id='field_3_2'  value="Business Services"   class='form_checkbox' ><label class='form_choice_text'> Business Services</label><br />	
                                    <input type='checkbox' name='interests[]' id='field_3_3'  value="Virus Removal"   class='form_checkbox' ><label class='form_choice_text' > Virus Removal</label><br />	
                                    <input type='checkbox' name='interests[]' id='field_3_5'  value="PC Repair"   class='form_checkbox' ><label class='form_choice_text' > PC Repair</label><br />	
                                    <input type='checkbox' name='interests[]' id='field_3_6'  value="Web Design"   class='form_checkbox' ><label class='form_choice_text' > Web Design</label><br />	

                                </div> <div class='input_container'><span class='label'>Comment or Question<span class="required">* </span>:</span></label><textarea title="Enter a comment or question in the large text field." placeholder="Do you service my area?" type="text" name="text" cols="35" rows="4" class="select_category" id="gen_ques"></textarea>
                                </div><div style='clear:both'></div> 
                                <input type='reset' id='reset' class='reset_button' value='Reset' ><input type="submit" name="submit" value="Send" id='submit_button' class="submit_button" />
                            </form>
                        </div>
                        <div class="small_call_banner"></div>
                    </div>
                    <div id="tabs-4">
                        <table width="692" border="0" cellspacing="0" cellpadding="5">
                            <tr valign="top"> 
                                <td width="225"><img SRC="media/trans.gif" width="225" height="1"></td>
                                <td width="463"></td>
                            </tr>
                            <tr valign="top"> 
                                <td height="21" align="center" valign="top"> 
                                    <div align="center"><img src="images/servrroom.png" > 
                                    </div>
                                </td>
                                <td class="bodycopy"> 
                                    
                                    <span class="header">Custom Programming</span>
                                    <article>&nbsp;75.00 per hour</article>
                                    
                                    <span class="header">Content Editing </span>
                                    <article>(text only)<br>&nbsp;35.00 per hour</article>
                                    
                                    <span class="header">Email</span>
                                    <article> (Up to 100 Corporate Email Boxes)<br>&nbsp;100.00 Yearly</article>
                                        
                                    <span class="header">Search Engine Optimization</span>
                                    <article>Monthly re submission to all search 
                                            engines and any new relevant search engine or directory<br>
                                            &nbsp;150.00 Yearly</article>
                                    
                                    <span class="header">Form Page</span>
                                    <article>&nbsp;100.00</article>
                                    
                                    <span class="header">Business Core Site</span>
                                    <article>&nbsp;Design and code a four page web 
                                            site, 2.5 hours design time, Approximately 800 words, 
                                            Sixteen Images (digital), Host site on Level one server 
                                            backed up every 24 hours, full ftp privileges. 24 hour 
                                            premium customer support. Guaranteed up time.<br>
                                            &nbsp;690.00 Yearly</article>
                                    <span class="header">Content Management System</span>
                                    <article>&nbsp;Add a custom content management system to your website
                                        to allow you, the client to control what goes on your website. Post your pictures
                                        to your own website.<br>
                                            &nbsp;150+ Yearly</article>
                                    
<!--                                    <span>All service must be canceled in writing within 30 days of 
                                            termination date of this contract or contract will 
                                            automatically renew at the guaranteed renewal price.</span>-->
                                </td>
                            </tr>
                        </table>

                        <a href='http://angelo.scalabroni.affableitsolutions.com'><img src='images/visitangelo.png'/></a>
                        
                    </div>
                    <div id="tabs-5">
                        <script src="js/prod_scripts.js"></script>
                    </div>
                </div>

            </div>

<?php include 'footer.php'; ?>             