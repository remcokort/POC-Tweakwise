<script type="text/javascript">
$(document).ready(function(){
  // Set trigger and container variables
  var trigger = $('#autocomplete'),
      container = $('#search-content');
  
  var showResultCount = 50;

  $("#autocomplete-input").keyup(function(){
  	var term = $(this).val();
  	var ean = $('#ean').val();
  	var datepicker = $('#date').val();
  	var showResult = $('#showResult').val();

  	$('#search-content-start').hide();
  	container.load('lib/search-content.php', { searchterm: term, eanInt: ean, date: datepicker, showresult: showResult, showResultCount: showResultCount });
  	});

  $("#ean").change(function(){
  	var term = $('#autocomplete-input').val();
  	var ean = $('#ean').val();
  	var datepicker = $('#date').val();
  	var showResult = $('#showResult').val();

  	$('#search-content-start').hide();
  	container.load('lib/search-content.php', { searchterm: term, eanInt: ean, date: datepicker, showresult: showResult, showResultCount: showResultCount });
  	});

  $("#date").change(function(){
  	var term = $('#autocomplete-input').val();
  	var ean = $('#ean').val();
  	var datepicker = $('#date').val();
  	var showResult = $('#showResult').val();

  	$('#search-content-start').hide();
  	container.load('lib/search-content.php', { searchterm: term, eanInt: ean, date: datepicker, showresult: showResult, showResultCount: showResultCount });
  	});

  $("#showResult").change(function(){
  	var term = $('#autocomplete-input').val();
  	var ean = $('#ean').val();
  	var datepicker = $('#date').val();
  	var showResult = $('#showResult').val();

  	$('#search-content-start').hide();
  	container.load('lib/search-content.php', { searchterm: term, eanInt: ean, date: datepicker, showresult: showResult, showResultCount: showResultCount });
  	});

  $("#showMoreResults").on("click", function(){
  	var term = $('#autocomplete-input').val();
  	var ean = $('#ean').val();
  	var datepicker = $('#date').val();
  	var showResult = $('#showResult').val();

  	showResultCount = showResultCount+50;

  	$('#search-content-start').hide();
  	container.load('lib/search-content.php', { searchterm: term, eanInt: ean, date: datepicker, showresult: showResult, showResultCount: showResultCount });

  	return false;
  	});

  $('.modal').modal();
  $('select').material_select();

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false, // Close upon selecting a date,
    format: 'yyyy-mm-dd'
  });
});
</script>
<div class="container">
	<div class="row">
		<div class="col s12 m12 l12">
			<div class="card">
				<div class="card-content">
					<h1>Gezochte zoektermen</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m12 l12">
			<div class="card">
				<div class="card-content">
					<div class="input-field col s12">
						<input type="text" id="autocomplete-input" class="autocomplete">
						<label for="autocomplete-input">Zoeken</label><br />
					</div>
					<div class="input-field col s12 m6 l4">
						<select id="ean" name="ean">
							<option value="true">Wel laten zien</option>
							<option value="false">niet laten zien</option>
						</select>
						<label>EAN Nummers</label>
					</div>
					<div class="input-field col s12 m6 l4">
						<input type="text" class="datepicker" id="date">
						<label>Datum</label>
					</div>
					<div class="input-field col s12 m6 l4">
						<select id='showResult' name="showResult">
							<option value="allesWeergeven">Alles weergeven</option>
							<option value="alleenResultaat">Alleen met resultaat</option>
							<option value="alleenZonder">Alleen zonder resultaat</option>
						</select>
						<label>Heeft zoekresultaat</label>
					</div>
					<div id="search-content">
						<?php include('lib/search-content.php'); ?>
					</div>
					<a href="#" id="showMoreResults" class="waves-effect waves-light btn">Meer resultaten laten zien</a>
				</div>
			</div>
		</div>
	</div>
</div>
  