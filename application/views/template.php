<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Proteksi akses jika belum login
if (!$this->session->userdata('email')) {
    redirect('Auth');
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php $this->load->view('header'); ?>
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php $this->load->view('sidebar'); ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php $this->load->view('topbar'); ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <?php
                    // Untuk keamanan, pastikan view yang dipanggil aman
                    if (isset($content) && file_exists(APPPATH . "views/{$content}.php")) {
                        $this->load->view($content);
                    } else {
                        show_404();
                    }
                    ?>
                    <!-- End Page Content -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php $this->load->view('footer'); ?>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- JavaScript Files -->
        <?php $this->load->view('js'); ?>

    </body>

    </html>
<?php } ?>