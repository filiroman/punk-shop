$(document).ready(function() {
	$(".cnt[data-update]").each(function(i, el) {
		$(el).load("cnt.php", "id=" + $(el).attr("data-id") + "&inc");
	});
	$(".cnt:not([data-update])").each(function(i, el) {
		$(el).load("cnt.php", "id=" + $(el).attr("data-id"));
	});
	window.setInterval(function() {
		$(".cnt").each(function(i, el) {
			$(el).load("/cnt.php", "id=" + $(el).attr("data-id"));
		})
	}, 20000)
});