$(document).ready(function() {
	
	var Arrays=new Array();
	
	$('#wrap li').mousemove(function(){
		
		var position = $(this).position();
		
		$('#cart').stop().animate({
																									
				left   : position.left+'px',
				
			},250,function(){
			
		});			
	}).mouseout(function(){
		
	});	
	
	$('#wrap li').click(function(){
		
		var thisID = $(this).attr('id');
		
		var itemname  = $(this).find('div .namaBahan').html();
		var itemprice = $(this).find('div .price').html();
			
		if(include(Arrays,thisID))
		{
			var price 	 = $('#each-'+thisID).children(".shopp-price").find('em').html();
			var quantity = $('#each-'+thisID).children(".shopp-quantity").html();
			quantity = parseInt(quantity)+parseInt(1);
			
			var total = parseInt(itemprice)*parseInt(quantity);
			
			$('#each-'+thisID).children(".shopp-price").find('em').html(total);
			$('#each-'+thisID).children(".shopp-quantity").html(quantity);
			
			var prev_charges = $('.cart-total span').html();
			prev_charges = parseInt(prev_charges)-parseInt(price);
			
			prev_charges = parseInt(prev_charges)+parseInt(total);
			$('.cart-total span').html(prev_charges);
			
			$('#total-hidden-charges').val(prev_charges);
		}
		else
		{
			Arrays.push(thisID);
			
			var prev_charges = $('.cart-total span').html();
			prev_charges = parseInt(prev_charges)+parseInt(itemprice);
			
			$('.cart-total span').html(prev_charges);
			$('#total-hidden-charges').val(prev_charges);
			
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
		Arrays.splice(pos,1,"0")
		
		prev_charges = parseInt(prev_charges)-parseInt(deduct);
		$('.cart-total span').html(prev_charges);
		$('#total-hidden-charges').val(prev_charges);
		$(this).parent().remove();
		
	});	
	
	$('#Submit').livequery('click', function() {
		
		var totalCharge = $('#total-hidden-charges').val();
		
		$('#left_bar').html('Total Charges: $'+totalCharge);
		
		return false;
		
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
function angle(){$('#cart').css({'-webkit-transform' : 'rotate(0deg)','-moz-transform' : 'rotate(0deg)' });}
