$(function () {
    
  'use strict';
   
  // To hide placeholder by focus 
  $('[placeholder]').focus(function () {
      $(this).attr('data-text', $(this).attr('placeholder'));
      $(this).attr('placeholder', '');
  }).blur(function () {
      $(this).attr('placeholder', $(this).attr('data-text'));
  });
    
  // To show Message before delete
  $('.confirm').click(function() {
      return confirm('Are You Sure ?'); 
  });
    
  $(".button-toggel").click(function()
	{
		$(".vid-contents").toggle(1000);
	});

  $('#MyTable').datatable({
    pageSize: 5,
    sort: '*'
}) ;

$('#MyTable').datatable('page', 3);
var data = $('#MyTable').datatable('select');
$('#MyTable').datatable('delete', function (e) {
    return e.title.trim().length > 0;
});

});
