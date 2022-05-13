<form action="" method="POST" id="delete-form">
        @method('DELETE')
        @csrf
</form> 
<script>
    $(document).ready(function(){
        $('.delete-btn').on('click', function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            swal({
                title: "Hapus data ?",
                text: "Data yang di hapus tidak dapat di kembalikan!", 
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $('#delete-form').attr('action',href).submit();
              }
            });
        });
    });
</script>
@if(session('message'))
<script>

iziToast.success({
    title: 'Berhasil',
    message: "{{ session('message') }}",
    position : "topRight",
});

</script>
@elseif(session('error'))
<script>

iziToast.error({
    title: '',
    message: "{{ session('error') }}",
    position : "topRight",
});

</script>
@endif

@if($errors->any())
@foreach($errors->all() as $error)
<script>

iziToast.error({
    title: 'Whoops!',
    message: "{{ $error }}",
    position : "topRight",
});

</script>
@endforeach
@endif