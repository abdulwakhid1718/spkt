<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('assets_admin/img/logo_polsek.png') }}" rel="icon" />
    <link href="{{ asset('assets_admin/img/logo_polsek.png') }}" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.min.css"rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('assets_admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_admin/vendor/quill/quill.snow.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_admin/vendor/simple-datatables/style.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets_admin/css/style.css') }}" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 27 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">Polsek Kamal</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle" href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->


                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('assets_admin/img/profile-img.jpg') }}" alt="Profile"
                            class="rounded-circle" />
                        <span
                            class="d-none d-md-block dropdown-toggle ps-2 text-capitalize">{{ Auth::user()->nama_lengkap }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li><a class="nav-link collapsed" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-left"></i>
                                Logout
                            </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->
            </ul>
        </nav>
        <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard*') ? '' : 'collapsed' }}" href="/dashboard">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('pelaporan*') ? '' : 'collapsed' }}" href="/pelaporan">
                    <i class="bi bi-exclamation-square-fill"></i>
                    <span>Data Pelaporan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('pengguna*') ? '' : 'collapsed' }}" href="/pengguna">
                    <i class="bi bi-people-fill"></i>
                    <span>Data Pengguna</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('cetak-laporan*') ? '' : 'collapsed' }}" href="#"
                    data-bs-toggle="collapse" data-bs-target="#laporanDropdown" aria-expanded="false">
                    <i class="bi bi-book-fill"></i>
                    <span>Laporan</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul class="collapse sidebar-submenu" id="laporanDropdown">
                    <li><a href="/cetak-laporan" class="nav-link">Laporan Surat Kehilangan</a></li>
                    <li><a href="/cetak-laporan-pengguna" class="nav-link">Laporan Pengguna</a></li>
                </ul>
            </li>
            <li><a class="nav-link collapsed" href=""
                    onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-left"></i>
                    Logout
                </a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">
        @yield('main')
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets_admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/quill/quill.min.js') }}"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="{{ asset('assets_admin/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets_admin/js/main.js') }}"></script>
    <script>
        function showDetailPengguna(id, nik, namaLengkap, tempatLahir, jenisKelamin, agama, pekerjaan, nomorWA, alamat,
            createdAt) {
            document.getElementById('userId').value = id;
            document.getElementById('detailNama').value = namaLengkap;
            document.getElementById('detailNik').value = nik;
            document.getElementById('detailPekerjaan').value = pekerjaan;
            document.getElementById('detailAgama').value = agama;
            document.getElementById('detailAlamat').value = alamat;
            document.getElementById('detailTelepon').value = nomorWA;
            document.getElementById('detailTanggalLahir').value = tempatLahir;
            document.getElementById('detailCreatedAt').value = createdAt;
            // Ambil elemen form berdasarkan ID
            var formUpdateUser = document.getElementById('formUpdateUser');
            // Misalkan id yang didapat dari suatu sumber atau variabel
            // Setel aksi form dengan menggunakan string template atau cara lain
            formUpdateUser.action = '/pengguna/' + id; // Sesuaikan dengan route yang sesuai
        }
    </script>

    <script>
        function showDetail(id, namaPelapor, dokumen, tanggalLaporan, tanggalKehilangan, lokasiKehilangan, kronologi,
            status, syarat) {
            document.getElementById('detailId').value = id;
            document.getElementById('detailNamaPelapor').value = namaPelapor;
            document.getElementById('detailDokumen').value = dokumen;
            document.getElementById('detailTanggalLaporan').value = tanggalLaporan;
            document.getElementById('detailTanggalKehilangan').value = tanggalKehilangan;
            document.getElementById('detailTempatKehilangan').value = lokasiKehilangan;
            document.getElementById('detailKronologi').value = kronologi;

            // Get the select element by id
            var statusSelect = document.getElementById('detailStatus');
            var form = document.getElementById('formGantiStatus');
            form.action = "/pelaporan/" + id;
            statusSelect.innerHTML = '';

            // Define the status values you want to add
            var statusValues = ['diproses', 'selesai', 'ditolak'];

            // Loop through each status value and add as option
            statusValues.forEach(function(statusValue) {
                // Create a new option element
                var option = document.createElement('option');
                // Set the value and text of the option
                option.value = statusValue.toLowerCase(); // Make the status lowercase
                option.textContent = statusValue.charAt(0).toUpperCase() + statusValue.slice(
                    1); // Capitalize the first letter
                // Add the option to the select element
                statusSelect.appendChild(option);
            });

            // Set the selected status based on the argument status
            statusSelect.value = status.toLowerCase(); // Make the status lowercase

            // Disable the select if status is 'selesai'
            statusSelect.disabled = (status.toLowerCase() === 'selesai');

            // Check if WhatsApp button already exists, remove it if it does
            var existingWhatsappButton = document.getElementById('whatsappButton');
            if (existingWhatsappButton) {
                existingWhatsappButton.parentNode.removeChild(existingWhatsappButton);
            }

            // Add WhatsApp notification button if status is 'selesai'
            if (status.toLowerCase() === 'selesai') {
                // Create WhatsApp notification button
                var whatsappButton = document.createElement('button');
                whatsappButton.id = 'whatsappButton';
                whatsappButton.type = 'button';
                whatsappButton.classList.add('btn', 'btn-success', 'mb-2');
                whatsappButton.textContent = 'Kirim Pemberitahuan WhatsApp';
                whatsappButton.addEventListener('click', function() {
                    // Implement WhatsApp notification logic here
                    sendWhatsAppNotification(id); // Call function to send WhatsApp notification
                });

                // Append WhatsApp button to modal footer
                var modalFooter = document.querySelector('#detailModal .modal-footer');
                modalFooter.insertBefore(whatsappButton, modalFooter.firstChild);
            }

            // Parse syarat if it's a string
            try {
                syarat = JSON.parse(syarat);
            } catch (e) {
                console.error('Failed to parse syarat:', e);
                syarat = [];
            }

            // Display the required images and document names
            var syaratImagesContainer = document.getElementById('syaratImages');
            syaratImagesContainer.innerHTML = ''; // Empty the container before adding new elements
            if (syarat.length > 0) {
                syarat.forEach(function(syaratItem) {
                    // Create a container for each image and its document name
                    var imageContainer = document.createElement('div');
                    imageContainer.classList.add('mb-3');

                    // Create the image element
                    var img = document.createElement('img');
                    img.src = 'http://spkt.test:8080/storage/' + syaratItem.bukti_foto; // Adjust the path as needed
                    img.classList.add('img-fluid', 'mb-2'); // Add classes for styling
                    img.alt = 'Syarat Pendukung';
                    imageContainer.appendChild(img);

                    // Append the image container to the main container
                    syaratImagesContainer.appendChild(imageContainer);
                });
            } else {
                // Display message if no syarat found
                var noSyaratMessage = document.createElement('input');
                noSyaratMessage.value = "Syarat Dokumen Tidak Ada";
                noSyaratMessage.classList.add('form-control', 'text-capitalize');
                noSyaratMessage.disabled = true;
                syaratImagesContainer.appendChild(noSyaratMessage);
            }
        }

        function sendWhatsAppNotification(id) {
            // Dapatkan token CSRF dari meta tag
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Kirim permintaan POST dengan token CSRF
            fetch('/send-whatsapp', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken // Sertakan token CSRF di header
                    },
                    body: JSON.stringify({
                        id: id
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        title: "Sukses",
                        text: "Pemberitahuan WhatsApp telah dikirim!",
                        icon: "success"
                    });
                })
                .catch(error => {
                    console.error('Error sending WhatsApp notification:', error);
                    Swal.fire({
                        title: "Gagal",
                        text: "Gagal mengirim pemberitahuan WhatsApp.",
                        icon: "error"
                    });
                });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": true, // Aktifkan paging (default: true)
                "lengthMenu": [5, 10, 15, 20], // Pilihan jumlah data per halaman
                "searching": true, // Aktifkan fitur pencarian (default: true)
                "info": true, // Tampilkan informasi jumlah data (default: true)
                "autoWidth": true, // Matikan penyesuaian otomatis lebar kolom (default: true)
                "responsive": true, // Aktifkan tata letak responsif (default: false)
                "order": [], // Atur urutan default kolom (misalnya: [[ 0, 'asc' ]])
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ entri per halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Tampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Data tidak tersedia",
                    "infoFiltered": "(disaring dari _MAX_ total entri)",
                    "search": "Cari:",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                }
            });
        });
    </script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Yakin Hapus Data ini?",
                text: "Data tidak akan bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Hapus data dengan mengirimkan formulir
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
</body>

</html>
