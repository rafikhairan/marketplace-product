const showPassword = document.getElementById("show-password");
const inputPassword = document.getElementById("password");

showPassword.addEventListener("click", () => {
	if (inputPassword.type === "password") {
		inputPassword.type = "text";
		showPassword.innerHTML = /* HTML */ `<svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
			<g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
				<path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
				<path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
			</g>
		</svg>`;
	} else {
		inputPassword.type = "password";
		showPassword.innerHTML = /* HTML */ `<svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
			<path
				stroke="currentColor"
				stroke-linecap="round"
				stroke-linejoin="round"
				stroke-width="2"
				d="M1.933 10.909A4.357 4.357 0 0 1 1 9c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 19 9c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M2 17 18 1m-5 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
			/>
		</svg>`;
	}
});
