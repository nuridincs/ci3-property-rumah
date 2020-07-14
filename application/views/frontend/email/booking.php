<div>
  <p>
    Dear <?= $user->name; ?>,<br><br>

    Terimakasih telah melakukan kelengkapan dokumen pada PT. Duta Putra Land.<br>
    Mohon melakukan pembayaran booking fee sebesar <strong>Rp. <?= number_format($booking->booking_fee); ?> ke BCA A/N PT. Duta Putra Land Nomor Rekening: 8989898989 .</strong><br>
    Jangan lupa lakukan konfirmasi apabila telah melakukan transaksi.<br><br>

    <strong>
      Terimakasih<br>
      Management<br>
      PT. Duta Putra Land<br>
    </strong>
  </p>
</div>