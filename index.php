<html>
    <head>
       <title>Laranang Alum</title> 
    </head>
    <body>
      <p> 
          Cash Advance
      </p>
      <p>
          <input placeholder="Name" type="text" id="name"></input>
      </p>
      <p>
          <input placeholder="Date" type="text" id="date"></input>
      </p>
      <p>
          <select name="price" id="price">
             <option value ="500">500</option>
             <option value ="1000">1000</option>
             <option value ="1500">1500</option>
          </select>
      </p>
      <p>
          <button onclick="confirmalert()">Save</button>
      </p>
      <p>
          <button>Show List</button>
      </p>
      <script>
          function confirmalert(){
              let confirmalert = confirm("Are you sure?");
              if (confirmalert){
                  alert("saved!");
              }else{
                  alert("cancelled")
              }
          }
      </script>
      
    </body>
    <footer></footer>
</html>