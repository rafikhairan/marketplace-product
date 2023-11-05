<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
  <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
    <button type="button" class="text-lg text-gray-600 sidebar-toggle">
      <i class="ri-menu-line"></i>
    </button>
    <span class="text-gray-400 font-medium ml-4 text-sm">Admin</span>
  </div>
  <div class="p-6">
    <h3 class="font-semibold text-2xl text-gray-900 mb-6"><?= ucwords($data['title']); ?></h3>
    <div class="mb-6">
      <?php Flasher::flash() ?>
    </div>
    <table id="table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Stock</th>
          <th>Price</th>
          <th class="w-[15%]">Action</th>
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
                <a href="<?= BASEURL . "/dashboard/editProduct/" . $product['id']; ?>" class="px-3 py-2 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-l-md focus:z-10 focus:ring-0" onclick="bindingDelete(<?= $product['id']; ?>)" data-modal-target="delete-product-modal" data-modal-toggle="delete-product-modal">
                  Edit
                </a>
                <button type="button" class="px-3 py-2 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md focus:z-10 focus:ring-0" onclick="bindingDeleteProduct(<?= $product['id']; ?>)" data-modal-target="delete-product-modal" data-modal-toggle="delete-product-modal">
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

<div id="delete-product-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
    <div class="relative bg-white rounded-lg shadow">
      <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" onclick="deleteProductModal.hide()">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
        <div class="p-6 text-center">
          <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
          </svg>
          <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this product?</h3>
          <form action="" method="post" class="inline" id="delete-form">
            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-4 py-2 text-center mr-2">
                Yes, I'm sure
            </button>
          </form>
          <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-4 py-2 hover:text-gray-900 focus:z-10" onclick="deleteProductModal.hide()">No, cancel</button>
        </div>
    </div>
  </div>
</div>