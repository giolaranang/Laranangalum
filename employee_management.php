 <center>
      <br>
      <h1> 
          Cash Advance
      </h1>
    <form action="save.php" method="POST">
      <div class="form-group">
          <select name="name" class="form-control form-control-lg">
             <option value="" disabled selected>Click here to Select an Employee</option>
             <option value ="Engineer Francis">Engineer Francis</option>
             <option value ="Gio">Gio</option>
             <option value ="Jomar">Jomar</option>
             <option value ="John">John</option>
             <option value ="Kennedy">Kennedy</option>
             <option value ="Ramir">Ramir</option>
             <option value ="Richmon">Richmon</option>
             <option value ="Kiko">Kiko</option>
             <option value ="Anthony">Anthony</option>
          </select>
      </div>
      <p>
          <input placeholder="Date" type="date" name="date" id="date" required ></input>
      </p>
      <p>
          <select name="price" id="price">
             <option value ="100">100</option>
             <option value ="200">200</option>
             <option value ="300">300</option>
             <option value ="400">400</option>
             <option value ="500">500</option>
             <option value ="600">600</option>
             <option value ="1000">1000</option>
             <option value ="1500">1500</option>
             <option value ="2000">2000</option>
          </select>
          <div id="manualPrice">
             <button type="button" onclick="loadPrice()">Click to enter manual price</button>
          </div>
      </p>
          <input onclick="confirmalert()" type="submit" class="btn btn-success btn-lg" value="Save" />
      </form>
      <br>
      <form action= "show.php">
          <input id="showID" class="btn btn-info btn-lg" type="submit"/>
      </form>
      <br>
          <Button onclick="deletealert()" id="deleteID" class="btn btn-danger btn-lg" type="button" >Delete All</button>
          <Button type="button" onclick="operations('back')" class="btn btn-danger btn-lg">Back</button>
    </div>