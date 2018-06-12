// texts
const txt_body = document.getElementsByClassName('div_text')[0];
const pbody = document.getElementById('pbody');
const ptitle = document.getElementById('ptitle');
let shareBody = '';
let shareTitle = '';

// buttons
const next = document.getElementsByClassName('next')[0];
const shareFB = document.getElementsByClassName('sharefb')[0];
const shareTW = document.getElementsByClassName('sharetw')[0];

const delay = 100; // for animation
const baseURL = window.location.href.indexOf('?') ? window.location.href.substr(0, window.location.href.indexOf('?')) : window.location.href;
let shareURL = window.location.href;

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

						// update text
						const response = JSON.parse(xhr.responseText);
						pbody.innerText = response.body;
						ptitle.innerText = response.title;
						shareBody = response.body;
						shareTitle = response.title;

						// update URL
						window.history.replaceState('', '', `${baseURL}?id=${response.id}`);
					}
				};

				// send request
				xhr.send();
			}, delay);

		}, delay);

	}

});

shareFB.addEventListener('click', () => {
	shareURL = window.location.href;
	window.open(`https://www.facebook.com/sharer/sharer.php?u=${shareURL}`, '_blank');
});

shareTW.addEventListener('click', () => {
	shareURL = window.location.href;
	window.open(`https://twitter.com/intent/tweet?text=${shareBody} -${shareTitle} (${shareURL})`, '_blank');
});
