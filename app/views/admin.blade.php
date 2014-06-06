<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<style>
	html {
		font-family: 'Open Sans', sans-serif;
	}
	.progress-bar {
		opacity: 0;
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 4px;
		background: #aaa;
		transition: opacity 1s ease;
	}
	.progress-bar.loaded {
		opacity: 1;
	}
	.progress {
		position: absolute;
		top: 0;
		left: 0;
		bottom: 0;
		width: 0%;
		background: #000;
		-webkit-transition: all .5s ease;
		transition: all .5s ease;
	}
	.container {
		position: relative;
		margin-top: 100px;
		text-align: center;
	}
	input[type=file] {
		position: absolute;
		opacity: 0;
		width: 100%;
		top: 0;
		left: 0;
		height: 50px;
		cursor: pointer;
	}
	input[name=desc] {
		width: 98%;
		padding-left: 15px;
		max-width: 300px;
		height: 35px;
		border: 2px solid #000;
		outline: 0 none;
	}
	.file-fake {
		width: 98%;
		max-width: 300px;
		line-height: 50px;
		display: inline-block;
		z-index: -1;
		height: 50px;
		border: 2px solid #000;
		outline: 0 none;
		cursor: pointer;
		color: #000;
		font-size: 18px;
		-webkit-transition: all .5s ease;
		transition: all .5s ease;
	}
	.file-hover:hover .file-fake {
		background: #000;
		color: #fff;
	}
	.file-fake.ready {
		background: #000;
		color: #fff;
	}
	.pro-form {
		margin-top: 30px;
	}
	.pro-submit {
		margin-top: 25px;
		display: inline-block;
		font-size: 75px;
		color: #fff;
		background: #000;
		padding: 25px;
		border-radius: 50%;
		transition: all .5s ease;
	}
	.pro-submit:hover {
		color: #000;
		background: #fff;
	}
</style>

<div class="progress-bar">
	<div class="progress" id="_progress"></div>
</div>

<div class="container">
	<div class="clearfix file-hover">
		<div class="file-fake">Выбери файл</div>
		<input type='file' id='_file'>
	</div>
	<form class="pro-form">
		<input name="desc" type="text" placeholder="Описание">
		<input name="photo" type="hidden">
	</form>
	<a href="#" class="pro-submit"><i class="fa fa-thumbs-up"></i></a>
</div>

<div>
	@foreach($pro as $pr)
		<?php print_r($pr); ?>
	@endforeach
</div>


<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
	var _submit = document.getElementById('_submit'), 
		_file = document.getElementById('_file'), 
		_progress = document.getElementById('_progress');

	var upload = function(){

	    if(_file.files.length === 0){
	        return;
	    }

	    var data = new FormData();
	    data.append('image', _file.files[0]);

	    var request = new XMLHttpRequest();
	    request.onreadystatechange = function(){
	        if(request.readyState == 4){
	            try {
	                var resp = JSON.parse(request.response);
	                $('input[name=photo]').attr('value', resp);
	                $.ajax({
						url: '{{URL::to('/admin/add')}}',
						data: $('.pro-form').serialize(),
						type: 'post'
					}).always(function(data){
						console.log(data);
					}).done(function(){
						_progress.style.width = '100%';
						$('.file-fake').removeClass('ready');
						setTimeout(function(){
							$('.progress-bar').removeClass('loaded');
							setTimeout(function(){
								_progress.style.width = '0%';
							}, 1000);
						}, 2000);
						
					}).fail(function(data){
						alert('Какая-то ошибка... Go to console');
						console.log(data);
					});
	            } catch (e){
	                var resp = {
	                    status: 'error',
	                    data: 'Unknown error occurred: [' + request.responseText + ']'
	                };
	            }
	        }
	    };

	    request.upload.addEventListener('progress', function(e){
	        _progress.style.width = Math.ceil(e.loaded/e.total) * 100 / 1.2 + '%';
	    }, false);

	    request.open('POST', '{{URL::to('/admin/upload')}}');
	    request.send(data);
	}

	$('.pro-submit').on('click', function(){
		$('.progress-bar').addClass('loaded');
		upload();
	});

	$('input[type=file]').on('change', function(){
		$('.file-fake').addClass('ready');
	});

</script>