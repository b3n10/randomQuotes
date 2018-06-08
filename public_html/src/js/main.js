const txt_body = document.getElementsByClassName('div_text')[0];
const next = document.getElementsByClassName('next')[0];
const delay = 200;

next.addEventListener('click', () => {
	txt_body.style.left = '-565px';

	setTimeout(() => {
		if (txt_body.style.left === '-565px') {
			txt_body.style.display = 'none';
			setTimeout(() => {
				txt_body.style.left = '565px';
				txt_body.style.display = 'block';
				setTimeout(() => {
					txt_body.style.left = '0px';
				}, delay);
			}, delay);
		}
	}, delay);

});

