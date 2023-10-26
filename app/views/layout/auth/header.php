<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product. | <?= $data['title']; ?></title>
  <link rel="icon" href="<?= BASEURL; ?>/images/favicon.png" type="image/png" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/5173488c2b.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <main class="w-screen h-screen flex">
    <div class="bg-[url('<?= BASEURL . "/images/banner-login.jpg"; ?>')] w-[55%] bg-cover"></div>
    <div class="h-full w-[45%] flex flex-col justify-center items-center">
      <div class="w-full px-20">
        <img class="mx-auto w-56 mb-6 -mt-8" src="<?= BASEURL . '/images/logo.svg'; ?>" alt="Logo">
      