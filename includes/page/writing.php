<!-- Start Of Writing Section -->
<?php

$data  = getRandData('writing', 1);
    ?>
		<section class="sec-of-write text-center">
				<div class="container">
					<h3>Write what you see</h3>
					<img src="<?= $resourcesImg ?>question/<?= $data['writing_img'] ?>" alt="Question Image" title="Question Image">
					<p class="answer" id="answer"><?= $data['name_of_img'] ?></p>
					<div class="alert alert-success" id="alertCorrect" role="alert">That's our hero it's correct answer</div>
					<div class="alert alert-danger" id="alertInCorrect"  role="alert">Ops not correct try again</div>
					
                         <div class="form-group">
                             <input type="text" class="form-control input-lg" name="name" id="answerForm" autocomplete="off" />
                         </div>
                         <button class="btn btn-danger" id="btnAnswer">Answer</button>   
				</div>
				<h1></h1>
		</section>
		<!-- End Of Writing Section -->