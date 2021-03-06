const author = document.getElementById('author');
const authorLimit = document.getElementById('p_author_limit');
const text = document.getElementById('bodyText');
const textLimit = document.getElementById('p_bodytext_limit');
const btnSubmit = document.getElementById('btn_submit');
const btnClear = document.getElementById('btn_clear');

function checkLength() {

	if (author.value.length >= 30) {
		authorLimit.style.display = 'block';
	} else {
		authorLimit.style.display = 'none';
	}

	if (text.value.length >= 201) {
		textLimit.style.display = 'block';
	} else {
		textLimit.style.display = 'none';
	}

	if (author.value.length >= 30 || text.value.length >= 201) {
		btnSubmit.disabled = true;
		btnSubmit.classList.add('disabled');
	} else {
		btnSubmit.disabled = false;
		btnSubmit.classList.remove('disabled');
	}

}

author.addEventListener('keyup', checkLength);
text.addEventListener('keyup', checkLength);
btnClear.addEventListener('click', () => {
	author.value = '';
	text.value = '';
	authorLimit.style.display = 'none';
	textLimit.style.display = 'none';
	btnSubmit.disabled = false;
	btnSubmit.classList.remove('disabled');
});
