// texts
const txt_body = document.getElementsByClassName('div_text')[0];
const div_wait = document.getElementsByClassName('div_wait')[0];
const ptext = document.getElementById('ptext');
const pauthor = document.getElementById('pauthor');
let shareText = ptext.innerText;
let shareAuthor = pauthor.innerText;

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
				txt_body.style.left = '1000px';

				div_wait.style.display = 'block';
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
						div_wait.style.display = 'none';
						txt_body.style.left = '0px';

						// update text
						const response = JSON.parse(xhr.responseText);

						ptext.innerText = "\"" + response.text.replace(/\r?\n|\r/g, ' ').trim() + "\"";
						pauthor.innerText = response.author.replace(/\r?\n|\r/g, ' ').trim();

						shareText = ptext.innerText;
						shareAuthor = pauthor.innerText;

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
	const twURL = encodeURIComponent(`${shareText} -${shareAuthor} (${shareURL})`);
	window.open(`https://twitter.com/intent/tweet?text=${twURL}`, '_blank');
});
