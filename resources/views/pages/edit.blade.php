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
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!-- start project create -->
                        <form action="{{ route('notes.update',["id"=>$note->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-8 mt-3">
                                    <div class="form-group mb-3">
                                        <label for="content">
                                            <h4>Note Content</h4>
                                        </label>
                                        <textarea class="form-control" id="content" name="content" style="height: 112px">{{ $note->content }}</textarea>
                                    </div>

                                    <div class="form-group mb-5">
                                        <label for="type">
                                            <h4>Note Type</h4>
                                        </label>

                                        <select class="form-control" name="type">
                                            <option value="urgent" {{ $note->type == 'urgent' ? 'selected' : '' }}>Urgent
                                            </option>
                                            <option value="normal" {{ $note->type == 'normal' ? 'selected' : '' }}>Normal
                                            </option>
                                            <option value="on date" {{ $note->type == 'on date' ? 'selected' : '' }}>On
                                                date
                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group col-md-3 mt-3">
                                    <h3>Note Image</h3>
                                    <!-- asset('assets/img/header-bg.jpg') -->
                                    @if ($note->image == null)
                                    <img style="height: 30vh" src="http://127.0.0.1:8000/assets/images/default.png" class="img-thumbnail" alt="">
                                    @else
                                        <img style="height: 30vh" src="{{ asset('storage/images/' . $note->image) }}"
                                            class="img-thumbnail" alt="">
                                    @endif


                                    <input type="file" class="mt-3" name="image" id="image">
                                </div>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary mt-0" value="Update">
                        </form>
                        <!-- end project create -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /page content -->
@endsection
