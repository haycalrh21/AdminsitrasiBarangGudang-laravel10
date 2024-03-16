<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        @include('components.sidebar')
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('components.navbar')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tambah Data Barang Jual</h5>
                                    <form action="{{ route('bertambahbarangjual') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="barang_masuk_id">ID Permintaan:</label>
                                            <select id="barang_masuk_id" name="barang_masuk_id" class="form-control"
                                                required>
                                                <option value="silahkan pilih">silahkan pilih</option>
                                                @foreach ($barangmasuks as $barangmasuk)
                                                    <option value="{{ $barangmasuk->id }}">
                                                        {{ $barangmasuk->id }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="namabarang">Nama Barang:</label>
                                            <select id="namabarang" name="nama_barang" class="form-control" required>
                                                @foreach ($barangmasuks as $barangmasuk)
                                                    <option value="{{ $barangmasuk->namabarang }}">
                                                        {{ $barangmasuk->namabarang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis">Jenis:</label>
                                            <select id="jenis" name="jenis" class="form-control" required>
                                                @foreach ($barangmasuks as $barangmasuk)
                                                    <option value="{{ $barangmasuk->jenis }}">
                                                        {{ $barangmasuk->jenis }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group" id="harga_jual" style="">
                                            <label for="jumlah_barang">Jumlah Barang:</label>
                                            <input type="text" name="jumlah_barang" id="jumlah_barang"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_barang">Harga Barang:</label>
                                            <select id="harga_barang" name="harga_barang" class="form-control" required>
                                                @foreach ($barangmasuks as $barangmasuk)
                                                    <option value="{{ $barangmasuk->harga_barang }}">
                                                        {{ $barangmasuk->harga_barang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group" id="harga_jual" style="">
                                            <label for="harga_jual">Harga Jual:</label>
                                            <input type="text" name="harga_jual" id="harga_jual"
                                                class="form-control">
                                        </div>


                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>


    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <script>
        document.getElementById('barang_masuk_id').addEventListener('change', function() {
            var selectedRequestId = this.value;
            var requestBarangMasukData = {!! json_encode($barangmasuks) !!};

            // Cari data permintaan yang sesuai berdasarkan id yang dipilih
            var selectedRequest = requestBarangMasukData.find(function(request) {
                return request.id == selectedRequestId;
            });

            // Set nilai form sesuai dengan data permintaan yang dipilih
            document.getElementById('namabarang').value = selectedRequest.namabarang;
            document.getElementById('jenis').value = selectedRequest.jenis;
            // document.getElementById('jumlah_barang').value = selectedRequest.jumlah_barang;
            document.getElementById('harga_barang').value = selectedRequest.harga_barang;
            // document.getElementById('lokasi').value = selectedRequest.lokasi;
            // document.getElementById('barangmasuk_id').value = selectedRequest.barangmasuk_id;
            // document.getElementById('namabarang').value = selectedRequest.namabarang;
            // document.getElementById('jenis').value = selectedRequest.jenis;

            // Set jumlah barang berdasarkan data permintaan yang dipilih
            document.getElementById('jumlah_barang').value = selectedRequest.jumlah_barang;
        });
    </script>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
