<?php

// Controller
class Controller extends AppController {
	protected function init() {
		
		

		if (Access::check()) {
			header('Location: /dashboard');
		}
	

	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);
?>
<div>
	<div class="breakouts">
		<div class="break1">
			<img src="/images/NAHI_LOGO_NEW.jpg">
			<div>Purchasing a house is a large financial endeavor and an investment in your family’s future. Have some peace at mind that all of our inspectors are certified and licensed.</div>
		</div>
		<div class="break2">
			<img src="/images/ashi_logo.png" alt="">
			<div>All of our inspectors demonstrate high standards of practice and a strict code of ethics for the member community. </div>
		</div>
		<div class="break3">
			<div><strong>Experiences</strong></div>
			<div class="carousel">
				<div>
					<div><img src="../images/ashley.jpg"></div>
					<div class="experiences">I have used John Doe’s Inspection service for the last three years. He has been amazing every time I have used his services, I highly recommend him.</div>
				</div>
				<div>
					<div><img src="../images/jeff.jpg"></div>
					<div class="experiences">Mike's Inspection service was the absolute best, very professional and great price. I will definitely be using his services in the future.</div>
				</div>
				<div>
					<div><img src="../images/kruggel.jpg"></div>
					<div class="experiences">I have used John Doe’s Inspection service for the last three years. He has been amazing every time I have used his services, I highly recommend him.</div>
				</div>
				<div>
					<div><img src="../images/mark.jpg"></div>
					<div class="experiences">Mike's Inspection service was the absolute best, very professional and great price. I will definitely be using his services in the future.</div>
				</div>
			</div>
		</div>
	</div>
</div>




