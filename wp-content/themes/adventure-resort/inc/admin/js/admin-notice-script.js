( function( $ ){
  $( document ).on( 'click', '.notice-get-started-class .notice-dismiss', function () {
  // Read the "data-notice" information to track which notice
  // is being dismissed and send it via AJAX
  var type = $( this ).closest( '.notice-get-started-class' ).data( 'notice' );
  // Make an AJAX call
  $.ajax( ajaxurl,
    {
      type: 'POST',
      data: {
        action: 'adventure_resort_dismissable_notice',
        type: type,
        wpnonce: adventure_resort.wpnonce
      }
    } );
  } );
}( jQuery ) )