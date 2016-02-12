<script src="{{ asset('../public/lte-template/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{ asset('../public/lte-template/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('../public/lte-template/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../public/lte-template/plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../public/lte-template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../public/lte-template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
<script src="{{ asset('../public/lte-template/plugins/knob/jquery.knob.js') }}" type="text/javascript"></script>
<script src="{{ asset('../public/lte-template/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('../public/lte-template/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('../public/lte-template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../public/lte-template/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../public/lte-template/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../public/lte-template/plugins/fastclick/fastclick.min.js') }}"></script>
<script src="{{ asset('../public/lte-template/dist/js/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../public/lte-template/dist/js/pages/dashboard.js') }}" type="text/javascript"></script>
<script src="{{ asset('../public/lte-template/dist/js/demo.js') }}" type="text/javascript"></script>

<script src="{{ asset('../public/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
<script>
tinymce.init({
  selector: 'textarea',height: 300, theme: 'modern',
  language: 'pl',
  language_url: '{{ asset("../public/tinymce/langs/pl.js") }}',
   plugins: [
    'advlist autolink lists link image imagetools charmap  hr ',
    'wordcount code table paste textcolor colorpicker filemanager'
  ], 

  toolbar1: 'undo redo  | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
  image_advtab: true,
  content_css: [
    '//www.tinymce.com/css/codepen.min.css'
  ],

  external_filemanager_path:"/public/filemanager/",
  filemanager_title:"Wgrane pliki" ,
  external_plugins: { "filemanager" : "{{ asset('../public/filemanager/plugin.min.js') }}"}
 
});
</script>