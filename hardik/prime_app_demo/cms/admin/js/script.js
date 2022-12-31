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

  function loadUserOnline(){
    $.get("includes/function.php?onlineuser=result",function(data){
        $(".useronline").text(data);
    });
}


setInterval(function(){
    loadUserOnline();
},500);
