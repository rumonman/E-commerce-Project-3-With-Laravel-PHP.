<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/datatables.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('frontend/js/all.min.js')}}"></script>


<script>

    $("#division_id").change(function(){
        var division = $("$division_id").val();
        $("#district-area").html("<option>1</option>");
        $.get("http://localhost:8000/get-districts/"+division, function(data){
           
           data = JSON.parse(data)
        });
    })
</script>