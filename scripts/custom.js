// JavaScript Document

function login_pop_up()
{
	$("#pop_cont").children().hide();
	$(".login").show();
	t=(window.innerHeight-400)*0.5;
	l=(window.innerWidth-500)*0.5;
	$("#pop_bg").show().animate({left : "0"},200);
	$("#pop").css('top',t).show().animate({left : "0"},200);
}
function lang_pop_up()
{
	$("#pop_cont").children().hide();
	$(".lang_box").show();
	t=(window.innerHeight-400)*0.5;
	l=(window.innerWidth-500)*0.5;
	$("#pop_bg").show().animate({left : "0"},200);
	$("#pop").css('top',t).show().animate({left : "0"},200);
}
function pop_out()
{
	$("#pop_bg").show().animate({left : "-100%"},200);
	$("#pop").show().animate({left : "100%"},200);
}

$(document).ready(
				  function()
				  {
					  $("#login_btn").click(function(){login_pop_up();});
					  $("#lang_sel").click(function(){lang_pop_up();});
					  $(".signup_nav").click(function(){
																$(".login_tab").fadeOut(50);
																$(".signup_tab").delay(50).fadeIn(250);
																$(".signup_nav").css('background-color',"#2be");
																$(".login_nav").css('background-color',"#333");
																});
					  $(".login_nav").click(function(){
																$(".signup_tab").fadeOut(50);
																$(".login_tab").delay(50).fadeIn(250);
																$(".login_nav").css('background-color',"#2be");
																$(".signup_nav").css('background-color',"#333");
																});
					  $("#signup_box_close").click(function(){$(pop_out())});
					  $(document).keyup(function(e) {
														  if (e.keyCode == 27) {pop_out()}   // esc
														});
					  $(".bar_tabs tr td").click(function(){ $(".bar_tabs tr > .selected").removeClass('selected'); $(this).addClass('selected'); });
				$("#float_nav ul li").eq(0).click(function()
														   {
															   $('html , body').animate({scrollTop : '0'},400);	
														   }); 
				$("#float_nav ul li").eq(1).click(function()
														   {
															   $('html , body').animate({scrollTop : '420'},400);	
														   }); 
				$("#float_nav ul li").eq(2).click(function()
														   {
															   $('html , body').animate({scrollTop : '800'},400);	
														   }); 
				$("#float_nav ul li").eq(3).click(function()
														   {
															   $('html , body').animate({scrollTop : '1180'},400);	
														   }); 
				
				
				  $(window).scroll( function()
				  {
					  st=$(document).scrollTop();
					  if((st<150)&&(st>=0))
					  {
						$("#float_nav ul li").css("background","none").eq(0).css('background', "#2be");  
					  }
					  if((st<600)&&(st>350))
					  {
						$("#float_nav ul li").css("background","none").eq(1).css('background', "#2be");  
					  }
					  if((st<1000)&&(st>700))
					  {
						$("#float_nav ul li").css("background","none").eq(2).css('background', "#2be");  
					  }
					  if((st<1300)&&(st>1100))
					  {
						$("#float_nav ul li").css("background","none").eq(3).css('background', "#2be");  
					  }
					  if((st>1400))
					  {
						$("#float_nav ul li").css("background","none").eq(4).css('background', "#2be");  
					  }
					  if((st>1700))					  {
						$("#float_nav ul li").css("background","none").eq(5).css('background', "#2be");  
					  }
					  
			
			
			});
				  
				  //slider//
				  
				   $("#pagination > li").click(function()
								{
									clearInterval(hand);
									t=$(this).index();
  									tt=$(".cur_frame").index();
									$(".cur_frame , .pag_cur ").stop();
									if(t==6)
									{
										if(tt!=4)
										{
										$(".cur_frame").fadeOut(100).next().addClass('cur_frame').fadeIn(400).prev().removeClass('cur_frame');
										}
										else
										{
										$(".cur_frame").fadeOut(100).removeClass('cur_frame');
										$(".main_slider_frame").eq(0).fadeIn(400).addClass('cur_frame');											
										}
									}
									else if(t==0)
									{
										if(tt!=0)
										{
										$(".cur_frame").fadeOut(100).prev().addClass('cur_frame').fadeIn(400).next().removeClass('cur_frame');  
										}
										else
										{
										$(".cur_frame").fadeOut(100).removeClass('cur_frame');
										$(".main_slider_frame").eq(4).fadeIn(400).addClass('cur_frame');											
										}
									}
									else
									{
										$(".main_slider_frame").removeClass('cur_frame').fadeOut(10).eq(t-1).addClass('cur_frame').fadeIn(400);	
									}
									tt=$(".cur_frame").index();
									$(".pag").removeClass('pag_cur').eq(tt).addClass('pag_cur');
									hand=setInterval(function(){$("#next").click();},3000);
					  		}
								);
					  hand=setInterval(function(){$("#next").click();},3000);
					  
					 
				  }
				  );