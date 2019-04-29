jQuery(function($) {
	"use strict";

	var vnBuilding = window.vnBuilding || {};

	/*==========================
	=		MAIN FUNCTION      =
	============================*/
	vnBuilding.slider = function() {
		if( $('.slider__list').length ) {
			$('.slider__list').slick({
				infinite: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: true,
				arrows: true,
				autoplay: true,
				autoplaySpeed: 4000,
				prevArrow: `<div class="prev"><i class="icons flaticon-back"></i></div>`,
				nextArrow: `<div class="next"><i class="icons flaticon-next"></i></div>`
			});
		}
		$('.open-popup-link').magnificPopup({
			type: 'inline',
			midClick: true,
			mainClass: 'mfp-fade'
		});
	};

	vnBuilding.partner__list = function() {
		if( $('.partner__list').length ) {
			$('.partner__list').slick({
				infinite: true,
				slidesToShow: 6,
				slidesToScroll: 1,
				arrows: true,
				prevArrow: `<div class="prev"><i class="icons flaticon-back"></i></div>`,
				nextArrow: `<div class="next"><i class="icons flaticon-next"></i></div>`
			});
		}
	};

	vnBuilding.backToTop = function() {
		if($("#back-to-top").length) {
			var valHeight = $(window).height();
			
			if($(window).scrollTop() < valHeight) {
				$("#back-to-top").addClass('hidden');
			} else {
				$("#back-to-top").removeClass('hidden');
			}
			$(window).scroll(function() {
				if($(window).scrollTop() < valHeight) {
					$("#back-to-top").addClass('hidden');
				} else {
					$("#back-to-top").removeClass('hidden');
				}
			});
			$("#back-to-top").on('click', function() {
				$("html, body").animate({
					scrollTop: 0
				}, 1000);
			});
		}
	};
	
	vnBuilding.cartQuantity = function() {
		if( $('.cart').length ) {
			$('.cart .cart__button--minus').on('click', function() {
				var currentVal = parseInt($(this).next('.cart__input').val());
				// Test NaN
				if(isNaN(currentVal) || currentVal === '') {
					currentVal = 0;
				}
				if(currentVal > 0) {
					$(this).next('.cart__input').val(currentVal - 1);
				}
			});
			$('.cart .cart__button--flus').on('click', function() {
				var currentVal = parseInt($(this).prev('.cart__input').val());
				if(isNaN(currentVal) || currentVal === '') {
					currentVal = 0;
				}
				$(this).prev('.cart__input').val(currentVal + 1);
			});
		}
	};

	/*==========================
	=		INIT FUNCTION      =
	============================*/

	$(document).ready(function() {
		vnBuilding.slider();
		vnBuilding.partner__list();
		vnBuilding.backToTop();
		vnBuilding.cartQuantity();
	});


	$(window).on('load', function() {
		if($('#loading-page').length) {
			$('#loading-page').delay(1500).fadeOut(400);
		}
	});
	$(window).on('resize', function() {});
});