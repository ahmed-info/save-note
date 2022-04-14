@extends('layouts.app')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">


            <div class="title_right">
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-lg-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="{{ route('notes.create') }}" class="btn btn-primary btn-sm">Add New Note</a>
                        <a href="{{ url('notes/trash') }}" class="btn btn-link fw-bold btn-sm">Go to trash</a>
                        <a href="{{ route('notes.report') }}" class="btn btn-success fw-bold btn-sm">Report</a>
                        <a href="{{ route('logout') }}" class="btn btn-dark float-right btn-sm">logout</a>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 37%">Note Content</th>
                                    <th style="width: 15%">Note Type</th>
                                    <th style="width: 22%">Image</th>
                                    <th style="width: 25%">#Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($notes) > 0)
                                    @foreach ($notes as $index => $note)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                {{ $note->content }}
                                            </td>
                                            <td>{{ $note->type }}</td>
                                            <td>
                                                <ul class="list-inline">
                                                    <li>
                                                        @if ($note->image == null)
                                                            <img src="../assets/images/default.png" style="width: 100px"
                                                                class="img-thumbnail" alt="Image Note">
                                                        @else
                                                            <img src="{{ asset('storage/images/' . $note->image) }}"
                                                                style="width: 100px" class="img-thumbnail"
                                                                alt="Image Note">
                                                        @endif


                                                    </li>
                                                </ul>
                                            </td>


                                            <td>

                                                <div class="col-sm-6">
                                                    <form action="{{ route('notes.destroy', ['id' => $note->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" name="submit" value="Trash"
                                                            class="btn btn-danger btn-sm">
                                                    </form>
                                                </div>
                                                <a href="{{ route('notes.edit', $note->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    Edit </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <!-- end project list -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /page content -->


@endsection
