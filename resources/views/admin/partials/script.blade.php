<script src="{{ asset('assets_admin/script.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        })
    })
</script>

<script>
    function showDeleteberita(id) {
        $('#hapusData').modal()
        $('#idhapus').val(id)
    }


    function showUpdateberita(id) {
        var bodyFormData = new FormData();
        bodyFormData.append('idtampil', id);

        axios({
                method: 'post',
                url: 'http://127.0.0.1:8000/api/learnEdit',
                data: bodyFormData,
                headers: {'Content-Type': 'multipart/form-data' }
                }).then(function(res) {
            var data = res.data.data
            console.log(data);
            $('#idupdate').val(data.id)
            $('#kat').val(data.kategori_id);
            $('#tgl').val(data.berita_tgl);
            $('#judul').val(data.berita_judul);
            $('#isi').val(data.berita_isi);
            $('#fotolama').val(data.berita_foto)
            document.getElementById('image').src = "{{ asset('assets_admin/images/foto_berita') }}/" + data.berita_foto
            $('#update').modal();

        })

        // axios.get('http://127.0.0.1:8000/api/learnEdit/'+id+'').then(function(res) {
        //        var data = res.data.data
        //     console.log(data);
        //     $('#idupdate').val(data.id)
        //     $('#kat').val(data.kategori_id);
        //     $('#tgl').val(data.berita_tgl);
        //     $('#judul').val(data.berita_judul);
        //     $('#isi').val(data.berita_isi);
        //     $('#fotolama').val(data.berita_foto)
        //     document.getElementById('image').src = "{{ asset('assets_admin/images/foto_berita') }}/" + data.berita_foto
        //     $('#update').modal();

        // })
    }


    $(document).ready(function() {
		var dataTable = $('#databerita').DataTable({
			"processing": true,
			"serverSide": true,
			"paging": true,
			"ajax": {
				url: "http://localhost:8000/api/learn",
				type: "post"
			},
			columns: [{
					data: null,
					render: function(data, type, row, meta) {

						return meta.row + meta.settings._iDisplayStart + 1;
					}
                },
                {
                    data: 'kategori_nama'
                },
                {
                    data: 'berita_judul'
                },
                {
                    data: 'berita_tgl'
                },
                {
                    data: 'berita_isi'
                },
                {
                    data: null,
					render: function(data, type, row, meta) {
						var btn = "<img width='200' src='{{ asset('assets_admin/images/foto_berita/') }}/"+ data.berita_foto +"' alt='kosong'>"
						return btn
					}
                },

				{
					data: null,
					render: function(data, type, row, meta) {
						var btn = "<button onclick='showUpdateberita(" + data.id + ")' class='btn btn-warning btn-sm mb-2'><i class='fa fa-edit'></i></button>  <button onclick='showDeleteberita("+data.id+")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button> "
						return btn
					}
				}
			]

		});



	})

</script>
