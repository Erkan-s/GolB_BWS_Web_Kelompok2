@extends('layouts.template')

{{-- content pengarang --}}
@section('content')
    <x-breadcrumb
    title="Data Narator"
    subtitle="Tambah Data"
    link="{{route('dashboard')}}"
    :linkBaru="$linkBaru"
    :subtitleBaru="$subtitleBaru"/>

    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pt-3">
                            <a class="btn btn-primary tambah-data" href="{{ route('authors.create') }}" role="button">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">#</th>
                                        <th class="w-59">Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pekerjaan</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $items)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $items->name_author }} </td>
                                        <td>
                                            @if ($items->gender == 'l')
                                                {{ __('Laki-Laki') }}
                                            @elseif($items->gender == 'p')
                                                {{ __('Perempuan') }}
                                            @else
                                                {{ __('Maaf, Data Tidak Ditemukan') }}
                                            @endif
                                        </td>
                                        <td>{{ $items->jobs }} </td>
                                        <td> {{ $items->created_at }} </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href=" {{ route('authors.edit', 1) }} "> Edit</a>
                                                <button type="button" class="btn btn-primary">Edit</button>
                                                <button type="button" class="btn btn-primary">Hapus</button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .animated -->
    </div>
@endsection
