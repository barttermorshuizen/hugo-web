jQuery(document).ready(function() {
	'use strict';

	function Hugo() {
		this.version = 0.1;
		this.ajaxurl = '/wp-admin/admin-ajax.php';
		this.get_arts();
	}

	Hugo.prototype.get_arts = function() {
		var arts = localStorage.getItem('hg-arts');
		var oArts = JSON.parse(arts);
		for (var x in oArts) {
			if (oArts.hasOwnProperty(x)) {
				jQuery('#'+x).val(oArts[x]);
			}
		}
	};

	Hugo.prototype.set_header = function(header, headerValue) {
		var placeholder = jQuery(header +' .panel-title-placeholder').html(headerValue);
	};

	Hugo.prototype.send_action = function(data, callback) {
		jQuery.ajax({
			url: hugo.ajaxurl,
			method: "POST",
			data: data,
			context: document.body,
		}).done(callback);
	};

	Hugo.prototype.submit_referral = function(aElements) {
		var data = {};

		for (var i = 0; i < aElements.length; i++) {
			if (aElements[i].type == 'radio' && aElements[i].checked == true) {
				data[aElements[i].name] = aElements[i].value;
			}
			data[aElements[i].id] = aElements[i].value;
		}
		data.action = 'hugo_submit_referral';

		var callback = function(response) {
			
		};

		hugo.send_action(data, callback);
	};

	jQuery('#hg-button').click(function() {
		if (jQuery(this).hasClass('hg-closed')) {
			jQuery('.hugo-wrapper').animate({
				width: '360px',
				height: '730px'
			}, 300, "swing", function() {
				jQuery('.hg-form-wrapper').css('display', 'block');
				jQuery('#hg-button').removeClass('hg-closed');
			});
		} else {
			jQuery('.hg-form-wrapper').css('display', 'none');
			jQuery('.hugo-wrapper').animate({
				width: '0px',
				height: '0px'
			}, 300, "swing", function() {
				jQuery('#hg-button').addClass('hg-closed');
			});
		}
	});

	jQuery('#hg-form').validator();

	jQuery('#hg-form').validator().on('validate.bs.validator', function (event) {
		if (jQuery('#hg-dierenarts .has-error').length >= 1) {
			jQuery('#hg-header-dierenarts a').css('color', '#a94442');
		} else {
			jQuery('#hg-header-dierenarts a').css('color', '#000');
		}
		if (jQuery('#hg-patient .has-error').length >= 1) {
			jQuery('#hg-header-patient a').css('color', '#a94442');
		} else {
			jQuery('#hg-header-patient a').css('color', '#000');
		}
		if (jQuery('#hg-eigenaar .has-error').length >= 1) {
			jQuery('#hg-header-eigenaar a').css('color', '#a94442');
		} else {
			jQuery('#hg-header-eigenaar a').css('color', '#000');
		}
	});
	jQuery('#hg-form').validator().on('submit', function (event) {
		if (event.isDefaultPrevented()) {
			console.log('invalid');
		} else {
			event.stopPropagation();
			event.preventDefault();
			hugo.submit_referral(this.elements);
			var arts = {
				'da-naam': jQuery('#da-naam').val(),
				'da-email': jQuery('#da-email').val(),
				'da-tel': jQuery('#da-tel').val(),
				'da-praktijk': jQuery('#da-praktijk').val(),
				'da-plaats': jQuery('#da-plaats').val()
			};
			localStorage.setItem('hg-arts', JSON.stringify(arts));
		}
	});

	jQuery('#hg-clear').on('click', function(event) {
		var oForm = this.closest('form');
		oForm.reset();
		var titles = jQuery('.panel-title-placeholder');
		for (var i = 0; i < titles.length; i++) {
			jQuery(titles[i]).html('');
		}
	});

	jQuery('#da-praktijk, #da-plaats').on('change', function(event) {
		var headerValue = document.getElementById('da-praktijk').value + ', ' + document.getElementById('da-plaats').value;
		hugo.set_header('#hg-header-dierenarts', headerValue);
	});

	jQuery('#p-soort').on('change', function(event) {
		var headerValue = document.getElementById('p-soort').value;
		hugo.set_header('#hg-header-patient', headerValue);
	});

	jQuery('#e-naam').on('change', function(event) {
		var headerValue = document.getElementById('e-naam').value;
		hugo.set_header('#hg-header-eigenaar', headerValue);
	});

	jQuery('.collapse').on('shown.bs.collapse', function(){
		jQuery(this).parent().find(".glyphicon-plus-sign").removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign");
	}).on('hidden.bs.collapse', function(){
		jQuery(this).parent().find(".glyphicon-minus-sign").removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign");
	});

	window.hugo = new Hugo();
});