@extends('layout.master')

@section('content')
    <div class="widget widget-table action-table">
        <div class="widget-header"><i class="icon-th-list"></i>
            <h3>Kandungan Blog</h3>
            <a href="/admin/blog/create" class="pull-right" style="padding-right: 10px;">
                <button class="btn btn-success">Tambah Kandungan <i style="color: white;" class="icon-plus"></i></button>
            </a>
        </div>
        <div class="widget-content" style="padding: 10px;">
        <div style="padding-bottom: 10px;">
            
        </div>
            <br>
            <table id="blogs" class="table table-striped table-bordered table-responsive">
                <thead>
                <tr>
                    <th>Bil</th>
                    <th>Tajuk</th>
                    <th>Pautan</th>
                    <th>Tarikh Dimuatnaik</th>
                    <th>Arahan</th>
                </tr>
                </thead>
                <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $blog->name or null }}</td>
                        <td><a target="_blank" href="/blog/{{ $blog->slug or null }}">{{ $blog->slug or null }}</a></td>
                        <td>{{ $blog->created_at !== null ? $blog->created_at->format('d-M-y') : '' }}</td>
                        <td>
                            <a href="/admin/blog/{{ $blog->slug }}/edit"><button class="btn btn-primary"><i class="icon-edit"></i></button></a>
                            <a href="/admin/blog/{{ $blog->slug }}/delete"
                               onclick="return confirm('Anda pasti untuk buang maklumat ini?')">
                                <button class="btn btn-danger"><i class="icon-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#blogs').DataTable({
                "language": {
                    "lengthMenu": "Paparkan _MENU_ rekod setiap halaman",
                    "zeroRecords": "Maklumat tidak dijumpai",
                    "info": "Paparan halaman _PAGE_ daripada _PAGES_",
                    "infoEmpty": "Tiada rekod dijumpai",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "paginate": {
                        "first": "Pertaman",
                        "last": "Terakhir",
                        "next": "Seterusnya",
                        "previous": "Sebelum"
                    },
                    "search": "Cari:"
                }
            });
        });
    </script>
@endsection