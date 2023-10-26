<main class="max-w-screen-xl mx-auto">
	<h3 class="font-semibold text-2xl text-gray-900 my-8"><?= ucwords($data['title']); ?> <span class="text-sm text-gray-400">(<?= $data['count']['total_product']; ?>)</span></h3>

	<section class="relative w-full rounded-xl bg-[#dcc2b1] flex items-center overflow-hidden mt-10 mb-5">
		<div class="p-6 text-white">
			<p class="flex items-center font-medium">
				<svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
					<path
						stroke="currentColor"
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						d="m7 13 6-6m-5-.5h.01m2.98 7H11m1.007-11.313a2.75 2.75 0 0 0 2.1.87 2.745 2.745 0 0 1 2.837 2.837 2.749 2.749 0 0 0 .87 2.1 2.747 2.747 0 0 1 0 4.014 2.748 2.748 0 0 0-.87 2.1 2.746 2.746 0 0 1-2.837 2.837 2.75 2.75 0 0 0-2.1.87 2.748 2.748 0 0 1-4.014 0 2.75 2.75 0 0 0-2.1-.87 2.744 2.744 0 0 1-2.837-2.837 2.749 2.749 0 0 0-.87-2.1 2.747 2.747 0 0 1 0-4.014 2.75 2.75 0 0 0 .87-2.1 2.745 2.745 0 0 1 2.838-2.837 2.749 2.749 0 0 0 2.1-.87 2.748 2.748 0 0 1 4.013 0Z"
					/>
				</svg>
				Promo
			</p>
			<h2 class="font-semibold text-4xl my-3">
				Get 25% Cash Back <br />
				On $200
			</h2>
			<p class="font-medium">
				Shoping is a bit of a relaxing hobby for me, which is <br />
				sometimes troubling for the bank balance.
			</p>
		</div>
		<img class="absolute h-80 -right-4 -bottom-16" src="<?= BASEURL; ?>/images/banner-promo.png" alt="Banner Promo" />
	</section>

  <div class="grid grid-cols-4 gap-4">
    <?php foreach($data['products'] as $product): ?>
      <div class="relative rounded-xl shadow transition hover:-translate-y-2 hover:shadow-lg">
				<img class="h-full w-full object-cover rounded-2xl p-2" src="<?= BASEURL; ?>/images/uploads/products/<?= $product['image']; ?>" alt="<?= $product['product_name']; ?>" />
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
				<a href="<?= BASEURL; ?>/product/detail/<?= $product['id']; ?>" class="absolute h-full w-full top-0 left-0"></a>
			</div>
    <?php endforeach ?>
  </div>

	<hr class="my-8" />

	<nav class="flex justify-center" aria-label="Page navigation">
		<ul class="inline-flex space-x-4 text-sm">
			<li>
				<a href="#" class="flex items-center justify-center px-2 pb-1 text-gray-500 border-b-[3px] border-[#0b7c56]">1</a>
			</li>
			<li>
				<a href="#" class="flex items-center justify-center px-2 pb-1 text-gray-500">2</a>
			</li>
			<li>
				<a href="#" class="flex items-center justify-center px-2 pb-1 text-gray-500">3</a>
			</li>
		</ul>
	</nav>
</main>