<script type="text/javascript">
$(document).ready(function(){
	function load_kpi() {
			$('#content-area').load('lib/kpi-content.php');
		};
	
	$('#add').on('click', function(){
		var searchterm = $('#searchterm').val();
		var amount = $('#amount').val();

		$.post("lib/kpi-add.php", { term: searchterm, amount: amount}).done(function() { load_kpi() });
	});

	$(document).on('click','.delete', function(){
		var $this = $(this),
		target = $this.data('target');

		$.post("lib/kpi-delete.php", { term: target }).done(function() { load_kpi() });

		return false;
	});

	$('.modal').modal();
});
</script>
<div class="container">
	<div class="row">
		<div class="col s12 m12 l12">
			<div class="card">
				<div class="card-content">
					<h1>Key Performance Indicators</h1>
				</div>
			</div>
		</div>
	</div>
	<div id="content-area">
		<?php include('lib/kpi-content.php'); ?>
	</div>
</div>
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
	<a class="btn-floating btn-large red modal-trigger" href="#modalAdd">
		<i class="material-icons right">add</i>
	</a>
</div> 
<div id="modalAdd" class="modal">
	<div class="modal-content">
		<h4>Key Performance Indicator Toevoegen</h4>
		<form class="col s12">
			<div class="row">
				<div class="input-field col s12">
					<input id="searchterm" type="text" class="validate">
					<label for="first_name">Zoekterm</label>
				</div>
				<div class="input-field col s12">
					<input id="amount" type="text" class="validate">
					<label for="first_name">Doel</label>
				</div>
			</div>
		</form>
	<div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Annuleren</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat " id="add">Toevoegen</a>
    </div>
</div>