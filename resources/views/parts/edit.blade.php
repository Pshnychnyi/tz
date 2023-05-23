@extends('layout')

@section('content')
    <div class="modal modal--open" id="modal-create">
        <div class="modal__pall modal__exit"></div>
        <div class="modal__container">
            <div class="modal__header">
                <h2 class="modal__title">Edit part</h2>
                <a href="{{route('cars.index')}}" class="modal__close"></a>
            </div>
            <form action="{{ route('parts.update', $part->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal__content">
                    <label class="field-label">
                        <span class="field-label__text">Name:</span>
                        <input class="field search__field" type="text" id="name" name="name" value="{{ $part->name }}" required>
                    </label>

                    <label class="field-label">
                        <span class="field-label__text">Serial Number:</span>
                        <input class="field search__field" type="text" id="serialnumber" name="serialnumber" value="{{ $part->serialnumber }}" required>
                    </label>

                    <label class="field-label">
                        <span class="field-label__text">Car:</span>
                        <select id="car_id" name="car_id" required>
                            @foreach ($cars as $car)
                                <option value="{{ $car->id }}" {{ $car->id === $part->car_id ? 'selected' : '' }}>{{ $car->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="modal__footer">
                    <button class="button button--sm button--primary" >Edit part</button>
                    <a class="button button--sm button--secondary" href="{{route('cars.index')}}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
