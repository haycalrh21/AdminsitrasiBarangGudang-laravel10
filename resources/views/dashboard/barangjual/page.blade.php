<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Data Barang Jual</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

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
                    <h6 class="m-0 font-weight-bold text-primary">Data Barang Jual</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('tambahbarangjual') }}" class="btn btn-primary">Tambah Barang Jual</a>
                        <a href="{{ route('cetakpdfbarangjual') }}" class="btn btn-success">Cetak PDF</a>
                    </div>
                    <div class="table-rebjonsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellbjacing="0">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>ID Barang Masuk</th>
                                    <th>Nama Baran</th>
                                    <th>Jenis</th>
                                    <th>Jumlah Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Harga Jual</th>
                                    <th>Tanggal DiBuat</th>
                                    <th>Tanggal DiUpdate</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangjuals as $bj)
                                    <tr>
                                        <td>{{ $bj->id }}</td>
                                        <td>{{ $bj->barang_masuk_id }}</td>
                                        <td>{{ $bj->nama_barang }}</td>
                                        <td>{{ $bj->jenis }}</td>
                                        <td>{{ $bj->jumlah_barang }}</td>
                                        <td>{{ $bj->harga_barang }}</td>
                                        <td>{{ $bj->harga_jual }}</td>
                                        <td>{{ $bj->created_at }}</td>
                                        <td>{{ $bj->updated_at }}</td>
                                        <td>
                                            <form action="{{ route('hapusbarangjual', $bj->id) }}" method="POST">
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
                                @if ($barangjuals->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $barangjuals->previousPageUrl() }}"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                @endif

                                {{-- Tombol Halaman --}}
                                @for ($i = 1; $i <= $barangjuals->lastPage(); $i++)
                                    <li class="page-item {{ $barangjuals->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link"
                                            href="{{ $barangjuals->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                {{-- Tombol Next --}}
                                @if ($barangjuals->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $barangjuals->nextPageUrl() }}"
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
                <bjan>Copyright &copy; Your Website 2021</bjan>
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
                        <bjan aria-hidden="true">×</bjan>
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
