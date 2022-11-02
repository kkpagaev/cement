// Example Basic
$("#example-basic").steps({
	headerTag: "h3",
	bodyTag: "section",
	transitionEffect: "slideLeft",
	autoFocus: true,
	onFinished: function (event, currentIndex) {
		$("#nps-form").submit();
	},
	onStepChanging: function (event, currentIndex, newIndex) {
		if(newIndex < currentIndex) {
			return true;
		}
		function onlyUnique(value, index, self) {
			return self.indexOf(value) === index;
		}
		var a = [];
		$('#example-basic-p-' + currentIndex + ' input').each(function (index) {
			a.push($(this).attr('name'));
		});

		var unique = a.filter(onlyUnique);
		let result = true;
		unique.forEach(function (inputId) {
			if($(`input[name="${inputId}"]:checked`).length == 0) {
				$(`input[name="${inputId}"]`).each(function (index) {

					$(this).parent().parent().parent().css('border', '0.2rem solid red');

					
					console.log($(this));
				});
				result = false;
			} else {
				$(`input[name="${inputId}"]`).each(function (index) {
					$(this).parent().parent().parent().css('border', 'none');

				});
			}

		});
		$('#example-basic-p-' + currentIndex + ' textarea').each(function (index) {
			if($(this).val().trim().length == 0) {
				$(this).css('border', '0.1rem solid red');
				result = false;
			} else {
				$(this).css('border-color', 'gray');
			}
		});
		
		return result;
	},
});



// Example Form
$("#example-form").steps({
	headerTag: "h3",
	bodyTag: "section",
	transitionEffect: "slideLeft",
	autoFocus: true,
});


// Example Vertical
$("#example-vertical").steps({
	headerTag: "h3",
	bodyTag: "section",
	transitionEffect: "slideLeft",
	stepsOrientation: "vertical"
});
$('a[href="#next"]').each(function (el) {
	$(this).prop("id", "nps-next");
	$(this).addClass("disable-click");
})
$("#nps-next").click(function (e) {
	console.log("123");
	e.preventDefault();
})
