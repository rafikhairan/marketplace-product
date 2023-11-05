<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Product. | Dashboard</title>
  <link rel="icon" href="<?= BASEURL; ?>/images/favicon.png" type="image/png" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= BASEURL . "/css/dashboard.css"; ?>" />
</head>
<body>
  <div class="fixed left-0 top-0 w-64 h-full bg-gray-100 p-4 z-40 sidebar-menu transition-transform border-r">
    <a href="<?= BASEURL . "/dashboard"; ?>" class="pb-4 border-b border-b-gray-800">
      <img src="<?= BASEURL . "/images/logo.svg"; ?>" class="h-14" alt="Logo" />
    </a>
    <ul class="mt-4">
      <li class="mb-1 group <?= $data['title'] === 'Dashboard' ? 'active' : ''; ?>">
        <a href="<?= BASEURL . "/dashboard"; ?>" class="flex items-center py-3 px-4 text-gray-500 hover:bg-[#0b7c56] hover:text-gray-100 rounded-md group-[.active]:bg-[#0b7c56] group-[.active]:text-white group-[.selected]:bg-[#085843] group-[.selected]:text-gray-100">
          <svg class="w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9"/>
          </svg>
          <span class="text-sm">Dashboard</span>
        </a>
      </li>
      <li class="mb-1 group <?= $data['title'] === 'Products' ? 'active' : ''; ?>">
        <a
          href="#"
          class="flex items-center py-2 px-4 text-gray-500 hover:bg-[#0b7c56] hover:text-gray-100 rounded-md group-[.active]:bg-[#0b7c56] group-[.active]:text-white group-[.selected]:bg-[#085843] group-[.selected]:text-gray-100 sidebar-dropdown-toggle"
        >
          <svg class="w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
            <path stroke="currentColor" stroke-linejoin="round" stroke-width="1.5" d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z"/>
          </svg>
          <span class="text-sm">Products</span>
          <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
        </a>
        <ul class="pl-7 mt-2 hidden group-[.selected]:block">
          <li class="mb-4">
            <a href="<?= BASEURL . "/dashboard/products/men"; ?>" class="text-gray-500 text-sm flex items-center hover:text-[#0b7c56] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Men</a>
          </li>
          <li class="mb-4">
            <a href="<?= BASEURL . "/dashboard/products/women"; ?>" class="text-gray-500 text-sm flex items-center hover:text-[#0b7c56] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Women</a>
          </li>
          <li class="mb-4">
            <a href="<?= BASEURL . "/dashboard/products/kid"; ?>" class="text-gray-500 text-sm flex items-center hover:text-[#0b7c56] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Kid</a>
          </li>
          <li class="mb-4">
            <a href="<?= BASEURL . "/dashboard/createProduct"; ?>" class="text-gray-500 text-sm flex items-center hover:text-[#0b7c56] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Create Product</a>
          </li>
        </ul>
      </li>
      <li class="mb-1 group <?= $data['title'] === 'Categories' ? 'active' : ''; ?>">
        <a href="<?= BASEURL . "/dashboard/categories"; ?>" class="flex items-center py-3 px-4 text-gray-500 hover:bg-[#0b7c56] hover:text-gray-100 rounded-md group-[.active]:bg-[#0b7c56] group-[.active]:text-white group-[.selected]:bg-[#085843] group-[.selected]:text-gray-100">
          <svg class="w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M6 1h10M6 5h10M6 9h10M1.49 1h.01m-.01 4h.01m-.01 4h.01"/>
          </svg>
          <span class="text-sm">Categories</span>
        </a>
      </li>
      <li class="mb-1">
        <a href="<?= BASEURL . "/auth/logout"; ?>" class="py-3 px-4 text-sm text-red-600 flex items-center">
          <svg class="w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"/>
          </svg>
          Logout
        </a>
      </li>
    </ul>
  </div>
  <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>