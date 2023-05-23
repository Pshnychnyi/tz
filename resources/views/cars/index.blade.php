@extends('layout')

@section('content')
    <main class="page terms-page">
        <h1 class="title title--h1 page__title">Cars</h1>
        <div class="page__content">

            <a class="button button--primary button--create page__button" href="{{ route('cars.create') }}"
               data-modal="modal-create">Add</a>
            @if ($cars->isEmpty())
                <p>No cars available.</p>
            @else
                <div class="page__group">
                    <form class="page__search search" action="" type="">
                        <input class="field search__field" type="text" placeholder="Text">
                        <button class="search__submit" type="submit"></button>
                    </form>

                    <div class="show-records">
                        <span class="show-records__text">Show records:</span>
                        <span class="show-records__dropdown">20</span>
                    </div>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th class="id-cell">
                  <span class="cell-content">
                    <input class="checkbox" type="checkbox">
                    <a class="sort" href="#">ID</a>
                  </span>
                        </th>
                        <th class="term-cell">Name</th>
                        <th class="edited-cell">
                  <span class="cell-content">
                    <a class="sort" href="#">Registred</a>
                    <a class="cell-dropdown" href="#"></a>
                  </span>
                        </th>
                        <th class="mark-cell">
                  <span class="cell-content">
                    <a class="sort" href="#">Num</a>
                    <a class="cell-dropdown" href="#"></a>
                  </span>
                        </th>
                        <th class="actions-cell text-right">
                            <a class="button-more" href="#"></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($cars as $car)
                        <tr>
                            <td class="id-cell">
                  <span class="cell-content">
                    <input class="checkbox" type="checkbox">
                    {{ $car->id }}
                  </span>
                            </td>
                            <td class="term-cell">
                                <span>{{$car->name}}</span>
                            </td>
                            <td class="edited-cell">{{ $car->is_registered ? 'Yes' : 'No' }}</td>
                            <td class="mark-cell">{{ $car->registration_number }}</td>
                            <td class="actions-cell">
                                <div class="actions">
                                    <a class="actions__button actions__edit" href="{{ route('cars.edit', $car->id) }}"></a>
                                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="actions__button actions__remove" onclick="return confirm('Are you sure you want to delete this car?')"></button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </main>
@endsection
