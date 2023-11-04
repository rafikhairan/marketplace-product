<main class="max-w-screen-xl mx-auto">
	<h3 class="font-semibold text-2xl text-gray-900 my-8"><?= ucwords($data['title']); ?> <span class="text-sm text-gray-400">(<?= $data['count']['total_product']; ?>)</span></h3>

  <div class="grid grid-cols-4 gap-4">
    <?php foreach($data['products'] as $product): ?>
      <div class="relative rounded-xl shadow transition hover:-translate-y-2 hover:shadow-lg">
				<img class="aspect-square object-top object-cover rounded-2xl p-2" src="<?= BASEURL . "/images/uploads/products/" . $product['image']; ?>" alt="<?= $product['product_name']; ?>" />
				<div class="absolute bottom-0 p-4 w-full">
					<div class="bg-white py-2 px-3 rounded-lg">
						<h5><?= truncateString($product['product_name']); ?></h5>
						<div class="flex items-center">
							<svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
								<path
									d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
								/>
							</svg>
							<p class="ml-2 text-sm font-bold text-gray-900">4.95</p>
							<span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full"></span>
							<a href="#" class="text-sm font-medium text-gray-900 underline hover:no-underline">73 reviews</a>
						</div>
						<h5><?= formatRupiah($product['price']); ?></h5>
					</div>
				</div>
				<a href="<?= BASEURL . "/product/detail/" . $product['id'] ; ?>" class="absolute h-full w-full top-0 left-0"></a>
			</div>
    <?php endforeach ?>
  </div>

	<hr class="mb-8 mt-10" />

	<nav class="flex justify-center" aria-label="Page navigation">
		<?php if($data['current_page'] > 1) : ?>
			<a href="<?= BASEURL . "/product/" . strtolower($data['title']) . "/" . $data['current_page'] - 1; ?>" class="flex items-center text-gray-500 font-semibold hover:text-[#0b7c56] <?= $data['current_page'] <= 1 ? "pointer-events-none" : ""; ?> mr-10">
				<svg class="w-3 h-3 mr-1 mt-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
					<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
				</svg>
				Previous
			</a>
		<?php endif ?>
		<ul class="inline-flex space-x-6 text-sm">
			<?php for($page = 1; $page <= $data['total_page']; $page++) : ?>
				<li>
					<a href="<?= BASEURL . "/product/" . strtolower($data['title']) . "/" . $page; ?>" class="flex items-center justify-center px-2 <?= $data['current_page'] === $page ? "pb-1 border-b-[3px] border-[#0b7c56] text-[#0b7c56]" : "text-gray-500 hover:text-[#0b7c56] h-7"; ?> font-semibold"><?= $page; ?></a>
				</li>
			<?php endfor ?>
		</ul>
		<?php if($data['current_page'] < $data['total_page']) : ?>
			<a href="<?= BASEURL . "/product/" . strtolower($data['title']) . "/" . $data['current_page'] + 1; ?>" class="flex items-center text-gray-500 font-semibold hover:text-[#0b7c56] <?= $data['current_page'] >= $data['total_page'] ? "pointer-events-none" : ""; ?> ml-10">
				Next
				<svg class="w-3 h-3 ml-1 mt-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
					<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1" />
				</svg>
			</a>
		<?php endif ?>
	</nav>
</main>