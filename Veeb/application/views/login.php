<?php
include('header.php');

?> 

						
	
				<div id="form_wrapper" class="form_wrapper">
					<form class="register">
						<h3>Register</h3>
						<div class="column">
							<div>
								<label>First Name:</label>
								<input type="text" />
								<span class="error">This is an error</span>
							</div>
							<div>
								<label>Last Name:</label>
								<input type="text" />
								<span class="error">This is an error</span>
							</div>
							<div>
								<label>Website:</label>
								<input type="text" value="http://"/>
								<span class="error">This is an error</span>
							</div>
						</div>
						<div class="column">
							<div>
								<label>Username:</label>
								<input type="text"/>
								<span class="error">This is an error</span>
							</div>
							<div>
								<label>Email:</label>
								<input type="text" />
								<span class="error">This is an error</span>
							</div>
							<div>
								<label>Password:</label>
								<input type="password" />
								<span class="error">This is an error</span>
							</div>
						</div>
						<div class="bottom">
							<input type="submit" value="Register" /><br>
                                                        <fb:login-button scope="public_profile,email" onlogin="checkLoginState();" login_text="Logi sisse Facebookiga" >
                            </fb:login-button>
                                                        

<div id="status">
</div>
							<a href="index.html" rel="login" class="linkform">You have an account already? Log in here</a>
							<div class="clear"></div>
						</div>
					</form>
					<form class="login active">
						<h3>Login</h3>

						<div>
							<label>Username:</label>
							<input type="text" />
							<span class="error">This is an error</span>
						</div>
						<div>
							<label>Password: <a href="forgot_password.html" rel="forgot_password" class="forgot linkform">Forgot your password?</a></label>
							<input type="password" />
							<span class="error">This is an error</span>
						</div>
						<div class="bottom">
							<input type="submit" value="Login"></input><br>
                                                        <fb:login-button scope="public_profile,email" onlogin="checkLoginState();" login_text="Logi sisse Facebookiga" >
                            </fb:login-button>
                                                        

<div id="status">
</div>
                                                     
							<a href="register.html" rel="register" class="linkform">You don't have an account yet? Register here</a>
							<div class="clear"></div>
						</div>
                                                
					</form>
					<form class="forgot_password">
						<h3>Forgot Password</h3>
						<div>
							<label>Username or Email:</label>
							<input type="text" />
							<span class="error">This is an error</span>
						</div>
   
                                                
                                                
						<div class="bottom">
							<input type="submit" value="Send reminder"></input>
							<a href="index.html" rel="login" class="linkform">Suddenly remebered? Log in here</a>
							<a href="register.html" rel="register" class="linkform">You don't have an account? Register here</a>
                                                        
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