<div>
  <p>
    Dear <?= $user->name; ?>,<br><br>

    Terimakasih telah melakukan kelengkapan dokumen pada PT. Duta Putra Land.<br>
    Mohon melakukan pembayaran booking fee sebesar Rp. <?= number_format($booking->booking_fee, 2); ?>.<br>
    Jangan lupa lakukan konfirmasi apabila telah melakukan transaksi.<br><br>

    <strong>
      Terimakasih<br>
      Management<br>
      PT. Duta Putra Land<br>
    </strong>
  </p>
</div>