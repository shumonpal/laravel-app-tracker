@extends('shumonpal::layouts.master')
@section('title')
     Illigal Users
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
                      <th scope="col">Email</th>
                      <th scope="col">Domain</th>
                      <th scope="col">Ip Address</th>
                      <th scope="col">Password</th>
                      <th scope="col">Hash Password</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach ($users as $user)                        
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->domain }}</td>
                      <td>{{ $user->ip }}</td>
                      <td>{{ $user->password }}</td>
                      <td>{{ $user->hash_password }}</td>
                      <td>                        
                        <form action="{{ route('app-tracker.licence-users.destroy', $user->id) }}" class="d-flex" method="POST"
                            onsubmit="return confirm('Are you sure to delete key: {{ $user->email }} ?');">
                          @csrf
                          @method('delete')
                            <button class="btn btn-outline-danger" type="submit">
                                Delete
                            </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              
            <div class="licence-paginate">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</section>
@endsection