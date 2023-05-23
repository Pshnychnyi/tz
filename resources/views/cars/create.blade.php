@extends('layout')

@section('content')
    <div class="modal modal--open" id="modal-create">
        <div class="modal__pall modal__exit"></div>
        <div class="modal__container">
            <div class="modal__header">
                <h2 class="modal__title">Create car</h2>
                <a href="{{route('cars.index')}}" class="modal__close"></a>
            </div>
            <form action="{{ route('cars.store') }}" method="POST">
                @csrf
                <div class="modal__content">
                    <label class="field-label">
                        <span class="field-label__text">Name:</span>
                        <input class="field search__field" type="text" id="name" name="name" required placeholder="Text">
                    </label>

                    <label class="field-label">
                        <span class="field-label__text">Registration Number:</span>
                        <input class="field search__field" type="text" id="registration_number" name="registration_number">
                    </label>

                    <label class="field-label">
                        <span class="field-label__text">Registered:</span>
                        <select id="is_registered" name="is_registered">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>

                    </label>
                </div>
                <div class="modal__footer">
                    <button class="button button--sm button--primary" href="#">Create car</button>
                    <a class="button button--sm button--secondary" href="{{route('cars.index')}}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
