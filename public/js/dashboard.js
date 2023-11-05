const sidebarToggle = document.querySelector(".sidebar-toggle");
const sidebarOverlay = document.querySelector(".sidebar-overlay");
const sidebarMenu = document.querySelector(".sidebar-menu");
const main = document.querySelector(".main");
const table = new DataTable("#table");
const createCategoryModal = new Modal(document.getElementById("create-category-modal"));
const editCategoryModal = new Modal(document.getElementById("edit-category-modal"));
const deleteCategoryModal = new Modal(document.getElementById("delete-category-modal"));
const deleteProductModal = new Modal(document.getElementById("delete-product-modal"));

tailwind.config = {
	darkMode: "false",
};

sidebarToggle.addEventListener("click", function (e) {
	e.preventDefault();
	main.classList.toggle("active");
	sidebarOverlay.classList.toggle("hidden");
	sidebarMenu.classList.toggle("-translate-x-full");
});

sidebarOverlay.addEventListener("click", function (e) {
	e.preventDefault();
	main.classList.add("active");
	sidebarOverlay.classList.add("hidden");
	sidebarMenu.classList.add("-translate-x-full");
});

document.querySelectorAll(".sidebar-dropdown-toggle").forEach(function (item) {
	item.addEventListener("click", function (e) {
		e.preventDefault();
		const parent = item.closest(".group");
		if (parent.classList.contains("selected")) {
			parent.classList.remove("selected");
		} else {
			document.querySelectorAll(".sidebar-dropdown-toggle").forEach(function (i) {
				i.closest(".group").classList.remove("selected");
			});
			parent.classList.add("selected");
		}
	});
});

function bindingDeleteCategory(categoryId) {
	const form = document.getElementById("delete-cetegory-form");

	deleteCategoryModal.toggle();
	form.action = `deleteCategory/${categoryId}`;
}

function bindingEditCategory(categoryId, categoryName) {
	const editForm = document.getElementById("edit-category-form");
	const editCategory = document.getElementById("edit-category");

	editCategoryModal.toggle();
	editCategory.value = categoryName;
	editForm.action = `editCategory/${categoryId}`;
}

function bindingDeleteProduct(productId) {
	const form = document.getElementById("delete-form");

	deleteProductModal.toggle();
	form.action = `http://localhost:8080/marketplace_product/public/dashboard/deleteProduct/${productId}`;
}
