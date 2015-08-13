<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Whiteboard - codeigniter</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/normalize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/vendor/jquery.js"></script>
	<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/vendor/modernizr.js"></script>
	
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

	.fullwidth {
	 	width: 100%;
	   	margin-left: auto;
	   	margin-right: auto;
	   	max-width: initial;
	}

	.highlighter {
		background: #f4ff99;
		background-color: #f4ff99;
		font-weight: bold;
		padding: 4px;
	}

	.canvasDiv, .toolDiv {
		border: 2px dashed #BFBFBF;
	    width: 100%;
	    height: 400px;
	    background: #F3F3F3;
	    position:relative;
	}
	.toolDiv {
		padding: 5px 10px;
	}

	#tmp_canvas {
		position: absolute;
		top: 0;
		left: 0;
		cursor: pointer;
	}

	input[data-toggle] 
	{
	  display: none; 
	}

	input[data-toggle]:checked + label,
	input[data-toggle]:checked + label:active {
	  background-color: #007095;
	  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15) inset, 0 1px 2px rgba(0, 0, 0, 0.05); }

	.button-group.toggle li:not(first-child) 
	{
	  /*margin: 0 -0.9rem; */
	}


	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">

		<div class="row fullwidth">
			<div class="large-12 columns">
				<header>
					<h1>Whiteboard Testing </h1>
					<div class="large-2 columns">
						<div class="toolDiv">
							<ul class="stack button-group toggle" data=toggle="buttons-radio">
							 <li>
						        <input type="radio" id="r1" name="r-group" data-toggle="button">
						        <label class="small button" for="r1">Line</label>
						     </li>
						     <li>
						        <input type="radio" id="r2" name="r-group" data-toggle="button">
						        <label class="small button" for="r2">Pen</label>
						     </li>
						      <li>
						        <input type="radio" id="r3" name="r-group" data-toggle="button">
						        <label class="small button" for="r3">Eraser</label>
						     </li>

							</ul>
						</div>
					</div>
					<div class="large-10 columns">
						<div class="canvasDiv"></div>
					</div>
					
				</header>
			</div>

		</div>

		


	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

	<footer>
	<script src="<?php echo base_url('assets/js/whiteboard_canvas.js') ?>" type="text/javascript"></script>
	</footer>

</body>
</html>