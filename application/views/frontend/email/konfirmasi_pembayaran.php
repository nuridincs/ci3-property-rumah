<div>
  Bpk./Ibu <span style="text-transform:uppercase"><?= $user->name; ?></span><br>
  <h5>Berikut ini adalah informasi bukti Pembayaran PT. Duta Putra Land</h5>
  <div>
    Tanggal, jam: <?= date('d M Y H:i:s'); ?><br>
    Diterima dari: <?= $user->name; ?><br>
    Nominal: IDR <?= number_format($booking->booking_fee); ?><br>
    Banyak uang: <?= $booking_fee ?><br>
    Jenis Pembayaran: Booking Fee<br>
    Nomor Rekening Tujuan: 3083033386<br>
    Penerima: PT. Duta Putra Mahkota Cabang Duta Merlind
    <br><br>

    Tipe: <?= $booking->property_name ?><br>
    Blok: <?= $booking->blok ?><br>
    No. Kav: <?= $booking->no_kavling ?><br>
    Lokasi: Taman Puri Cendana<br>
  </div><br><br>

  <div>
    Semoga informasi ini dapat bermanfaat bagi Anda. Untuk informasi lebih lanjut silahkan hubungi 021-123456.<br>
    Terimakasih<br>
    Management<br>
    PT. Duta Putra Land<br>
  </div>
</div>