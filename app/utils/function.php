<?php
  function truncateString($string) {
    $length = 30;

    if (strlen($string) > $length) {
      $string = substr($string, 0, $length) . '...';
    }

    return $string;
  }

  function formatRupiah($number) {
    $rupiah = number_format($number, 0, ',', '.');

    return 'Rp' . $rupiah;
  }