<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
  <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
    <button type="button" class="text-lg text-gray-600 sidebar-toggle">
      <i class="ri-menu-line"></i>
    </button>
    <span class="text-gray-400 font-medium ml-4 text-sm">Admin</span>
  </div>
  <div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
      <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-6">
          <div>
            <div class="text-2xl font-semibold mb-1">10</div>
            <div class="text-sm font-medium text-gray-400">Active orders</div>
          </div>
        </div>
        <div class="flex items-center">
          <div class="w-full bg-gray-100 rounded-full h-4">
            <div class="h-full bg-blue-500 rounded-full p-1" style="width: 60%">
              <div class="w-2 h-2 rounded-full bg-white ml-auto"></div>
            </div>
          </div>
          <span class="text-sm font-medium text-gray-600 ml-4">60%</span>
        </div>
      </div>
      <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-4">
          <div>
            <div class="flex items-center mb-1">
              <div class="text-2xl font-semibold">324</div>
              <div class="p-1 rounded bg-emerald-500/10 text-emerald-500 text-[12px] font-semibold leading-none ml-2">+30%</div>
            </div>
            <div class="text-sm font-medium text-gray-400">Visitors</div>
          </div>
        </div>
        <div class="flex items-center">
          <img src="https://picsum.photos/32?item=1" alt="" class="w-8 h-8 rounded-full object-cover block" />
          <img src="https://picsum.photos/32?item=2" alt="" class="w-8 h-8 rounded-full object-cover block -ml-3" />
          <img src="https://picsum.photos/32?item=3" alt="" class="w-8 h-8 rounded-full object-cover block -ml-3" />
          <img src="https://picsum.photos/32?item=4" alt="" class="w-8 h-8 rounded-full object-cover block -ml-3" />
          <img src="https://picsum.photos/32?item=5" alt="" class="w-8 h-8 rounded-full object-cover block -ml-3" />
        </div>
      </div>
      <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-6">
          <div>
            <div class="text-2xl font-semibold mb-1"><?= formatRupiah(1250000); ?></div>
            <div class="text-sm font-medium text-gray-400">Active orders</div>
          </div>
        </div>
        <a href="" class="text-blue-500 font-medium text-sm hover:text-blue-600">View details</a>
      </div>
    </div>
    <table id="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Alamat</th>
          <th class="w-[10%]">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data['carts'] as $index => $cart): ?>
          <tr>
            <td><?= $index + 1; ?></td>
            <td><?= $cart['name'] ?? '-'; ?></td>
            <td><?= $cart['no_telpon'] ?? '-'; ?></td>
            <td><?= $cart['alamat'] ?? '-'; ?></td>
            <td>
              <a href="<?= BASEURL . "/dashboard/cart/" . $cart['user_id']; ?>" class="px-3 py-2 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-md focus:z-10 focus:ring-0" onclick="bindingDelete(<?= $product['id']; ?>)" data-modal-target="delete-product-modal" data-modal-toggle="delete-product-modal">
                Detail
              </a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</main>