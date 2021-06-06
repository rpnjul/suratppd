$('#tableData').DataTable({
	    ordering: false,
	    "scrollY": "470px",
	    "scrollCollapse": true,
	    responsive: true
	});
	$('#pgw_snd').password({
	  placement: 'after',
	  eyeClass: 'fa',
	  eyeOpenClass: 'fa-eye',
	  eyeCloseClass: 'fa-eye-slash',
	  eyeClassPositionInside: false
	});
	$('#kln_snd').password({
	  placement: 'after',
	  eyeClass: 'fa',
	  eyeOpenClass: 'fa-eye',
	  eyeCloseClass: 'fa-eye-slash',
	  eyeClassPositionInside: false
	});
	  $("#pgw_nip").focusout(function() {
	    $(this).val(($("#pgw_nip").val().replace(/\s+/g,'')));
	    //replace(/\s+/g, '');
	  });
	  $("#pgw_tlp").focusout(function() {
	     $(this).val(($("#pgw_tlp").val().replace(/\s+/g,'')));
	  });
	  $('#pgw_tll').datepicker({
	            dateFormat:"yy-mm-dd",
	            changeYear: true,
	            changeMonth: true,
	  });
