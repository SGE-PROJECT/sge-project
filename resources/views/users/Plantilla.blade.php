<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Modal</title>
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
</head>
<body>
	<header>
		<div class="textos">
			<h1>Modal animado | AlexCG Design</h1>
			<a href="#" id="abrir">Suscribete a este canal</a>
		</div>
	</header>
	<div id="miModal" class="modal">
		<div class="flex" id="flex">
			<div class="contenido-modal">
				<div class="modal-header flex">
					<h2>AlexCG Design</h2>
					<span class="close" id="close">&times;</span>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam voluptatum illum temporibus voluptas debitis! Et labore minus praesentium consequuntur mollitia dolores perferendis, voluptas nemo ratione consequatur illum quidem rerum, saepe eveniet ullam eaque quasi neque quo quisquam impedit ducimus voluptatem illo. Quod tenetur aliquam, soluta labore ipsam delectus. Id iusto distinctio minima quaerat nobis asperiores ullam, mollitia illo soluta quisquam natus dicta sint voluptates molestiae! Perferendis quos ea assumenda nulla?</p>
				</div>
				<div class="footer">
					<h3>AlexCG Design &copy;</h3>
				</div>
			</div>
		</div>
	</div>
	<script src="main.js"></script>
</body>
</html>
