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
                                    <h5 class="card-title">Tambah Data Barang Masuk</h5>
                                    <form action="{{ route('bertambahbarangmasuk') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="request_barang_masuk_id">ID Permintaan:</label>
                                            <select id="request_barang_masuk_id" name="request_barang_masuk_id"
                                                class="form-control" required>
                                                <option value="silahkan pilih">silahkan pilih</option>
                                                @foreach ($sps as $product)
                                                    <option value="{{ $product->id }}">
                                                        {{ $product->id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="supplier_id">Supplier id:</label>
                                            <select id="supplier_id" name="supplier_id" class="form-control" required>
                                                <option value="silahkan pilih">silahkan pilih</option>
                                                @foreach ($sps as $product)
                                                    <option value="{{ $product->supplier_id }}">
                                                        {{ $product->supplier_id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_supplier">Nama Supplier:</label>
                                            <select id="nama_supplier" name="nama_supplier" class="form-control"
                                                required>
                                                @foreach ($sps as $product)
                                                    <option value="{{ $product->nama_supplier }}">
                                                        {{ $product->nama_supplier }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_pic">Nama PIC:</label>
                                            <select id="nama_pic" name="nama_pic" class="form-control" required>
                                                @foreach ($sps as $product)
                                                    <option value="{{ $product->nama_pic }}">
                                                        {{ $product->nama_pic }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">No Handphone:</label>
                                            <select id="no_hp" name="no_hp" class="form-control" required>
                                                @foreach ($sps as $product)
                                                    <option value="{{ $product->no_hp }}">{{ $product->no_hp }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="lokasi">Lokasi:</label>
                                            <select id="lokasi" name="lokasi" class="form-control" required>
                                                @foreach ($sps as $product)
                                                    <option value="{{ $product->lokasi }}">{{ $product->lokasi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_id">product_id:</label>
                                            <select id="product_id" name="product_id" class="form-control" required>
                                                @foreach ($sps as $product)
                                                    <option value="{{ $product->product_id }}">
                                                        {{ $product->product_id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="namabarang">namabarang:</label>
                                            <select id="namabarang" name="namabarang" class="form-control" required>
                                                @foreach ($sps as $product)
                                                    <option value="{{ $product->namabarang }}">
                                                        {{ $product->namabarang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis">jenis:</label>
                                            <select id="jenis" name="jenis" class="form-control" required>
                                                @foreach ($sps as $product)
                                                    <option value="{{ $product->jenis }}">{{ $product->jenis }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group" id="jumlah_barang_container" style="">
                                            <label for="jumlah_barang">Jumlah Barang:</label>
                                            <input type="text" name="jumlah_barang" id="jumlah_barang"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_barang">Harga Barang:</label>
                                            <input type="text" name="harga_barang" id="harga_barang">
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
        document.getElementById('request_barang_masuk_id').addEventListener('change', function() {
            var selectedRequestId = this.value;
            var requestBarangMasukData = {!! json_encode($sps) !!};

            // Cari data permintaan yang sesuai berdasarkan id yang dipilih
            var selectedRequest = requestBarangMasukData.find(function(request) {
                return request.id == selectedRequestId;
            });

            // Set nilai form sesuai dengan data permintaan yang dipilih
            document.getElementById('supplier_id').value = selectedRequest.supplier_id;
            document.getElementById('nama_supplier').value = selectedRequest.nama_supplier;
            document.getElementById('nama_pic').value = selectedRequest.nama_pic;
            document.getElementById('no_hp').value = selectedRequest.no_hp;
            document.getElementById('lokasi').value = selectedRequest.lokasi;
            document.getElementById('product_id').value = selectedRequest.product_id;
            document.getElementById('namabarang').value = selectedRequest.namabarang;
            document.getElementById('jenis').value = selectedRequest.jenis;

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
