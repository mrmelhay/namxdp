
<script src="{{ asset('vendor/animsition/animsition.js') }}"></script>
<script src="{{ asset('vendor/asscroll/jquery-asScroll.js') }}"></script>
<script src="{{ asset('vendor/mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('vendor/asscrollable/jquery.asScrollable.all.js') }}"></script>
<script src="{{ asset('vendor/ashoverscroll/jquery-asHoverScroll.js') }}"></script>
<script src="{{ asset('vendor/waves/waves.js') }}"></script>
{{--<script src="{{ asset('js/widgets/chart.js') }}"></script>--}}

<script src="{{ asset('vendor/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('vendor/intro-js/intro.js') }}"></script>
<script src="{{ asset('vendor/screenfull/screenfull.js') }}"></script>
<script src="{{ asset('vendor/slidepanel/jquery-slidePanel.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-tokenfield/bootstrap-tokenfield.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-select/bootstrap-select.js') }}"></script>
<script src="{{ asset('vendor/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('vendor/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('vendor/asrange/jquery-asRange.min.js') }}"></script>
<script src="{{ asset('vendor/asspinner/jquery-asSpinner.min.js') }}"></script>
<script src="{{ asset('vendor/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('vendor/ascolor/jquery-asColor.min.js') }}"></script>
<script src="{{ asset('vendor/asgradient/jquery-asGradient.min.js') }}"></script>
<script src="{{ asset('vendor/ascolorpicker/jquery-asColorPicker.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-knob/jquery.knob.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('vendor/card/jquery.card.js') }}"></script>
<script src="{{ asset('vendor/jquery-labelauty/jquery-labelauty.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('vendor/jt-timepicker/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('vendor/datepair-js/datepair.min.js') }}"></script>
<script src="{{ asset('vendor/datepair-js/jquery.datepair.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-strength/jquery-strength.min.js') }}"></script>
<script src="{{ asset('vendor/multi-select/jquery.multi-select.js') }}"></script>
<script src="{{ asset('vendor/typeahead-js/bloodhound.min.js') }}"></script>
<script src="{{ asset('vendor/typeahead-js/typeahead.jquery.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
<!-- Plugins -->
<script src="{{ asset('vendor/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('vendor/intro-js/intro.js') }}"></script>
<script src="{{ asset('vendor/screenfull/screenfull.js') }}"></script>
<script src="{{ asset('vendor/slidepanel/jquery-slidePanel.js') }}"></script>
<script src="{{ asset('vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
<!-- Scripts -->
<script src="{{ asset('js/core.js') }}"></script>
<script src="{{ asset('js/site.js') }}"></script>
<script src="{{ asset('js/sections/menu.js') }}"></script>
<script src="{{ asset('js/sections/menubar.js') }}"></script>
<script src="{{ asset('js/sections/sidebar.js') }}"></script>
<script src="{{ asset('js/configs/config-colors.js') }}"></script>
<script src="{{ asset('js/configs/config-tour.js') }}"></script>
<script src="{{ asset('js/components/asscrollable.js') }}"></script>
<script src="{{ asset('js/components/animsition.js') }}"></script>
<script src="{{ asset('js/components/slidepanel.js') }}"></script>
<script src="{{ asset('js/components/switchery.js') }}"></script>
<script src="{{ asset('js/components/tabs.js') }}"></script>
<script src="{{ asset('js/components/select2.js') }}"></script>
<script src="{{ asset('js/components/bootstrap-tokenfield.js') }}"></script>
<script src="{{ asset('js/components/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('js/components/bootstrap-select.js') }}"></script>
<script src="{{ asset('js/components/icheck.js') }}"></script>
<script src="{{ asset('js/components/switchery.js') }}"></script>
<script src="{{ asset('js/components/asrange.js') }}"></script>
<script src="{{ asset('js/components/asspinner.js') }}"></script>
<script src="{{ asset('js/components/clockpicker.js') }}"></script>
<script src="{{ asset('js/components/ascolorpicker.js') }}"></script>
<script src="{{ asset('js/components/bootstrap-maxlength.js') }}"></script>
<script src="{{ asset('js/components/jquery-knob.js') }}"></script>
<script src="{{ asset('js/components/bootstrap-touchspin.js') }}"></script>
<script src="{{ asset('js/components/card.js') }}"></script>
<script src="{{ asset('js/components/jquery-labelauty.js') }}"></script>
<script src="{{ asset('js/components/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/components/jt-timepicker.js') }}"></script>
<script src="{{ asset('js/components/datepair-js.js') }}"></script>
<script src="{{ asset('js/components/jquery-strength.js') }}"></script>
<script src="{{ asset('js/components/multi-select.js') }}"></script>
<script src="{{ asset('js/components/jquery-placeholder.js') }}"></script>
<script src="{{ asset('js/forms/advanced.js') }}"></script>
<script type="text/javascript" src="{{asset('js/loading.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/toastr/toastr.js')}}"></script>

<script>
    (function(document, window, $) {
        'use strict';
       var Site = window.Site;
        $(document).ready(function() {
           Site.run();
            {{--document.getElementById('checkBtn').addEventListener('click', function (e) {--}}
                {{--e.preventDefault()--}}
                {{--var n1 = document.getElementById('note1')--}}
                {{--var xhr = new XMLHttpRequest();--}}
                {{--xhr.open("get", '{{url("/markAsRead")}}/{{\Illuminate\Support\Facades\Auth::user()->id}}', true);--}}
                {{--xhr.send();--}}
                {{--xhr.onreadystatechange = function() {--}}
                    {{--if (this.readyState != 4) return;--}}
                    {{--if (this.status != 200) {--}}
                        {{--H5_loading.hide()--}}
                        {{--toastr.options.timeOut = 3000;--}}
                        {{--toastr.error("Белгилашда хатолик!")--}}
                        {{--return;--}}
                    {{--}--}}
                    {{--H5_loading.hide()--}}
                {{--}--}}
                {{--console.log('clicked')--}}
            {{--})--}}
        });
    })(document, window, jQuery);
    if (document.getElementById('bt')!==null) {
        document.getElementById('bt').addEventListener('click', function (e) {
            e.preventDefault()
            console.log('okok')
            $('#exampleModal').modal('toggle')
        })
    }
    if (document.getElementById('sendMessage')!==null) {
        document.getElementById('sendMessage').addEventListener('click', function (e) {
            e.preventDefault()
            H5_loading.show()
            var text = document.getElementById('message-text').value;
            var message_type = document.getElementById('message_type').value;
            sendT(text,message_type)
        })
    }
    function sendT(text , message_type)
    {
        var xhr = new XMLHttpRequest();
        xhr.open('get', '{{url("/sendT")}}/'+text+'/'+message_type, true);
        xhr.send();
        xhr.onreadystatechange = function() {
            if (this.readyState != 4) return;
            if (this.status != 200) {
                H5_loading.hide()
                toastr.options.timeOut = 3000;
                toastr.error("Хатолик !")
                return;
            }
            H5_loading.hide()
            document.getElementById('message-text').value = '';
            toastr.options.timeOut = 3000;
            toastr.success("Юборилди!")
            $('#exampleModal').modal('hide')
        }
    }

</script>