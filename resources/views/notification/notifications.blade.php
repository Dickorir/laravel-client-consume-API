
@if ($errors->any())
    <div class="alert alert-danger alert-dismissable margin5">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($message = Session::get('success'))
    <script type="text/javascript">
        $(function () {
            // Display a success toast, with a title
            toastr.success('{{ $message }}','Success');
        })
    </script>
@endif

@if ($message = Session::get('error'))
    <script type="text/javascript">
        $(function () {
            // Display a success toast, with a title
            toastr.error('{{ $message }}','Error');
        })
    </script>
@endif

@if ($message = Session::get('warning'))
    <script type="text/javascript">
        $(function () {
            // Display a success toast, with a title
            toastr.warning('{{ $message }}','Error');
        })
    </script>
@endif

@if ($message = Session::get('info'))
    <script type="text/javascript">
        $(function () {
            // Display a success toast, with a title
            toastr.info('{{ $message }}','Error');
        })
    </script>
@endif
@if ($message = Session::get('msg'))
    <div class="alert alert-danger alert-dismissable margin5">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Error:</strong> {{ $message }}
    </div>
@endif

