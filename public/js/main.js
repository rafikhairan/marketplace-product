const baseUrl = "http://localhost:8080/marketplace_product/public";
const scrollTopBtn = document.getElementById("scroll-top");
const cartEl = document.getElementById("cart");
const cartShowBtn = document.getElementById("cart-show-button");
const cartHideBtn = document.getElementById("cart-hide-button");
const options = {
	placement: "right",
	backdrop: true,
	bodyScrolling: false,
	edge: false,
	edgeOffset: "",
	backdropClasses: "bg-gray-900 bg-opacity-50 fixed inset-0 z-30",
	onHide: () => {
		console.log("drawer is hidden");
	},
	onShow: () => {
		renderCart();
	},
};
const cart = new Drawer(cartEl, options);

document.addEventListener("scroll", toggleScrollTopBtn);
scrollTopBtn.addEventListener("click", scrollToTop);
cartShowBtn.addEventListener("click", () => cart.show());
cartHideBtn.addEventListener("click", () => cart.hide());

function scrollToTop() {
	window.scrollTo({
		top: 0,
		behavior: "smooth",
	});
}

function toggleScrollTopBtn() {
	let scrollPosition = window.scrollY;

	if (scrollPosition > 400) {
		scrollTopBtn.classList.replace("hidden", "flex");
	} else {
		scrollTopBtn.classList.replace("flex", "hidden");
	}
}

function formatRupiah(number) {
	const rupiah = new Intl.NumberFormat("id-ID", {
		style: "currency",
		currency: "IDR",
		minimumFractionDigits: 0,
	}).format(number);

	return rupiah.split(/\s/).join("");
}

function incrementQuantity(event) {
	let quantity = event.target.previousElementSibling;

	if (parseInt(quantity.value) + 1 > 99) {
		return (quantity.value = 99);
	}

	quantity.value = parseInt(quantity.value) + 1;
}

function decrementQuantity(event) {
	let quantity = event.target.nextElementSibling;

	if (parseInt(quantity.value) - 1 < 1) {
		return (quantity.value = 1);
	}

	quantity.value = parseInt(quantity.value) - 1;
}

function handleQuantityChange(event) {
	let quantity = event.target;

	if (quantity.value < 1 || quantity.value === "") {
		quantity.value = 1;
	} else if (quantity.value > 99) {
		quantity.value = 99;
	}
}

async function renderCart() {
	try {
		const cartProductsEl = document.getElementById("cart-products");
		const response = await axios.get(`${baseUrl}/cart`);
		const cartProducts = response.data;
		let productList = "";
		console.log(cartProducts);
		cartProducts.forEach((product) => {
			productList += /* HTML */ `
				<div class="flex border-b pb-4 mb-4">
					<img src="${baseUrl}/images/uploads/products/${product.image}" alt="${product.product_name}" class="mr-4 w-20 rounded-md shadow" />
					<div class="flex flex-col justify-between">
						<h6 class="font-medium">${product.product_name}</h6>
						<div class="inline-flex h-8" role="group">
							<button type="button" class="px-3 font-medium text-gray-900 bg-white border border-gray-200 rounded-l hover:bg-gray-100 focus:ring-0" onclick="decrementQuantity(event)">
								-
							</button>
							<input type="number" class="border-gray-200 w-10 text-center focus:ring-0 focus:border-gray-200 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" name="quantity" value="${
								product.quantity
							}" onkeyup="handleQuantityChange(event)" />
							<button type="button" class="px-3 font-medium text-gray-900 bg-white border border-gray-200 rounded-r hover:bg-gray-100 focus:ring-0" onclick="incrementQuantity(event)">
								+
							</button>
						</div>
					</div>
					<div class="flex flex-col justify-between ml-auto">
						<button type="button" class="mt-1">
							<svg class="w-4 h-4 text-gray-900 ml-auto hover:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
							</svg>
						</button>
						<h5 class="font-medium text-[#0b7c56]">${formatRupiah(product.subtotal)}</h4>
					</div>
				</div>
			`;
		});

		productList += cartProductsEl.innerHTML = productList;
	} catch (error) {
		console.error(error);
	}
}
