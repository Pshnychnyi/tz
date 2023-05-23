@extends('layout')

@section('content')
    <div class="modal modal--open" id="modal-create">
        <div class="modal__pall modal__exit"></div>
        <div class="modal__container">
            <div class="modal__header">
                <h2 class="modal__title">Create part</h2>
                <a href="{{route('parts.index')}}" class="modal__close"></a>
            </div>
            <form action="{{ route('parts.store') }}" method="POST">
                @csrf
                <div class="modal__content">
                    <label class="field-label">
                        <span class="field-label__text">Name:</span>
                        <input class="field search__field" type="text" id="name" name="name" required placeholder="Text">
                    </label>

                    <label class="field-label">
                        <span class="field-label__text">Serial Number:</span>
                        <input class="field search__field" type="text" id="serialnumber" name="serialnumber" required>
                    </label>

                    <label class="field-label">
                        <span class="field-label__text">Car:</span>
                        <select id="car_id" name="car_id" required>
                            @foreach ($cars as $car)
                                <option value="{{ $car->id }}">{{ $car->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="modal__footer">
                    <button class="button button--sm button--primary">Create part</button>
                    <a class="button button--sm button--secondary" href="{{route('parts.index')}}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
