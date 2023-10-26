const scrollTop = document.getElementById("scroll-top");

document.addEventListener("scroll", () => {
	let scrollPosition = window.scrollY;

	if (scrollPosition > 400) {
		scrollTop.classList.replace("hidden", "flex");
	} else {
		scrollTop.classList.replace("flex", "hidden");
	}
});

scrollTop.addEventListener("click", () => {
	window.scrollTo({
		top: 0,
		behavior: "smooth",
	});
});
