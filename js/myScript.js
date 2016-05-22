$(document).ready(function() {
	
	var Arrays = new Array();
	var Rincian = new Array();
	
	$('#wrap li').mousemove(function(){
		
		var position = $(this).position();
		
		$('#cart').stop().animate({															
				left   : position.left+'px',
			},250,function(){
		});			
	}).mouseout(function(){});	
	
	$('#wrap li').click(function(){
		var thisID = $(this).attr('id');
		
		var itemname  = $(this).find('div .namaBahan').html();
		var itemprice = $(this).find('div .price').html();
		var itemunit = $(this).find('div .satuanstok').html();
			
		if(include(Arrays,thisID))
		{
			var price 	 = $('#each-'+thisID).children(".shopp-price").find('em').html();
			var quantity = $('#each-'+thisID).children(".shopp-quantity").html();
			quantity = parseInt(quantity)+parseInt(1);
			
			var total = parseInt(itemprice)*parseInt(quantity);
			
			//Update rincian
			Rincian[thisID][4] += 1;
			Rincian[thisID][5] = total;

			$('#each-'+thisID).children(".shopp-price").find('em').html(total);
			$('#each-'+thisID).children(".shopp-quantity").html(quantity);
			
			var prev_charges = $('.cart-total span').html();
			prev_charges = parseInt(prev_charges)-parseInt(price);
			prev_charges = parseInt(prev_charges)+parseInt(total);

			$('.cart-total span').html(prev_charges);

			$('#total-hidden-charges').val(prev_charges);
			$('#rincian-hidden').val(JSON.stringify(Rincian));
		}
		else
		{
			Arrays.push(thisID);
			Rincian.push(new Array(thisID, itemname, itemprice, itemunit, 1, itemprice));
			
			var prev_charges = $('.cart-total span').html();
			prev_charges = parseInt(prev_charges)+parseInt(itemprice);
			
			$('.cart-total span').html(prev_charges);

			$('#total-hidden-charges').val(prev_charges);
			$('#rincian-hidden').val(JSON.stringify(Rincian));
			
			$('#left_bar .cart-info').append('<div class="shopp" id="each-'+thisID+'"><div class="label">'+itemname+'</div><div class="shopp-price"> Rp <em>'+itemprice+'</em></div><span class="shopp-quantity">1</span><img src="img/remove.ico" class="remove" /><br class="all" /></div>');
			
			$('#cart').css({'-webkit-transform' : 'rotate(20deg)','-moz-transform' : 'rotate(20deg)' });
		}
		
		setTimeout('angle()',200);
	});	
	
	
	$('.remove').livequery('click', function() {
		var deduct = $(this).parent().children(".shopp-price").find('em').html();
		var prev_charges = $('.cart-total span').html();
		var thisID = $(this).parent().attr('id').replace('each-','');

		var pos = getpos(Arrays,thisID);
		var pos2 = getpos(Rincian,thisID);
		Arrays.splice(pos,1,"0");
		Rincian.splice(pos2,1,"0");
		
		prev_charges = parseInt(prev_charges)-parseInt(deduct);
		$('.cart-total span').html(prev_charges);
		$('#total-hidden-charges').val(prev_charges);
		$('#rincian-hidden').val(JSON.stringify(Rincian));
		$(this).parent().remove();
	});
	
	$('#Submit').livequery('click', function() {
		// menghilangkan list dan menampilkan harga total
		// var totalCharge = $('#total-hidden-charges').val();
		// $('#left_bar').html('Total Charges: $'+totalCharge); 
		return true;
	});
});

function include(arr, obj) {
  for(var i=0; i<arr.length; i++) {
    if (arr[i] == obj) return true;
  }
}

function getpos(arr, obj) {
  for(var i=0; i<arr.length; i++) {
    if (arr[i] == obj) return i;
  }
}

function angle() {
	$('#cart').css({'-webkit-transform' : 'rotate(0deg)','-moz-transform' : 'rotate(0deg)' });
}
