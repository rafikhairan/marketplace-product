  <div id="drawer-right" class="fixed top-0 right-0 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 z-50" tabindex="-1" aria-labelledby="drawer-right">
    <h5 id="drawer-right" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500">Cart</h5>
    <button
      type="button"
      data-drawer-hide="drawer-right"
      aria-controls="drawer-right"
      class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 right-2.5 inline-flex items-center justify-center"
    >
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>
      <span class="sr-only">Close menu</span>
    </button>
  </div>

  <button type="button" class="rounded-full fixed bottom-10 right-10 h-12 w-12 transition duration-200 hidden bg-[#0b7c56] hover:bg-[#085843]" id="scroll-top">
    <svg class="w-5 h-5 text-white m-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7 7.674 1.3a.91.91 0 0 0-1.348 0L1 7"/>
    </svg>
  </button>

  <footer class="bg-gray-100 mt-20">
    <div class="mx-auto w-full max-w-screen-xl py-6 lg:py-8">
      <div class="md:flex md:justify-between py-6">
        <div class="mb-6 md:mb-0 -ml-3">
          <a href="<?= BASEURL; ?>">
            <img src="<?= BASEURL . "/images/logo.svg"; ?>" class="h-14 mr-3" alt="Logo" />
          </a>
        </div>
        <div class="w-1/3 grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
          <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Company</h2>
            <ul class="text-gray-500">
              <li class="mb-4">
                <a href="#" class="hover:text-gray-900">About Us</a>
              </li>
              <li class="mb-4">
                <a href="#" class="hover:text-gray-900">Contact</a>
              </li>
              <li>
                <a href="#" class="hover:text-gray-900">Affiliates</a>
              </li>
            </ul>
          </div>
          <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Help</h2>
            <ul class="text-gray-500">
              <li class="mb-4">
                <a href="#" class="hover:text-gray-900">FAQ</a>
              </li>
              <li class="mb-4">
                <a href="#" class="hover:text-gray-900">Return Policy</a>
              </li>
              <li>
                <a href="#" class="hover:text-gray-900">Privacy Policy</a>
              </li>
            </ul>
          </div>
          <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Social Media</h2>
            <ul class="text-gray-500">
              <li class="mb-4">
                <a href="#" class="text-gray-500 flex items-center hover:text-gray-900">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                    <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd" />
                  </svg>
                  <span class="ml-2">Facebook</span>
                </a>
              </li>
              <li class="mb-4">
                <a href="#" class="text-gray-500 flex items-center hover:text-gray-900">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path
                      fill="currentColor"
                      d="M12.186 8.672 18.743.947h-2.927l-5.005 5.9-4.44-5.9H0l7.434 9.876-6.986 8.23h2.927l5.434-6.4 4.82 6.4H20L12.186 8.672Zm-2.267 2.671L8.544 9.515 3.2 2.42h2.2l4.312 5.719 1.375 1.828 5.731 7.613h-2.2l-4.699-6.237Z"
                    />
                  </svg>
                  <span class="ml-2">Twitter</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
      <div class="sm:flex sm:items-center">
        <span class="text-sm text-gray-500 sm:text-center">© 2023 <a href="#" class="hover:underline">Product</a>. All Rights Reserved.</span>
      </div>
    </div>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
  <script src="<?= BASEURL . "/js/main.js"; ?>"></script>
</body>
</html>