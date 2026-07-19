(function () {
	var btn = document.querySelector('.theme-toggle');
	function apply(t) {
		document.documentElement.setAttribute('data-theme', t);
		if (btn) btn.textContent = t === 'light' ? '\u263E' : '\u2600';
	}
	var saved = null;
	try { saved = localStorage.getItem('lidikart-theme'); } catch (e) {}
	apply(saved === 'light' ? 'light' : 'dark');
	if (btn) btn.addEventListener('click', function () {
		var next = document.documentElement.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
		apply(next);
		try { localStorage.setItem('lidikart-theme', next); } catch (e) {}
	});
})();
