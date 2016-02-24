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
  selector: 'textarea.tinymce',height: 300, theme: 'modern',

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
  filemanager_access_key:"AGVXNg6ZJVDeTQtkQtn7yB9ExDaZbLR2yxvBrhCF2c4wXfUNqywBTmdyBUg5Jg3q" ,
  external_plugins: { "filemanager" : "{{ asset('../public/filemanager/plugin.min.js') }}"}

});





          $("#ck").click(function(e){
              e.preventDefault();
              var dataString = 'jest';
              $.ajax({
                  type: "POST",
                  url : "/apply/upload/33",
                  data : dataString,
                  success : function(data){
                      console.log(data);
                  }
              },"json");

      });



    $("#galleryTab .thumbPrev .del").click(function(e){
        if($(this).hasClass('btn-danger')){
            var delID = $(this).attr('delID');
            $(this).removeClass('btn-danger').addClass('btn-success').text('Przywróć').append('<input type="checkbox" name="remove['+delID+']" class="minimal" checked>');
        }else{
            $(this).removeClass('btn-success').addClass('btn-danger').text('Usuń');
        }
    });



	$("#seo_generator").click(function(e){
		e.preventDefault();
		var names = $("#name").val();
		var csrf = '{{ csrf_token() }}';
		$.ajax({
			type: "POST",
			url : "/admin/seo_generator",
			data : {name: names, '_token': csrf},
			success : function(data){
				$("#seo").val(data);
			}
		},"json");
	});




var fixHelperModified = function(e, tr) {
    var $originals = tr.children();
    var $helper = tr.clone();
    $helper.children().each(function(index)
    {
      $(this).width($originals.eq(index).width())
    });
    return $helper;
};

$("#example2 tbody").sortable({
    helper: fixHelperModified,
    placeholder: "ui-state-highlight",
    handle: 'i.glyphicon-sort',
    stop: function(){
        $.map($(this).find('tr'), function(el){
            var itemID = el.id;
            var itemIndex = $(el).index();
            var nrPage = {{ Request::has('page') == true ? Request::get('page') : 6}};
             console.log(itemID, itemIndex);


        var csrf = '{{ csrf_token() }}';

            $.ajax({
                url: '/admin/changePositionInTable',
                type: 'POST',
                dataType: 'json',
                data: {itemID: itemID, itemIndex: itemIndex, '_token': csrf, 'nrPage' : nrPage},
            });

        });

    },



}).disableSelection();



</script><<style type="text/css" media="screen">
    .ui-state-highlight{
        background: #3c8dbc;
    }


</style>