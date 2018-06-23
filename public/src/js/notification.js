const notifications = Array.from(document.getElementsByClassName('notification'));

if (notifications) {
	let timer1 = 1500;

	notifications.forEach(notification => {
		setTimeout(() => {
			notification.style.opacity = 0;
			setTimeout(() => {
				notification.innerText = '';
			}, 2500);
		}, timer1);
		timer1 += 2500;
	});
}
