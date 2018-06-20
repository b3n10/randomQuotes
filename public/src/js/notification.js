const notification = document.getElementsByClassName('notification')[0];

if (notification) {
	setTimeout(() => {
		notification.style.opacity = 0;
		setTimeout(() => {
			notification.innerText = '';
		}, 2500);
	}, 1000);
}
