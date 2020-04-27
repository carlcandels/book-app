
<script type="text/javascript">
	@if(Session::has('success'))

        toastr.success("{{ Session::get('success') }}");

    @elseif(Session::has('info'))

        toastr.info("{{ Session::get('info') }}");

    @elseif(Session::has('failed'))

        toastr.error("{{ Session::get('failed') }}");

    @elseif(Session::has('warning'))

        toastr.warning("{{ Session::get('warning') }}");

    @endif
</script>
