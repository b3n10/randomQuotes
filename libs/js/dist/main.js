'use strict';

var txt_body = document.getElementsByClassName('div_text')[0];
var next = document.getElementsByClassName('next')[0];

next.addEventListener('click', function () {
	txt_body.style.left = '-565px';

	setTimeout(function () {
		if (txt_body.style.left === '-565px') {
			txt_body.style.display = 'none';
			setTimeout(function () {
				txt_body.style.left = '565px';
				txt_body.style.display = 'block';
				setTimeout(function () {
					txt_body.style.left = '0px';
				}, 500);
			}, 100);
		}
	}, 500);
});