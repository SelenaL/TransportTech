<?php
include('header.php');

?> 

						
	
				<div id="form_wrapper" class="form_wrapper">
					<form class="register">
						<h3>Registreerimine</h3>
						<div class="column">
							<div>
								<label for='username' >Kasutajanimi:</label>
								<input type='text' name='username' id='username' maxlength="50" />								<span class="error">This is an error</span>
							</div>
							<div>
								<label for='password' >Salasõna:</label>
								<input type='password' name='password' id='password' maxlength="50" />
							
								<span class="error">This is an error</span>
							</div>
							

				
                                                        <div>
								<label for='telefon' >Telefoni nr:</label>
								<input type='text' name='telefon' id='telefon' maxlength="50" />								<span class="error">This is an error</span>
							</div>
							
						</div>
						<div class="column">
                                                        <div>
								<label for='name' >Nimi:</label>
								<input type='text' name='name' id='name' maxlength="50" />								<span class="error">This is an error</span>
							</div>
                                                        
														<div>
								<label for='email' >E-mail:</label>
								<input type='text' name='email' id='email' maxlength="50" />								<span class="error">This is an error</span>
							</div>
	<div>
								<label for='ettevote' >Ettevõte:</label>
								<input type='text' name='ettevote' id='ettevote' maxlength="50" />								<span class="error">This is an error</span>
							</div>
						</div>
						<div class="bottom">
							<input type="submit" value="Registreeri" /><br>
                                                        <fb:login-button scope="public_profile,email" onlogin="checkLoginState();" login_text="Logi sisse Facebookiga" >
                            </fb:login-button>
                                                        

<div id="status">
</div>
							<a href="index.html" rel="login" class="linkform">Sul on juba konto olemas? Logi sisse siit</a>
							<div class="clear"></div>
						</div>
					</form>

					<form class="login active">
						<h3>Logi sisse</h3>
 					<?php echo validation_errors(); ?>
  					 <?php echo form_open('Verifylogin'); ?>

						<div>
							<label>Kasutajanimi:</label>
							<input type="text" />
							<span class="error">This is an error</span>
						</div>
						<div>
							<label>Salasõna: <a href="forgot_password.html" rel="forgot_password" class="forgot linkform">Unustasid salasõna?</a></label>
							<input type="password" />
							<span class="error">This is an error</span>
						</div>
						<div class="bottom">
							<input type="submit" value="Logi sisse"></input><br>
                                                        <fb:login-button scope="public_profile,email" onlogin="checkLoginState();" login_text="Logi sisse Facebookiga" >
                            </fb:login-button>
                                                        

<div id="status">
</div>
                                                     
							<a href="register.html" rel="register" class="linkform">Sul pole veel kontot? Registreeru siin</a>
							<div class="clear"></div>
						</div>
                                                
					</form>
					<form class="forgot_password">
						<h3>Unustasid salasõna</h3>
						<div>
							<label>Kasutajanimi või E-mail:</label>
							<input type="text" />
							<span class="error">This is an error</span>
						</div>
   
                                                
                                                
						<div class="bottom">
							<input type="submit" value="Saada meeldetuletus"></input>
							<a href="index.html" rel="login" class="linkform">Tuli meelde? Logi sisse siit</a>
							<a href="register.html" rel="register" class="linkform">Sul pole kontot? Registreeri siin</a>
                                                        
							<div class="clear"></div>
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>
			
		</div>
                
                
                <br><br><br>

<?php
include('footer.php');
?>