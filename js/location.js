$(document).ready(function(){

	load_data();
	
	function load_data(query='')
	{
		$.ajax({
			url:"fetch.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				$('.dealer-result').html(data);
			}
		})
	}

	$('#search_filter').change(function(){
		$('#hidden_location').val($('#search_filter').val());
		var query = $('#hidden_location').val();
		load_data(query);
	});

	$('#search_filter2').change(function(){
		$('#hidden_state').val($('#search_filter2').val());
		var query2 = $('#hidden_state').val();
		load_data(query2);
	});

	// $('#search_filter3').change(function(){
	// 	$('#hidden_city').val($('#search_filter3').val());
	// 	var query = $('#hidden_city').val();
	// 	load_data(query2);
	// });
	
});

// $(document).ready(function() {
//   $('#state').change(function() {
//     var country = $(this).val();
//     $.ajax({
//       url: 'fetch.php',
//       type: 'POST',
//       data: { state: state },
//       dataType: 'json',
//       success: function(data) {
//         $('#state').empty();
//         $.each(data, function(key, value) {
//           $('#state').append('<option value="' + value.id + '">' + value.name + '</option>');
//         });
//       }
//     });
//   });
// });

// search & sort


$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        //var minimum_price = $('#hidden_minimum_price').val();
        //var maximum_price = $('#hidden_maximum_price').val();
        var category = get_filter('category');
        var size = get_filter('size');
        var finish = get_filter('finish');
		var concept = get_filter('concept');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, category:category, size:size, finish:finish, concept:concept},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    //$('#price_range').slider({
     //   range:true,
    //    min:1000,
     //   max:65000,
     //   values:[1000, 65000],
     //   step:500,
      //  stop:function(event, ui)
     //   {
     //       $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
     //       $('#hidden_minimum_price').val(ui.values[0]);
      //      $('#hidden_maximum_price').val(ui.values[1]);
     //       filter_data();
        //}
   // });

});


//Dropdown Button


// Get all dropdown buttons and dropdown content
var dropdownBtns = document.querySelectorAll(".dropbtn");
var dropdownContents = document.querySelectorAll(".dropdown-content");

// When the user clicks on a button, toggle between hiding and showing the dropdown content
dropdownBtns.forEach(function(btn) {
  var arrow = btn.querySelector(".arrow");
  btn.addEventListener("click", function() {
    var currentContent = this.nextElementSibling;
    dropdownContents.forEach(function(content) {
      if (content !== currentContent) {
        content.classList.remove("show");
      }
    });
    currentContent.classList.toggle("show");
    arrow.innerHTML = currentContent.classList.contains("show") ? "&#9650;" : "&#9660;";
  });
});

// Close the dropdown if the user clicks outside of it
window.addEventListener("click", function(event) {
  if (!event.target.matches(".dropbtn") && !event.target.matches(".arrow")) {
    dropdownContents.forEach(function(content) {
      if (content.classList.contains("show")) {
        content.classList.remove("show");
        var btn = content.previousElementSibling;
        var arrow = btn.querySelector(".arrow");
        arrow.innerHTML = "&#9660;";
      }
    });
  }
});

