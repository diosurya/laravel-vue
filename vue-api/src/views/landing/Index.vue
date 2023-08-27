<template>
    <div class="my-5">
        <nav class="navbar-expand-lg navbar-dark bg-danger" style="padding-top: 0.5rem; padding-bottom: 0.5rem;">
            <div class="container-fluid px-5">
                <div class="row">
                    <div class="col-md-4 lh-60px">
                        <router-link :to="{name: 'customer.index'}" style="font-size: 24px;" class="navbar-brand">J N G</router-link>
                    </div>
                    <div class="col-md-4 text-center">
                        <h4 class="text-white m-0 lh-60px">
                            #KamoesajanJRG
                        </h4>
                    </div>
                    <div class="col-md-4 text-right lh-60px">
                        <ul id="custom" class="d-flex float-end mb-0">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Tentang Kami</a>
                                <ul style="width: 250px;">
                                    <li><a href="#">Sevice one</a></li>
                                    <li><a href="#">Sevice two</a></li>

                                    <li><a href="#">Sevice three</a></li>
                                    <li><a href="#">Sevice four</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Keranjang</a>
                            </li>
                            <li>
                                <a href="#">Akun Saya</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <section>
        <div class="container-fluid px-5">
            <div class="mb-5">
                <div class="row justify-content-md-center">
                    <div class="col-md-4">
                        <div class="bg-danger text-center p-4 text-white">
                            <h6 class="m-0">KETENTUAN DAN TATA CARA PEMBATALAN PESANAN</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <div class="row">
                    <div class="col-md-3">
                        <h5 class="text-danger">
                            2 HARI SEBELUM KEBERANGKATAN
                        </h5>
                        <p>
                            Pembatalan <strong>2 (dua)</strong> hari sebelum waktu keberangkatan akan menerima REFUND/PENGAMBILAN sebesar <strong>95%</strong> dari total harga tiket yang telah terbayar.
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h5 class="text-danger">
                            1 HARI SEBELUM KEBERANGKATAN
                        </h5>
                        <p>
                            Pembatalan <strong>1 (dua)</strong> hari sebelum waktu keberangkatan akan menerima REFUND/PENGAMBILAN sebesar <strong>75%</strong> dari total harga tiket yang telah terbayar.
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h5 class="text-danger">
                            6 JAM SEBELUM KEBERANGKATAN
                        </h5>
                        <p>
                            Pembatalan <strong>6 (enam)</strong> jam sebelum waktu keberangkatan akan menerima REFUND/PENGAMBILAN sebesar <strong>50%</strong> dari total harga tiket yang telah terbayar.
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h5 class="text-danger">
                            KURANG DARI 6 SEBELUM KEBERANGKATAN
                        </h5>
                        <p>
                            Pembatalan <strong>6 (enam)</strong> jam sebelum waktu keberangkatan <strong>TIDAK MENDAPATKAN REFUND/PENGEMBALIAN DANA</strong>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="my-5">
                <div class="row justify-content-md-center">
                    <div class="col-md-4">
                        <div class="bg-danger text-center p-4 text-white">
                            <h6 class="m-0">PROSES PENGEMBALIAN DANA</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <ul>
                    <li>
                        Estimasi Proses Pengembalian dana Refund adalah <strong>3 hari kerja Efektif(Senin - Sabtu)</strong>
                    </li>
                    <li>
                        Proses Pembatalan/Refund Dapat Dilakukan Melalui Aplikasi fitur <strong>Cancel Order</strong> atau Melakukan <strong>Request Melalui Live Chat</strong>
                    </li>
                    <li>
                        Proses Re-schedule dapat dilakukan dengan cara melalukan Request melalui <strong>Fitur Live Chat</strong>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<style>

p{
    color:#979797 !important;
}
li {
    color:#979797;
}
ul#custom {
    position: relative;
}
ul#custom > li {
    margin-right: 28px;
    list-style: none;
    position: relative;
}
ul#custom > li > a {
    text-decoration: none;
    font-weight: bold;
    color: #fff;
    font-size: 16px;
}
.lh-60px{
    line-height: 60px;
}

ul#custom ul {
    background-color: #dc3545;;
    list-style: none;
    position: absolute;
    left: -9999px;
}
ul#custom li:hover ul {
    left: 0;
}
ul#custom li:hover a {
    text-decoration: underline;
    color:#fff;
}
ul#custom li:hover ul a { 
    text-decoration: none;
}
ul#custom li:hover ul li a:hover {

}

</style>