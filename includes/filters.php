<!-- TODO: Rename variables -->
<html>

<head>
  <link rel="stylesheet" type="text/css" href="style.php/filters.scss" />

</head>

<body>
  <div class="col-md-3">
    <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
    <div class="filters">
      <div class="filter__title">
        <span>
          <h2>Filters</h2>
        </span>
      </div>
      <div class="search">
        <form action="">
          <label for="search">
            <span class="fa fa-search"></span>
          </label>
          <input type="search" placeholder="Search..." name="search" id="search" />
        </form>
      </div>
      <script type="text/javascript">
      var listOfAllAprovedWishes = <?php
            $sth = mysqli_query($conn, "SELECT `Wish_id`,`Wish_name`,`Project_type`,`Minority_groups`,`Donating_type`,`Organization_name`,`District`, `Start_date`, `End_date` FROM `tbl_wishes` WHERE `isApproved` = 1");
            $rowZ = array();
            while($r = mysqli_fetch_assoc($sth)) {
                 $rowZ[] = $r;
            }
            print json_encode($rowZ);
            ?>;
            var checkSetup= setInterval(function(){if(sessionStorage.displayWishList==undefined){sessionStorage.displayWishList=JSON.stringify(listOfAllAprovedWishes)}},100);
            if(sessionStorage.reloaded=="true"){sessionStorage.displayWishList=JSON.stringify(listOfAllAprovedWishes);sessionStorage.srchk="";}
            function searchfunction(){
                var listOfAllFilters = ["Children", "Homeless", "Elderly", "Low-income", "Funding", "Second-hand", "Food", "Individual","Group", "Reachable", "Reach", "Short", "Long", "New", "Old","Others"
              ];
        
              var listOfAcceptedFilters = [];
              var abb = 0;
              for (var dbcd = 0; dbcd < 15; dbcd++) {
                if (document.getElementById(listOfAllFilters[dbcd]).checked == true) {
                  listOfAcceptedFilters[abb] = listOfAllFilters[dbcd];
                  abb++;
                }
              }
            var searchAndFiltersAppliedList = [];
            var filteredlist=[];
            var itExtra = 0;
            for (var it1=0;it1<listOfAllAprovedWishes.length;it1++){
             var fInMG = listOfAllAprovedWishes[it1].Minority_groups.split("| ");
             var fInPT = listOfAllAprovedWishes[it1].Project_type.split("| ");
             var CombinedWishTags = [];
             for (var it2 = 0; it2<fInMG.length-1;it2++){CombinedWishTags[it2] =fInMG[it2]}
             for (var it3 = 0; it3<fInPT.length-1;it3++){CombinedWishTags[fInMG.length-1+it3]=fInPT[it3]}
             var approv =0;
             for(var it4=0;it4<listOfAcceptedFilters.length;it4++){
                 for(var gg=0;gg<CombinedWishTags.length;gg++){
                     var comp1=JSON.parse(JSON.stringify(listOfAcceptedFilters[it4])); 
                     var comp2= JSON.parse(JSON.stringify(CombinedWishTags[gg]));
                     console.log(a,b,typeof a,typeof b);
                     if(comp1==comp2.slice(0,-1)){
                         approv++;
                         break;
                         console.log(approv);
                     }
                     comp1=" ";comp2=" ";
                 }
             }
             /*
             for (var gg = 0 ;gg<lif.length;gg++){
                 for (var bb =0; bb<filters.length;bb++){
                     if(filters[bb] == lif[gg]){
                         approv++;
                     }
                 }
             }
             */
            
             console.log(approv,CombinedWishTags.length,listOfAcceptedFilters.length);
             if(approv==listOfAcceptedFilters.length && listOfAcceptedFilters.length!=0){
             filteredlist[listOfAllFiltersni] = listOfAllAprovedWishes[it1].Wish_name;
             listOfAllFiltersni++;
             }
            }
            var listOfAllFiltersn=0;
            var srchk = sessionStorage.srchk;
            if(srchk!=""){
            for (var g = 0; g < filteredlist.length; g++) {
                  if (check1(rearrange(filteredlist[g], srchk)) > 0) {
                    searchAndFiltersAppliedList[listOfAllFiltersn] = filteredlist[g];
                    listOfAllFiltersn++;
                  }
                }
            }
            else{
                for(var ggg =0;ggg<filteredlist.length;ggg++){
                    searchAndFiltersAppliedList[ggg]=filteredlist[ggg];
                }
            }
              var lSbuffer=[];
              var breaking=0;
              var ji = 0;
              for(y in searchAndFiltersAppliedList){
                  for(x in listOfAllAprovedWishes){
                      if (searchAndFiltersAppliedList[y]==listOfAllAprovedWishes[x].Wish_name){lSbuffer[ji]=listOfAllAprovedWishes[x];ji++;}
                      }
                  }
              for(var x=0;x<lSbuffer.length;x++){
                  for(var y = x+1;y<lSbuffer.length;y++){
                      if(lSbuffer[x].Wish_id==lSbuffer[y].Wish_id){
                          lSbuffer[y]="";
                        for(var z=y+1;z<lSbuffer.length;z++){
                            lSbuffer[z-1]=lSbuffer[z];
                            if(z=lSbuffer.length-1){lSbuffer[z]=""};
                        }
                          
                      }
                  }
              }
              sessionStorage.displayWishList=JSON.stringify(lSbuffer);
              

            }
            
            /*
            function searchfunction() {
              var srchk = sessionStorage.srchk
              var listOfAllFilters = ["children", "homeless", "elderly", "low-income", "funding", "second-hand", "food", "individual","group", "reachable", "reach", "short", "long", "new", "old"
              ];
              alert(srchk);}
        
              var filters = [];
              var abb = 0;
              for (var dbcd = 0; dbcd < 15; dbcd++) {
                if (sessionStorage[dbcd]) == true) {
                  filters[abb] = listOfAllFilters[dbcd];
                  abb++;
                }
              }
              var filteredlist = [];
              var b = 0;
              for (var j in WhishesDB) {
                var approv = 0;
                for (var c = 0; c < WhishesDB[j].tags.length; c++) {
                  for (var x = 0; x < filters.length; x++) {
                    if (filters[x] == WhishesDB[j].tags[c]) {
                      approv += 1;
                    }
                  }
                }
                if (approv == filters.length) {
                  filteredlist[b] = j;
                  b++;
                }
                var searchAndFiltersAppliedList = [];
                var listOfAllFiltersn = 0;
                for (var g = 0; g < filteredlist.length; g++) {
                  if (check1(rearrange(filteredlist[g], srchk)) > 0) {
                    searchAndFiltersAppliedList[listOfAllFiltersn] = filteredlist[g];
                    listOfAllFiltersn++;
                  }
                }
              }
              alert(filteredlist + " " + searchAndFiltersAppliedList); 
              
            }
            */
            function rearrange(movieName, inputName1) {
              var newName = movieName.replace(/:/g, "").split(" "),
                newInputName = inputName1.replace(/:/g, "").split(" "),
                k = newName.length - 1;
              for (var i = 0; i <= k; i++) {
                newName[i] = newName[i].toLowerCase();
                if (newName[i] === "") {
                  newName.splice(i, 1);
                  i--;
                  k--;
                }
              }
              k = newInputName.length - 1;
              for (i = 0; i <= k; i++) {
                newInputName[i] = newInputName[i].toLowerCase();
                if (newInputName[i] === "") {
                  newInputName.splice(i, 1);
                  i--;
                  k--;
                }
              }
              newName.sort(),
                newInputName.sort();
              return {
                movieName: newName,
                inputName: newInputName
              };
            };
        
            function check1(obj) {
              var inputName = obj.inputName,
                movieName = obj.movieName,
                occurances = 0,
                k = movieName.length,
                movieNameLength = movieName.length;
              for (var i = 0; i < k; i++) {
                var currentValue = inputName[i];
                if (currentValue === movieName[i]) {
                  inputName.splice(i, 1);
                  movieName.splice(i, 1);
                  k--;
                  i--;
                  occurances++;
                } else {
                  for (var j = 0; j < movieName.length; j++) {
                    if (currentValue === movieName[j]) {
                      inputName.splice(i, 1);
                      movieName.splice(j, 1);
                      k--;
                      occurances++;
                      break;
                    }
                  }
                }
              }
              if (inputName == "") {
                occurances = movieNameLength
              }
              return occurances / movieNameLength;
            }
        
            //character-by-character check
            function check2(inputName, movieName) {
              var counter = 0,
                newInputName = inputName.trim(d, s)
              for (var i = 0; i <= inputName.length; i++) {
                var inputChar = newInputName.charAt(i),
                  movieChar = movieName.charAt(i);
                if (inputChar === movieChar) {
                  counter++;
                }
              }
              return counter / movieName.length;
            }
      </script>
      <div class="minority-groups">
        <h3>Minority Groups</h3>
        <form action="">
          <label class="checkbox__label">
            Children
            <input type="checkbox" id="children" name="minority-group-children" value="children" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Homeless
            <input type="checkbox" id="homeless" name="minority-group-homeless" value="homeless" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Elderly
            <input type="checkbox" id="elderly" name="minority-group-elderly" value="elderly" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Low Income
            <input type="checkbox" id="low-income" name="minority-group-low-income" value="low-income" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Others
            <input type="checkbox" id="m-others" name="minority-group-others" value="others" />
            <span class="checkbox__custom"></span>
          </label>
        </form>
      </div>
      <div class="donating-types">
        <h3>Donating Types</h3>
        <form action="">
          <label class="checkbox__label">
            Funding
            <input type="checkbox" id="funding" name="donating-type-funding" value="funding" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Second Hand
            <input type="checkbox" id="second-hand" name="donating-type-second-hand" value="second-hand" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Food
            <input type="checkbox" id="food" name="donating-type-food" value="food" />
            <span class="checkbox__custom"></span>
          </label>

          <label class="checkbox__label">
            Others
            <input type="checkbox" id="d-others" name="donating-type-others" value="others" />
            <span class="checkbox__custom"></span>
          </label>
        </form>
      </div>
      <div class="project-types">
        <h3>Project Types</h3>
        <form action="">
          <table>
            <tr>
              <td>
                <label class="checkbox__label">
                  Individual
                  <input type="checkbox" id="individual" name="project-type-individual" value="individual" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
              <td>
                <label class="checkbox__label">
                  Group
                  <input type="checkbox" id="group" name="project-type-group" value="group" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
            </tr>
            <tr>
              <td>
                <label class="checkbox__label">
                  Reachable
                  <input type="checkbox" id="reachable" name="project-type-reachable" value="reachable" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
              <td>
                <label class="checkbox__label">
                  Reach
                  <input type="checkbox" id="reach" name="project-type-reach" value="reach" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
            </tr>
            <tr>
              <td>
                <label class="checkbox__label">
                  Short
                  <input type="checkbox" id="short" name="project-type-short" value="short" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
              <td>
                <label class="checkbox__label">
                  Long
                  <input type="checkbox" id="long" name="project-type-long" value="long" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
            </tr>
            <tr>
              <td>
                <label class="checkbox__label">
                  New
                  <input type="checkbox" id="new" name="project-type-new" value="new" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
              <td>
                <label class="checkbox__label">
                  Old
                  <input type="checkbox" id="old" name="project-type-old" value="old" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <script type="text/javascript">
    $('div.burger').on('click', function() {
      $('.filters').toggleClass('clicked');
      $(this).toggleClass('clicked');
    });
    </script>
  </div>
</body>

</html>
