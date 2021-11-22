<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Demo</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
		.form-div{
			margin-left: 500px;
	    	width: 35%;
	    	margin-top: 3%;
		}
		.error{
			color: red;
		}
		.datepicker td, .datepicker th {
    		width: 2.5em;
		    height: 1.5em;
		}
		.datepicker {
            font-size: 0.875em;
        }
	</style>
</head>
<body>
	<div class="form-div">
		<!-- <h1>Registration</h1><br> -->
		<form id="validate-me-plz" method="POST" enctype="multipart/form-data" action="{{ url('/store') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" name="name" data-rule-required="true">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" class="form-control" id="email" name="email" data-rule-required="true">
			</div>
			<div class="form-group">
				<label for="subject">Subject</label>
				<input type="text" class="form-control" id="subject" name="subject" data-rule-required="true">
			</div>
			<div class="form-group">
				<label for="message">Message</label>
				<textarea class="form-control" id="message" rows="3" data-rule-required="true"></textarea>
			</div>
			<div class="form-group">
				<label for="subject">Date</label>
				<input type="text" class="form-control" id="datepicker" name="date">
			</div>
			<div class="row" style="margin-left: 1px;">				
				<div class="form-group">
					<label>Time</label><br>
				    <label for="hours">Hours</label>
				    <input type="text" class="form-control" id="hours" name="hours" maxlength="2" value="00">
			  	</div>&nbsp;&nbsp;&nbsp;
			  	<div class="form-group">
			  		<label></label><br>
			    	<label for="minutes">Minutes</label>
			    	<input type="text" class="form-control" id="minutes" name="minutes" style="margin-top: 7px;" maxlength="2" value="00">
			  	</div>&nbsp;&nbsp;&nbsp;
			  	<div class="form-group">
			  		<label></label><br>
			    	<label></label><br>
					<select class="form-control" id="am-pm" name="am-pm" style="margin-top: 14px;">
						<option>AM</option>
						<option>PM</option>
					</select>
				</div>		
			</div>
			<div class="form-group">
			    <label for="fileupload">File</label>
			    <input type="file" class="form-control-file" id="fileupload" name="fileupload">
			</div>
			
			
			<div>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary">
			</div>
		</form>	
	</div>
	
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

	<script type="text/javascript">
		$('#validate-me-plz').validate({
			rules: {
				email: {
					email: true,
				},
			    hours: {
			      	digits: true,
			      	range: [0, 12]
		    	},
		    	minutes: {
			      	digits: true,
			      	range: [0, 60]
		    	}
		  	}
		});

		jQuery.validator.addMethod("checkCode", function(value, element) {
			var ext = $('#fileupload').val().split('.').pop().toLowerCase();
			console.log('ext='+ext);
			if (ext != '' && $.inArray(ext, ['png','jpg','jpeg']) == -1){
				return false;
			}else{
				// console.log(element);
				// console.log(value);
				// var picsize = $('#fileupload');
				// console.log('picsize'+picsize.files);
				// if (picsize > 2){
				// 	return false;
				// }else{
				// 	return true;	
				// }				
				return true;	
			}		    
		}, 'Allowed only jpg, jpeg, png files');

		$('#fileupload').rules('add', {
		    checkCode: true
		});

		$('#datepicker').datepicker({
			format: "dd/mm/yyyy",
			todayHighlight: true,
			startDate: new Date()
	        // weekStart: 1,
	        // daysOfWeekHighlighted: "6,0",
	        // autoclose: true,
	        
	    });
	    $('#datepicker').datepicker("setDate", new Date());
	</script>
</body>
</html>