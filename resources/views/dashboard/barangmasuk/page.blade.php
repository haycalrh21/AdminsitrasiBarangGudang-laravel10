<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Barang Masuk</title>

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


                    {{-- isi disini  --}}
                    <h6 class="m-0 font-weight-bold text-primary">Data Barang Masuk</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('tambahbarangmasuk') }}" class="btn btn-primary">Tambah Barang Masuk</a>
                        <a href="{{ route('cetakpdfbarangmasuk') }}" class="btn btn-success">Cetak PDF</a>

                    </div>
                    <div class="table-rebmonsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellbmacing="0">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>ID Permintaan</th>
                                    <th>ID Supplier</th>
                                    <th>ID Product</th>

                                    <th>Nama Supplier</th>
                                    <th>Nama PIC</th>
                                    <th>Lokasi</th>
                                    <th>Nama Product</th>
                                    <th>Jenis Product</th>
                                    <th>Jumlah Barang</th>
                                    <th>Harga Barang</th>\
                                    <th>Tanggal DiBuat</th>
                                    <th>Tanggal DiUpdate</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangmasuks as $bm)
                                    <tr>
                                        <td>{{ $bm->id }}</td>
                                        <td>{{ $bm->request_barang_masuk_id }}</td>

                                        <td>{{ $bm->supplier_id }}</td>
                                        <td>{{ $bm->product_id }}</td>

                                        <td>{{ $bm->nama_supplier }}</td>
                                        <td>{{ $bm->nama_pic }}</td>
                                        {{-- <td>{{ $bm->no_hp }}</td> --}}
                                        <td>{{ $bm->lokasi }}</td>
                                        <td>{{ $bm->namabarang }}</td>
                                        <td>{{ $bm->jenis }}</td>
                                        <td>{{ $bm->jumlah_barang }}</td>
                                        <td>{{ $bm->harga_barang }}</td>
                                        <td>{{ $bm->created_at }}</td>
                                        <td>{{ $bm->updated_at }}</td>
                                        <td>
                                            <form action="{{ route('hapusbarangmasuk', $bm->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                {{-- Tombol Previous --}}
                                @if ($barangmasuks->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $barangmasuks->previousPageUrl() }}"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                @endif

                                {{-- Tombol Halaman --}}
                                @for ($i = 1; $i <= $barangmasuks->lastPage(); $i++)
                                    <li class="page-item {{ $barangmasuks->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link"
                                            href="{{ $barangmasuks->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                {{-- Tombol Next --}}
                                @if ($barangmasuks->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $barangmasuks->nextPageUrl() }}"
                                            aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">Next</span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    {{-- ending bagian paginate --}}
                </div>
            </div>


        </div>


    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <bman>Copyright &copy; Your Website 2021</bman>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <bman aria-hidden="true">×</bman>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

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
