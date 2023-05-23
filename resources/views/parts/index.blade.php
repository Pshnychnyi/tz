@extends('layout')

@section('content')
    <main class="page terms-page">
        <h1 class="title title--h1 page__title">Parts</h1>
        <div class="page__content">

            <a class="button button--primary button--create page__button" href="{{ route('parts.create') }}"
               data-modal="modal-create">Add</a>
            @if ($parts->isEmpty())
                <p>No parts available.</p>
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
                        <th class="mark-cell">
                  <span class="cell-content">
                    <a class="sort" href="#">Serial Number</a>
                    <a class="cell-dropdown" href="#"></a>
                  </span>
                        </th>
                        <th class="mark-cell">
                  <span class="cell-content">
                    <a class="sort" href="#">Car</a>
                    <a class="cell-dropdown" href="#"></a>
                  </span>
                        </th>
                        <th class="actions-cell text-right">
                            <a class="button-more" href="#"></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($parts as $part)
                        <tr>
                            <td class="id-cell">
                  <span class="cell-content">
                    <input class="checkbox" type="checkbox">
                    {{ $part->id }}
                  </span>
                            </td>
                            <td class="term-cell">
                                <span>{{$part->name}}</span>
                            </td>
                            <td class="edited-cell">{{ $part->serialnumber }}</td>
                            <td class="mark-cell">{{ $part->car->name }}</td>
                            <td class="actions-cell">
                                <div class="actions">
                                    <a class="actions__button actions__edit" href="{{ route('parts.edit', $part->id) }}"></a>
                                    <form action="{{ route('parts.destroy', $part->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="actions__button actions__remove" onclick="return confirm('Are you sure you want to delete this part?')"></button>
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
