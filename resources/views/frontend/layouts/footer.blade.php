
@include('frontend.layouts.include.footer-content')

	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{asset('frontend/assets/jquery/jquery-3.6.0.min.js')}}"></script>
	<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
	
	<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
	
	<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
	<script src="{{asset('frontend/assets/toastr/build/toastr.min.js')}}"></script>
	<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
	{!! Toastr::message() !!}
	@yield('script')
</body>
</html>