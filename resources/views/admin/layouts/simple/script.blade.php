<!-- <script src="{{asset('assets/admin/js/jquery-3.5.1.min.js')}}"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Bootstrap js-->
<script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

<!-- feather icon js-->
<script src="{{asset('assets/admin/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/admin/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- scrollbar js-->
<script src="{{asset('assets/admin/js/scrollbar/simplebar.js')}}"></script>
<script src="{{asset('assets/admin/js/scrollbar/custom.js')}}"></script>
<!-- Sidebar jquery-->
<!-- <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script> -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script src="{{ asset('assets/admin/js/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('assets/admin/js/dropzone/dropzone-script.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/eofxlmcvub1dtr5yvakd6idxfsg2zs9m61b4snofxq0gg33h/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script src="{{ asset('assets/admin/js/sweetalert2.min.js') }}"></script>
<script src="{{asset('assets/admin/js/config.js')}}"></script>
<!-- Plugins JS start-->
<script id="menu" src="{{asset('assets/admin/js/sidebar-menu.js')}}"></script>


@if(Route::current()->getName() != 'popover')
<!-- <script src="{{asset('assets/admin/js/tooltip-init.js')}}"></script> -->
@endif

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{asset('assets/admin/js/script.js')}}"></script>
<script src="{{asset('assets/admin/js/custom_script.js')}}"></script>
<!-- <script src="{{asset('assets/admin/js/theme-customizer/customizer.js')}}"></script> -->


{{-- @if(Route::current()->getName() == 'index') 
	<script src="{{asset('assets/admin/js/layout-change.js')}}"></script>
@endif --}}


<script>
	// JavaScript function to toggle the dropdown
	function toggleDropdown() {
		var dropdown = document.getElementById("dropdown-content");
		if (dropdown.style.display === "none") {
			dropdown.style.display = "block";
		} else {
			dropdown.style.display = "none";
		}
	}
</script>
<script type='text/javascript' src="{{asset('assets/admin/js/froala_editor.pkgd.min.js')}}"></script>
<script>
	var editor = new FroalaEditor('.ws_text-editor');
</script>