<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
  <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
    <button type="button" class="text-lg text-gray-600 sidebar-toggle">
      <i class="ri-menu-line"></i>
    </button>
    <span class="text-gray-400 font-medium ml-4 text-sm">Admin</span>
  </div>
  <div class="p-6">
    <h3 class="font-semibold text-2xl text-gray-900 mb-6">Create Product</h3>
    <form action="<?= BASEURL . "/dashboard/storeProduct"; ?>" method="post" enctype="multipart/form-data">
      <div class="grid grid-cols-2 gap-x-6">
        <div class="mb-6">
          <label for="product-name" class="block mb-2 text-sm font-medium text-gray-500">Name</label>
          <input type="text" id="product-name" name="product_name" class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-gray-300 block w-full p-2.5" placeholder="Product name here" required>
        </div>
        <div class="mb-6">
          <label for="category" class="block mb-2 text-sm font-medium text-gray-500">Category</label>
          <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-gray-300 block w-full p-2.5" required>
            <?php foreach($data['categories'] as $category): ?>
              <option value="<?= $category['id']; ?>"><?= $category['category_name']; ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="mb-6">
          <label for="stock" class="block mb-2 text-sm font-medium text-gray-500">Stock</label>
          <input type="number" id="stock" name="stock" class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-gray-300 block w-full p-2.5" min="1" max="99" required>
        </div>
        <div class="mb-6">
          <label for="price" class="block mb-2 text-sm font-medium text-gray-500">Price</label>
          <div class="flex">
            <span class="inline-flex items-center px-3 text-sm text-gray-500 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
              Rp
            </span>
            <input type="text" id="price" name="price" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-500 focus:ring-0 focus:outline-none focus:border-gray-300 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5" required>
          </div>
        </div>
      </div>
      <div class="mb-6">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-500">Image</label>
        <label for="image" class="flex flex-col items-center justify-center border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
          <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500">PNG or JPG</p>
          </div>
          <input id="image" name="image" type="file" class="hidden" required />
        </label>
      </div>
      <div class="mb-6">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-500">Description</label>
        <textarea id="description" name="description" rows="6" class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 rounded-lg border border-gray-300 focus:ring-0 focus:outline-none focus:border-gray-300" placeholder="Product description here" required></textarea>
      </div>
      <button type="submit" class="w-full text-white bg-[#0b7c56] hover:bg-[#085843] focus:ring-2 focus:outline-none focus:ring-[#5dbb8a] font-medium rounded-lg text-sm px-4 py-2 text-center">Save</button>
    </form>
  </div>
</main>