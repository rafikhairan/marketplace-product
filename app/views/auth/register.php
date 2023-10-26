<form action="<?= BASEURL . "/auth/store"; ?>" method="post">
  <?php Flasher::flash() ?>
  <div class="mb-6">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-500">Name</label>
    <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-gray-300 block w-full p-2.5" placeholder="Enter your name" required>
  </div>
  <div class="mb-6">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-500">Email</label>
    <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-gray-300 block w-full p-2.5" placeholder="Enter your email" required>
  </div>
  <div class="mb-6">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-500">Password</label>
    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-gray-300 block w-full p-2.5" placeholder="Enter your password" required>
  </div>
  <div class="flex mb-6">
    <div class="flex items-center h-5">
      <input id="terms-condition" type="checkbox" value="" class="w-4 h-4 text-[#0b7c56] border border-gray-300 rounded bg-gray-50 focus:outline-none focus:ring-[#5dbb8a]" required>
    </div>
    <label for="terms-condition" class="ml-2 text-sm text-gray-500">By registering at Product. you have agree to the <a href="" class="text-[#0b7c56] text-sm font-medium hover:underline focus:outline-[#5dbb8a]">Terms and Condition</a></label>
  </div>
  <div class="grid">
    <button type="submit" class="text-white bg-[#0b7c56] hover:bg-[#085843] focus:ring-2 focus:outline-none focus:ring-[#5dbb8a] font-medium rounded-full text-sm sm:w-auto px-5 py-2.5 text-center">Register</button>
  </div>
  <p class="text-center text-sm mt-5">Already have an account? <a href="<?= BASEURL . "/auth/login"; ?>" class="text-[#0b7c56] text-sm font-medium hover:underline focus:outline-[#5dbb8a]">Login Now</a></p>
</form>