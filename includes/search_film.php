
<div class="search">
<div class="search_headbar">
<h4>Videos is Telugu</h4>
</div>

<div class="search_filters">
<input type="checkbox" />HD<br />
<input type="checkbox" />Not Suitable for Children<br />
<hr/>Genre<br />
<input type="checkbox" />Blea<br />
<input type="checkbox" />Blea<br />
<input type="checkbox" />Blea<br />
<input type="checkbox" />Blea<br />
<hr/>Runtime(minutes)<br /><br/>
<span style="font-size:10px; float:right;">0 ------ 10  ----- 20 ----- 60 ----- 90 ----- 90+</span>
<div id="slider"></div>
<script>
$(function() {
    var trueValues = [0, 10, 20, 60, 90, 100];
    var values =     [0,   1,   2,    3,    4,    5];
    var slider = $("#slider").slider({
        orientation: 'horizontal',
        range: true,
        min: 0,
        max: 5,
        values: [0, 4],
        slide: function(event, ui) {
            var includeLeft = event.keyCode != $.ui.keyCode.RIGHT;
            var includeRight = event.keyCode != $.ui.keyCode.LEFT;
            var value = findNearest(includeLeft, includeRight, ui.value);
            if (ui.value == ui.values[0]) {
                slider.slider('values', 0, value);
            }
            else {
                slider.slider('values', 1, value);
            }
            $("#price-amount").html('$' + getRealValue(slider.slider('values', 0)) + ' - $' + getRealValue(slider.slider('values', 1)));
            return false;
        },
        change: function(event, ui) { 
            getHomeListings();
        }
    });
    function findNearest(includeLeft, includeRight, value) {
        var nearest = null;
        var diff = null;
        for (var i = 0; i < values.length; i++) {
            if ((includeLeft && values[i] <= value) || (includeRight && values[i] >= value)) {
                var newDiff = Math.abs(value - values[i]);
                if (diff == null || newDiff < diff) {
                    nearest = values[i];
                    diff = newDiff;
                }
            }
        }
        return nearest;
    }
    function getRealValue(sliderValue) {
        for (var i = 0; i < values.length; i++) {
            if (values[i] >= sliderValue) {
                return trueValues[i];
            }
        }
        return 0;
    }
});


</script>
<br/>	
<hr/>

</div>

<div class="search_res">
<ul>
<li>
	<div class="search_res_vdo_det">
    <h4>Video title dude, dont fynd me any felling mistakes please...bitch!!!</h4>
    <p>
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).    </p>
    </div>
	<div class="search_res_vdo">
    </div>
</li>
<li>
	<div class="search_res_vdo_det">
    <h4>Video title dude, dont fynd me any felling mistakes please...bitch!!!</h4>
    <p>
    Short discription and some lipsum  Watch In : videos 	profiles 	jobs 	forums deos is Telugu, Hindi Video title dude, dont fynd me any felling mistakes please...bitch!!! Short discription and some lipsum
    </p>
    </div>
	<div class="search_res_vdo">
    </div>
</li>
<li>
	<div class="search_res_vdo_det">
    <h4>Video title dude, dont fynd me any felling mistakes please...bitch!!!</h4>
    <p>
    Short discription and some lipsum  Watch In : videos 	profiles 	jobs 	forums deos is Telugu, Hindi Video title dude, dont fynd me any felling mistakes please...bitch!!! Short discription and some lipsum
    </p>
    </div>
	<div class="search_res_vdo">
    </div>
</li>
<li>
	<div class="search_res_vdo_det">
    <h4>Video title dude, dont fynd me any felling mistakes please...bitch!!!</h4>
    <p>
    Short discription and some lipsum  Watch In : videos 	profiles 	jobs 	forums deos is Telugu, Hindi Video title dude, dont fynd me any felling mistakes please...bitch!!! Short discription and some lipsum
    </p>
    </div>
	<div class="search_res_vdo">
    </div>
</li>
<li>
	<div class="search_res_vdo_det">
    <h4>Video title dude, dont fynd me any felling mistakes please...bitch!!!</h4>
    <p>
    Short discription and some lipsum  Watch In : videos 	profiles 	jobs 	forums deos is Telugu, Hindi Video title dude, dont fynd me any felling mistakes please...bitch!!! Short discription and some lipsum
    </p>
    </div>
	<div class="search_res_vdo">
    </div>
</li>
<li>
	<div class="search_res_vdo_det">
    <h4>Video title dude, dont fynd me any felling mistakes please...bitch!!!</h4>
    <p>
    Short discription and some lipsum  Watch In : videos 	profiles 	jobs 	forums deos is Telugu, Hindi Video title dude, dont fynd me any felling mistakes please...bitch!!! Short discription and some lipsum
    </p>
    </div>
	<div class="search_res_vdo">
    </div>
</li>
</ul>
</div>


</div>





<script>
$("#float_nav").hide();
t=$(".search_res").position().top+$(".search_res").outerHeight()-445;
$(window).scroll( function()
				  {
					  st=$(document).scrollTop()+120;
					  te=$(document).height()-$(window).height();
					  pp=$("")
					  if(st < t)
					  {
					  $('.search_filters').stop().animate({'top' : st},0);
					  }
					  else
					  {
					  $('.search_filters').stop().animate({'top' : t},0);						  
					  }
			
			});


</script>