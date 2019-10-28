@if(Session::has('message'))
    <script>
        var type = "{{Session::get('alert-type')}}";
        switch(type){
            case 'success':
                toastr.success('{{Session::get('message')}}', 'Thành Công', {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right', "progressBar": true, "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 10000}, toastr.options.closeButton = true);
                break;
            case 'error':
                toastr.error('{{Session::get('message')}}', 'Đã Xảy Ra Lỗi', {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right', "progressBar": true, "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 10000}, toastr.options.closeButton = true);
                break;
            case 'warning':
                toastr.warning('{{Session::get('message')}}', 'Cảnh báo', {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right', "progressBar": true, "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 10000}, toastr.options.closeButton = true);
        }
    </script>
@endif
@if($errors->any())
    <script>
        var type = "{{Session::get('alert-type', 'error')}}";
        @foreach ($errors->all() as $error)
            switch(type){
            case 'error':
                toastr.error('{{$error}}', 'Đã Xảy Ra Lỗi', {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right', "progressBar": true, "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 10000}, toastr.options.closeButton = true);
        }
        @endforeach
    </script>
@endif
