const author = document.getElementById('author');
const authorLimit = document.getElementById('p_author_limit');
const text = document.getElementById('bodyText');
const textLimit = document.getElementById('p_bodytext_limit');

function checkLength() {
	switch (this.id) {
	case 'author':
		if (this.value.length >= 30) {
			authorLimit.style.display = 'block';
		} else {
			authorLimit.style.display = 'none';
		}
		break;
	case 'bodyText':
		if (this.value.length >= 200) {
			textLimit.style.display = 'block';
		} else {
			textLimit.style.display = 'none';
		}
		break;
	default:
		break;
	}
}

author.addEventListener('keyup', checkLength);
text.addEventListener('keyup', checkLength);


