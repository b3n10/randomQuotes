'use strict';

var txt_body = document.getElementsByClassName('div-maintext')[0];
var button = document.getElementById('btn-next');

button.addEventListener('click', function () {

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