/* global $, jQuesry, alert */
$(document).ready(function(){
	"use strict";
	$("html").niceScroll();
    
   
	// Cashing the scroll top element
	var scrollButton = $("#scroll-top");
	$(window).scroll(function(){
		//console.log( $(this).scrollTop() );
		$(this).scrollTop() >= 500 ? scrollButton.show() : scrollButton.hide();
	});
    
     // header btn
    var headerBtn = $("#header-btn");
    headerBtn.click(function(){
			$("html,body").animate({ scrollTop : 880 }, 600);
		});

	//click on button scroll top
		scrollButton.click(function(){
			$("html,body").animate({ scrollTop : 0 }, 600);
		});
	// writing page system
		 $("#btnAnswer").click(function(){
			  		var userInput = $('#answerForm').val().toLowerCase();
			        if($(".answer").text() === userInput){
			        	$("#alertCorrect").show(1000,function(){ setTimeout(function() {location.reload()},2000); });
			        }
			        else{
			        	$("#alertInCorrect").show(1000,function(){ setTimeout(function() {location.reload()},2000); });
			        }
		 });
 		 
});

// loading screen
$(window).load(function()
{

		$(".load-screen .spinner").fadeOut(2000,function(){
		$(this).parent().fadeOut(2000,function(){

		$("body").css("overflow","auto");
		$(this).remove();
		
			});
		});
});