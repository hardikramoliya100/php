$(document).ready(function() {
    $('#summernote').summernote({
        height:200
    });
  });

  $(document).ready(function(){

    $('#selectAllBox').click(function(event){
        if (this.checked) {
            $('.checkBox').each(function(){
                this.checked = true;
            });
        }else{
            $('.checkBox').each(function(){
                this.checked = false;
            });
        }
    });

  });
