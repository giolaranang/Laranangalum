<center>
<input type="number" id="calcuValue1" autofocus/>

 <br>
 <br>
<input placeholder="Result" value="0" type="number" id="result"/>
 <br>
 <br>
<Button type="button" onclick="add()"class="btn btn-outline-secondary">Add</button>
<Button type="button" onclick="back()"class="btn btn-outline-secondary">Back</button>
<Button type="button" onclick="back()"class="btn btn-outline-secondary">Undo</button>
<Button type="button" onclick="back()"class="btn btn-outline-secondary">Clear</button>

<hr>
<!--expense-->
<input type="number" id="calcuValue1" autofocus/>

 <br>
 <br>
<input placeholder="Result" value="0" type="number" id="result"/>
 <br>
 <br>
<Button type="button" onclick="add()"class="btn btn-outline-secondary">Add</button>
<Button type="button" onclick="back()"class="btn btn-outline-secondary">Back</button>
<Button type="button" onclick="back()"class="btn btn-outline-secondary">Undo</button>
<Button type="button" onclick="back()"class="btn btn-outline-secondary">Clear</button>


<script type="javascript">
$("#calcuValue").keyup(function () { 
    var newValue = $(this).val().replace(/[^0-9]/g,'');
    $(this).val(newValue);    
 });

//var val1 = document.getElementbyId("calcuValue1").value;
</script>