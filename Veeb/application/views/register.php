<?php
include('header.php');
?> 
							
	<div class="content">
				<div id="form_wrapper" class="form_wrapper">
					<form class="register active">
						<h3>Registreerimine</h3>
						<div class="column">
							<div>
								<label>Eesnimi:</label>
								<input type="text" />
								<span class="error">This is an error</span>
							</div>
							<div>
								<label>Perekonnanimi:</label>
								<input type="text" />
								<span class="error">This is an error</span>
							</div>
                                                        <div>
								<label>Telefoni nr:</label>
								<input type="text" />
								<span class="error">This is an error</span>
							</div>
                                                        <div>
								<label>Kasutajanimi:</label>
								<input type="text"/>
								<span class="error">This is an error</span>
							</div>
							
						</div>
						<div class="column">
                                                        <div>
								<label>Ettevõte:</label>
								<input type="text"/>
								<span class="error">This is an error</span>
							</div>
							<div>
								<label>Veebileht:</label>
								<input type="text" value="http://"/>
								<span class="error">This is an error</span>
							</div>
							<div>
								<label>E-mail:</label>
								<input type="text" />
								<span class="error">This is an error</span>
							</div>
							<div>
								<label>Salasõna:</label>
								<input type="password" />
								<span class="error">This is an error</span>
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
					<form class="login">
						<h3>Logi sisse</h3> 
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
        </div>	<br><br>
       
		
        
<?php
include('footer.php');
?>