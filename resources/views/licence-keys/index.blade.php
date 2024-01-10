@extends('shumonpal::layouts.master')
@section('title')
     Licence Keys
@endsection
@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
        @endif
                  
        <div class="row align-items-center">
            <form action="" method="get"  style="width: 400px">
            
            <div class="input-group mb-2">
                <input type="text" name="search" class="form-control"
                        value="{{ request('search') }}"
                        placeholder="Search licence key/domain...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    @if (request('search') || request('page'))
                    <a href="{{ route('app-tracker.licence-keys.index') }}" class="btn btn-outline-default" type="submit">Reset</a>
                    @endif
                </div>
            </div>
            </form>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Key</th>
                      <th scope="col">In Use(Domain)</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach ($licences as $licence)                        
                    <tr class="{{ $licence->domain ? 'bg-light-success' : '' }}">
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $licence->code }}</td>
                      <td>{{ $licence->domain }}</td>
                      <td>
                        @if (!$licence->domain)                            
                        <form action="{{ route('app-tracker.licence-keys.destroy', $licence->id) }}" class="d-flex" method="POST"
                            onsubmit="return confirm('Are you sure to delete key: {{ $licence->code }} ?');">
                          @csrf
                          @method('delete')
                            <button class="btn btn-outline-danger" type="submit">
                                Delete
                            </button>
                        </form>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              
            <div class="licence-paginate">
                {{ $licences->links() }}
            </div>
        </div>
    </div>
</section>
@endsection