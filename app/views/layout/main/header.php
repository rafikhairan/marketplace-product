<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product. | <?= $data['title']; ?></title>
  <link rel="icon" href="<?= BASEURL; ?>/images/favicon.png" type="image/png" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
</head>
<body>
  <nav class="w-full bg-white border-b-2 border-gray-200 shadow-sm">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-3 pl-3 pr-4 md:pl-0 md:pr-0">
      <div class="flex items-center">
        <a href="<?= BASEURL; ?>" class="ml-0 md:-ml-3 mr-4">
          <img src="<?= BASEURL . "/images/logo.svg"; ?>" class="h-14" alt="Logo" />
        </a>
        <ul class="hidden lg:flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
          <li>
            <a href="<?= BASEURL; ?>" class="block py-2 pl-3 pr-4 bg-[#0b7c56] rounded md:bg-transparent <?= $data['title'] === 'Home' ? 'md:text-[#0b7c56]' : 'text-gray-900'; ?> md:p-0">Home</a>
          </li>
          <li>
            <a href="<?= BASEURL . "/product/men"; ?>" class="block py-2 pl-3 pr-4 <?= $data['title'] === 'Men' || (isset($data['product']['category_name']) && $data['product']['category_name'] === 'Men') ? 'md:text-[#0b7c56]' : 'text-gray-900'; ?> rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#0b7c56] md:p-0">Men</a>
          </li>
          <li>
            <a href="<?= BASEURL . "/product/women"; ?>" class="block py-2 pl-3 pr-4 <?= $data['title'] === 'Women' || (isset($data['product']['category_name']) && $data['product']['category_name'] === 'Women') ? 'md:text-[#0b7c56]' : 'text-gray-900'; ?> rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#0b7c56] md:p-0">Women</a>
          </li>
          <li>
            <a href="<?= BASEURL . "/product/kid"; ?>" class="block py-2 pl-3 pr-4 <?= $data['title'] === 'Kid' || (isset($data['product']['category_name']) && $data['product']['category_name'] === 'Kid') ? 'md:text-[#0b7c56]' : 'text-gray-900'; ?> rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#0b7c56] md:p-0">Kid</a>
          </li>
        </ul>
      </div>
      <?php if(isset($_SESSION['user_logged'])): ?>
        <div class="flex items-center">
          <ul class="flex">
            <li class="cursor-pointer mr-7">
              <svg class="w-6 h-6 text-gray-900 hover:text-[#0b7c56]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 21">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 3.464V1.1m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175C15 15.4 15 16 14.462 16H1.538C1 16 1 15.4 1 14.807c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 8 3.464ZM4.54 16a3.48 3.48 0 0 0 6.92 0H4.54Z"/>
              </svg>
            </li>
            <li class="mr-7">
              <button class="flex items-center relative" type="button" aria-controls="cart" id="cart-show-button">
                <svg class="w-6 h-6 text-gray-900 hover:text-[#0b7c56]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1"/>
                </svg>
                <div id="total-quantity" class="absolute inline-flex items-center justify-center text-[10px] text-white bg-red-500 rounded-full -top-2 hidden"></div>
              </button>
            </li>
          </ul>
          <button
            type="button"
            class="flex mr-3 text-sm bg-gray-800 rounded-full mr-3 lg:mr-0 focus:ring-4 focus:ring-gray-300"
            id="user-menu-button"
            aria-expanded="false"
            data-dropdown-toggle="user-dropdown"
            data-dropdown-placement="bottom"
          >
            <span class="sr-only">Open user menu</span>
            <img class="w-10 h-10 rounded-full" src="<?= BASEURL; ?>/images/avatar.jpg" alt="User Photo" />
          </button>
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">
            <div class="px-4 py-3">
              <span class="block text-sm text-gray-900"><?= $_SESSION['user_logged']['name']; ?></span>
              <span class="block text-sm text-gray-400 truncate"><?= $_SESSION['user_logged']['email']; ?></span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
              <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-900 hover:bg-gray-100">Profile</a>
              </li>
              <li>
                <a href="<?= BASEURL . "/auth/logout"; ?>" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Logout</a>
              </li>
            </ul>
          </div>
          <button
            data-collapse-toggle="navbar-menu"
            type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-900 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-menu"
            aria-expanded="false"
          >
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
          </button>
        </div>
      <?php else: ?>
        <div class="flex items-center">
          <a href="<?= BASEURL . "/auth/login"; ?>" class="text-white bg-[#0b7c56] hover:bg-[#085843] focus:ring-2 focus:outline-none focus:ring-[#5dbb8a] font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0">Login</a>
          <button
            data-collapse-toggle="navbar-menu"
            type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-900 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-menu"
            aria-expanded="false"
          >
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
          </button>
        </div>
      <?php endif ?>
      <div class="flex flex-col w-full lg:hidden" id="navbar-menu">
        <ul class="flex w-full flex-col font-medium p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50">
          <li>
            <a href="<?= BASEURL; ?>" class="block py-2 pl-3 pr-4 <?= $data['title'] === 'Home' ? 'bg-[#0b7c56] text-white' : 'text-gray-900 hover:bg-gray-100'; ?> rounded">Home</a>
          </li>
          <li>
            <a href="<?= BASEURL . "/product/men"; ?>" class="block py-2 pl-3 pr-4 <?= $data['title'] === 'Men' | (isset($data['product']['category_name']) && $data['product']['category_name'] === 'Men') ? 'bg-[#0b7c56] text-white' : 'text-gray-900 hover:bg-gray-100'; ?> rounded">Men</a>
          </li>
          <li>
            <a href="<?= BASEURL . "/product/women"; ?>" class="block py-2 pl-3 pr-4 <?= $data['title'] === 'Women' | (isset($data['product']['category_name']) && $data['product']['category_name'] === 'Women') ? 'bg-[#0b7c56] text-white' : 'text-gray-900 hover:bg-gray-100'; ?> rounded">Women</a>
          </li>
          <li>
            <a href="<?= BASEURL . "/product/kid"; ?>" class="block py-2 pl-3 pr-4 <?= $data['title'] === 'Kid' | (isset($data['product']['category_name']) && $data['product']['category_name'] === 'Kid') ? 'bg-[#0b7c56] text-white' : 'text-gray-900 hover:bg-gray-100'; ?> rounded">Kid</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>