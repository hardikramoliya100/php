<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">

</script>
<script type="text/javascript">
    function submitdata(action){
        $(document).ready(function(){
            var data ={
                action:action,
                id:$("#id").val(),
                neme:$("#neme").val(),
                email:$("#email").val(),
                gender:$("#gender").val()
                
            };
            
            $.ajax({
                url:'function.php',
                type:'post',
                data:data,
                success:function(response){
                    alert(response);
                    if(response == "Delete successfully")
                    $("#"+action).css("display","none");
                }
            })
        })
    }
</script>