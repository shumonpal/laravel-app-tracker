<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('vendor/shumonpal/assets/favicon.ico') }}" />
        <!-- Bootstrap icons-->
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" /> --}}
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('vendor/shumonpal/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Laravel App Tracker</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('app-tracker.licence-keys.index') }}">Licence Keys</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('app-tracker.licence-users.index') }}">Illegal Users</a></li>
                        
                    </ul>
                    <form method="POST" action="{{ route('app-tracker.licence-keys.store') }}">
                        @csrf
                        <div class="popover @error('code') popover--active @enderror">
                            <button class="popover__trigger btn btn-outline-dark" type="button">Add new licence key</button>
                            <ul class="popover__menu px-3 py-4" style="width: 340px;">
                                <li class="popover__menu-item">
                                    <div class="form-group mb-3">
                                        <label for="code" class="d-flex justify-content-between">
                                            <div>Key:</div>
                                            <div><button type="button" class="btn btn-outline-secondary btn-sm" id="generate-key">Generate key</button></div>
                                         </label>
                                        <input type="text" name="code" class="form-control my-2" id="code" aria-describedby="keyHelp"
                                            placeholder="Enter licence key" minlength="14" maxlength="19">
                                        @error('code')
                                        <small id="keyHelp" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary" style="margin-right: 15px">Save</button>
                                        <button type="button" class="btn btn-secondary close-popover">Cancel</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        {{-- <button class="btn btn-outline-dark" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
                        sagittis lacus vel augue laoreet rutrum faucibus." type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Add new licence key
                        </button> --}}
                    </form>
                </div>
            </div>
        </nav>

        @yield('content')
        
        <!-- Footer-->
        {{-- <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer> --}}
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('vendor/shumonpal/js/scripts.js') }}"></script>
        <script>
            var popovers = document.querySelectorAll('.popover');
            var popoverTriggers = document.querySelectorAll('.popover__trigger');
            var popoverClose = document.querySelectorAll('.close-popover');

            for (var i = 0; i < popoverTriggers.length; i++) {
                popoverTriggers[i].addEventListener('click', function(event) {
                    closeAllOthers(this.parentElement);
                    this.parentElement.classList.toggle('popover--active');
                });
            }

            for (var i = 0; i < popoverClose.length; i++) {
                popoverClose[i].addEventListener('click', function(event) {
                    // closeAllOthers(this.parentElement);
                    this.parentElement.parentElement.parentElement.parentElement.classList.toggle('popover--active');
                });
            }

            function closeAllOthers(ignore) {
                for (var i = 0; i < popovers.length; i++) {
                    if ( popovers[i] !== ignore) {
                        popovers[i].classList.remove('popover--active');	
                    }
                }
            }

            var keyGenerate = document.getElementById('generate-key');
            keyGenerate.addEventListener('click', function(event) {
                console.log('keyGenerate', "{{rand(11, 20) . now()->format('dmiYs') . rand(11, 20)}}");
                let ele = "{{rand(11, 20) . now()->format('dmYis') . rand(11, 20)}}";
                ele = ele.split('-').join(''); // Remove dash (-) if mistakenly entered.

                let finalVal = ele.match(/.{1,4}/g).join('-');

                document.getElementById('code').value = finalVal;
                // document.getElementById('code').value = "{{rand(11, 20) . now()->format('dmiYs') . rand(11, 20)}}"
            });
            
            var codeElm = document.getElementById('code');
            codeElm.addEventListener('keyup', function(event) {
                console.log('keyGenerate', "{{rand(11, 20) . now()->format('dmiYs') . rand(11, 20)}}");
                var val = this.value.split('-').join('');

                let finalVal = val.match(/.{1,4}/g).join('-');

                document.getElementById('code').value = finalVal;
                // document.getElementById('code').value = "{{rand(11, 20) . now()->format('dmiYs') . rand(11, 20)}}"
            });
        </script>
    </body>
</html>
