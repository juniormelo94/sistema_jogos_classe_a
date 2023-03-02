
        <!-- Contact-->
        <section class="page-section" id="contact" style="padding: 3rem 0;">
            <div class="container">
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start"></div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        &copy; Reino Company 2022
                    </div>
                    <div class="col-lg-4 text-lg-end"></div>
                </div>
            </div>
        </footer>

        <!-- Incluindo Modals -->
        @include('jogosClasseA.modal.adminFormAcesso')
        @include('jogosClasseA.modal.alertError') 
        @include('jogosClasseA.modal.alertWarning') 
        @include('jogosClasseA.modal.alertSuccess') 
        @include('jogosClasseA.modal.progressBar') 

        <!-- Bootstrap core JS-->
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Font Awesome icons (free version)-->
        <script src="{{ asset('assets/js/all.js') }}" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('assets/js/script-default.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- <script src="{{ asset('assets/js/sb-forms-latest.js') }}"></script> -->
        <!-- Mask plugins -->

        <!-- Bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <!-- Scripts galeria de fotos -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
        <script type="text/javascript">
            $('.portfolio-menu ul li').click(function(){
                $('.portfolio-menu ul li').removeClass('active');
                $(this).addClass('active');
                
                var selector = $(this).attr('data-filter');
                $('.portfolio-item').isotope({
                    filter:selector
                });
                return  false;
             });
             $(document).ready(function() {
                 var popup_btn = $('.popup-btn');
                 popup_btn.magnificPopup({
                     type : 'image',
                     gallery : {
                        enabled : true
                     }
                 });
             });
        </script>

        <script src="{{ asset('assets/js/jquery.mask.js') }}"></script>
        <!-- Select plugins -->
        <!-- Exemplos de bootstrap select -->
        <!-- https://developer.snapappointments.com/bootstrap-select/examples/ -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/js/bootstrap-select.min.js"></script>
        <!-- DataTables plugins -->
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

        <!-- Scripts -->
        <script type="text/javascript" src="{{ asset('assets/js/sistema/scripts.js') }}"></script>
    </body>
</html>

