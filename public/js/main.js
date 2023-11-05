const baseUrl = "http://localhost:8080/marketplace_product/public";
const scrollTopBtn = document.getElementById("scroll-top");
const cartEl = document.getElementById("cart");
const cartShowBtn = document.getElementById("cart-show-button");
const cartHideBtn = document.getElementById("cart-hide-button");
const addCartBtn = document.getElementById("add-cart");
const options = {
	placement: "right",
	backdrop: true,
	bodyScrolling: false,
	edge: false,
	edgeOffset: "",
	backdropClasses: "bg-gray-900 bg-opacity-50 fixed inset-0 z-30",
	onHide: () => {
		if (cartEl.dataset.cartId !== undefined) {
			updateCart();
		}
	},
};
const cart = new Drawer(cartEl, options);

renderCart();

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
	let quantity = event.previousElementSibling;

	if (parseInt(quantity.value) + 1 > 99) {
		return (quantity.value = 99);
	}

	quantity.value = parseInt(quantity.value) + 1;
}

function decrementQuantity(event) {
	let quantity = event.nextElementSibling;

	if (parseInt(quantity.value) - 1 < 1) {
		return (quantity.value = 1);
	}

	quantity.value = parseInt(quantity.value) - 1;
}

function handleQuantityChange(event) {
	let quantity = event;

	if (quantity.value < 1 || quantity.value === "") {
		quantity.value = 1;
	} else if (quantity.value > 99) {
		quantity.value = 99;
	}
}

async function storeProductToCart() {
	try {
		const product = document.getElementById("product");
		const productId = product.dataset.productId;
		const productPrice = product.dataset.price;
		const quantity = document.querySelector("input[name='quantity']").value;
		const data = {
			product_id: parseInt(productId),
			quantity: parseInt(quantity),
			subtotal: parseInt(quantity * productPrice),
		};

		const response = await axios.post(`${baseUrl}/cart/store`, data);
		console.log(response.data);
		renderCart();
		cart.show();
	} catch (error) {
		console.log(error);
	}
}

function updateCart() {
	try {
		const productIds = document.querySelectorAll("input[name='product-id']");
		const productQuantities = document.querySelectorAll("input[name='quantity-cart']");
		const productPrices = document.querySelectorAll("input[name='price']");
		const products = [];

		productIds.forEach((product, index) => {
			const quantity = productQuantities[index].value;
			const price = productPrices[index].value;

			products.push({
				product_id: product.value,
				quantity,
				subtotal: parseInt(quantity * price),
			});
		});

		const data = {
			products,
		};

		axios.post(`${baseUrl}/cart/update`, data);
		renderCart();
	} catch (error) {
		console.log(error);
	}
}

function deleteProductFromCart(event) {
	try {
		const productId = event.parentElement.nextElementSibling.querySelector("input[name='product-id']").value;
		const data = {
			cart_id: parseInt(cartEl.dataset.cartId),
			product_id: parseInt(productId),
		};

		axios.post(`${baseUrl}/cart/deleteProduct`, data);
		renderCart();
	} catch (error) {
		console.log(error);
	}
}

async function renderCart() {
	try {
		const cartProductsEl = document.getElementById("cart-products");
		const totalQuantity = document.getElementById("total-quantity");
		const response = await axios.get(`${baseUrl}/cart`);
		const { products, quantity } = response.data;
		let productList = "";

		products.forEach((product) => {
			productList += /* HTML */ `
				<div class="flex border-b pb-4 mb-4">
					<img src="${baseUrl}/images/uploads/products/${product.image}" alt="${product.product_name}" class="mr-4 w-20 aspect-square object-top object-cover rounded-md shadow" />
					<div class="flex flex-col justify-between w-full">
						<div class="flex justify-between items-start">
							<h6 class="font-medium w-5/6">${product.product_name}</h6>
							<button type="button" class="mt-1 ml-auto" onclick="deleteProductFromCart(this)">
								<svg class="w-4 h-4 text-gray-900 ml-auto hover:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
								</svg>
							</button>
						</div>
						<div class="flex justify-between">
							<div class="inline-flex h-8" role="group">
								<button type="button" class="px-3 font-medium text-gray-900 bg-white border border-gray-200 rounded-l hover:bg-gray-100 focus:ring-0" onclick="decrementQuantity(this)">
									-
								</button>
								<input type="number" class="border-gray-200 w-11 text-center text-sm focus:ring-0 focus:border-gray-200 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" name="quantity-cart" value="${
									product.quantity
								}" onkeyup="handleQuantityChange(this)" />
								<button type="button" class="px-3 font-medium text-gray-900 bg-white border border-gray-200 rounded-r hover:bg-gray-100 focus:ring-0" onclick="incrementQuantity(this)">
									+
								</button>
							</div>
							<input type="hidden" name="product-id" value="${product.product_id}">
							<input type="hidden" name="price" value="${product.price}">
							<h5 class="font-medium text-[#0b7c56] ml-auto">${formatRupiah(product.price)}</h4>
						</div>
					</div>
				</div>
			`;
		});

		if (quantity.total > 99) {
			totalQuantity.classList.add("py-[1px]", "px-[4px]", "-right-3");
		} else {
			totalQuantity.classList.add("w-4", "h-4", "-right-2");
		}

		if (quantity.total >= 1) {
			totalQuantity.classList.remove("hidden");

			cartProductsEl.innerHTML = /* HTML */ `
				<form action="${baseUrl / cart}" method="post">
					<div class="h-[35rem] overflow-auto">${productList}</div>
					<div class="grid mt-6">
						<button type="button" class="bg-[#0b7c56] hover:bg-[#085843] text-white font-medium rounded-lg py-2 focus:ring-[#5dbb8a] focus:ring-2 focus:outline-none">Checkout</button>
					</div>
				</form>
			`;
		} else {
			totalQuantity.classList.add("hidden");
		}

		totalQuantity.textContent = quantity.total > 99 ? "99+" : quantity.total;
	} catch (error) {
		console.log(error);
	}
}
