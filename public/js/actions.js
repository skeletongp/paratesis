document.addEventListener('load', function(){
    $('.deleteArea').on('click', function() {
        id = $(this).attr('data-area');
        console.log(id)
        Swal.fire({
            title: '¿Desea borrar el registro?',
            text: "Una vez borrado, no podrá recuperarlo",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Proceder',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('deleteArea', id);
                Swal.fire(
                    'Registro Borrado',
                    '',
                    'success'
                )
            }
        });

    })
})