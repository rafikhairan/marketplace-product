<main class="max-w-screen-xl mx-auto my-5">
  <nav class="flex my-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
      <li class="inline-flex items-center">
        <a href="<?= BASEURL; ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-[#0b7c56]">
          <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"
            />
          </svg>
          Home
        </a>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
          </svg>
          <a href="<?= BASEURL; ?>/product/<?= strtolower($data['product']['category_name']); ?>" class="ml-1 text-sm font-medium text-gray-700 hover:text-[#0b7c56] md:ml-2"><?= $data['product']['category_name']; ?></a>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
          </svg>
          <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2"><?= $data['product']['product_name']; ?></span>
        </div>
      </li>
    </ol>
  </nav>
  
  <div class="grid grid-cols-5 p-0 gap-2">
    <div class="col-span-2 flex justify-center">
      <img class="w-[80%] rounded-lg object-center" src="<?= BASEURL; ?>/images/uploads/<?= $data['product']['image']; ?>" alt="<?= $data['product']['product_name']; ?>" />
    </div>
    <div class="col-span-3 my-8">
      <h1 class="font-semibold text-3xl text-gray-900"><?= $data['product']['product_name']; ?></h1>
      <p class="text-xs text-gray-500 mt-1">H&M Premium Selection</p>
      <h5 class="my-6"><?= $data['product']['description']; ?></h5>
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
      <a href="" class="bg-[#0b7c56] text-white rounded-md py-3 px-4 mt-10 inline-block">Buy this item</a>
    </div>
  </div>
</main>