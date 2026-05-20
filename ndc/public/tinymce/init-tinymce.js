var editor_config = {
  path_absolute : "/",
  selector: 'textarea.my-editor',
  relative_urls: false,
  branding: false,
   image_caption: true,
  plugins: [
    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "insertdatetime media nonbreaking save table directionality",
    "emoticons template paste textpattern"
  ],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",

};

tinymce.init(editor_config);