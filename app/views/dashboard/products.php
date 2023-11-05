<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
  <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
    <button type="button" class="text-lg text-gray-600 sidebar-toggle">
      <i class="ri-menu-line"></i>
    </button>
    <span class="text-gray-400 font-medium ml-4 text-sm">Products</span>
  </div>
  <div class="p-6">
    <div class="flex justify-between items-center mb-6">
      <h3 class="font-semibold text-2xl text-gray-900"><?= ucwords($data['title']); ?> <span class="text-sm text-gray-400">(<?= $data['count']['total_product']; ?>)</span></h3>
      <button type="button" class="text-white bg-[#0b7c56] hover:bg-[#085843] focus:ring-2 focus:outline-none focus:ring-[#5dbb8a] font-medium rounded-lg text-sm px-4 py-2 text-center" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal">Add Product</button>
    </div>
    <table id="table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Stock</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data['products'] as $product): ?>
          <tr>
            <td><img class="h-16 w-16 object-cover object-top rounded" src="<?= BASEURL . "/images/uploads/products/" . $product['image']; ?>" alt="<?= $product['product_name']; ?>"></td>
            <td><?= $product['product_name']; ?></td>
            <td><?= $product['stock']; ?></td>
            <td><?= formatRupiah($product['price']); ?></td>
            <td>        
              <div class="inline-flex rounded-md shadow-sm" role="group">
                <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                  Edit
                </button>
                <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                  Delete
                </button>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</main>

<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
      <div class="px-6 py-6 lg:px-8">
        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Product</h3>
        <form class="space-y-6" action="#">
          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
          </div>
          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
          </div>
          <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
        </form>
      </div>
    </div>
  </div>
</div> 