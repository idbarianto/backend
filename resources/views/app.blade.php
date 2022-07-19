
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Technical Test - Backend Developer</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/global/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <style>
        * {
            font-family: "Be Vietnam Pro",sans-serif;
        }
    </style>

    @yield('style')

</head>

<body>

    <!-- Main navbar -->    
    @include('partial.navigation')


    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Secondary sidebar -->
        @include('partial.sidebar')
        <!-- /secondary sidebar -->



        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                @yield('content')


                <!-- Footer -->
                @include('partial.footer')
                <!-- /footer -->

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
    




    <div class="loader card-overlay d-none">
        <i class="spinner icon-spinner4 mr-2" style="font-size: 1.25rem"></i><span id="loader-text">Loading ...</span>
    </div>


    <div class="d-none">
        <!-- dialog confirm delete -->
        <div class="dialog" id="dialog-confirm-delete-data" title="Delete data">
            <label for="">This will permanently delete your data.</label>
            <label for="">Are you sure?</label>
            <div class="row mt-1">
                <div class="col-md-12">
                    <button class="btn btn-sm btn-danger submit-form">Yes</button>
                    <button class="btn btn-sm btn-light close-dialog">No</button>
                </div>
            </div>
        </div>
        <!-- /dialog confirm delete -->

        <!-- dialog change status -->
        <div class="dialog" id="dialog-change-status" title="Change status">
            <label for="">Are you sure?</label>
            <div class="row mt-1">
                <div class="col-md-12">
                    <button class="btn btn-sm btn-primary submit-form btn-set-status active">Active</button>
                    <button class="btn btn-sm btn-warning submit-form btn-set-status inactive">Inactive</button>
                    <button class="btn btn-sm btn-light close-dialog">Close</button>
                </div>
            </div>
        </div>
        <!-- /dialog change status -->
    </div>



    <!-- Notifications -->
    @include('partial.notification')

    <!-- Core JS files -->
    <script src="{{ asset('assets/global/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/main/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <!-- /core JS files -->



    <!-- Theme JS files -->
    <script src="{{ asset('assets/global/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/plugins/extensions/jquery_ui/widgets.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/plugins/extensions/jquery_ui/effects.min.js') }}"></script>

    <script src="{{ asset('assets/global/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/plugins/notifications/pnotify.min.js') }}"></script>

    @yield('plugins')


    <!-- /theme JS files -->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                // django
                'X-CSRFToken' : $('meta[name="csrf-token"]').attr('content'),

                // laravel 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
    </script>
    <script>
        

        
        // select2 with search
        $('.select-search').select2();
        
        // select2 with search in article index
        $('.select-search.custome-width').select2({
            width: 200,
        });

        // initialize fixed width. Single select
        $('.select-fixed-singgle').select2({
            minimumResultsForSearch: Infinity,
            width: 130,
        });
        
        // initialize select 2 limit data
        $('.select-fixed-limit-data').select2({
            minimumResultsForSearch: Infinity,
            width: 80,
        });


        // submit filter form
        $(document).on("submit", "#form-filter-data", function(e) {
            e.preventDefault();
            showLoader();
            let object = {},
                data = $(this).serializeArray();
            data.forEach((obj, index) => {
                object[obj.name] = obj.value
            })
            setUrl(object, true)
        });
        
        // reset filter form
        $(document).on("reset", "#form-filter-data", function (e) {
            e.preventDefault();
            showLoader();
            let array = [],
                data = $(this).serializeArray();
            data.forEach((obj, index) => {
                array.push(obj.name);
            })
            setUrlRemoveParam(array);
        });

        // set limit
        let limit = (value) => {
            showLoader();
            setUrl({ limit: value }, true);
        }
        
        // set page
        let page = (value) => {
            showLoader();
            setUrl({ page: value });
        }

        // set sort
        let sort = (by, as) => {
            showLoader();
            setUrl({ sort : as, sort_by : by })
        }
        
        // set tab
        let tab = (value) => {
            showLoader();
            setUrl({ tab: value });
        }
    
        // call => setUrl({ "page": page_number })
        const setUrl = (obj, reset_page = null) => {
            let i = 1;
            let url_params = Object.fromEntries(new URLSearchParams(window.location.search).entries());
            for (const key in obj) {
                url_params[key] = obj[key];
            }
            if (reset_page) { delete url_params.page; }
            let new_params = [];
            for (const [key, value] of Object.entries(url_params)) {
                new_params.push((i === 1) ? "?" : "&")
                new_params.push(`${key}=${value}`);
                i++;
            }
            window.location = [...[location.protocol, '//', location.host, location.pathname], ...new_params].join('');
        }
        
        // call => setUrl(['page','limit'])
        const setUrlRemoveParam = (array) => {
            let i = 1;
            let url_params = Object.fromEntries(new URLSearchParams(window.location.search).entries());
            for (const [key, value] of Object.entries(url_params)) {
                if(array.includes(key))
                    delete url_params[key];
            }
            let new_params = [];
            for (const [key, value] of Object.entries(url_params)) {
                new_params.push((i === 1) ? "?" : "&")
                new_params.push(`${key}=${value}`);
                i++;
            }
            window.location = [...[location.protocol, '//', location.host, location.pathname], ...new_params].join('');
        }

        

        // show loader
        let showLoader = (text = null) => {
            if (text) {
                $("#loader-text").text(text);
            } else {
                $("#loader-text").text("Loading ...")
            }
            $(".loader.card-overlay").removeClass("d-none");
        }

        // hide loader
        let hideLoader = () => {
            $(".loader.card-overlay").addClass("d-none");
        }


        let current_form;

        let confirm_delete_data = (form) => {
            event.preventDefault();
            current_form = form;
            $('#dialog-confirm-delete-data').dialog('open');
        }
        
        let change_status = (form, status) => {
            event.preventDefault();
            current_form = form;
            $(".btn-set-status").hide();
            if (status === "True") {
                $(".btn-set-status.inactive").show();
            } else if (status === "False") {
                $(".btn-set-status.active").show();
            }
            $('#dialog-change-status').dialog('open');
        }

        $(document).on("click", ".close-dialog", function() {
            current_form = null;
            $('.dialog').dialog('close');
        })
        
        $(document).on("click", ".submit-form", function () {
            $(current_form).submit();
        })

        
        $('#dialog-change-status, #dialog-confirm-delete-data').dialog({
            autoOpen: false,
            modal: true,
            width: 300,
            closeOnEscape: false,
            position: {
                my: 'center bottom',
                at: 'center center',
                of: $(this),
            },
            show: {
                effect: 'fade',
                duration: 500
            },
            hide: {
                effect: 'fade',
                duration: 200
            },
            resizable: false,
        });

        
        @if(Session::has('success'))
            new PNotify({ type : 'success', title : 'Success', text : '<?=Session::get('success')?>', })                
        @elseif(Session::has('info'))
            new PNotify({ type : 'info', title : 'Info', text : '<?=Session::get('info')?>', })
        @elseif(Session::has('warning'))
            new PNotify({ type : 'warning', title : 'Warning', text : '<?=Session::get('warning')?>', })
        @elseif(Session::has('error'))
            new PNotify({ type : 'error', title : 'Error', text : '<?=Session::get('error')?>', })
        @endif
            
        
    </script>
    <!-- /theme JS files -->
    
    
    @yield('script')


</body>

</html>