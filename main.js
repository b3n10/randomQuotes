const txt_body = document.getElementsByClassName('div-maintext')[0];
const button = document.getElementById('btn-next');

button.addEventListener('click', () => {

	txt_body.style.left = '-565px';

	setTimeout(() => {

		if (txt_body.style.left === '-565px') {

			txt_body.style.display = 'none';

			setTimeout(() => {

				txt_body.style.left = '565px';
				txt_body.style.display = 'block';

				setTimeout(() => {

					txt_body.style.left = '0px';

				}, 500);

			}, 100);

		}

	}, 500);

});

