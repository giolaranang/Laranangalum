<input type="number" name="price" id="price"/>
<script>
$("#price").keyup(function () { 
    var newValue = $(this).val().replace(/[^0-9]/g,'');
    $(this).val(newValue);    
 });
</script>