<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
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

	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">

		<div class="row fullwidth">
			<div class="large-5 columns">
				<?php printr_wrap($keywords); ?>
			</div>

			<div class="large-7 columns">
				<?php foreach($essay as $value) : ?>
				<div name="" id=""><?php echo $value->essay; ?></div>
				<?php endforeach; ?>

				<?php //printr_wrap($essay); ?>
			</div>

		</div>

		<div class="row fullwidth">
			<div class="large-12 columns">
				<div class="text-container">
					
				</div>
			</div>
		</div>


	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

	<footer>
		<script>
		(function(){
			$(document).tooltip();
		})();
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/foundation.min.js" type="text/javascript"></script>
		<script type="text/javascript">
		var NorvigSpellChecker = function () {
		    var that = {},
		        filter = /([a-z]+)/g,
		        alphabets = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'],
		        NWORDS = {};//Training Model
		     
		    var train = function(trainingText) {
		        var features = [];
		        var arr_features;

		        if(Array.isArray(trainingText))
		        {
		        	for(var t in trainingText) {
		        		features.push(trainingText[t]);
		        	}
		        } 
		        else 
		        {
		        	features = trainingText.match(filter);
		        	
		        }
		        console.log(features);
		        for(var f in features) {
		            var feature = features[f];

		            if (NWORDS.hasOwnProperty(feature)) {
		                NWORDS[feature] += 1;
		            }
		            else {
		                NWORDS[feature] = 1;
		            }
		            
		        }
		        
		    };
		     
		    var edits1 = function (words) {
	        	var edits1Set = [];
			        for(var w = 0; w < words.length; w++) {
			            var word = words[w];
			            for (var i = 0; i <= word.length; i++) {
			                //splits (a & b)
			                var a = word.slice(0,i),
			                    b = word.slice(i),
			                    c = b.slice(1),
			                    d = b.slice(2);
			                if (b != '') {
			                    //deletes
			                    edits1Set.push(a + c);
			                    //transposes
			                    if (b.length > 1) {
			                        edits1Set.push(a + b.charAt(1) + b.charAt(0) + d);
			                    }
			                    //replaces & inserts
			                    for (var j = 0; j < alphabets.length; j++) {
			                        edits1Set.push(a + alphabets[j] + c);//replaces
			                        edits1Set.push(a + alphabets[j] + b);//inserts
			                    }
			                }
			                else {
			                    //inserts (remaining set for b == '')
			                    for (var j = 0; j < alphabets.length; j++) {
			                        edits1Set.push(a + alphabets[j] + b);
			                    }
			                }
			            }
			        }
		        return edits1Set;
		    };
			     
		    var edits2 = function (words) {
		        return edits1(edits1(words));
		    };
			 
		    Object.prototype.isEmpty = function () {
		        var that = this;
		        for(var prop in that) {
		            if(that.hasOwnProperty(prop))
		                return false;
		        }
		        return true;
		    };
		 
		    Function.prototype.curry = function () {
		        var slice = Array.prototype.slice,
		            args = slice.apply(arguments),
		            that = this;
		        return function () {
		            return that.apply(null, args.concat(slice.apply(arguments)));
		        };
		    };
		     
		    var known = function () {
		        var knownSet = {};
		        for (var i = 0; knownSet.isEmpty() && i < arguments.length; i++) {
		            var words = arguments[i];
		            for (var j = 0; j < words.length; j++) {
		                var word = words[j];
		                if (!knownSet.hasOwnProperty(word) && NWORDS.hasOwnProperty(word)) {
		                    knownSet[word] = NWORDS[word];
		                }
		            }
		        }
		        return knownSet;
		    };
		     
		    var max = function(candidates) {
		        var maxCandidateKey = null,
		            maxCandidateVal = 0,
		            currentCandidateVal;
		        for (var candidate in candidates) {
		            currentCandidateVal = candidates[candidate];
		            if (candidates.hasOwnProperty(candidate) && currentCandidateVal > maxCandidateVal) {
		                maxCandidateKey = candidate;
		                maxCandidateVal = currentCandidateVal;
		            }
		        }
		        return maxCandidateKey;
		    };
		 
		    var correct = function () {
		        var corrections = {};
		        for (var i = 0; i < arguments.length; i++) {
		            var word = arguments[i];
		            var candidates = known.curry()([word],edits1([word]),edits2([word]));
		            corrections[word] = candidates.isEmpty() ? word : max(candidates);
		        }
		        return corrections;
		    };
		    
		    that.train = train;
		    that.correct = correct.curry();

		    return that;
		};
		var z = NorvigSpellChecker();
		// var train_texts = ['test','consectetur adipiscing', 'amet nibh', 'amet nish'];
		var train_texts = "test consectetur adipiscing amet nish nibh nish nish";

		// z.train(train_texts);
		// console.log(z.correct('consectetr adipiiscing'));
		// console.log(z.correct('tasts'));
		// console.log(z.correct('nibb'));

		// console.log('<?php echo $correct; ?>');
		
		
		</script>
	</footer>

</body>
</html>