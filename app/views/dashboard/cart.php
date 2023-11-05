<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
  <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
    <button type="button" class="text-lg text-gray-600 sidebar-toggle">
      <i class="ri-menu-line"></i>
    </button>
    <span class="text-gray-400 font-medium ml-4 text-sm">Admin</span>
  </div>
  <div class="p-6">
    <div class="flex justify-between items-center mb-6">
      <h3 class="font-semibold text-2xl text-gray-900">Cart</span></h3>
      <button type="button" class="text-white bg-[#0b7c56] hover:bg-[#085843] focus:ring-2 focus:outline-none focus:ring-[#5dbb8a] font-medium rounded-lg text-sm px-4 py-2 text-center" data-modal-target="create-category-modal" data-modal-toggle="create-category-modal">Create Category</button>
    </div>
    <table id="table">
      <thead>
        <tr>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data['products'] as $index => $product): ?>
          <tr>
            <td><img class="h-16 w-16 object-cover object-top rounded" src="<?= BASEURL . "/images/uploads/products/" . $product['image']; ?>" alt="<?= $product['product_name']; ?>"></td>
            <td><?= $product['product_name']; ?></td>
            <td><?= $product['quantity']; ?></td>
            <td><?= formatRupiah($product['subtotal']); ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</main>