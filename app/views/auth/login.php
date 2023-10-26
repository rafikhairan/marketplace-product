<?php Flasher::flash() ?>
<h1 class="text-2xl text-gray-900 font-semibold mb-6">Hi, Welcome Back!</h1>
<form action="<?= BASEURL . "/auth/check"; ?>" method="post">
  <div class="mb-6">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-500">Email</label>
    <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-gray-300 block w-full p-2.5" placeholder="Enter your email" required>
  </div>
  <div class="mb-6">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-500">Password</label>
    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-gray-300 block w-full p-2.5" placeholder="Enter your password" required>
  </div>
  <div class="flex justify-between mb-6">
    <div class="flex">
      <div class="flex items-center h-5">
        <input id="remember" name="remember" type="checkbox" class="w-4 h-4 text-[#0b7c56] border border-gray-300 rounded bg-gray-50 focus:outline-none focus:ring-[#5dbb8a]">
      </div>
      <label for="remember" class="ml-2 text-sm font-medium text-gray-500">Remember me</label>
    </div>
    <a href="" class="text-[#0b7c56] text-sm font-medium hover:underline focus:outline-[#5dbb8a]">Forgot password</a>
  </div>
  <div class="grid">
    <button type="submit" class="text-white bg-[#0b7c56] hover:bg-[#085843] focus:ring-2 focus:outline-none focus:ring-[#5dbb8a] font-medium rounded-full text-sm sm:w-auto px-5 py-2.5 text-center">Login</button>
  </div>
  <p class="text-center text-sm mt-5">Don't have an account? <a href="<?= BASEURL . "/auth/register"; ?>" class="text-[#0b7c56] text-sm font-medium hover:underline focus:outline-[#5dbb8a]">Register Now</a></p>
</form>