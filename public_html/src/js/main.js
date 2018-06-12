const txt_body = document.getElementsByClassName('div_text')[0];
const next = document.getElementsByClassName('next')[0];
const pbody = document.getElementById('pbody');
const ptitle = document.getElementById('ptitle');
const delay = 100;

next.addEventListener('click', () => {
	txt_body.style.left = '-565px';

	if (txt_body.style.left === '-565px') {

		setTimeout(() => {

			txt_body.style.display = 'none';

			setTimeout(() => {
				txt_body.style.left = '565px';
				txt_body.style.display = 'block';

				const xhr = new XMLHttpRequest();

				// prepare request
				xhr.open('GET', '../resources/getRandom.php', true);

				// fetching
				xhr.onprogress = () => {
				};

				// fetched
				xhr.onload = () => {
					if (xhr.status === 200) {
						txt_body.style.left = '0px';
						const response = JSON.parse(xhr.responseText);
						pbody.innerText = response.body;
						ptitle.innerText = response.title;
					}
				};

				// send request
				xhr.send();
			}, delay);

		}, delay);

	}

});
