/*     START :  Beneficiary  Creation                  */

$('.nav-tabs > li a[title]').tooltip();

$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

	var $target = $(e.target);

	if ($target.parent().hasClass('disabled')) {
		return false;
	}
});

$(".next-step").click(function (e) {

	var $active = $('.wizard .nav-tabs li.active');
	$active.next().removeClass('disabled');
	nextTab($active);

});

$(".prev-step").click(function (e) {

	var $active = $('.wizard .nav-tabs li.active');
	prevTab($active);

});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}

function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

/*   END :         Beneficiary  Creation                  */


/* Start : Profile Pic Upload */

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.ProfilePicPreview')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$('#ProfilePicPreview').click(function(){ $('#myFile').trigger('click'); });

/* End : Profile Pic Upload */