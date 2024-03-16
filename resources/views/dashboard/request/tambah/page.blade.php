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
                                    <h5 class="card-title">Tambah Permintaan Barang</h5>
                                    <form action="{{ route('bertambahrequest') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="supplier_product_id">ID Product Supplier:</label>
                                            <select id="supplier_product_id" name="supplier_product_id"
                                                class="form-control" required>
                                                @foreach ($productsupplier as $supplier)
                                                    <option value="{{ $supplier->id }}">{{ $supplier->id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="supplier_id">Supplier id:</label>
                                            <select id="supplier_id" name="supplier_id" class="form-control" required>
                                                @foreach ($productsupplier as $supplier)
                                                    <option value="{{ $supplier->supplier_id }}">
                                                        {{ $supplier->supplier_id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_supplier">Nama Supplier:</label>
                                            <select id="nama_supplier" name="nama_supplier" class="form-control"
                                                required>
                                                @foreach ($productsupplier as $supplier)
                                                    <option value="{{ $supplier->nama_supplier }}">
                                                        {{ $supplier->nama_supplier }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_pic">Nama Supplier:</label>
                                            <select id="nama_pic" name="nama_pic" class="form-control" required>
                                                @foreach ($productsupplier as $supplier)
                                                    <option value="{{ $supplier->nama_pic }}">
                                                        {{ $supplier->nama_pic }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">No Handphone:</label>
                                            <select id="no_hp" name="no_hp" class="form-control" required>
                                                @foreach ($productsupplier as $supplier)
                                                    <option value="{{ $supplier->no_hp }}">{{ $supplier->no_hp }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="lokasi">Lokasi:</label>
                                            <select id="lokasi" name="lokasi" class="form-control" required>
                                                @foreach ($productsupplier as $supplier)
                                                    <option value="{{ $supplier->lokasi }}">{{ $supplier->lokasi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_id">product_id:</label>
                                            <select id="product_id" name="product_id" class="form-control" required>
                                                @foreach ($productsupplier as $supplier)
                                                    <option value="{{ $supplier->product_id }}">
                                                        {{ $supplier->product_id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_barang">namabarang:</label>
                                            <select id="nama_barang" name="namabarang" class="form-control" required>
                                                @foreach ($productsupplier as $supplier)
                                                    <option value="{{ $supplier->namabarang }}">
                                                        {{ $supplier->namabarang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis">jenis:</label>
                                            <select id="jenis" name="jenis" class="form-control" required>
                                                @foreach ($productsupplier as $supplier)
                                                    <option value="{{ $supplier->jenis }}">{{ $supplier->jenis }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_barang">Jumlah Barang:</label>
                                            <input type="text" name="jumlah_barang" id="jumlah_barang">
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
        document.getElementById('supplier_product_id').addEventListener('change', function() {
            var selectedSupplierId = this.value;
            var supplierData = {!! json_encode($productsupplier) !!};

            // Cari data supplier yang sesuai berdasarkan id yang dipilih
            var selectedSupplier = supplierData.find(function(supplier) {
                return supplier.id == selectedSupplierId;
            });

            // Set nilai form sesuai dengan data supplier yang dipilih
            document.getElementById('supplier_id').value = selectedSupplier.supplier_id;

            document.getElementById('nama_supplier').value = selectedSupplier.nama_supplier;
            document.getElementById('nama_pic').value = selectedSupplier.nama_pic;
            document.getElementById('no_hp').value = selectedSupplier.no_hp;
            document.getElementById('lokasi').value = selectedSupplier.lokasi;
            document.getElementById('product_id').value = selectedSupplier.product_id;
            document.getElementById('nama_barang').value = selectedSupplier.namabarang;
            document.getElementById('jenis').value = selectedSupplier.jenis;
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
