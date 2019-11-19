<div id="wrapper">
	<header>
		<div class="header">
			<nav class="navbar-header">
				<ul class="menu">
					<li>
						<a class="scroll" href="#service">Service</a>
					</li>
					<li>
						<a class="scroll" href="#team">Team</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<section class="section" id="sec-1" data-anchor="about">
		<h1>Air Quality</h1>
		<h3>Explore the air quality in your city, anywhere in the world</h3>
		<img src="assets/Images/earth.jpg" alt="earth">
	</section>

	<section class="section" id="sec-2" data-anchor="service">
		<div>
			<h3>Check your city:</h3>
			<?php echo form_open('air/getCityAQI'); ?>
			<input id="country" type="text" name="country" placeholder="Country">
			<input id="state" type="text" name="state" placeholder="State">
			<input id="city" type="text" name="city" placeholder="City">

			<?php if ($this->session->flashdata('not_found') != NULL): ?>
				<div class="alert alert-danger alert-dismissible alert-hidden" role="alert" style="width: 300px">
					<button type="button" class="close" data-dismiss="alert">&times</button>
					<?php print $this->session->flashdata('not_found'); ?>
				</div>
			<?php endif; ?>

			<br/>
			<input class="btn-success" type="submit" value="Check">
			</form>
		</div>
		<img src="assets/Images/section2.png">
	</section>

	<section class="section" id="sec-3" data-anchor="team">
		<div class="container">
			<div class="column" id="col-1">
				<div class="img-box">
					<img src="assets/Images/Emil.jpg" alt="teamMember1">
				</div>
				<h3>Емил Цветков</h3>
				<h4>Документация</h4>
				<h5>ФКСТ, КСИ, гр.46, № 121216092</h5>
			</div>
			<div class="column" id="col-2">
				<div class="img-box">
					<img src="assets/Images/Mila.jpg" alt="teamMember2">
				</div>
				<h3>Мила Иванова</h3>
				<h4>Уеб приложение</h4>
				<h5>ФКСТ, КСИ, гр.46, № 121216107</h5>
			</div>
			<div class="column" id="col-3">
				<div class="img-box">
					<img src="assets/Images/Niki.jpg" alt="teamMember3">
				</div>
				<h3>Николай Марчин</h3>
				<h4>Wrapper</h4>
				<h5>ФКСТ, КСИ, гр.46, № 121216173</h5>
			</div>
			<div class="column" id="col-4">
				<div class="img-box">
					<img src="assets/Images/Sofi.jpg" alt="teamMember4">
				</div>
				<h3>София Павлова</h3>
				<h4>Карти</h4>
				<h5>ФКСТ, КСИ, гр.46, № 121216218</h5>
			</div>
		</div>
	</section>
</div>
