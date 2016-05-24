jQuery( document ).ready( function( $ ) {

	$( '.wpst-custom-css-toggle' ).on( 'click', function() {
		$( '.acf-form' ).slideToggle();
	});

	$( '#wpst-custom-css textarea' ).on( 'keyup', function() {
		var styles = $( this ).val();
		$( '.wpst-style-tile style' ).text( styles );
	});
});
