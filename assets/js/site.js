(() => {
	'use strict';
	document.documentElement.classList.add('js');

	const navigation = document.querySelector('.site-navigation');
	const toggle = navigation?.querySelector('.menu-toggle');
	const panel = navigation?.querySelector('.menu-panel');

	if (!navigation || !toggle || !panel) {
		return;
	}

	const closeMenu = ({ returnFocus = false } = {}) => {
		navigation.classList.remove('is-open');
		toggle.setAttribute('aria-expanded', 'false');
		document.body.classList.remove('menu-open');

		if (returnFocus) {
			toggle.focus();
		}
	};

	toggle.addEventListener('click', () => {
		const willOpen = toggle.getAttribute('aria-expanded') !== 'true';
		navigation.classList.toggle('is-open', willOpen);
		toggle.setAttribute('aria-expanded', String(willOpen));
		document.body.classList.toggle('menu-open', willOpen);
	});

	panel.addEventListener('click', (event) => {
		if (event.target.closest('a')) {
			closeMenu();
		}
	});

	navigation.addEventListener('focusout', (event) => {
		if (!navigation.contains(event.relatedTarget)) {
			closeMenu();
		}
	});

	document.addEventListener('keydown', (event) => {
		if (event.key === 'Escape' && navigation.classList.contains('is-open')) {
			closeMenu({ returnFocus: true });
		}
	});

	window.matchMedia('(min-width: 783px)').addEventListener('change', (event) => {
		if (event.matches) {
			closeMenu();
		}
	});
})();
