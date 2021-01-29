var listOfAllApprovedWishes =
					<?php
					$sth  = mysqli_query($conn, 'SELECT `Wish_id`,`Wish_name`,`Project_type`,`Minority_groups`,`Donating_type`,`Organization_name`,`District`, `Start_date`, `End_date` FROM `tbl_wishes` WHERE `isApproved` = 1');
					$rowZ = array();
					while ($r = mysqli_fetch_assoc($sth)) {
						$rowZ[] = $r;
					}
					print json_encode($rowZ);
					?>;
				var checkSetup = setInterval(
					function() {
						if (sessionStorage.displayWishList == undefined) {
							sessionStorage.displayWishList = JSON.stringify(listOfAllApprovedWishes)
						}
					}, 100);

				if (sessionStorage.reloaded == "true") {
					sessionStorage.displayWishList = JSON.stringify(listOfAllApprovedWishes);
					sessionStorage.srchk = "";
				}

				function searchfunction() {
					var listOfAllFilters = ["Children", "Homeless", "Elderly", "Low-income", "Funding", "Second-hand", "Food", "Individual", "Group", "Reachable", "Reach", "Short", "Long", "New", "Old", "Others"];

					var listOfAcceptedFilters = [];
					var abb = 0;
					for (var dbcd = 0; dbcd < 15; dbcd++) {
						if (document.getElementById(listOfAllFilters[dbcd]).checked == true) {
							listOfAcceptedFilters[abb] = listOfAllFilters[dbcd];
							abb++;
						}
					}
					var searchAndFiltersAppliedList = [];
					var filteredlist = [];
					var itExtra = 0;
					for (var it1 = 0; it1 < listOfAllApprovedWishes.length; it1++) {
						var fInMG = listOfAllApprovedWishes[it1].Minority_groups.split("| ");
						var fInPT = listOfAllApprovedWishes[it1].Project_type.split("| ");
						var CombinedWishTags = [];
						for (var it2 = 0; it2 < fInMG.length - 1; it2++) {
							CombinedWishTags[it2] = fInMG[it2]
						}
						for (var it3 = 0; it3 < fInPT.length - 1; it3++) {
							CombinedWishTags[fInMG.length - 1 + it3] = fInPT[it3]
						}
						var approv = 0;
						for (var it4 = 0; it4 < listOfAcceptedFilters.length; it4++) {
							for (var gg = 0; gg < CombinedWishTags.length; gg++) {
								var comp1 = JSON.parse(JSON.stringify(listOfAcceptedFilters[it4]));
								var comp2 = JSON.parse(JSON.stringify(CombinedWishTags[gg]));
								console.log(a, b, typeof a, typeof b);
								if (comp1 == comp2.slice(0, -1)) {
									approv++;
									break;
									console.log(approv);
								}
								comp1 = " ";
								comp2 = " ";
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

						console.log(approv, CombinedWishTags.length, listOfAcceptedFilters.length);
						if (approv == listOfAcceptedFilters.length && listOfAcceptedFilters.length != 0) {
							filteredlist[listOfAllFiltersni] = listOfAllApprovedWishes[it1].Wish_name;
							listOfAllFiltersni++;
						}
					}
					
					var listOfAllFiltersn = 0;
					var srchk = sessionStorage.srchk;
					if (srchk != "") {
						for (var g = 0; g < filteredlist.length; g++) {
							if (check1(rearrange(filteredlist[g], srchk)) > 0) {
								searchAndFiltersAppliedList[listOfAllFiltersn] = filteredlist[g];
								listOfAllFiltersn++;
							}
						}
					} else {
						for (var ggg = 0; ggg < filteredlist.length; ggg++) {
							searchAndFiltersAppliedList[ggg] = filteredlist[ggg];
						}
					}
					var lSbuffer = [];
					var breaking = 0;
					var ji = 0;
					for (y in searchAndFiltersAppliedList) {
						for (x in listOfAllApprovedWishes) {
							if (searchAndFiltersAppliedList[y] == listOfAllApprovedWishes[x].Wish_name) {
								lSbuffer[ji] = listOfAllApprovedWishes[x];
								ji++;
							}
						}
					}
					for (var x = 0; x < lSbuffer.length; x++) {
						for (var y = x + 1; y < lSbuffer.length; y++) {
							if (lSbuffer[x].Wish_id == lSbuffer[y].Wish_id) {
								lSbuffer[y] = "";
								for (var z = y + 1; z < lSbuffer.length; z++) {
									lSbuffer[z - 1] = lSbuffer[z];
									if (z = lSbuffer.length - 1) {
										lSbuffer[z] = ""
									};
								}

							}
						}
					}
					sessionStorage.displayWishList = JSON.stringify(lSbuffer);


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