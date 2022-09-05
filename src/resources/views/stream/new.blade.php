@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="card">
                
                <div class="card-header">{{ __('Подать заявку') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('stream-new-submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Название</label>
                        <input type="text" class="form-control" {{ old('title') }} id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Описание</label>
                        <textarea name="description" id="description" cols="30" rows="10"class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                    <label>Превью</label>
                    <input type="file" class="form-control" required name="preview">
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-success">Создать</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
