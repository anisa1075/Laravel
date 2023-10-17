@extends('template.base')


@section('content')

<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Tag</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Tag</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- ENd Header -->

<!-- Main Content -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="#" class="btn btn-primary btn-md" type="button" data-toggle="modal" data-target="#modal-default">
                            Add Tag
                        </a>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <form action="#" method="get">
                                    <div class="input-group-append">
                                        <input type="search" name="search" class="form-control float-right" placeholder="Search">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <!-- Alert -->
                        @if (Session::get('Ok'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('Ok') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if (Session::get('Oke'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('Oke') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <!-- End Alert -->
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tag</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tags as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->tags }}</td>
                                    <td>{{ $row->slug }}</td>
                                    <td>
                                        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#edit{{ $row->id }}">Edit</a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $row->id }}">Delete</a>
                                    </td>
                                    @include('Admin.Tag.update')
                                    @include('Admin.Tag.delete')

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<!-- End Main Content -->

{{-- modal --}}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">Tambahkan Data Tag</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
        <form action="{{ route('admin.create.tag') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tags" class="form-label">Tag</label>
                <input type="text" id="tags" name="tags" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
    
    </div>
</div>

@endsection