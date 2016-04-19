$(document).ready(function(){
	$('.filter-brand').click(function(){
		var val = $(this).data('bid');
		$('#bid').val(val);
		$('#frm_search').submit();
	});
	$('.filter-price').click(function(){
		var val = $(this).data('price');
		$('#price').val(val);
		$('#frm_search').submit();
	});
	$('.filter-cpu').click(function(){
		var val = $(this).data('cpu');
		$('#cpu').val(val);
		$('#frm_search').submit();
	});
	$('.filter-ram').click(function(){
		var val = $(this).data('ram');
		$('#ram').val(val);
		$('#frm_search').submit();
	});
	$('.filter-hdd').click(function(){
		var val = $(this).data('hdd');
		$('#hdd').val(val);
		$('#frm_search').submit();
	});
	$('.filter-screen').click(function(){
		var val = $(this).data('screen');
		$('#screen').val(val);
		$('#frm_search').submit();
	});
	$('#sort_select').change(function(){
		var val = $(this).val();
		if (val != '') {
			$('#sort').val(val);
			$('#frm_search').submit();
		}
	});
});