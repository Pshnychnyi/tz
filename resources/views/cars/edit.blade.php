@extends('layout')

@section('content')
    <div class="modal modal--open" id="modal-create">
        <div class="modal__pall modal__exit"></div>
        <div class="modal__container">
            <div class="modal__header">
                <h2 class="modal__title">Edit Car</h2>
                <a href="{{route('cars.index')}}" class="modal__close"></a>
            </div>
            <form action="{{ route('cars.update', $car->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal__content">
                    <label class="field-label">
                        <span class="field-label__text">Name:</span>
                        <input class="field search__field" type="text" value="{{ $car->name }}" required id="name" name="name" required placeholder="Text">
                    </label>

                    <label class="field-label">
                        <span class="field-label__text">Registration Number:</span>
                        <input class="field search__field" type="text" id="registration_number" name="registration_number" value="{{ $car->registration_number }}">
                    </label>

                    <label class="field-label">
                        <label for="is_registered">Registered:</label>
                        <select class="form-control" id="is_registered" name="is_registered">
                            <option value="0" {{ $car->is_registered ? '' : 'selected' }}>No</option>
                            <option value="1" {{ $car->is_registered ? 'selected' : '' }}>Yes</option>
                        </select>
                    </label>
                </div>
                <div class="modal__footer">
                    <button class="button button--sm button--primary" >Edit car</button>
                    <a class="button button--sm button--secondary" href="{{route('cars.index')}}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
